<?php

namespace App\Http\Controllers\Backend\Manager;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
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
