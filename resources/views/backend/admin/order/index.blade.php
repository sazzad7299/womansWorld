@extends('backend.layouts.app')
@section('title', 'All Orders')
@push('css')
<style>
    .table th, .table td {
    padding: 0.1rem 0.9375rem !important;
    line-height: 38px!important;
}
</style>
@endpush
@section('title', 'All orders')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('includes.error')
                <div class="d-flex justify-content-between">
                    <h6 class="card-title">{{ __('All orders') }}</h6>
                    {{-- <a class="btn btn-outline-primary text-end" data-toggle="modal" data-target="#create"
                        href="">{{ __('New Coupon') }}</a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table table-stripe">
                        <thead>
                            <th>SL.</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Pay by</th>
                            <th>Pay Status</th>
                            <th>Delivered</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($orders as $item)
                                <tr @if($item->viewed ==0)style="background: #ccc" @endif>
                                    <td>{{ serialNumber($orders, $loop) }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->grand_total }}</td>
                                    <td>{{ $item->paymentOption->name }}</td>
                                    <td class="d-flex justify-content-between">
                                        <span>
                                            @php
                                                switch ($item->payment_status) {
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
                                        </span>

                                        <span>
                                            {{-- <div class="dropdown">
                                                <button class="btn p-0" type="button" id="dropdownMenuButton"
                                                    data-bs-toggle="dropdown" aria-bs-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="icon-lg text-muted pb-3pxbi bi-grid-fill"
                                                        ></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="#"><i data-feather="eye"
                                                            class="icon-sm mr-2"></i> <span
                                                            class="">View</span></a>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="#"><i data-feather="edit-2"
                                                            class="icon-sm mr-2"></i> <span
                                                            class="">Edit</span></a>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="#"><i data-feather="trash"
                                                            class="icon-sm mr-2"></i> <span
                                                            class="">Delete</span></a>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="#"><i data-feather="printer"
                                                            class="icon-sm mr-2"></i> <span
                                                            class="">Print</span></a>
                                                    <a class="dropdown-item d-flex align-items-center"
                                                        href="#"><i data-feather="download"
                                                            class="icon-sm mr-2"></i> <span
                                                            class="">Download</span></a>
                                                </div>
                                            </div> --}}
                                        </span>
                                    </td>
                                    <td>
                                        @php
                                            switch ($item->delivery_status) {
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
                                        @endphp
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-outline-primary  p-1" href="{{route('admin.orders.show',$item->id)}}"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Orders Founds</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    
@endpush
