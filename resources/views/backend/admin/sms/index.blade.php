@push('title')
    Message
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor font-weight-bold">Message</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Message</li>
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
                    <h4 class="m-b-0 text-white">Messages panel</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sms.send') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <input type="number" id="number" name="number" class="form-control bg-success text-white col-md-6" placeholder="01304734623" title="Type your phone number (01304734623)" required value="{{ old('number') }}">
                                        @error('number')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <textarea name="message" id="message" cols="30" rows="10" class="form-control bg-success text-white col-md-6" title="Type your message" required>{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-primary col-6"> <i class="fa fa-check"></i> Submit/সাবমিট করুন</button>
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
                                <th>Number</th>
                                <th>Message</th>
                                <th>Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sms_histories as $message)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $message->created_at->format('h:i A d/m/Y') }}</td>
                                    <td>{{ $message->number }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>#Char:{{ $message->text_count }} #Mess:{{ $message->message_count }} #Cost:{{ $message->message_cost }}</td>
                                </tr>
                            @endforeach
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Number</th>
                                <th>Message</th>
                                <th>Note</th>
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
