@push('title')
    Dashboard
@endpush
@extends('layouts.backend.app')
@push('style')

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
                <h4 class="card-title">Default Forms</h4>
                <h5 class="card-subtitle"> All bootstrap element classies </h5>
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
                        <textarea class="form-control" rows="5"></textarea>
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
        $( function() {
            $( "#sender-name" ).autocomplete({
                source: function(request, response) {
                    console.log(request.term);
                    var formData = new FormData();
                    formData.append('sender_name', request.term)
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('manager.invoice.create') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: formData,
                        processData: false,
                        contentType: false,
                        success:function(data){
                            console.log(data)
                            var array = $.map(data,function(obj){
                                return{
                                    value: obj.name, //Filable in input field
                                    label: obj.name,  //Show as label of input field
                                }
                            })
                            response($.ui.autocomplete.filter(array, request.term));
                        },
                    })
                },
                minLength: 1,
            });
        } );
    </script>
@endpush
