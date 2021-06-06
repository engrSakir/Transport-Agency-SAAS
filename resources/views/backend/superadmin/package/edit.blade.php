@push('title')
    Package edit
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Package edit</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Package edit</li>
                </ol>
                <a href="{{ route('superadmin.package.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Back to list</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Row -->
        <div class="row">
            <div class="card m-b-30 col-12 ">
                <div class="card-header bg-danger">
                    <h5 class="card-title text-white">Package edit</h5>
                </div>
                <div class="card-body">
                    <form class="row justify-content-center" method="POST" action="{{ route('superadmin.package.update', $package) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="col-lg-10">
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input value="{{ $package->name }}" name="name" type="text" class="form-control"
                                           id="name" placeholder="Package name">
                                    @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="branch" class="col-sm-4 col-form-label">Branch</label>
                                <div class="col-sm-8">
                                    <input value="{{ $package->branch }}" name="branch" type="number" class="form-control"
                                           id="branch" placeholder="branch">
                                    @error('branch')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="admin" class="col-sm-4 col-form-label">Admin</label>
                                <div class="col-sm-8">
                                    <input value="{{ $package->admin }}" name="admin" type="number" class="form-control"
                                           id="admin" placeholder="admin">
                                    @error('admin')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="manager" class="col-sm-4 col-form-label">Manager</label>
                                <div class="col-sm-8">
                                    <input value="{{ $package->manager }}" name="manager" type="number" class="form-control"
                                           id="manager" placeholder="manager">
                                    @error('manager')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="free_sms" class="col-sm-4 col-form-label">Free SMS</label>
                                <div class="col-sm-8">
                                    <input value="{{ $package->free_sms }}" name="free_sms" type="number" class="form-control"
                                           id="free_sms" placeholder="free_sms">
                                    @error('free_sms')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price_per_message" class="col-sm-4 col-form-label">Price per SMS</label>
                                <div class="col-sm-8">
                                    <input value="{{ $package->price_per_message }}" name="price_per_message" type="number" class="form-control"
                                           id="price_per_message" placeholder="price_per_message">
                                    @error('price_per_message')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration" class="col-sm-4 col-form-label">Duration (in Day)</label>
                                <div class="col-sm-8">
                                    <input value="{{ $package->duration }}" name="duration" type="number" class="form-control"
                                           id="duration" placeholder="Duration">
                                    @error('duration')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-sm-4 col-form-label">Price</label>
                                <div class="col-sm-8">
                                    <input value="{{ $package->price }}" name="price" type="number" class="form-control"
                                           id="price" placeholder="Price">
                                    @error('price')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <select name="status" id="status" class="select2-single form-control">
                                        <option @if ($package->is_active == true) selected @endif value="1">Active </option>
                                        <option @if ($package->is_active == false) selected @endif value="0">Inactive </option>
                                    </select>
                                    @error('status')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button id="submit-btn" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush
@push('summer-note')

@endpush
