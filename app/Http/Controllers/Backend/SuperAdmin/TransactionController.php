<?php

namespace App\Http\Controllers\Backend\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->get();
        $companies = Company::all();
        return view('backend.superadmin.transaction.index', compact('transactions', 'companies'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $companies = Company::all();
        $admins = User::where('type', 'Admin')->get();
        $superadmins = User::where('type', 'Super Admin')->get();
        return view('backend.superadmin.transaction.edit', compact('transaction', 'companies', 'admins', 'superadmins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'company'   =>  'required|exists:companies,id',
            'creator'   =>  'required|exists:users,id',
            'updater'   =>  'required|exists:users,id',
            'type'      =>  'required|string',
            'amount'    =>  'required|numeric',
            'payment_method'    =>  'required|string',
            'purpose'   =>  'required|string',
            'transaction'   =>  'required|string',
            'status'        =>  'required|string',
            'receipt'       =>  'nullable|image',
            'description'   =>  'required|string',
        ]);

        $transaction->company_id = $request->company;
        $transaction->creator_id = $request->creator;
        $transaction->updater_id = auth()->user()->id;
        $transaction->type = $request->type;
        $transaction->amount = $request->amount;
        $transaction->method = $request->payment_method;
        $transaction->purpose = $request->purpose;
        $transaction->description = $request->description;
        $transaction->transaction = $request->transaction;
        $transaction->status = $request->status;
        if($request->status == 'Approved'){
            $transaction->approved_by_id = auth()->user()->id;
        }

        if($request->hasFile('receipt')){
            if ($transaction->receipt != null)
                File::delete(public_path($transaction->receipt)); //Old image delete
            $image             = $request->file('receipt');
            $folder_path       = 'uploads/images/company/transaction-receipt/';
            if (!file_exists($folder_path)) {
                mkdir($folder_path, 0777, true);
            }
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $transaction->receipt = $folder_path.$image_new_name;
        }
        try{
            $transaction->save();
            return back()->withSuccess('Successfully updated');
        } catch (\Exception $exception) {
            return back()->withErrors( $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        try {
            if ($transaction->receipt != null)
                File::delete(public_path($transaction->receipt)); //Old image delete
            $transaction->delete();
            return response()->json([
                'type' => 'success',
                'message' => ''
            ]);
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
                'message' => ''
            ]);
        }
    }
}
