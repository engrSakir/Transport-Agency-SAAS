<?php

namespace App\Http\Controllers\Backend\Manager;

use App\Http\Controllers\Controller;
use App\Models\Chalan;
use App\Models\Invoice;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

class ChalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoices' => 'required',
            'branch_office' => 'required|exists:branches,id',
            'driver_name' => 'required|string',
            'driver_phone' => 'required|string',
            'car_number' => 'required|string',
        ]);

        //# Step 0 CHECK TO_BRANCH IS VALID OR NOT
        if (!check_branch_link(auth()->user()->branch->id, $request->branch_office)){
            return response()->json([
                'type' => 'error',
                'message' => 'Branch are not linked. Contact with admin.',
            ]);
        }

        $invoice_counter = 0;
        foreach(explode(',', $request->invoices) as $invoice_id){
            $invoice = Invoice::findOrFail($invoice_id);
            //ইনভয়েসের ভ্যালিডেশন চেক হচ্ছে যে ইনভয়েস টি এই ব্রাঞ্চ থেকেই তৈরি করা হয়েছে কিনা
            if ($invoice !=null && $invoice->from_branch_id == auth()->user()->branch->id && $invoice->status == 'Received'){
                $invoice_counter++;
            }
        }

        if($invoice_counter >! 0){
            return response()->json([
                'type' => 'error',
                'message' => 'Chose your invoice items.',
            ]);
        }

        $chalan = new Chalan();
        $chalan->from_branch_id =   auth()->user()->branch->id;
        $chalan->to_branch_id   =   $request->branch_office;
        $chalan->created_by     =   auth()->user()->id;
        $chalan->driver_name    =   $request->driver_name;
        $chalan->driver_phone   =   $request->driver_phone;
        $chalan->car_number     =   $request->car_number;
        $chalan->save();

        foreach(explode(',', $request->invoices) as $invoice_id){
            $invoice = Invoice::findOrFail($invoice_id);
            //ইনভয়েসের ভ্যালিডেশন চেক হচ্ছে যে ইনভয়েস টি এই ব্রাঞ্চ থেকেই তৈরি করা হয়েছে কিনা
            if ($invoice !=null && $invoice->from_branch_id == auth()->user()->branch->id && $invoice->status == 'Received'){
                $invoice->chalan_id = $chalan->id;
                $invoice->status = 'On Going';
                $invoice->save();
            }
        }

        return response()->json([
            'type' => 'success',
            'message' => 'Successfully status changed',
            'url' => route('manager.chalan.show', $chalan),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chalan  $chalan
     * @return \Illuminate\Http\Response
     */
    public function show(Chalan $chalan)
    {
        if ($chalan->from_branch_id == auth()->user()->branch->id || $chalan->to_branch_id == auth()->user()->branch->id){
//            if ($invoice->fromBranch->invoice_style == 'A5'){
            $pdf = PDF::loadView('backend.pdf.a-4-one', compact('chalan'));
//            }else if ($invoice->fromBranch->invoice_style == 'A4'){
//                $pdf = PDF::loadView('backend.pdf.a4', compact('invoice'));
//            }
            return $pdf->stream('Invoice-'.config('app.name').'-('.$chalan->fromBranch->company->name.'- chalan date-'.$chalan->created_at->format('d-m-y').').pdf');
        }else{
            return back()->withErrors('Your are not permitted to check this invoice.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chalan  $chalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Chalan $chalan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chalan  $chalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chalan $chalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chalan  $chalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chalan $chalan)
    {
        //
    }
}