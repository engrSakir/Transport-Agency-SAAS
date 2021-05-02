<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $usable_message_amount  = auth()->user()
        ->company->purchaseMessages->pluck('message_amount')->count();
        //- auth()->user()->messageHistories->sum('message_count');
dd($usable_message_amount);
        return view('backend.admin.dashboard.index');
    }
}
