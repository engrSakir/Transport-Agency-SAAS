@push('title')
    Chalan
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor font-weight-bold">Chalan</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Chalan</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Chalan List</h4>
{{--                    <h6 class="card-subtitle">Add class <code>.color-bordered-table .primary-bordered-table</code></h6>--}}
                    <div class="row button-group">
                        <div class="col-lg-2 col-md-4">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-info select-all">Select all</button>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-success un-select-all">Un select all</button>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-danger delete-selected-all">Delete selected</button>
                        </div>
                    </div>
                    <div class="invoice-table table-responsive">
                        <table class="table color-bordered-table primary-bordered-table text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Driver</th>
                                <th class="text-center">Office</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chalans as $chalan)
                            <tr>
                                <td>
                                    <label class="btn btn-info active">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" value="{{ $chalan->id }}" name="chalan" class="custom-control-input" id="chalan-{{ $loop->iteration }}">
                                            <label class="custom-control-label font-weight-bold" for="chalan-{{ $loop->iteration }}">#{{ $chalan->custom_counter }}</label>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <b style="font-size: 18px;">{{ $chalan->created_at->format('d/m/Y') ?? '' }}</b><br>

                                    <span class="badge badge-success">
                                        মোট ভাউচার:  {{ $chalan->invoices->count() ?? '' }}
                                    </span>
                                </td>
                                <td style="font-size: 16px;">
                                    {{ $chalan->driver_name ?? '' }}<br>
                                    <b>{{ $chalan->driver_phone ?? '' }}<br>
                                    <span class="text-danger">গাড়ি নং: {{ $chalan->car_number }}</span><br></b>
                                </td>
                                <td style="font-size: 16px;" class="text-center">
                                    {{ $chalan->fromBranch->name ?? '' }} <br> থেকে <br>
                                    {{ $chalan->toBranch->name ?? '' }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-circle btn-lg show-chalan" value="{{ route('admin.chalan.show', $chalan) }}"><i class="mdi mdi-cloud-print"></i> </button>
                                    <button type="button" class="btn btn-warning btn-circle btn-lg"><i class="mdi mdi-tooltip-edit"></i> </button>
                                    <button type="button" class="btn btn-danger btn-circle btn-lg" onclick="delete_function(this)" value="{{ route('admin.chalan.destroy', $chalan) }}"><i class="mdi mdi-delete-circle"></i> </button>
                                </td>
                            </tr>
                            @endforeach
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Driver</th>
                                <th class="text-center">Office</th>
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
    <script>
        $(document).ready(function(){
            // Get current page and set current in nav
            $(".show-chalan").click( function (){
                var html_embed_code = `<embed type="text/html" src="`+$(this).val()+`" width="750" height="500">`;
                $('#extra-large-modal-body').html(html_embed_code);
                $('#extra-large-modal-body').addClass( "text-center" );
                $('#extra-large-modal-title').text( "CHALAN" );
                $('#extra-large-modal').modal('show');
            });

            $(".delete-selected-all").click( function (){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#74051e',
                    cancelButtonColor: '#aad9e2',
                    confirmButtonText: 'Yes, delete!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if($('.invoice-table input:checkbox[name=chalan]:checked').length < 1){
                            alert('Please chose chalan');
                        }else{
                            var chalans = []
                            $('.invoice-table input:checkbox[name=chalan]:checked').each(function()
                            {
                                chalans.push($(this).val())
                            });

                            var this_btn = $(this);
                            var formData = new FormData();
                            formData.append('chalans', chalans);
                            $.ajax({
                                method: 'POST',
                                url: '{{ route('manager.chalan.makeAsDeleted') }}',
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data: formData,
                                processData: false,
                                contentType: false,
                                beforeSend: function (){
                                    //this_btn.html('Please wait ---- ');
                                    this_btn.prop("disabled",true);
                                },
                                complete: function (){
                                    //this_btn.html('Edit now');
                                    this_btn.prop("disabled",false);
                                },
                                success: function (data) {
                                    if (data.type == 'success'){
                                        Swal.fire({
                                            icon: data.type,
                                            title: 'DELETED',
                                            text: data.message,
                                        });
                                        location.reload();
                                    }else{
                                        Swal.fire({
                                            icon: data.type,
                                            title: 'Oops...',
                                            text: data.message,
                                            footer: 'Something went wrong!'
                                        });
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
                                        title: 'Oops...',
                                        footer: errorMessage
                                    });
                                },
                            });
                        }
                    }
                })

            });
        });
    </script>
@endpush
