@push('title')
    Branch edit
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Company edit</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Company edit</li>
                </ol>
                <a href="{{ route('admin.branch.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Back to list</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <div class="card m-b-30 col-12 ">
                <div class="card-header bg-danger">
                    <h5 class="card-title text-white">{{ $company->name }} &nbsp; update</h5>
                </div>
                <div class="card-body">
                    <form class="row justify-content-center" method="POST" action="{{ route('admin.company.update') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-10">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input value="{{ $company->name }}" name="name" type="text" class="form-control"
                                           id="name" placeholder="Branch name">
                                    @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reporting_email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input value="{{ $company->reporting_email }}" name="reporting_email" type="text" class="form-control"
                                           id="reporting_email" placeholder="Reporting email address">
                                    @error('reporting_email')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset($company->logo ?? get_static_option('no_image')) }}" alt="" width="70px" class="img-circle">
                                    <input name="logo" type="file" accept="image/*" class="form-control"
                                           id="logo" placeholder="logo">
                                    @error('logo')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <hr class="bg-success m-3">
                            <hr class="bg-danger m-3">
                            <div class="row">
                                <!--/Head office-->
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="invoice_sms_to_receiver_at_receive" type="checkbox"
                                                       class="custom-control-input"
                                                       id="invoice_sms_to_receiver_at_receive"
                                                       value="1"
                                                       @if($company->invoice_sms_to_receiver_at_receive) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="invoice_sms_to_receiver_at_receive">invoice_sms_to_receiver_at_receive</label>
                                            </div>
                                            @error('invoice_sms_to_receiver_at_receive')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="invoice_sms_to_receiver_at_on_going" type="checkbox"
                                                       class="custom-control-input"
                                                       id="invoice_sms_to_receiver_at_on_going"
                                                       value="1"
                                                       @if($company->invoice_sms_to_receiver_at_on_going) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="invoice_sms_to_receiver_at_on_going">invoice_sms_to_receiver_at_on_going</label>
                                            </div>
                                            @error('invoice_sms_to_receiver_at_on_going')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="invoice_sms_to_receiver_at_delivered" type="checkbox"
                                                       class="custom-control-input"
                                                       id="invoice_sms_to_receiver_at_delivered"
                                                       value="1"
                                                       @if($company->invoice_sms_to_receiver_at_delivered) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="invoice_sms_to_receiver_at_delivered">invoice_sms_to_receiver_at_delivered</label>
                                            </div>
                                            @error('invoice_sms_to_receiver_at_delivered')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="invoice_sms_to_sender_at_receive" type="checkbox"
                                                       class="custom-control-input"
                                                       id="invoice_sms_to_sender_at_receive"
                                                       value="1"
                                                       @if($company->invoice_sms_to_sender_at_receive) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="invoice_sms_to_sender_at_receive">invoice_sms_to_sender_at_receive</label>
                                            </div>
                                            @error('invoice_sms_to_sender_at_receive')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="invoice_sms_to_sender_at_on_going" type="checkbox"
                                                       class="custom-control-input"
                                                       id="invoice_sms_to_sender_at_on_going"
                                                       value="1"
                                                       @if($company->invoice_sms_to_sender_at_on_going) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="invoice_sms_to_sender_at_on_going">invoice_sms_to_sender_at_on_going</label>
                                            </div>
                                            @error('invoice_sms_to_sender_at_on_going')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="invoice_sms_to_sender_at_delivered" type="checkbox"
                                                       class="custom-control-input"
                                                       id="invoice_sms_to_sender_at_delivered"
                                                       value="1"
                                                       @if($company->invoice_sms_to_sender_at_delivered) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="invoice_sms_to_sender_at_delivered">invoice_sms_to_sender_at_delivered</label>
                                            </div>
                                            @error('invoice_sms_to_sender_at_delivered')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="conditional_invoice_sms_to_receiver_at_receive" type="checkbox"
                                                       class="custom-control-input"
                                                       id="conditional_invoice_sms_to_receiver_at_receive"
                                                       value="1"
                                                       @if($company->conditional_invoice_sms_to_receiver_at_receive) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="conditional_invoice_sms_to_receiver_at_receive">conditional_invoice_sms_to_receiver_at_receive</label>
                                            </div>
                                            @error('conditional_invoice_sms_to_receiver_at_receive')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="conditional_invoice_sms_to_receiver_at_on_going" type="checkbox"
                                                       class="custom-control-input"
                                                       id="conditional_invoice_sms_to_receiver_at_on_going"
                                                       value="1"
                                                       @if($company->conditional_invoice_sms_to_receiver_at_on_going) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="conditional_invoice_sms_to_receiver_at_on_going">conditional_invoice_sms_to_receiver_at_on_going</label>
                                            </div>
                                            @error('conditional_invoice_sms_to_receiver_at_on_going')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="conditional_invoice_sms_to_receiver_at_delivered" type="checkbox"
                                                       class="custom-control-input"
                                                       id="conditional_invoice_sms_to_receiver_at_delivered"
                                                       value="1"
                                                       @if($company->conditional_invoice_sms_to_receiver_at_delivered) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="conditional_invoice_sms_to_receiver_at_delivered">conditional_invoice_sms_to_receiver_at_delivered</label>
                                            </div>
                                            @error('conditional_invoice_sms_to_receiver_at_delivered')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="conditional_invoice_sms_to_receiver_at_break" type="checkbox"
                                                       class="custom-control-input"
                                                       id="conditional_invoice_sms_to_receiver_at_break"
                                                       value="1"
                                                       @if($company->conditional_invoice_sms_to_receiver_at_break) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="conditional_invoice_sms_to_receiver_at_break">conditional_invoice_sms_to_receiver_at_break</label>
                                            </div>
                                            @error('conditional_invoice_sms_to_receiver_at_break')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="conditional_invoice_sms_to_sender_at_receive" type="checkbox"
                                                       class="custom-control-input"
                                                       id="conditional_invoice_sms_to_sender_at_receive"
                                                       value="1"
                                                       @if($company->conditional_invoice_sms_to_sender_at_receive) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="conditional_invoice_sms_to_sender_at_receive">conditional_invoice_sms_to_sender_at_receive</label>
                                            </div>
                                            @error('conditional_invoice_sms_to_sender_at_receive')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="conditional_invoice_sms_to_sender_at_on_going" type="checkbox"
                                                       class="custom-control-input"
                                                       id="conditional_invoice_sms_to_sender_at_on_going"
                                                       value="1"
                                                       @if($company->conditional_invoice_sms_to_sender_at_on_going) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="conditional_invoice_sms_to_sender_at_on_going">conditional_invoice_sms_to_sender_at_on_going</label>
                                            </div>
                                            @error('conditional_invoice_sms_to_sender_at_on_going')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="conditional_invoice_sms_to_sender_at_delivered" type="checkbox"
                                                       class="custom-control-input"
                                                       id="conditional_invoice_sms_to_sender_at_delivered"
                                                       value="1"
                                                       @if($company->conditional_invoice_sms_to_sender_at_delivered) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="conditional_invoice_sms_to_sender_at_delivered">conditional_invoice_sms_to_sender_at_delivered</label>
                                            </div>
                                            @error('conditional_invoice_sms_to_sender_at_delivered')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="conditional_invoice_sms_to_sender_at_break" type="checkbox"
                                                       class="custom-control-input"
                                                       id="conditional_invoice_sms_to_sender_at_break"
                                                       value="1"
                                                       @if($company->conditional_invoice_sms_to_sender_at_break) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="conditional_invoice_sms_to_sender_at_break">conditional_invoice_sms_to_sender_at_break</label>
                                            </div>
                                            @error('conditional_invoice_sms_to_sender_at_break')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="sms_chalan_information_to_receiver_branch" type="checkbox"
                                                       class="custom-control-input"
                                                       id="sms_chalan_information_to_receiver_branch"
                                                       value="1"
                                                       @if($company->sms_chalan_information_to_receiver_branch) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="sms_chalan_information_to_receiver_branch">sms_chalan_information_to_receiver_branch</label>
                                            </div>
                                            @error('sms_chalan_information_to_receiver_branch')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="custom_sms_to_random_number" type="checkbox"
                                                       class="custom-control-input"
                                                       id="custom_sms_to_random_number"
                                                       value="1"
                                                       @if($company->custom_sms_to_random_number) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="custom_sms_to_random_number">custom_sms_to_random_number</label>
                                            </div>
                                            @error('custom_sms_to_random_number')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-success m-3">
                            <hr class="bg-danger m-3">
                            <div class="col-12 text-center">
                                <button id="submit-btn" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush
@push('summer-note')

@endpush
