@push('title')
    Expense Category
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor font-weight-bold">Expense Category</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Expense Category</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header bg-success">
                    <h4 class="m-b-0 text-white">Add new category</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('manager.storeExpenseCategory') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="input-group mb-3">
                                            <input type="text" name="category_name" placeholder="নতুন করে একটি ক্যাটাগরি নাম লিখুন" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                            <div class="input-group-append">
                                                <button class="btn btn-info" type="submit">SAVE</button>
                                            </div>
                                    </div>
                                    @error('category_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table color-bordered-table primary-bordered-table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>শাখা সমূহ</th>
                                    <th>মোট নগদ</th>
                                    <th>মোট বাকী</th>
                                    <th>মোট টাকা</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($expense_categories as $expense_category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $expense_category->name }}</td>
                                        <td>{{ $expense_category->expenses->sum('immediate') }}</td>
                                        <td>{{ $expense_category->expenses->sum('due') }}</td>
                                        <td>{{ $expense_category->expenses->sum('taka') }}</td>
                                        <td>#</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>শাখা সমূহ</th>
                                    <th>মোট নগদ</th>
                                    <th>মোট বাকী</th>
                                    <th>মোট টাকা</th>
                                    <th>#</th>
                                </tr>
                                </tfoot>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
