

@foreach($reports as $report)
    {{ $loop->iteration }}) branch_name: {{ $report['branch_name'] }} <br>
    total_chalan: {{ $report['total_chalan'] }}
    <br>
    <table>
        <tr style="width: 100%;">
            <td style="width: 10%;">#</td>
            <td style="width: 50%;">key</td>
            <td style="width: 10%;">all</td>
            <td style="width: 10%;">received</td>
            <td style="width: 10%;">ongoing</td>
            <td style="width: 10%;">delivered</td>
        </tr>
        <tr>
            <td>1</td>
            <td>total_invoice_of_all_status</td>
            <td>{{ $report['total_invoice_of_all_status'] }}</td>
            <td>{{ $report['total_invoice_of_received_status'] }}</td>
            <td>{{ $report['total_invoice_of_on_going_status'] }}</td>
            <td>{{ $report['total_invoice_of_delivered_status'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>total_amount_of_all_status</td>
            <td>{{ $report['total_amount_of_all_status'] }}</td>
            <td>{{ $report['total_amount_of_received_status'] }}</td>
            <td>{{ $report['total_amount_of_on_going_status'] }}</td>
            <td>{{ $report['total_amount_of_delivered_status'] }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td>total_paid_amount_of_all_status</td>
            <td>{{ $report['total_paid_amount_of_all_status'] }}</td>
            <td>{{ $report['total_paid_amount_of_received_status'] }}</td>
            <td>{{ $report['total_paid_amount_of_on_going_status'] }}</td>
            <td>{{ $report['total_paid_amount_of_delivered_status'] }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td>total_due_amount_of_all_status</td>
            <td>{{ $report['total_due_amount_of_all_status'] }}</td>
            <td>{{ $report['total_due_amount_of_received_status'] }}</td>
            <td>{{ $report['total_due_amount_of_on_going_status'] }}</td>
            <td>{{ $report['total_due_amount_of_delivered_status'] }}</td>
        </tr>
    </table>
    <br>
    <br>
@endforeach
