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
                    <form action="{{ route('superadmin.transaction.store') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Payment amount/পেমেন্ট করা টাকার পরিমাণ <b
                                                class="text-danger">*</b> </label>
                                        <input type="number" id="amount" name="amount"
                                               class="form-control bg-success text-white" placeholder="5500" required
                                               value="{{ old('amount') }}">
                                        @error('amount')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Payment method/ব্যাংক, বিকাশ, রকেট, নগদ <b
                                                class="text-danger">*</b></label>
                                        <input type="text" id="payment_method" name="payment_method"
                                               class="form-control bg-success text-white" placeholder="নগদ" required
                                               value="{{ old('payment_method') }}">
                                        @error('payment_method')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Receipt, Screenshot/ব্যাংকের রিসিট অথবা মোবাইল
                                            পেমেন্ট স্ক্রিনশট</label>
                                        <input type="file" accept="image/*" id="receipt" name="receipt"
                                               class="form-control bg-success text-white" value="{{ old('receipt') }}">
                                        @error('receipt')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Transaction ID/ট্রানজেকশন নম্বর</label>
                                        <input type="text" id="transaction" name="transaction"
                                               class="form-control bg-success text-white" placeholder="xxxxxxxx"
                                               value="{{ old('transaction') }}">
                                        @error('transaction')
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
                                Submit/সাবমিট করুন
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-table table-responsive">
                        <table class="table color-bordered-table primary-bordered-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->created_at->format('h:i A d/m/Y') }}</td>
                                    <td>BDT {{ $transaction->amount }}</td>
                                    <td>{{ $transaction->method }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    <td>
                                        <a type="button" class="btn btn-info btn-circle show-inv"
                                                href="{{ route('superadmin.transaction.show', $transaction) }}"><i
                                                class="mdi mdi-eye"></i></a>
                                        <a type="button" class="btn btn-warning btn-circle edit-inv"
                                                href="{{ route('superadmin.transaction.edit', $transaction) }}"><i
                                                class="mdi mdi-tooltip-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-circle"
                                                onclick="delete_function(this)"
                                                value="{{ route('superadmin.transaction.destroy', $transaction) }}"><i
                                                class="mdi mdi-delete-circle"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
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
