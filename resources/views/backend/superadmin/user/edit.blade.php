@push('title')
    User edit
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">User edit</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">User edit</li>
                </ol>
                <a href="{{ route('superadmin.user.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Back to list</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"><img src="{{ asset( $user->image ?? get_static_option('no_image') ) }}"
                                                    class="img-circle" width="150">
                            <h4 class="card-title m-t-10">{{  $user->name }}</h4>
                            <h6 class="card-subtitle">{{  $user->email }}</h6>
                            @if($user->type == "Super Admin")
                                <h4 class="card-title m-t-10">Role: Super Admin</h4>
                            @endif

                            @if($user->type == "Admin")
                                <h4 class="card-title m-t-10">Role: Admin</h4>
                                <h4 class="card-title m-t-10">Company: {{ $user->company->name ?? 'No Name' }}</h4>
                            @endif

                            @if($user->type == "Manager")
                                <h4 class="card-title m-t-10">Role: Manager</h4>
                                <h4 class="card-title m-t-10">Company: {{ $user->branch->company->name ?? 'No Name' }}</h4>
                                <h4 class="card-title m-t-10">Branch: {{ $user->branch->name ?? 'No Name' }}</h4>
                            @endif

                            @if($user->type == "Customer")
                                <h4 class="card-title m-t-10">Role: Customer</h4>
                            @endif

                        </center>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!--second tab-->
                        <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-body">
                                <form class="form-horizontal form-material"
                                      action="{{ route('superadmin.user.update', $user) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="type">Name</label>
                                            <select name="type" id="type" class="form-control bg-warning">
                                                <option value="Super Admin" @if($user->type == "Super Admin") selected @endif>Super Admin</option>
                                                <option value="Admin" @if($user->type == "Admin") selected @endif>Admin</option>
                                                <option value="Manager" @if($user->type == "Manager") selected @endif>Manager</option>
                                                <option value="Customer" @if($user->type == "Customer") selected @endif>Customer</option>
                                            </select>
                                            @error('type')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="is_active">Is Activated</label>
                                            <select name="is_active" id="is_active" class="form-control bg-warning">
                                                <option value="1" @if($user->is_active == "1") selected @endif>Active</option>
                                                <option value="0" @if($user->is_active == "0") selected @endif>Inactive</option>
                                            </select>
                                            @error('type')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{ $user->name }}"
                                                   class="form-control" id="name" placeholder="Name">
                                            @error('name')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" value="{{ $user->email }}" name="email"
                                                   class="form-control" id="email" placeholder="Email">
                                            @error('email')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone</label>
                                            <input type="text" value="{{ $user->phone ?? '' }}" name="phone"
                                                   class="form-control" id="phone" placeholder="Phone">
                                            @error('phone')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="username">User Name</label>
                                            <input type="text" value="{{ $user->username ?? '' }}" name="username"
                                                   class="form-control" id="username" placeholder="username">
                                            @error('username')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="password" class="text-danger">Password</label>
                                            <input type="text" value="" name="password" class="form-control bg-info"
                                                   id="password">
                                            @error('password')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="email_verified_at">Email verified at</label>
                                            <input type="text" value="{{ $user->email_verified_at }}"
                                                   name="email_verified_at" class="form-control bg-info" id="email_verified_at"
                                                   placeholder="email_verified_at" disabled>
                                            @error('email_verified_at')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <hr class="bg-danger">
                                        <div class="form-group col-md-6">
                                            <label for="creator">Creator</label>
                                            <input type="text" value="{{ $user->creator->name ?? '' }}"
                                                   name="creator" class="form-control bg-success" id="creator" disabled
                                                   placeholder="creator">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Avatar</label>
                                            <input type="file" accept="image/*" name="image" class="form-control"
                                                   id="image">
                                            @error('image')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush
@push('summer-note')

@endpush
