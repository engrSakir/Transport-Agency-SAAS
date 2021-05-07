@push('title')
    Dashboard
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">{{ $status ?? '' }}/{{ $branch_name ?? '' }}</h4>
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
        @foreach($invoices->groupBy('to_branch_id') as $invoice_group => $invoice_items)
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <a href="{{ route('manager.invoice.statusAndBranchConstant', [$status, $invoice_group]) }}">
                <div class="card">
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"> {{ \App\Models\Branch::find($invoice_group)->name }}</h1>
                        <h6 class="text-white"> {{ $invoice_items->count() }} </h6>
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
                    <h4 class="card-title">Primary Table</h4>
                    <h6 class="card-subtitle">Add class <code>.color-bordered-table .primary-bordered-table</code></h6>
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
                                <td>{{ $invoice->custom_counter }}</td>
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
                                <td>

                                </td>
                                <td>@Sonu</td>
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

@endpush
