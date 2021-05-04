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
                            <label>Default Text <span class="help"> e.g. "George deo"</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                            <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Default Text <span class="help"> e.g. "George deo"</span></label>
                            <input type="text" class="form-control" value="George deo...">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                            <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group button-group">
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Male fdgh fdgh fgdh fgd h</label>
                                </div>
                            </label>
                        </div>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Male fgdh dfgh fgd </label>
                                </div>
                            </label>
                        </div>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Male fdgh fgdh fgdh fgdh fgh </label>
                                </div>
                            </label>
                        </div>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Male fdgh fgdh </label>
                                </div>
                            </label>
                        </div>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Male fdtgh fgd hfg</label>
                                </div>
                            </label>
                        </div>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Male fgh fdgh fgh </label>
                                </div>
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Malefg dh fgdh </label>
                                </div>
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Malefdgh fgdh fgh </label>
                                </div>
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Malefgdh fgdh fgdh </label>
                                </div>
                            </label>
                        </div>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Malefgdh fgh fgh</label>
                                </div>
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Malefgdh fgdh fhtgd </label>
                                </div>
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-outline btn-info button-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Male</label>
                                </div>
                            </label>
                        </div>
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
                                <input type="number" class="form-control" id="due" v-bind:value="due" disabled readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="input-total" >Total</span>
                                </div>
                                <input type="number" class="form-control" min="0" id="total" v-bind:value="total" disabled readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Signature</span>
                                </div>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
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
@endpush
