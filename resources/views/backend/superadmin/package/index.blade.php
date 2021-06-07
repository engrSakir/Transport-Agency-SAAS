@push('title')
    Package
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Package</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Package</li>
                </ol>
                <a href="{{ route('superadmin.package.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create Package</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header bg-danger">
                        <h5 class="card-title text-white">Package </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive color-bordered-table success-bordered-table">
                            <table id="datatable" class="display table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Branch</th>
                                        <th>Admin</th>
                                        <th>Manager</th>
                                        <th>Duration</th>
                                        <th>SMS Price</th>
                                        <th>Free Sms</th>
                                        <th>Purchase</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($packages as $package)
                                      <tr>
                                          <td>{{ $package->name }}</td>
                                          <td>{{ $package->price }}</td>
                                          <td>{{ $package->branch }}</td>
                                          <td>{{ $package->admin }}</td>
                                          <td>{{ $package->manager }}</td>
                                          <td>{{ $package->duration }}</td>
                                          <td>{{ $package->price_per_message }}</td>
                                          <td>{{ $package->free_sms }}</td>
                                          <td>{{ $package->purchases->count() }}</td>
                                          <td>{{ $package->is_active }}</td>
                                          <td>
                                              <a href="{{ route('superadmin.package.edit', $package) }}" class="btn btn-info m-1"><i class="fa fa-edit"></i> </a>
                                              <button class="btn btn-danger m-1" onclick="delete_function(this)" value="{{ route('superadmin.package.destroy', $package) }}"><i class="fa fa-trash"></i> </button>
                                          </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Branch</th>
                                        <th>Admin</th>
                                        <th>Manager</th>
                                        <th>Duration</th>
                                        <th>SMS Price</th>
                                        <th>Free Sms</th>
                                        <th>Purchase</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush
