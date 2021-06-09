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
    @if($branch->active_image_head_expense)
        <img src="{{ asset($branch->expense_head_design ?? get_static_option('no_image')) }}" alt="" style="width: 100%;">
    @else
        <h4 class="m-1"><b>দৈনিক অফিসে রিপোর্ট ({!! 'তারিখঃ '. $expense_date !!})</b></h4>
        <img src="{{ asset($branch->company->logo ?? get_static_option('no_image')) }}" width="17%" height="50px">
        <h2 class="m-1"><b>{{ $branch->company->name ?? '' }}</b></h2>
        <h4 class="m-1"><b>{{ $branch->name ?? '' }}</b></h4>

    @endif
</div>
<br>
@if($expenses->count() < 1)
    <h1>তথ্য পাওয়া যায়নি।</h1>
@else
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
    <thead>
    <tr>
        <td width="5%">#</td>
        <td width="20%">শাখা সমূহ</td>
        <td width="10%">নগদ</td>
        <td width="10%">বাকী</td>
        <td width="45%">খরচের বিবরণ</td>
        <td width="10%">টাকা</td>
    </tr>
    </thead>
    <tbody>
    <!-- ITEMS HERE -->
    @foreach($expenses as $expense)
        <tr @if($loop->even) style="background-color:rgba(156,156,156,0.2)" @endif>
            <td align="center">{{ en_to_bn($loop->iteration) }}</td>
            <td align="center">{{ $expense->category->name ?? '--' }}</td>
            <td align="center">{{ en_to_bn($expense->immediate) ?? '--' }}</td>
            <td align="center">{{ en_to_bn($expense->due) ?? '--' }}</td>
            <td>{{ en_to_bn($expense->description) ?? '--' }}</td>
            <td class="cost">{{ en_to_bn($expense->taka) ?? '--' }}</td>
        </tr>
    @endforeach
    <!-- END ITEMS HERE -->
    <tr>
        <th align="center"></th>
        <th align="center">মোট</th>
        <th align="center">{{ en_to_bn($expenses->sum('immediate')) ?? '--' }}</th>
        <th align="center">{{ en_to_bn($expenses->sum('due')) ?? '--' }}</th>
        <th></th>
        <th class="cost">{{ en_to_bn($expenses->sum('$expense->taka')) ?? '--' }}</th>
    </tr>
    </tbody>
</table>
@endif
<div style="text-align: center; font-style: italic;">Prepared by DataTech BD Ltd.</div>
</body>
</html>
