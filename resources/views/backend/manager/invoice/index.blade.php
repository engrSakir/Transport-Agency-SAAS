@push('title')
    Dashboard
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor font-weight-bold">Status: {{ $status ?? '' }}/Branch: {{ $branch_name ?? '' }}</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
                <a href="{{ route('manager.invoice.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create Invoice</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <!-- Column 1-->
        @foreach($invoices->groupBy('to_branch_id') as $branch_id => $invoice_items)
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <a href="{{ route('manager.invoice.statusAndBranchConstant', [\Illuminate\Support\Str::slug($status, ' ', '-'), $branch_id]) }}">
                <div class="card">
                    <div class="box bg-info text-center">
                        <h4 class="font-light text-white font-weight-bold"> {{ \App\Models\Branch::find($branch_id)->name }}</h4>
                        <h6 class="text-white"> Invoice: {{ $invoice_items->count() }} </h6>
                        <h6 class="text-white">
                            Price : {{ $invoice_items->sum('price') + $invoice_items->sum('home') + $invoice_items->sum('labour') }}
                            <br>
                            Due : {{ $invoice_items->sum('price') + $invoice_items->sum('home') + $invoice_items->sum('labour') - $invoice_items->sum('paid') }}
                            <br>
                            Paid : {{ $invoice_items->sum('paid') }}
                        </h6>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Invoice List</h4>
{{--                    <h6 class="card-subtitle">Add class <code>.color-bordered-table .primary-bordered-table</code></h6>--}}
                    <div class="row button-group">
                        <div class="col-lg-2 col-md-4">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-info select-all">Select all</button>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-success un-select-all">Un select all</button>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-danger delete-selected-all">Delete selected</button>
                        </div>
                        @if (Request::is('*/manager/invoice/status/received' || '*/manager/invoice/status/received/branch/*'))
                        <div class="col-lg-2 col-md-4">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-info make-as-on-going-btn">Make as On Going</button>
                        </div>
                        @endif
                        @if (Request::is('*/manager/invoice/status/on-going'))
                        <div class="col-lg-2 col-md-4">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-info delete-selected-all">Make as Delivered</button>
                        </div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table color-bordered-table primary-bordered-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Office</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                            <tr>
                                <td>
                                    <label class="btn btn-info active">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="invoice-{{ $loop->iteration }}">
                                            <label class="custom-control-label font-weight-bold" for="invoice-{{ $loop->iteration }}">#{{ $invoice->custom_counter }}</label>
                                        </div>
                                    </label>

                                </td>
                                <td>
                                    <b style="font-size: 18px;">{{ $invoice->receiver->name ?? '' }}</b><br>
                                    {{ $invoice->receiver->phone ?? '' }}<br>
                                    {{ $invoice->receiver->email ?? '' }}<br>
                                    <span class="badge badge-success">
                                        {{ $invoice->sender->name ?? '' }}
                                    </span>
                                </td>
                                <td style="font-size: 16px;">
                                    {{ $invoice->toBranch->name ?? '' }}<br>
                                    <b>{{ $invoice->created_at->format('d/m/Y') }}</b>
                                </td>
                                <td style="font-size: 16px;">
                                    <span class="text-danger">Due: {{ $invoice->price + $invoice->home + $invoice->labour - $invoice->paid }}</span><br>
                                    <span class="text-info">Paid: {{ $invoice->paid }}</span><br>
                                    <span class="text-success">Total: {{ $invoice->price + $invoice->home + $invoice->labour }}</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-circle btn-lg show-inv" value="{{ route('manager.invoice.show', $invoice) }}"><i class="mdi mdi-cloud-print"></i> </button>
                                    <button type="button" class="btn btn-warning btn-circle btn-lg"><i class="mdi mdi-tooltip-edit"></i> </button>
                                    <button type="button" class="btn btn-danger btn-circle btn-lg" onclick="delete_function(this)" value="{{ route('manager.invoice.destroy', $invoice) }}"><i class="mdi mdi-delete-circle"></i> </button>
                                </td>
                            </tr>
                            @endforeach
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Office</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            // Get current page and set current in nav
            $(".show-inv").click( function (){
                var html_embed_code = `<embed type="text/html" src="`+$(this).val()+`" width="750" height="500">`;
                $('#extra-large-modal-body').html(html_embed_code);
                $('#extra-large-modal-body').addClass( "text-center" );
                $('#extra-large-modal-title').text( "INVOICE" );
                $('#extra-large-modal').modal('show');
            });

            $(".make-as-on-going-btn").click( function (){
                var html_embed_code = `
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">General Form</h4>
                                <h6 class="card-subtitle"> All with bootstrap element classies </h6>
                                <form class="mt-4">
                                    <div class="form-group">
                                        <label for="branch-office">Email address</label>
                                         <select class="form-control custom-select" id="branch-office">
                                         <option>--Select your Country--</option>
                                         @foreach($invoices->groupBy('to_branch_id') as $branch_id => $invoice_items)
                                         <option>{{ \App\Models\Branch::find($branch_id)->name }}</option>
                                         @endforeach
                                         <option>Sri Lanka</option>
                                         <option>USA</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                        <input type="checkbox" class="custom-control-input" id="checkbox0" value="check">
                                        <label class="custom-control-label" for="checkbox0">Check Me Out !</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                $('#extra-large-modal-body').html(html_embed_code);
                $('#extra-large-modal-body').addClass( "text-center" );
                $('#extra-large-modal-title').text( "Make as on going" );
                $('#extra-large-modal').modal('show');
            });
        });
    </script>
@endpush
