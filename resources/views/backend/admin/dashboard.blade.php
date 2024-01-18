@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Orders</p>
                            <h4 class="mb-0">{{ $data['order'] }}</h4>
                            <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>22.5% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-primary text-white">
                            <i class="bi bi-basket2"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Sale</p>
                            <h4 class="mb-0"> ৳ {{ round($data['sellAmount']) }}</h4>
                            <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Current Stock</p>
                            <h4 class="mb-0">{{ $data['stock'] }}</h4>
                            <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>12.3% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-orange text-white">
                            <i class="bi bi-emoji-heart-eyes"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Customers</p>
                            <h4 class="mb-0">{{ $data['user'] }}</h4>
                            <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>32.7% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-info text-white">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Order Table</h5>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
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
                                        <td>{{ serialNumber($todaysOrders, $loop) }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
@endsection
