@push('title')
    Dashboard
@endpush
@extends('layouts.backend.app')
@push('style')
    <style>
        .ui-autocomplete {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            list-style: none;
            font-size: 14px;
            text-align: left;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            background-clip: padding-box;
            height: 500px;
            overflow: auto;
        }

        .ui-autocomplete > li > div {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: normal;
            line-height: 1.42857143;
            color: #333333;
            white-space: nowrap;
        }

        .ui-state-hover,
        .ui-state-active,
        .ui-state-focus {
            text-decoration: none;
            color: #262626;
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .ui-helper-hidden-accessible {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }
    </style>
@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Invoice</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('manager.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
                <a href="{{ route('manager.invoice.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Invoice List</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-body">
                <h4 class="card-title">Hello {{ auth()->user()->name }} !</h4>
                <form class="form-horizontal mt-4" id="invoice-form">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="sender-name">Sender Name</label>
                            <input type="hidden" value="sender-name">
                            <input type="text" class="form-control search-item" id="sender-name" name="sender-name" placeholder="Sender name" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="receiver-name">Receiver Name</label>
                            <input type="hidden" value="receiver-name">
                            <input type="text" class="form-control search-item" id="receiver-name" name="receiver-name" placeholder="Receiver name" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="receiver-phone">Receiver Phone</label>
                            <input type="hidden" value="receiver-phone">
                            <input type="text" class="form-control search-item" id="receiver-phone" name="receiver-phone" placeholder="Receiver phone" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="receiver-email">Receiver Email</label>
                            <input type="hidden" value="receiver-email">
                            <input type="email" class="form-control search-item" id="receiver-email" name="receiver-email" placeholder="Receiver Email" value="">
                        </div>
                    </div>
                    <div class="form-group button-group">
                        @foreach($linked_branches as $linked_branch)
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="branch-{{ $loop->iteration }}" name="branch" value="{{ $linked_branch->toBranch->id }}" class="custom-control-input">
                                    <label class="custom-control-label" for="branch-{{ $loop->iteration }}"> <i class="ti-check text-active" aria-hidden="true"></i> {{ $linked_branch->toBranch->name }} </label>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="input-quantity">Quantity</span>
                                </div>
                                <input type="number" class="form-control" onClick="this.select();" min="0" id="quantity" v-model="quantity">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="input-price">Price</span>
                                </div>
                                <input type="number" class="form-control" onClick="this.select();" min="0" id="price" v-model="price">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="input-advance">Advance</span>
                                </div>
                                <input type="number" class="form-control" onClick="this.select();" min="0" id="advance" v-model="advance">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="input-home">Home</span>
                                </div>
                                <input type="number" class="form-control" onClick="this.select();" min="0" id="home" v-model="home">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="input-labour">Labour</span>
                                </div>
                                <input type="number" class="form-control" onClick="this.select();" min="0" id="labour" v-model="labour">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="input-due">Due</span>
                                </div>
                                <input type="number" class="form-control bg-danger" id="due" v-bind:value="due" disabled readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="input-total" >Total</span>
                                </div>
                                <input type="number" class="form-control bg-success" min="0" id="total" v-bind:value="total" disabled readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Signature</span>
                                </div>
                                <input type="text" class="form-control bg-secondary" value="{{ auth()->user()->name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" id="save-invoice" class="btn waves-effect waves-light btn-lg btn-primary"> SAVE INVOICE </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script type="text/javascript">
        let invoice = new Vue({
            el: "#invoice-form",
            data: {
                quantity: 0,
                price: 0,
                advance: 0,
                home: 0,
                labour: 0,
                due: 0,
                total: 0,
            },
            watch: {
                quantity(){
                    if (parseFloat(this.quantity) < 0 || this.quantity.length < 1){
                        this.quantity = 0;
                    }
                },
                advance(){
                    if (parseFloat(this.advance) < 0 || this.advance.length < 1){
                        this.advance = 0;
                    }
                    this.total_due_calculate();
                },
                price(){
                    if (parseFloat(this.price) < 0 || this.price.length < 1){
                        this.price = 0;
                    }
                    this.total_calculate();
                    this.total_due_calculate();
                },
                home(){
                    if (parseFloat(this.home) < 0 || this.home.length < 1){
                        this.home = 0;
                    }
                    this.total_calculate();
                    this.total_due_calculate();
                },
                labour(){
                    if (parseFloat(this.labour) < 0 || this.labour.length < 1){
                        this.labour = 0;
                    }
                    this.total_calculate();
                    this.total_due_calculate();
                }
            },
            methods: {
                total_calculate(){
                    this.total = parseFloat(this.price) + parseFloat(this.home) + parseFloat(this.labour);
                },
                total_due_calculate(){
                    this.due = parseFloat(this.total) - parseFloat(this.advance);
                }
            }
        });
    </script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#sender-name" ).autocomplete({
                source: function(request, response) {
                    // console.log(request.term);
                    var formData = new FormData();
                    formData.append('name', request.term)
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('manager.senderName') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: formData,
                        processData: false,
                        contentType: false,
                        success:function(data){
                            // console.log(data)
                            var array = $.map(data,function(obj){
                                return{
                                    value: obj.name, //Filable in input field
                                    label: obj.name  //Show as label of input field
                                }
                            })
                            response($.ui.autocomplete.filter(array, request.term));
                        },
                    })
                },
                minLength: 1,
            });

            $( "#receiver-name" ).autocomplete({
                source: function(request, response) {
                    // console.log(request.term);
                    var formData = new FormData();
                    formData.append('name', request.term)
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('manager.receiverName') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: formData,
                        processData: false,
                        contentType: false,
                        success:function(data){
                            // console.log(data)
                            var array = $.map(data,function(obj){
                                return{
                                    value: obj.name, //Filable in input field
                                    label: obj.name + '<br>' + obj.phone + '<br>' + obj.email,  //Show as label of input field
                                    phone: obj.phone,
                                    email: obj.email
                                }
                            })
                            response($.ui.autocomplete.filter(array, request.term));
                        },
                    })
                },
                minLength: 1,
                select:function(event, ui){
                    //console.log(ui.item);
                    $('#receiver-phone').val(ui.item.phone);
                    $('#receiver-email').val(ui.item.email);
                }
            });
            $( "#receiver-phone" ).autocomplete({
                source: function(request, response) {
                    // console.log(request.term);
                    var formData = new FormData();
                    formData.append('phone', request.term)
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('manager.receiverPhone') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: formData,
                        processData: false,
                        contentType: false,
                        success:function(data){
                            console.log(data)
                            var array = $.map(data,function(obj){
                                return{
                                    value: obj.phone, //Filable in input field
                                    label: obj.name + '-' + obj.phone + '-' + obj.email,  //Show as label of input field
                                    name: obj.name,
                                    email: obj.email
                                }
                            })
                            response($.ui.autocomplete.filter(array, request.term));
                        },
                    })
                },
                minLength: 1,
                select:function(event, ui){
                    //console.log(ui.item);
                    $('#receiver-name').val(ui.item.name);
                    $('#receiver-email').val(ui.item.email);
                }
            });
            $( "#receiver-email" ).autocomplete({
                source: function(request, response) {
                    // console.log(request.term);
                    var formData = new FormData();
                    formData.append('email', request.term)
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('manager.receiverEmail') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: formData,
                        processData: false,
                        contentType: false,
                        success:function(data){
                            // console.log(data)
                            var array = $.map(data,function(obj){
                                return{
                                    value: obj.email, //Filable in input field
                                    label: obj.name + '-' + obj.phone + '-' + obj.email,  //Show as label of input field
                                    phone: obj.phone,
                                    name: obj.name
                                }
                            })
                            response($.ui.autocomplete.filter(array, request.term));
                        },
                    })
                },
                minLength: 1,
                select:function(event, ui){
                    //console.log(ui.item);
                    $('#receiver-phone').val(ui.item.phone);
                    $('#receiver-name').val(ui.item.name);
                }
            });

            $('#save-invoice').click( function (){
                var formData = new FormData();
                var this_btn = $(this);
                formData.append('sender_name', $('#sender-name').val());
                formData.append('receiver_name', $('#receiver-name').val());
                formData.append('receiver_phone', $('#receiver-phone').val());
                formData.append('receiver_email', $('#receiver-email').val());
                formData.append('branch', $('input:radio[name=branch]:checked').val());
                formData.append('description', $('#description').val());
                formData.append('quantity', $('#quantity').val());
                formData.append('price', $('#price').val());
                formData.append('advance', $('#advance').val());
                formData.append('home', $('#home').val());
                formData.append('labour', $('#labour').val());
                $.ajax({
                    method: 'POST',
                    url: '{{ route('manager.invoice.store') }}',
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
                            $('#invoice-form').trigger("reset");
                            var html_embed_code = `<embed type="text/html" src="`+data.url+`" width="750" height="500">`;
                            $('#extra-large-modal-body').html(html_embed_code);
                            $('#extra-large-modal-body').addClass( "text-center" );
                            $('#extra-large-modal-title').text( "INVOICE" );
                            $('#extra-large-modal').modal('show');
                            Swal.fire({
                                icon: data.type,
                                title: 'INVOICE',
                                text: data.message,
                            });
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
            });

        });
    </script>
@endpush
