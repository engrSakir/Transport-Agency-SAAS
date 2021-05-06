<!DOCTYPE html>
<html lang="en">
<head>
    <title> ভাউচারঃ {{ '$invoice->invoice_id' }}  </title>
    <style>
        @page  {
            background-color: #ffffff;
        }
        @page {
            header: page-header;
            footer: page-footer;

            sheet-size: A5-L;

            background-color: azure;

            marks: crop;/*crop | cross | none*/

            margin-top: 0.5cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;


            /*margin-top: 0.5cm;*/
            /*margin-left: 1cm;*/
            /*margin-right: 1cm;*/
            /*margin-bottom: 0.5cm;*/
            /*margin-header: 0;*/
            /*margin-footer: 0;*/
            /*vertical-align: top;*/
            /*background: ...*/
            /*background-image: ...*/
            /*background-position ...*/
            /*background-repeat ...*/
            /*background-color ...*/
            /*background-gradient: ...*/


            /*https://mpdf.github.io/css-stylesheets/supported-css.html*/
            /*https://mpdf.github.io/paging/different-page-sizes.html*/

        }

        body{
            font-family: bengali_englisg, sans-serif;
        }
        .left-color{
            border-left: 1px solid black;

        }

        .right-color{
            border-right: 1px solid black;
        }

        .top-color{
            border-top: 1px solid black;
        }
        .bottom-color{
            border-bottom: 1px solid black;
        }
        .left-right-bottom-color{
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-bottom: 1px solid black;

            padding: 0px 10px;
        }

    </style>
