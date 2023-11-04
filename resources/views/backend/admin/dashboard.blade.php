@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Order</h6>
                                </div>
                                <div class="row">
                                    <div >
                                        <h3 class="m-4">{{$data['order']}}<i data-feather="shopping-bag" class="text-success  mb-1"></i></h3>

                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Completed Order</h6>
                                </div>
                                <div class="row">
                                    <div >
                                        <h3 class="m-4">{{ $data['completedOrder']}} <i data-feather="shopping-bag" class="text-success  mb-1"></i></h3>

                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Stock Product</h6>
                                </div>
                                <div class="row">
                                    <div >
                                        <h3 class="m-4">{{$data['stock']}} <i data-feather="shopping-bag" class="text-success  mb-1"></i></h3>

                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Customers</h6>
                                </div>
                                <div class="row">
                                    <div >
                                        <h3 class="m-4">{{$data['user']}}<i data-feather="user-check" class="text-success  mb-1"></i></h3>

                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Sell Amount</h6>
                                </div>
                                <div class="row">
                                    <div >
                                        <h3 class="m-4">{{ round($data['sellAmount'])}} <i class="text-success  mb-1">৳</i></h3>

                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Stock Amount</h6>
                                </div>
                                <div class="row">
                                    <div >
                                        <h3 class="m-4">{{round($data['stockAmount'])}} <i class="text-success  mb-1">৳</i></h3>

                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Today's Order</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mt-2">
                                <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">Customer Name</th>
                                        <th class="pt-0">Payment Method</th>
                                        <th class="pt-0">Payment Status</th>
                                        <th class="pt-0">Delivered</th>
                                        <th class="pt-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($todaysOrders as $item)
                                        <tr>
                                            <td>{{serialNumber($todaysOrders, $loop)}}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->paymentOption->name }}</td>
                                            <td>
                                                @php
                                                    switch ($item->payment_status) {
                                                        case 0:
                                                                echo '<span class="badge bg-dark text-white">Pending</span>';
                                                                break;
                                                            case 1:
                                                                echo '<span class="badge bg-success">Review</span>';
                                                                break;
                                                            case 2:
                                                                echo '<span class="badge bg-danger">Invalid</span>';
                                                                break;
                                                            case 3:
                                                                echo '<span class="badge bg-success">Completed</span>';
                                                                break;
                                                            case 4:
                                                                echo '<span class="badge bg-danger">Unpaid</span>';
                                                                break;
                                                            default:
                                                                echo 'Unknown status';

                                                    }
                                                @endphp
                                            </td>
                                            <td>
                                                <span>
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
                                                </span>
                                            <td><a class="m-0 p-0" href="{{ route('admin.orders.show', $item->id) }}"><i
                                                        data-feather="eye"></i></a></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-danger">No Orders for today</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $todaysOrders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
@endsection
