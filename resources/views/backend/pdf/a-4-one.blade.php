<html>
<head>
    <style>
        @page {
            margin-top: 0.2cm; /* <any of the usual CSS values for margins> */
            margin-left: 0.2cm; /* <any of the usual CSS values for margins> */
            margin-right: 0.2cm; /* <any of the usual CSS values for margins> */
            margin-bottom: 0.2cm; /* <any of the usual CSS values for margins> */
        }
        body {
            font-family: bengali_englisg, sans-serif;
            font-size: 10pt;
        }

        p {
            margin: 0pt;
        }

        table.items {
            border: 0.1mm solid #000000;
        }

        td {
            vertical-align: top;
        }

        .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }

        table thead td {
            background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
        }

        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }

        .items td.totals {
            text-align: right;
            border: 0.1mm solid #000000;
        }

        .items td.cost {
            text-align: "." center;
        }
        .m-5 {
            margin: -5px;
        }
        .m-1 {
            margin: -1px;
        }
    </style>
</head>
<body>
<!--mpdf
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
<div style="text-align: center">
    @if($chalan->fromBranch->active_image_head_chalan)
    <img src="{{ asset($chalan->fromBranch->chalan_head_design ?? get_static_option('no_image')) }}" alt="" style="width: 100%;">
    @else
    <h4 class="m-1"><b>চালান</b></h4>
    <img src="{{ asset($chalan->fromBranch->company->logo ?? get_static_option('no_image')) }}" width="17%" height="50px">
    <h2 class="m-1"><b>{{ $chalan->fromBranch->company->name ?? '' }}</b></h2>
    <b class="m-5">{!! $chalan->fromBranch->chalan_heading_one ?? '' !!}</b>
    <p class="m-5">{!! $chalan->fromBranch->chalan_heading_two ?? ''  !!}</p>
    <p class="m-5">{!! $chalan->fromBranch->chalan_heading_three ?? ''  !!}</p>
    @endif
</div>
<br>

<table width="100%" cellpadding="10">
    <tr>
        <td width="45%" style="border: 0.1mm solid #888888; ">
            নং: {{ en_to_bn($chalan->custom_counter) ?? '--' }}<br/>
            তারিখ: {{ en_to_bn($chalan->created_at->format('d/m/Y')) ?? '--' }}<br/>
            অফিস: {{ $chalan->toBranch->name ?? '--' }}
        </td>
        <td width="10%">&nbsp;</td>
        <td width="45%" style="border: 0.1mm solid #888888;">
            গাড়ি: {{ $chalan->car_number ?? '--' }}<br/>
            ফোন: {{ $chalan->driver_phone ?? '--' }}<br/>
            ড্রাইভার: {{ $chalan->driver_name ?? '--' }}
        </td>
    </tr>
</table>
<br/>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
    <thead>
    <tr>
        <td width="5%">#</td>
        <td width="20%">পার্টির নাম</td>
        <td width="15%">বিল নং</td>
        <td width="32%">মালের বর্ণনা</td>
        <td width="8%">সংখ্যা</td>
        <td width="10%">অগ্রীম</td>
        <td width="10%">বাকি</td>
    </tr>
    </thead>
    <tbody>
    <!-- ITEMS HERE -->
    @foreach($chalan->invoices as $invoice)
        <tr @if($loop->even) style="background-color:rgba(156,156,156,0.2)" @endif>
            <td align="center">{{ en_to_bn($loop->iteration) }}</td>
            <td align="center">{{ $invoice->sender_name ?? '--' }}</td>
            <td align="center">{{ en_to_bn($invoice->custom_counter) ?? '--' }}/{{ en_to_bn($invoice->created_at->format('d/m/Y')) }}</td>
            <td>{{ $invoice->description ?? '--' }}</td>
            <td align="center">{{ en_to_bn($invoice->quantity) ?? '--' }}</td>
            <td class="cost">{{ en_to_bn($invoice->paid) ?? '--' }}</td>
            <td class="cost">{{  en_to_bn($invoice->price +  $invoice->home +  $invoice->labour - $invoice->paid) }}</td>
        </tr>
    @endforeach
    <!-- END ITEMS HERE -->
    <tr>
        <td class="blanktotal" colspan="3" rowspan="1"></td>
        <td class="totals"><b>মোট:</b></td>
        <td class="totals"><b>{{ en_to_bn($chalan->invoices->sum('quantity')) }}</b></td>
        <td class="totals"><b>{{ en_to_bn($chalan->invoices->sum('paid')) }}</b></td>
        <td class="totals cost">
            <b>{{ en_to_bn($chalan->invoices->sum('price') + $chalan->invoices->sum('home') + $chalan->invoices->sum('labour') - $chalan->invoices->sum('paid')) }}</b>
        </td>
    </tr>
    </tbody>
</table>
<div style="text-align: center; font-style: italic;">Prepared by DataTech BD Ltd.</div>
</body>
</html>
