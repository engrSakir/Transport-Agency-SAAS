@push('title')
    Branch
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Branch</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Branch</li>
                </ol>
                <a href="{{ route('superadmin.branch.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create Branch</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            @foreach($branches as $branch)
            <div class="col-md-6">
                <div class="card @if($loop->odd) border-info @else border-success @endif">
                    <div class="card-header @if($loop->odd) bg-info @else bg-success @endif">
                        <h4 class="m-b-0 text-white"> <b>{{ $branch->name }}</b> </h4></div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-6 col-lg-4 col-xlg-2">
                                <div class="card">
                                    <div class="box bg-info text-center">
                                        <h1 class="font-light text-white">{{ $branch->invoices->count() }}</h1>
                                        <h6 class="text-white">Invoice</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-4 col-xlg-2">
                                <div class="card">
                                    <div class="box bg-primary text-center">
                                        <h1 class="font-light text-white">{{ $branch->messages->count() }}</h1>
                                        <h6 class="text-white">Message</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-4 col-xlg-2">
                                <div class="card">
                                    <div class="box bg-success text-center">
                                        <h1 class="font-light text-white">{{ $branch->managers->count() }}</h1>
                                        <h6 class="text-white">Manager</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-4 col-xlg-2">
                                <div class="card">
                                    <div class="box bg-dark text-center">
                                        <h1 class="font-light text-white">{{ $branch->branchCustomers->count() }}</h1>
                                        <h6 class="text-white">Customer</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-4 col-xlg-2">
                                <div class="card">
                                    <div class="box bg-megna text-center">
                                        <h1 class="font-light text-white">{{ $branch->invoices->sum('paid') }}</h1>
                                        <h6 class="text-white">Paid</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-4 col-xlg-2">
                                <div class="card">
                                    <div class="box bg-warning text-center">
                                        <h1 class="font-light text-white">{{ $branch->invoices->sum('total') - $branch->invoices->sum('paid') }}</h1>
                                        <h6 class="text-white">Unpaid</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush
