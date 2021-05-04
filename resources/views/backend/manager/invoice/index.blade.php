@push('title')
    Dashboard
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Invoice</h4>
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
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white"> 00</h1>
                    <h6 class="text-white"> মেসেজের </h6>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
