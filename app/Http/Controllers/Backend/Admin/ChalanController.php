<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chalan;
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
        $chalans = Chalan::whereIn('from_branch_id', company()->branches()->pluck('id'))->orWhereIn('to_branch_id', company()->branches()->pluck('id'))->orderBy('id', 'desc')->get();
        return view('backend.admin.chalan.index', compact('chalans'));
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
     * @param  \App\Models\Chalan  $chalan
     * @return \Illuminate\Http\Response
     */
    public function show(Chalan $chalan)
    {
        if(check_chalan_for_admin($chalan)){
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