</head>
<body class="vertical-layout">
<!-- Start Containerbar  -->
<div class="row">
    <div class="col-12" style="margin-top: -5px; margin-bottom: -5px;">
        <table class="table table-bordered table-striped" style="width: 100%;">
            <tr>
                <th style="width: 20%;">
                    <img src="{{ asset('uploads/images/company/logo/logo.png') }}" width="20%" height="50px" class="img-fluid" alt="">
                </th>
                <th class="" style="font-size: 280%; width: 80%; margin-left: -20px;">
                    {{ '$setting->name' }}
                </th>
            </tr>
        </table>
    </div>
    <div class="col-12">
        <table class="table table-bordered table-striped" style="width: 100%;">
            <tr><!--serial+text+logo+office-->
                <td class="text-center" style=" width: 100%; ">
                    <table class="" style="width: 100%; height: 100%; ">
                        <tr>
                            <td class="" style="width: 20%; text-align: left">
                                <b class=""> নং: </b><b class="">{{ '$invoice->invoice_counter' }}</b>
                            </td>
                            <td class="" style="text-align: center; font-size: 80%;">
                                <b>আন্তঃ জিলা স্থলপথে মাল পরিবহন ঢাকা মহানগর পণ্য পরিবহন এজেন্সী মালিক সমিতির অন্তর্ভুক্ত রেজিঃ-ঢ=৩১৭১</b>
                                <p>{{ '\App\Office::find(1)->name' }} &nbsp; {{ '\App\Office::find(1)->phone' }}  &nbsp;  {{ '\App\Office::find(1)->address' }} </p>
                            </td>
                        </tr>
                    </table>
                </td>
            <!-- Barcode  up th will be style="width: 80%;"
                <th style="width: 20%;">
                    <img src="{{ 'uploads/images/company/logo/logo.png' }}" width="18%" height="18.5%" class="img-fluid" alt="" >
                </th>
                -->
            </tr>
        </table>
    </div>
    <div class="col-12">
        <table class="table table-bordered table-striped" style="width: 100%;">
            <tr>
                <td style="width: 50%; text-align: left" >
                    প্রেরকঃ <b>{{ '$invoice->prerok->name' }}</b>
                </td>
                <td class="" style=" width: 0%; text-align: center">
                    <!--Time-->
                </td>
                <td class="" style=" width: 50%; text-align: right">
                    প্রাপকঃ <b> {{ '$invoice->user->name' }}</b> <br> মোবাইলঃ<b> {{ '$invoice->user->phone' }}
                </td></b>
            </tr>
        </table>
        <table class="table table-bordered table-striped" style="width: 100%; margin: -5px; ">
            <tr>
                <td class="" style="width: 50%; text-align: left;" >
                    ঠিকানাঃ {{ '$invoice->senderOffice->name' }}
                </td>
                <td class="" style=" width: 0%; text-align: center">
                    <!--Date-->
                </td>
                <td class="" style=" width: 50%; text-align: right;">
                    ঠিকানাঃ {{ '$invoice->office->name' }}
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <!-- Start col -->
    <!-- background logo water mark paid/partial/due with condition -->
    <div class="col-lg-12"
{{--         @if($invoice->total_price <= $invoice->paid_amount)--}}
         style="background-image: url({{ asset('uploads/images/company/logo/logo.png') }}) ;
             background-size: 70%;
             background-repeat:no-repeat;
             background-position: center -100px;"
{{--         @elseif($invoice->paid_amount > 0)--}}
         style="background-image: url({{ asset('uploads/images/company/logo/logo.png') }}) ;
             background-size: 70%;
             background-repeat:no-repeat;
             background-position: center -100px;"
{{--         @else--}}
         style="background-image: url({{ asset('uploads/images/company/logo/logo.png') }}) ;
             background-size: 70%;
             background-repeat:no-repeat;
             background-position: center -100px;"
{{--        @endif--}}
    >
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" style="width: 100%;">
                        <!-- align="center" valign="top" -->
                        <tr style="width: 100%;"  >
                            <td class="" style="width: 10%; background-color: rgba(11,198,145,0.5); padding-top: 2px; text-align: center;">
                                সংখ্যা
                            </td>
                            <td class="text-center" style="width: 70%;  background-color: rgba(11,198,145,0.5); padding-top: 2px; text-align: center;">
                                মালের বিবরণ
                            </td>
                            <td class="text-center " style="width: 20%;  background-color: rgba(11,198,145,0.5); padding-top: 2px; text-align: center;">
                                মোট
                            </td>
                        </tr>
                        <tr>
                            <th  style="text-align: center" class="left-color bottom-color">
                                {{ '$invoice->item_quantity' }}
                            </th>
                            <td  style="text-align: left 10px; height: 5.4cm;" class="left-right-bottom-color">
                                <pre style="text-align: left; font-family: bengali_englisg;"> {{ '$invoice->item_details' }}</pre>
                            </td>
                            <td  style="text-align: center;" class="right-color bottom-color">
                                {{ '$changed_item_price'  }}
                            </td>
                        </tr>
                    </table>
                    <table class="background" style="width: 100%; font-size: 105%; ">
                        <tbody>
                        <tr>
                            <th style="text-align: center; width:5%"> </th>
                            <td style="text-align: center; width:30%"> </td>
                            <td style="text-align: right; width:10%">হোম ডেলিভারি- </td>
                            <td style="text-align: center; width:22%; border: 1px solid black;"><b>{{ '$changed_home_delivery_price' }}</b></td>
                        </tr>
                        <tr>
                            <th> </th>
                            <th> www.nsta.com.bd </th>
                            <td style="text-align: right;">লেবার- </td>
                            <td style="text-align: center; ; border: 1px solid black;"><b>{{ '$changed_labor_price' }}</b></td>
                        </tr>
                        <tr>
                            <th style="text-align: center"> </th>
                            <th style="text-align: center">
                                বুকিং তারিখ- {{ '12/25/2020' }}
                            </th>
                            <td style="text-align: right">মোট- </td>
                            <td style="text-align: center; background-color: rgba(11,198,145,0.5); border: 1px solid black;"><b>{{ '$changed_total_price' }}</b></td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>
                                বুকিং সময়- {{ '10/10/2020' }}
                            </th>
                            <td style="text-align: right">
                                অগ্রীম-
                            </td>
                            <td  style="text-align: center; background-color: rgba(11,198,145,0.5); border: 1px solid black;"  style="text-align: center; border: 1px solid black;" ><b>{{ '$changed_paid_price' }}</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align: right; width: 50%;" class="">
                                বাকী-
                            </td>
                            <td style="text-align: center; border: 1px solid black; background-color: rgba(11,198,145,0.5);" class=""><b>{{ '$changed_due_price' }}</b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
    <div class="col-lg-12">
        <table style="width: 100%;">
            <tr style="width: 100%;">
                <td style="width: 30%; text-align: left;">
                    প্রেরকের স্বাক্ষর-
                </td>
                <td style="width: 40%; text-align: center;">
                    <b>কন্ডিশনে মাল বুকিং করা হয়। </b>
                </td>
                <td style="width: 30%; text-align: right;">
                    কর্মকর্তার স্বাক্ষর-{{ '$invoice->staff->name' }}
                </td>
            </tr>
        </table>

    </div>
    <!-- Start row -->
    <!-- End row -->
</div>

</body>
</html>
