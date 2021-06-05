@push('title')
    Branch edit
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Branch edit</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Branch edit</li>
                </ol>
                <a href="{{ route('admin.branch.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Back to list</a>
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
                    <h5 class="card-title text-white">Branch update</h5>
                </div>
                <div class="card-body">
                    <form class="row justify-content-center" method="POST"
                          action="{{ route('admin.branch.update', $branch) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Name</label>
                                        <input value="{{ $branch->name }}" name="name" type="text" class="form-control"
                                               id="name" placeholder="Branch name">
                                        @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input value="{{ $branch->email }}" name="email" type="text"
                                               class="form-control"
                                               id="email" placeholder="Email address">
                                        @error('email')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label">Phone</label>
                                        <input value="{{ $branch->phone }}" name="phone" type="text"
                                               class="form-control"
                                               id="phone" placeholder="phone">
                                        @error('phone')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address" class="col-form-label">Address</label>
                                        <input value="{{ $branch->address }}" name="address" type="text"
                                               class="form-control"
                                               id="address" placeholder="address">
                                        @error('address')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <hr class="bg-success m-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sender_search_length" class="col-form-label">Sender search
                                            length</label>
                                        <input value="{{ $branch->sender_search_length }}" name="sender_search_length"
                                               type="number" class="form-control"
                                               id="sender_search_length" placeholder="Sender search length">
                                        @error('sender_search_length')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="receiver_search_length" class="col-form-label">Receiver search
                                            length</label>
                                        <input value="{{ $branch->receiver_search_length }}"
                                               name="receiver_search_length"
                                               type="number" class="form-control"
                                               id="receiver_search_length" placeholder="Receiver search length">
                                        @error('receiver_search_length')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="global_search_length" class="col-form-label">Global search
                                            length</label>
                                        <input value="{{ $branch->global_search_length }}" name="global_search_length"
                                               type="number" class="form-control"
                                               id="global_search_length" placeholder="Global search length">
                                        @error('global_search_length')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-success m-3">
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="custom_inv_counter_max_value" class="col-form-label">Custom counter
                                            maximum (invoice)</label>
                                        <input value="{{ $branch->custom_inv_counter_max_value }}"
                                               name="custom_inv_counter_max_value" type="number" min="0"
                                               class="form-control"
                                               id="custom_inv_counter_max_value" placeholder="999" required>
                                        @error('custom_inv_counter_max_value')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="custom_inv_counter_min_value" class="col-form-label">Custom counter
                                            minimum (invoice)</label>
                                        <input value="{{ $branch->custom_inv_counter_min_value }}"
                                               name="custom_inv_counter_min_value" type="number" min="0"
                                               class="form-control"
                                               id="custom_inv_counter_min_value" placeholder="1" required>
                                        @error('custom_inv_counter_min_value')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-success m-3">
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="custom_chalan_counter_max_value" class="col-form-label">Custom
                                            counter
                                            maximum (Chalan)</label>
                                        <input value="{{ $branch->custom_chalan_counter_max_value }}"
                                               name="custom_chalan_counter_max_value" type="number" min="0"
                                               class="form-control"
                                               id="custom_chalan_counter_max_value" placeholder="999" required>
                                        @error('custom_chalan_counter_max_value')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="custom_chalan_counter_min_value" class="col-form-label">Custom
                                            counter minimum (Chalan)</label>
                                        <input value="{{ $branch->custom_chalan_counter_min_value }}"
                                               name="custom_chalan_counter_min_value" type="number" min="0"
                                               class="form-control"
                                               id="custom_chalan_counter_min_value" placeholder="1" required>
                                        @error('custom_chalan_counter_min_value')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-success m-3">
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="invoice_heading_one" class="col-form-label">Invoice heading
                                            one</label>
                                        <input value="{{ $branch->invoice_heading_one }}" name="invoice_heading_one"
                                               type="text" min="0" class="form-control"
                                               id="invoice_heading_one" placeholder="Address ...........">
                                        @error('invoice_heading_one')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="invoice_heading_two" class="col-form-label">Invoice heading
                                            two</label>
                                        <input value="{{ $branch->invoice_heading_two }}" name="invoice_heading_two"
                                               type="text" min="0" class="form-control"
                                               id="invoice_heading_two" placeholder="Motto ...........">
                                        @error('invoice_heading_two')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-success m-3">
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="chalan_heading_one" class="col-form-label">Chalan heading
                                            one</label>
                                        <input value="{{ $branch->chalan_heading_one }}" name="chalan_heading_one"
                                               type="text" min="0" class="form-control"
                                               id="chalan_heading_one" placeholder="Address ...........">
                                        @error('chalan_heading_one')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="chalan_heading_two" class="col-form-label">Chalan heading
                                            two</label>
                                        <input value="{{ $branch->chalan_heading_two }}" name="chalan_heading_two"
                                               type="text" min="0" class="form-control"
                                               id="chalan_heading_two" placeholder="Motto ...........">
                                        @error('chalan_heading_two')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="chalan_heading_three" class="col-form-label">Chalan heading
                                            three</label>
                                        <input value="{{ $branch->chalan_heading_three }}" name="chalan_heading_three"
                                               type="text" min="0" class="form-control"
                                               id="chalan_heading_three" placeholder="Cantact ...........">
                                        @error('chalan_heading_three')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-success m-3">
                            <div class="row">
                                <!--/Head office-->
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="head_office" type="checkbox"
                                                       class="custom-control-input"
                                                       id="head_office"
                                                       value="1"
                                                       @if($branch->head_office) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="head_office">Make as Head office</label>
                                            </div>
                                            @error('is_head_office')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <!--/Head office-->
                                <!--Branch status-->
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="status" type="checkbox"
                                                       class="custom-control-input"
                                                       id="status"
                                                       value="1"
                                                       @if($branch->is_active) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="status">Make as active branch</label>
                                            </div>
                                            @error('status')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <!--/Branch status-->

                                <!--Conditional Invoice-->
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="active_conditional_booking" type="checkbox"
                                                       class="custom-control-input"
                                                       id="active_conditional_booking"
                                                       value="1"
                                                       @if($branch->active_conditional_booking) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="active_conditional_booking">Active conditional bill</label>
                                            </div>
                                            @error('status')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <!--/Conditional Invoice-->

                                <!--Expense manage-->
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <label class="btn btn-primary">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input name="active_expense_system" type="checkbox"
                                                       class="custom-control-input"
                                                       id="active_expense_system"
                                                       value="1"
                                                       @if($branch->active_expense_system) checked="" @endif>
                                                <label class="custom-control-label"
                                                       for="active_expense_system">Active expense system</label>
                                            </div>
                                            @error('status')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <!--/Expense manage-->
                            </div>
                            <hr class="bg-success m-3">
                            <div class="row">
                                <!--Invoice due watermark-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="invoice_due_watermark" class="col-form-label">Invoice due watermark</label><br>
                                        <img src="{{ asset($branch->invoice_due_watermark ?? get_static_option('no_image')) }}"
                                            alt="" width="70px" class="">
                                        <input name="invoice_due_watermark" accept="image/*" type="file"
                                               class="form-control"
                                               id="invoice_due_watermark" placeholder="invoice due watermark">
                                        @error('invoice_due_watermark')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/Invoice due watermark-->
                                <!--Invoice paid watermark-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="invoice_paid_watermark" class="col-form-label">Invoice paid watermark</label><br>
                                        <img src="{{ asset($branch->invoice_paid_watermark ?? get_static_option('no_image')) }}"
                                            alt="" width="70px" class="">
                                        <input name="invoice_paid_watermark" accept="image/*" type="file"
                                               class="form-control"
                                               id="invoice_paid_watermark" placeholder="invoice paid watermark">
                                        @error('invoice_paid_watermark')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/Invoice paid watermark-->
                                <!--Invoice head design-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="invoice_head_design" class="col-form-label">Invoice head design</label><br>
                                        <img src="{{ asset($branch->invoice_head_design ?? get_static_option('no_image')) }}"
                                            alt=""  height="50px" width="250px" class="border border-primary">
                                        <input name="invoice_head_design" accept="image/*" type="file" class="form-control" id="invoice_head_design">
                                        @error('invoice_head_design')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="btn-group">
                                            <label class="btn btn-warning">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input name="active_image_head_invoice" type="checkbox"
                                                           class="custom-control-input"
                                                           id="active_image_head_invoice"
                                                           value="1"
                                                           @if($branch->active_image_head_invoice) checked="" @endif>
                                                    <label class="custom-control-label"
                                                           for="active_image_head_invoice">Active this image</label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="chalan_head_design" class="col-form-label">Chalan head design</label><br>
                                        <img src="{{ asset($branch->chalan_head_design ?? get_static_option('no_image')) }}"
                                            alt="" height="50px" width="250px" class="border border-primary">
                                        <input name="chalan_head_design" accept="image/*" type="file" class="form-control" id="chalan_head_design">
                                        @error('chalan_head_design')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="btn-group">
                                            <label class="btn btn-warning">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input name="active_image_head_chalan" type="checkbox"
                                                           class="custom-control-input"
                                                           id="active_image_head_chalan"
                                                           value="1"
                                                           @if($branch->active_image_head_chalan) checked="" @endif>
                                                    <label class="custom-control-label"
                                                           for="active_image_head_chalan">Active this image</label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">

                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="form-group row">
                                <label for="head_office" class="col-sm-2 col-form-label">Linked branches</label>
                                <div class="col-sm-10">
                                    <div class="form-group button-group">
                                        @foreach($branches as $to_branch)
                                            <div class="btn-group">
                                                <label class="btn btn-info active">
                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                        <input name="linked_branches[]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="branch-{{ $loop->iteration }}"
                                                               value="{{ $to_branch->id }}"
                                                               @if(check_branch_link($branch->id, $to_branch->id)) checked="" @endif>
                                                        <label class="custom-control-label"
                                                               for="branch-{{ $loop->iteration }}">{{ $to_branch->name }}</label>
                                                    </div>
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('linked_branches')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
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
