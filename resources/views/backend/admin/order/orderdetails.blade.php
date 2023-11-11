@extends('backend.layouts.app')
@section('title', 'Order Details')
@push('css')
    <style>
        .table th,
        .table td {
            padding: 0.1rem 0.9375rem !important;
            line-height: 38px !important;
        }

        p {
            font-size: 16px;
        }
    </style>
@endpush
@section('title', 'Order Details')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @if ($order->pay_options_id != 1)
                                    <b> <span>Payby:{{ $order->paymentOption->name }}</span> <br><span>Transection
                                            Id:{{ $order->trns_id }}</span> <br> <span>Transection
                                            Number:{{ $order->payment_number }}</span></b>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label" for="payment_status">{{ __('Payment Status') }}</label>
                                        <select name="payment_status" id="payment_status" class="form-control"
                                            data-id="{{ $order->id }}">
                                            <option value="0"{{ $order->payment_status == 0 ? ' selected' : '' }}>
                                                Pending</option>
                                            <option value="1"{{ $order->payment_status == 1 ? ' selected' : '' }}>
                                                Review</option>
                                            <option value="2"{{ $order->payment_status == 2 ? ' selected' : '' }}>
                                                Invalid</option>
                                            <option value="3"{{ $order->payment_status == 3 ? ' selected' : '' }}>
                                                Completed</option>
                                            <option value="4"{{ $order->payment_status == 4 ? ' selected' : '' }}>
                                                Unpaid</option>

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="discount_type">{{ __('Delivery  Status') }}</label>
                                        <select name="delivery_status" id="delivery" data-id="{{ $order->id }}" class="form-control">
                                            <option value="0"{{ $order->delivery_status == 0 ? ' selected' : '' }}>
                                                Pending</option>
                                            <option value="1"{{ $order->delivery_status == 1 ? ' selected' : '' }}>
                                                Confirmed</option>
                                            <option value="2"{{ $order->delivery_status == 2 ? ' selected' : '' }}>
                                                Packed</option>
                                            <option value="3"{{ $order->delivery_status == 3 ? ' selected' : '' }}>
                                                Shipped</option>
                                            <option value="4"{{ $order->delivery_status == 4 ? ' selected' : '' }}>
                                                Delivered</option>
                                            <option value="5"{{ $order->delivery_status == 5 ? ' selected' : '' }}>
                                                Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" id="invoice">
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-4 pl-0">
                                <a href="#" class="noble-ui-logo d-block mt-3"><img src="{{ asset($webinfo->logo) }}"
                                        width="40%" alt=""></a>
                                <p class="mt-1 mb-1"><b>{{ $webinfo->name }}</b></p>
                                <p class="mt-1 mb-1">Cell:{{ $webinfo->number }}<br>Email:{{ $webinfo->email }}</p>
                                <p>Address:{{ $webinfo->address }}</p>

                            </div>
                            <div class="col-lg-3 pr-0">
                                <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">invoice</h4>
                                <h6 class="text-right"># {{ getinvoice($order->id) }}</h6>
                                <h6 class="text-right"># @php
                                    switch ($order->delivery_status) {
                                        case 0:
                                            echo 'Pending';
                                            break;
                                        case 1:
                                            echo 'Confirmed';
                                            break;
                                        case 2:
                                            echo 'Packed';
                                            break;
                                        case 3:
                                            echo 'Shipped';
                                            break;
                                        case 4:
                                            echo 'Delivered';
                                            break;
                                        case 5:
                                            echo 'Cancelled';
                                            break;
                                        default:
                                            echo 'Unknown status';
                                    }
                                @endphp</h6>
                                <p class="mt-1 mb-2">
                                <h4>Customer Details</h4>
                                </p>
                                <p class="mt-1 mb-1"><b>Name:{{ $order->user->name }}</b></p>
                                <p class="mt-1 mb-1">
                                    <strong>Cell:</strong>{{ $order->user->phone }},<strong>Email:</strong>{{ $order->user->email }}
                                </p>
                                <p><strong>Address</strong>:{{ $webinfo->address }}</p>
                            </div>
                        </div>
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-4 pl-0">
                                <p class="mt-1 mb-2">
                                <h4>Billing Details</h4>
                                </p>
                                <p class="mt-1 mb-1"> <b>{!! $order->billing_info !!}</b></p>
                            </div>
                            <div class="col-lg-3 pr-0">
                                <p class="mt-1 mb-2">
                                <h4>Shipping Details</h4>
                                </p>
                                <p class="mt-1 mb-2"><b>{!! $order->shipping_address !!}</b></p>

                            </div>
                        </div>
                        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><b>#</b></th>
                                            <th><b>Description</b></th>
                                            <th class="text-right"><b>Quantity</b></th>
                                            <th class="text-right"><b>Unit cost</b></th>
                                            <th class="text-right"><b>Total</b></th>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid w-100">
                            <div class="row">
                                <div class="col-md-6 ml-auto">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><b>Sub Total</b></td>
                                                    <td class="text-right">{{ $subtotal }}Tk</td>
                                                </tr>
                                                @if ($order->coupon_discount != null)
                                                    <tr>
                                                        <td>Discount</td>
                                                        <td class="text-danger text-right">(-)
                                                            {{ $order->coupon_discount }}TK
                                                        </td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td><b>Shipping Cost:</b></td>
                                                    <td class="text-right">{{ $order->shippingoption->cost }}Tk</td>
                                                </tr>
                                                <tr>
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
                                                    <td class="text-bold-800">
                                                        <h5>TOTAL</h5>
                                                    </td>
                                                    <td class="text-bold-800 text-right"> {{ $order->grand_total }}Tk</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid w-100">
                        <a href="#" class="btn btn-primary float-right mt-4 ml-2" data-toggle="modal"
                            data-target="#sendinvoice"><i data-feather="send" class="mr-3 icon-md"></i>Send Invoice</a>
                        <a id="printNow" class="btn btn-outline-primary float-right mt-4"><i data-feather="printer"
                                class="mr-2 icon-md"></i>Print</a>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        id="sendinvoice">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title h4" id="exampleModalLabel">{{ __('Send Invoiced') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" action="{{ route('admin.order.invoiceSend') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="email" value="{{ $order->user->email }}">
                        <div class="row col-md-12 mb-3">
                            <div class="form-group col-md-12">
                                <label class="form-label">{{ __('Subject') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Subject') }}"
                                    autocomplete="off" name="subject" value="{{ old('subject') }}" required=""
                                    id="subject" />
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label">{{ __('Message') }}</label>
                               <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <center>
                                    <button type="submit" class="btn btn-primary"><i data-feather="send"
                                            class="mr-3 icon-md"></i>Send Invoice</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $("#delivery").change(function() {
            var orderId = $(this).data("id");
            var status = $(this).val();
            $.ajax({
                url: '/admin/orders/' + orderId + '/delivery-status/' + status,
                type: 'GET',
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr) {
                    alert(response.message);
                }
            });
        });
        $("#payment_status").change(function() {
            var orderId = $(this).data("id");
            var status = $(this).val();
            $.ajax({
                url: '/admin/orders/' + orderId + '/payment-status/' + status,
                type: 'GET',
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr) {
                    alert(response.message);
                }
            });
        });
        $("#printNow").click(function() {
            var contents = $("#invoice").html();

            var newWin = window.open('', 'Print-Window');

            newWin.document.open();

            newWin.document.write(
                '<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>Invoice</title><link rel="stylesheet" href="{{ asset('/backend/assets/css/core.css') }}"><link rel="stylesheet" href="{{ asset('/css/style.css') }}"></head><body onload="window.print()">'
            );
            newWin.document.write(contents);
            newWin.document.write('</body></html>');
            newWin.document.close();
            setTimeout(function() {
                newWin.close();
            }, 5000);
        });
    </script>
@endpush
