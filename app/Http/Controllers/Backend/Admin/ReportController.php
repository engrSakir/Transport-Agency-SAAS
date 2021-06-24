<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chalan;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view('backend.admin.report.index');
    }

    public function search(Request $request){
        $request->validate([
            'date_range' => 'required|string'
        ]);
        $from_date_time = get_before_of_string(' - ', $request->date_range); //06/23/2021 12:00 AM
        $to_date_time = get_after_of_string(' - ', $request->date_range); //06/23/2021 12:00 AM

        $from_date_time = Carbon::parse($from_date_time)->format('Y-m-d H:i:s'); //2021-06-24 14:30:00 this is DB format
        $to_date_time = Carbon::parse($to_date_time)->format('Y-m-d H:i:s'); //2021-06-24 14:30:00 this is DB format

        $invoices = Invoice::whereIn('from_branch_id', company()->branches()->pluck('id'))
            ->orWhereIn('to_branch_id', company()->branches()->pluck('id'))
            ->whereBetween('created_at', [$from_date_time, $to_date_time])
            ->count();

        $chalans = Chalan::whereIn('from_branch_id', company()->branches()->pluck('id'))
            ->orWhereIn('to_branch_id', company()->branches()->pluck('id'))
            ->whereBetween('created_at', [$from_date_time, $to_date_time])
            ->count();

        dd($invoices);
        dd($chalans);

    }
}
