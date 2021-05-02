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
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Branch edit</li>
                </ol>
                <a href="{{ route('superadmin.branch.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Back to list</a>
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
                        <center class="m-t-30"> <img src="{{ asset( $branch->moreInfo->avatar ?? get_static_option('no_image') ) }}" class="img-circle" width="150">
                            <h4 class="card-title m-t-10">{{  $branch->name }}</h4>
                            <h6 class="card-subtitle">{{  $branch->email }}</h6>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body">
                        <small class="text-muted p-t-30 db">Phone</small>
                        <h6>{{  $branch->moreInfo->phone ?? '' }}</h6>
                        <small class="text-muted p-t-30 db">Address</small>
                        <h6>{{  $branch->moreInfo->address ?? '' }}</h6>
                        <div class="map-box">
                            <iframe src="{{  $branch->moreInfo->map ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508' }}" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                        </div> <small class="text-muted p-t-30 db">Social Profile</small>
                        <br>
                        <a href="{{ $branch->moreInfo->facebook ?? '#' }}" target="_blank" class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $branch->moreInfo->twitter ?? '#' }}" target="_blank" class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $branch->moreInfo->youtube ?? '#' }}" target="_blank" class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!--second tab-->
                        <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="{{ route('superadmin.branch.update', $branch) }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{ $branch->name }}" class="form-control" id="name" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" value="{{ $branch->email }}" name="email" class="form-control" id="email" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input type="password" value="" name="password" class="form-control" id="password">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone</label>
                                            <input type="text" value="{{ $branch->moreInfo->phone ?? '' }}" name="phone" class="form-control" id="phone" placeholder="Phone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="address">Address</label>
                                            <input type="text" value="{{ $branch->moreInfo->address ?? '' }}" name="address" class="form-control" id="address" placeholder="Address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" value="{{ $branch->moreInfo->facebook ?? '' }}" name="facebook" class="form-control" id="facebook" placeholder="Facebook">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="twitter">Twitter</label>
                                            <input type="text" value="{{ $branch->moreInfo->twitter ?? '' }}" name="twitter" class="form-control" id="twitter" placeholder="Twitter">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="youtube">Youtube</label>
                                            <input type="text" value="{{ $branch->moreInfo->youtube ?? '' }}" name="youtube" class="form-control" id="youtube" placeholder="Youtube">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="map">Map</label>
                                            <input type="text" value="{{ $branch->moreInfo->map ?? '' }}" name="map" class="form-control" id="map" placeholder="Map">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="avatar">Avatar</label>
                                            <input type="file"  accept="image/*"  name="avatar" class="form-control" id="avatar">
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
