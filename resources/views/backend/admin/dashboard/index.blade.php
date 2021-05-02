@push('title')
    Dashboard
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Admin Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ url('/') }}" target="_blank" type="button" class="btn btn-info d-none d-lg-block m-l-15">
                    <i class="mdi mdi-checkbox-multiple-marked-circle"></i>
                    Website</a>
            </div>
        </div>
    </div>
@endsection
@section('content')

@endsection
@push('script')

@endpush
