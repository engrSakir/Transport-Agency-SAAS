@push('title')
    Balance
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor font-weight-bold">Balance</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Balance</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Payment Information/পেমেন্টের তথ্যাদি</h4>
                </div>
                <div class="card-body">
                    <p class="text-danger">* সঠিকভাবে পেমেন্টের তথ্য দিয়ে সাহায্য করুন, তাতে আপনার পেমেন্ট দ্রুত
                        অ্যাপ্রুভ হবে। যেমন আপনি কত টাকা পেমেন্ট করেছেন এবং কোন ব্যাংক ব্যবহার করে পেমেন্ট করেছেন অথবা
                        কোন মোবাইল ব্যাংকিং ব্যবহার করে পেমেন্ট করেছেন সে সম্পর্কে লিখুন।</p>
                    <p class="text-danger">** City Bank - Begum rokeya shoroni - DATATECH DB LTD. - <b>A/C:
                            1402924223001</b></p>
                    <p class="text-danger">*** bKash personal: 01857110581</p>
                    <form action="{{ route('superadmin.transaction.update', $transaction) }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company</label>
                                        <select class="form-control custom-select bg-success text-white" id="company" name="company">
                                            <option>--Select your Company--</option>
                                            @foreach($companies as $company)
                                            <option @if($company->id == $transaction->company_id) selected @endif value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('company')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Created by</label>
                                        <select class="form-control custom-select bg-success text-white" id="creator" name="creator">
                                            <option>--Select creator--</option>
                                            @foreach($admins as $admin)
                                                <option @if($admin->id == $transaction->creator_id) selected @endif value="{{ $admin->id }}">{{ $admin->name }} / {{ $admin->company->name ?? 'no Company' }}</option>
                                            @endforeach
                                        </select>
                                        @error('creator')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Update by</label>
                                        <select class="form-control custom-select bg-success text-white" id="updater" name="updater">
                                            <option>--Select updater--</option>
                                            @foreach($superadmins as $superadmin)
                                                <option @if($superadmin->id == $transaction->updater_id) selected @endif value="{{ $superadmin->id }}">{{ $superadmin->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('updater')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Type</label>
                                        <select class="form-control custom-select bg-success text-white" id="type" name="type">
                                            <option>--Select type--</option>
                                            <option @if($transaction->type == 'Debit') selected @endif value="{{ 'Debit' }}">{{ 'Debit' }}</option>
                                            <option @if($transaction->type == 'Credit') selected @endif value="{{ 'Credit' }}">{{ 'Credit' }}</option>
                                        </select>
                                        @error('type')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Amount</label>
                                        <input type="text" id="amount" name="amount"
                                               class="form-control bg-success text-white" placeholder="amount"
                                               value="{{ $transaction->amount }}">
                                        @error('amount')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Payment method</label>
                                        <input type="text" id="payment_method" name="payment_method"
                                               class="form-control bg-success text-white" placeholder="payment method"
                                               value="{{ $transaction->method }}">
                                        @error('payment_method')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Purpose</label>
                                        <input type="text" id="purpose" name="purpose"
                                               class="form-control bg-success text-white" placeholder="purpose"
                                               value="{{ $transaction->purpose }}">
                                        @error('purpose')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Transaction number</label>
                                        <input type="text" id="transaction" name="transaction"
                                               class="form-control bg-success text-white" placeholder="transaction"
                                               value="{{ $transaction->transaction }}">
                                        @error('transaction')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Status</label>
                                        <select class="form-control custom-select bg-success text-white" id="status" name="status">
                                            <option>--Select status--</option>
                                            <option @if($transaction->status == 'Approved') selected @endif value="{{ 'Approved' }}">{{ 'Approved' }}</option>
                                            <option @if($transaction->status == 'Pending') selected @endif value="{{ 'Pending' }}">{{ 'Pending' }}</option>
                                            <option @if($transaction->status == 'Rejected') selected @endif value="{{ 'Rejected' }}">{{ 'Rejected' }}</option>
                                        </select>
                                        @error('status')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Receipt, Screenshot</label>
                                        <input type="file" accept="image/*" id="receipt" name="receipt"
                                               class="form-control bg-success text-white" value="{{ $transaction->receipt }}">
                                        @error('receipt')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <img src="{{ asset($transaction->receipt ?? get_static_option('no_image')) }}" alt="" class="col-md-6 text-center">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Description</label>
                                        <textarea id="description" class="form-control" name="description" cols="30" rows="10">{!! $transaction->description !!}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-primary col-6"><i class="fa fa-check"></i>
                                Update Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
@push('summer-note')
    <script>
        $('#description').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush

