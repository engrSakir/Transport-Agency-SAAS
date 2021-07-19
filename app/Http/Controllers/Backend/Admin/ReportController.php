<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Chalan;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

class ReportController extends Controller
{
    public function index(){
        $branches = company()->branches;
        return view('backend.admin.report.index', compact('branches'));
    }

    public function search(Request $request){
        $request->validate([
            'date_range' => 'required|string',
            'branches' => 'required'
        ]);

        $from_date_time = get_before_of_string(' - ', $request->date_range); //06/23/2021 12:00 AM
        $to_date_time = get_after_of_string(' - ', $request->date_range); //06/23/2021 12:00 AM

        $from_date_time = Carbon::parse($from_date_time)->format('Y-m-d H:i:s'); //2021-06-24 14:30:00 this is DB format
        $to_date_time = Carbon::parse($to_date_time)->format('Y-m-d H:i:s'); //2021-06-24 14:30:00 this is DB format

        /*
         $stack = array('a', 'b', 'c');
         array_push($stack, array('d', 'e', 'f'));
         print_r($stack);
         */
        $reports = array();
        foreach ($request->branches as $branch) {
            $branch = Branch::findOrFail($branch);

            $invoices = Invoice::where('from_branch_id', $branch->id)
                ->whereBetween('created_at', [$from_date_time, $to_date_time])
                ->get();
            $chalans = Chalan::where('from_branch_id', $branch->id)
                ->whereBetween('created_at', [$from_date_time, $to_date_time])
                ->get();
            //for all status
            if($branch->active_labour_bill_with_invoice_total){
                $total_amount_of_all_status = $invoices->sum('price') + $invoices->sum('home') + $invoices->sum('labour');
                $total_due_amount_of_all_status = $invoices->sum('price') + $invoices->sum('home') + $invoices->sum('labour') - $invoices->sum('paid');
            }else{
                $total_amount_of_all_status = $invoices->sum('price') + $invoices->sum('home');
                $total_due_amount_of_all_status = $invoices->sum('price') + $invoices->sum('home') - $invoices->sum('paid');
            }
            $total_paid_amount_of_all_status = $invoices->sum('paid');
            $total_invoice_of_all_status = $invoices->count();

            //for received status
            $invoices = $invoices->where('status', 'Received');
            if($branch->active_labour_bill_with_invoice_total){
                $total_amount_of_received_status = $invoices->sum('price') + $invoices->sum('home') + $invoices->sum('labour');
                $total_due_amount_of_received_status = $invoices->sum('price') + $invoices->sum('home') + $invoices->sum('labour') - $invoices->sum('paid');
            }else{
                $total_amount_of_received_status = $invoices->sum('price') + $invoices->sum('home');
                $total_due_amount_of_received_status = $invoices->sum('price') + $invoices->sum('home') - $invoices->sum('paid');
            }
            $total_paid_amount_of_received_status = $invoices->sum('paid');
            $total_invoice_of_received_status = $invoices->count();

            //for On Going status
            $invoices = $invoices->where('status', 'On Going');
            if($branch->active_labour_bill_with_invoice_total){
                $total_amount_of_on_going_status = $invoices->sum('price') + $invoices->sum('home') + $invoices->sum('labour');
                $total_due_amount_of_on_going_status = $invoices->sum('price') + $invoices->sum('home') + $invoices->sum('labour') - $invoices->sum('paid');
            }else{
                $total_amount_of_on_going_status = $invoices->sum('price') + $invoices->sum('home');
                $total_due_amount_of_on_going_status = $invoices->sum('price') + $invoices->sum('home') - $invoices->sum('paid');
            }
            $total_paid_amount_of_on_going_status = $invoices->sum('paid');
            $total_invoice_of_on_going_status = $invoices->count();

            //for Delivered status
            $invoices = $invoices->where('status', 'Delivered');
            if($branch->active_labour_bill_with_invoice_total){
                $total_amount_of_delivered_status = $invoices->sum('price') + $invoices->sum('home') + $invoices->sum('labour');
                $total_due_amount_of_delivered_status = $invoices->sum('price') + $invoices->sum('home') + $invoices->sum('labour') - $invoices->sum('paid');
            }else{
                $total_amount_of_delivered_status = $invoices->sum('price') + $invoices->sum('home');
                $total_due_amount_of_delivered_status = $invoices->sum('price') + $invoices->sum('home') - $invoices->sum('paid');
            }
            $total_paid_amount_of_delivered_status = $invoices->sum('paid');
            $total_invoice_of_delivered_status = $invoices->count();

            array_push($reports,
                array(
                    'branch_name'       => $branch->name,
                    //all status
                    'total_invoice_of_all_status'     => $total_invoice_of_all_status,
                    'total_amount_of_all_status'      => $total_amount_of_all_status,
                    'total_paid_amount_of_all_status' => $total_paid_amount_of_all_status,
                    'total_due_amount_of_all_status'  => $total_due_amount_of_all_status,

                    //received status
                    'total_invoice_of_received_status'     => $total_invoice_of_received_status,
                    'total_amount_of_received_status'      => $total_amount_of_received_status,
                    'total_paid_amount_of_received_status' => $total_paid_amount_of_received_status,
                    'total_due_amount_of_received_status'  => $total_due_amount_of_received_status,

                    //on-going status
                    'total_invoice_of_on_going_status'     => $total_invoice_of_on_going_status,
                    'total_amount_of_on_going_status'      => $total_amount_of_on_going_status,
                    'total_paid_amount_of_on_going_status' => $total_paid_amount_of_on_going_status,
                    'total_due_amount_of_on_going_status'  => $total_due_amount_of_on_going_status,

                    //delivered status
                    'total_invoice_of_delivered_status'     => $total_invoice_of_delivered_status,
                    'total_amount_of_delivered_status'      => $total_amount_of_delivered_status,
                    'total_paid_amount_of_delivered_status' => $total_paid_amount_of_delivered_status,
                    'total_due_amount_of_delivered_status'  => $total_due_amount_of_delivered_status,

                    //Chalan
                    'total_chalan'  => $chalans->count(),
                )
            );
        }

        $pdf = PDF::loadView('backend.admin.pdf.report', compact('reports'));
        return $pdf->stream(config('app.name').'Report of-'.Carbon::now()->format('h:i:s d-m-Y').'pdf');


        // $request->validate([
        //     'date_range' => 'required|string'
        // ]);
        // $from_date_time = get_before_of_string(' - ', $request->date_range); //06/23/2021 12:00 AM
        // $to_date_time = get_after_of_string(' - ', $request->date_range); //06/23/2021 12:00 AM

        // $from_date_time = Carbon::parse($from_date_time)->format('Y-m-d H:i:s'); //2021-06-24 14:30:00 this is DB format
        // $to_date_time = Carbon::parse($to_date_time)->format('Y-m-d H:i:s'); //2021-06-24 14:30:00 this is DB format

        // $invoices = Invoice::whereIn('from_branch_id', company()->branches()->pluck('id'))
        //     ->orWhereIn('to_branch_id', company()->branches()->pluck('id'))
        //     ->whereBetween('created_at', [$from_date_time, $to_date_time])
        //     ->count();

        // $chalans = Chalan::whereIn('from_branch_id', company()->branches()->pluck('id'))
        //     ->orWhereIn('to_branch_id', company()->branches()->pluck('id'))
        //     ->whereBetween('created_at', [$from_date_time, $to_date_time])
        //     ->count();


        // dd($request->branches);
        // dd($invoices);
        // dd($chalans);



    }
}
