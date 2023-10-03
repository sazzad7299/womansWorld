@extends('emails.main')
@section('title', 'Order Invoice')
@section('content')
    <div style="width:100%;">
        <div style="width: 50%;float:left;overflow:hidden;display:block">
            <h2>Customer</h2>
            <p><strong>{{ $order->user->name }}</p>
            <p><strong>Contact No:</strong> {{ $order->user->phone }}</p>
        </div>
        <div style="width: 50%;float:right;overflow:hidden;display:block">
            <h2>Invoice</h2>
            <p><strong>Date:</strong> {{ format_date($order->date) }}</p>
            <p><strong>Invoice:</strong> {{getinvoice($order->id)}}</p>
        </div>
    </div>
    <div class="head">
        <div style="width: 50%;float:left;overflow:hidden;display:block">
            <p><strong>Billed To:</strong></p>
            {!! $order->billing_info !!}
        </div>
        <div style="width: 50%;float:right;overflow:hidden;display:block">
            <p><strong>Shipping Adress:</strong></p>
            {!! $order->shipping_address !!}
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price (TK)</th>
                <th>Total (Tk)</th>
            </tr>
        </thead>
        <tbody>
            @php $subtotal = 0; @endphp
            @foreach ($order->orderdetails as $key => $item)
                <tr class="text-right">
                    <td class="text-left">{{ $key + 1 }}</td>
                    <td class="text-left">{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->total }}</td>
                    @php $subtotal += $item->total @endphp
                </tr>
            @endforeach
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td><b>Sub Total</b></td>
                        <td class="text-right">{{ $subtotal }}Tk</td>
                    </tr>
                    @if ($order->coupon_discount != null)
                        <tr>
                            <td colspan="3"></td>
                            <td>Discount</td>
                            <td class="text-danger text-right">(-)
                                {{ $order->coupon_discount }}TK
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="3"></td>
                        <td><b>Shipping Cost:</b></td>
                        <td class="text-right">{{ $order->shippingoption->cost }}Tk</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td><b>Paid({{ $order->paymentOption->name }}):</b></td>
                        <td class="text-right">
                            @php
                                switch ($order->payment_status) {
                                    case 0:
                                        echo 'Pending';
                                        break;
                                    case 1:
                                        echo 'Review';
                                        break;
                                    case 2:
                                        echo 'Invalid';
                                        break;
                                    case 3:
                                        echo 'Completed';
                                        break;
                                    case 4:
                                        echo 'Unpaid';
                                        break;
                                    default:
                                        echo 'Unknown status';
                                }
                            @endphp
                        </td>
                    </tr>
                    <tr class="bg-light">
                        <td colspan="3"></td>
                        <td class="text-bold-800">
                            <p>TOTAL</p>
                        </td>
                        <td class="text-bold-800 text-right"> {{ $order->grand_total }}Tk</td>
                    </tr>
                </tfoot>
        </tbody>
    </table>

@endsection
