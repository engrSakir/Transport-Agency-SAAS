<?php

namespace App\Http\Controllers\Backend\Manager;

use App\Http\Controllers\Controller;
use App\Models\CustomerAndBranch;
use App\Models\Invoice;
use App\Models\Sender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;



class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.manager.invoice.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()){
            return DB::table('customer_and_branches')
                ->where('customer_and_branches.branch_id', auth()->user()->branch->id)
                ->rightJoin('users', 'customer_and_branches.user_id', '=', 'users.id')
                ->select('name', 'phone', 'email')
                ->get();
        }else{
            $linked_branches = auth()->user()->branch->fromLinkedBranchs;
            return view('backend.manager.invoice.create', compact('linked_branches'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request)
    {
        $request->validate([
           'sender_name'        =>  'required|string',
           'receiver_name'      =>  'required|string',
           'receiver_phone'     =>  'nullable|string|min:6|max:16',
           'receiver_email'     =>  'nullable|email',
           'branch'             =>  'required|exists:branches,id',
           'description'        =>  'required|string',
           'quantity'           =>  'required|numeric|min:0',
           'price'              =>  'required|numeric|min:0',
           'advance'            =>  'required|numeric|min:0',
           'home'               =>  'required|numeric|min:0',
           'labour'             =>  'required|numeric|min:0',
        ]);

        //# Step 0 CHECK TO_BRANCH IS VALID OR NOT
        if (!check_branch_link(auth()->user()->branch->id, $request->branch)){
            return response()->json([
                'type' => 'error',
                'message' => 'Branch are not linked. Contact with admin.',
            ]);
        }

        //# Step 1 CUSTOMER
        $customer = null;
        //যদি এই তথ্যের সাথে মিলে কাস্টমার না থাকে তাহলে নতুন কাস্টমার তৈরি হবে
        if ($request->receiver_phone){  // ফোন নাম্বার পায় তাহলে সেই ফোন নাম্বারের আন্ডারে হবে
            $customer = User::where('phone', $request->receiver_phone)->first();
        }

        if(!$customer && $request->receiver_email){ // যদি ফোন নাম্বার না পেয়ে ইমেইল পায় তাহলে সেই ইমেইল এর আন্ডারে হবে
            $customer = User::where('email', $request->receiver_email)->first();
        }

        if(!$customer && $request->receiver_name){ //যদি ফোন নাম্বার এবং ইমেইল না পায় তাহলে নামের আন্ডারে হওয়ার চেষ্টা করবে
            $customer = User::where('name', $request->receiver_name)->where('phone', null)->where('email', null)->first();
        }

        if(!$customer){ //যদি কোন নাম্বার ইমেইল এবং নাম কোনটির সাথে মিলে না পাওয়া যায় তাহলে নতুন তৈরি হবে
            $customer = new User();
            $customer->name = $request->receiver_name;
            $customer->email = $request->receiver_email;
            $customer->phone = $request->receiver_phone;
            $customer->password = Str::random(20);
            $customer->creator_id = auth()->user()->id;
            try {
                $customer->save();
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'error',
                    'message' => $exception->getMessage(),
                ]);
            }
        }

        //# Step 2 SENDER
        //পার্সেল প্রেরকের নাম যদি লিস্টে না থেকে থাকে তাহলে নতুন তৈরি হবে
        $sender = Sender::firstOrCreate(
            ['name' => $request->sender_name],
            ['creator_id' => auth()->user()->id]
        );

        //# Step 3 LINKED
        //কাস্টমার যদি এই ব্রাঞ্চ এর সাথে যুক্ত হয়ে না থাকে তাহলে যুক্ত হয়ে যাবে
        $customer_and_branch = CustomerAndBranch::firstOrCreate(
            ['user_id' => $customer->id],
            ['branch_id' => auth()->user()->branch->id]
        );

        //# Step 4 INVOICE
        //এখন কাস্টমারের আইডি নিয়ে ভাউচার তৈরি করা হবে
        $invoice = new Invoice();

        $invoice->status            = 'Received';     //Received|On Going|Delivered

        $invoice->from_branch_id    = auth()->user()->branch->id;
        $invoice->to_branch_id      = $request->branch;
        $invoice->sender_id         = $sender->id;
        $invoice->receiver_id       = $customer->id;

        $invoice->description       = $request->description;
        $invoice->quantity          = $request->quantity;
        $invoice->price             = $request->price;
        $invoice->home              = $request->home;
        $invoice->labour            = $request->labour;
        $invoice->paid              = $request->advance;

        $invoice->creator_id        = auth()->user()->id;

        $invoice->creator_ip        = geoip()->getClientIP();
        $invoice->creator_browser   = get_client_browser();
        $invoice->creator_device    = get_client_device();
        $invoice->creator_os        = get_client_os();
        $invoice->creator_location  = geoip()->getLocation(geoip()->getClientIP())->city;

        //# Step 4 SMS

        try {
            $invoice->save();
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => $exception->getMessage(),
            ]);
        }

        return response()->json([
            'type' => 'success',
            'message' => 'Successfully done',
            'invoice' => $invoice,
            'url' => route('manager.invoice.show', $invoice),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        if ($invoice->from_branch_id == auth()->user()->branch->id || $invoice->to_branch_id == auth()->user()->branch->id){
            if ($invoice->fromBranch->invoice_style == 'A5'){
                $pdf = PDF::loadView('backend.pdf.a5', compact('invoice'));
            }else if ($invoice->fromBranch->invoice_style == 'A4'){
                $pdf = PDF::loadView('backend.pdf.a4', compact('invoice'));
            }
            return $pdf->stream('Invoice-'.config('app.name').'-('.$invoice->fromBranch->company->name.'- invoice code-'.$invoice->barcode.').pdf');
        }else{
            return back()->withErrors('Your are not permitted to check this invoice.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function senderName(Request $request)
    {
        if ($request->ajax()){
            return DB::table('customer_and_branches')
                ->where('customer_and_branches.branch_id', auth()->user()->branch->id)
                ->rightJoin('users', 'customer_and_branches.user_id', '=', 'users.id')
                ->select('name', 'phone', 'email')
                ->get();
        }else{
            return redirect()->back()->withErrors('Request no allowed');
        }
    }
    public function receiverName(Request $request)
    {
        if ($request->ajax()){
            return DB::table('customer_and_branches')
                ->where('customer_and_branches.branch_id', auth()->user()->branch->id)
                ->rightJoin('users', 'customer_and_branches.user_id', '=', 'users.id')
                ->where('name', 'LIKE', '%'. $request->name. '%')
                ->select('name', 'phone', 'email')
                ->get();
        }else{
            return redirect()->back()->withErrors('Request no allowed');
        }
    }
    public function receiverPhone(Request $request)
    {
        if ($request->ajax()){
            return DB::table('customer_and_branches')
                ->where('customer_and_branches.branch_id', auth()->user()->branch->id)
                ->rightJoin('users', 'customer_and_branches.user_id', '=', 'users.id')
                ->where('phone', 'LIKE', '%'. $request->phone. '%')
                ->select('name', 'phone', 'email')
                ->get();
        }else{
            return redirect()->back()->withErrors('Request no allowed');
        }
    }
    public function receiverEmail(Request $request)
    {
        if ($request->ajax()){
            return DB::table('customer_and_branches')
                ->where('customer_and_branches.branch_id', auth()->user()->branch->id)
                ->rightJoin('users', 'customer_and_branches.user_id', '=', 'users.id')
                ->where('email', 'LIKE', '%'. $request->email. '%')
                ->select('name', 'phone', 'email')
                ->get();
        }else{
            return redirect()->back()->withErrors('Request no allowed');
        }
    }
}
