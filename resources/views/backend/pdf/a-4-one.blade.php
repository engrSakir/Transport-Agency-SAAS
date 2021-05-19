<html>
<head>
    <style>
        body {font-family: sans-serif;
            font-size: 10pt;
        }
        p {	margin: 0pt; }
        table.items {
            border: 0.1mm solid #000000;
        }
        td { vertical-align: top; }
        .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }
        table thead td { background-color: #EEEEEE;
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
    </style>
</head>
<body>
<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%" style="color:#0000BB; "><span style="font-weight: bold; font-size: 14pt;">Acme Trading Co.</span><br />123 Anystreet<br />Your City<br />GD12 4LP<br /><span style="font-family:dejavusanscondensed;">&#9742;</span> 01777 123 567</td>
<td width="50%" style="text-align: right;">Invoice No.<br /><span style="font-weight: bold; font-size: 12pt;">0012345</span></td>
</tr></table>
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
<div style="text-align: right">Date: 13th November 2008</div>
<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
        <td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">SOLD TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
        <td width="10%">&nbsp;</td>
        <td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
    </tr></table>
<br />
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
    <thead>
    <tr>
        <td width="5%">#</td>
        <td width="15%">Sender</td>
        <td width="20%">Number</td>
        <td width="32%">Description</td>
        <td width="8%">QT</td>
        <td width="10%">Advance</td>
        <td width="10%">Due</td>
    </tr>
    </thead>
    <tbody>
    <!-- ITEMS HERE -->
    @foreach($chalan->invoices as $invoice)
    <tr @if($loop->even) style="background-color:rgba(156,156,156,0.2)" @endif>
        <td align="center">{{ $loop->iteration }}</td>
        <td align="center">{{ $invoice->sender_name ?? '--' }}</td>
        <td align="center">{{ $invoice->custom_counter ?? '--' }}/{{ $invoice->created_at->format('d/m/Y') }}</td>
        <td>{{ $invoice->description ?? '--' }}</td>
        <td align="center">{{ $invoice->quantity ?? '--' }}</td>
        <td class="cost">{{ $invoice->paid ?? '--' }}</td>
        <td class="cost">{{  $invoice->price +  $invoice->home +  $invoice->labour - $invoice->paid }}</td>
    </tr>
    @endforeach
    <!-- END ITEMS HERE -->
    <tr>
        <td class="blanktotal" colspan="3" rowspan="1"></td>
        <td class="totals"><b>TOTAL:</b></td>
        <td class="totals"><b>{{ $chalan->invoices->sum('quantity') }}</b></td>
        <td class="totals"><b>{{ $chalan->invoices->sum('paid') }}</b></td>
        <td class="totals cost"><b>{{ $chalan->invoices->sum('price') + $chalan->invoices->sum('home') + $chalan->invoices->sum('labour') - $chalan->invoices->sum('paid') }}</b></td>
    </tr>
    </tbody>
</table>
<div style="text-align: center; font-style: italic;">Payment terms: payment due in 30 days</div>
</body>
</html>
