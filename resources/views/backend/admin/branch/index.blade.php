@push('title')
    Branch
@endpush
@extends('layouts.backend.app')
@push('style')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                <div class="card border-info">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white"> <b>{{ $branch->name }}</b> </h4></div>
                    <div class="card-body">
                        <h3 class="card-title">Special title treatment</h3>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="javascript:void(0)" class="btn btn-inverse">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-6">
                <div class="card border-success">
                    <div class="card-header bg-success">
                        <h4 class="m-b-0 text-white">Card Title</h4></div>
                    <div class="card-body">
                        <h3 class="card-title">Special title treatment</h3>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="javascript:void(0)" class="btn btn-inverse">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{!! route('superadmin.branch.index') !!}',
            columns: [
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'type',
                    name: 'type'
                },{
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function() {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        });
    });
</script>
@endpush
