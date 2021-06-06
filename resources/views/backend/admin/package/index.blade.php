@push('title')
    Package
@endpush
@extends('layouts.backend.app')
@push('style')
    <link href="{{ asset('assets/backend/dist/css/pages/pricing-page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">
@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Packages</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Packages</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row pricing-plan">
                            @foreach($packages as $package)
                            <div class="col-md-3 col-xs-12 col-sm-6 no-padding">
                                <div class="pricing-box m-2 bg-secondary">
                                    <div class="pricing-body b-l">
                                        <div class="pricing-header">
                                            <h4 class="price-lable text-white bg-warning"> Rating {{ $package->purchases->count() }}</h4>
                                            <h4 class="text-center">{{ $package->name }}</h4>
                                            <h2 class="text-center"><span class="price-sign">৳</span>{{ $package->price }}</h2>
                                            <hr class="bg-danger">
                                        </div>
                                        <div class="price-table-content">
                                            <div class="price-row bg-info rounded">
                                               <h3 class="text-white font-weight-bold"> Per {{ $package->duration }} day</h3>
                                            </div>
                                            <div class="price-row"> Branch {{ $package->branch }}</div>
                                            <div class="price-row"> Admin {{ $package->admin }}</div>
                                            <div class="price-row"> Manager {{ $package->manager }}</div>
                                            <div class="price-row"> Customer {{ $package->customer }}</div>
                                            <div class="price-row"> Invoice {{ $package->invoice }}</div>
                                            <div class="price-row"> Per SMS price {{ $package->price_per_message }}</div>
                                            <div class="price-row bg-cyan rounded text-white font-weight-bold">
                                                Free sms <i class="h2">{{ $package->free_sms }}</i>
                                            </div>
                                            <div class="price-row">
                                                <input type="hidden" class="package" value="{{ $package->id }}">
                                                <button class="btn btn-danger waves-effect waves-light m-t-20 buy-btn">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $('.buy-btn').click(function(){
                var this_btn = $(this);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Previous package will be damage after getting new package!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'POST',
                            url: "{{ route('admin.package.buy') }}",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                              'package' :  this_btn.parent().find('.package').val()
                            },
                            success: function (response) {
                                if (response.type == 'success'){
                                    Swal.fire(
                                        'ধন্যবাদ !',
                                        response.message,
                                        response.type
                                    )
                                    location.replace(response.url);
                                }else{
                                    Swal.fire(
                                        'দুঃখিত !',
                                        response.message,
                                        response.type
                                    )
                                }
                            },
                            error: function (xhr) {
                                var errorMessage = '<div class="card bg-danger">\n' +
                                    '                        <div class="card-body text-center p-5">\n' +
                                    '                            <span class="text-white">';
                                $.each(xhr.responseJSON.errors, function(key,value) {
                                    errorMessage +=(''+value+'<br>');
                                });
                                errorMessage +='</span>\n' +
                                    '                        </div>\n' +
                                    '                    </div>';
                                Swal.fire({
                                    icon: 'error',
                                    title: 'দুঃখিত...',
                                    footer: errorMessage
                                })
                            },
                        })
                    }
                })
            });
        });
    </script>
@endpush
