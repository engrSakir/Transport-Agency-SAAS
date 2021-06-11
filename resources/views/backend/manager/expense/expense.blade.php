@push('title')
    Expense
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor font-weight-bold">Expense</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Expense</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h3 class="card-title text-center">{{ company()->name }}</h3>
                <h5 class="card-subtitle text-center"> <b>দৈনিক অফিসে রিপোর্ট ({{ date('d-m-Y') }})</b> </h5>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form method="post" action="{{ route('manager.storeExpense') }}">
                            @csrf
                            <div class="table-responsive">
                                <table class="table color-bordered-table primary-bordered-table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>শাখা সমূহ</th>
                                        <th>খরচের বিবরণ</th>
                                        <th>টাকা</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($expense_categories as $expense_category)

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $expense_category->name }}</td>
                                            <td><input type="text" name="{{ 'description_for_'.Str::slug($expense_category->name, '_') }}" class="form-control is-valid" id="" placeholder="খরচের বিবরণ"></td>
                                            <td><input type="number" name="{{ 'taka_for_'.Str::slug($expense_category->name, '_') }}" class="form-control is-valid" id="" placeholder="টাকা"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>শাখা সমূহ</th>
                                        <th>খরচের বিবরণ</th>
                                        <th>টাকা</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-success m-2 col-12">সেভ</button>
                        </form>
                    </div>
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
                                <th>তারিখ</th>
                                <th>মোট নগদ</th>
                                <th>মোট বাকী</th>
                                <th>মোট টাকা</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($expense_dates as $expense_date => $expenses)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $expense_date }}</td>
                                    <td>{{ $expenses->sum('immediate') }}</td>
                                    <td>{{ $expenses->sum('due') }}</td>
                                    <td>{{ $expenses->sum('taka') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success btn-rounded show-expense" value="{{ route('manager.showExpense', $expense_date) }}">
                                            <i class="mdi mdi-printer"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>তারিখ</th>
                                <th>মোট নগদ</th>
                                <th>মোট বাকী</th>
                                <th>মোট টাকা</th>
                                <th>#</th>
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
    <script>
        $(document).ready(function(){
            $(".show-expense").click( function (){
                var html_embed_code = `<embed type="text/html" src="`+$(this).val()+`" width="750" height="500">`;
                $('#extra-large-modal-body').html(html_embed_code);
                $('#extra-large-modal-body').addClass( "text-center" );
                $('#extra-large-modal-title').text( "দৈনিক অফিসে রিপোর্ট" );
                $('#extra-large-modal').modal('show');
            });
        });
    </script>
@endpush
