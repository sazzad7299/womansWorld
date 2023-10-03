@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
            {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
                <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                    <span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar"
                            class=" text-primary"></i></span>
                    <input type="text" class="form-control border-primary bg-transparent">
                </div>
                <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print
                </button>
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Download Report
                </button>
            </div> --}}
        </div>

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

        {{-- <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Revenue</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="dropdownMenuButton3"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span
                                            class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="trash" class="icon-sm me-2"></i> <span
                                            class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="printer" class="icon-sm me-2"></i> <span
                                            class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="download" class="icon-sm me-2"></i> <span
                                            class="">Download</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-start mb-2">
                            <div class="col-md-7">
                                <p class="text-muted tx-13 mb-3 mb-md-0">Revenue is the income that a business
                                    has from its normal
                                    business activities, usually from the sale of goods and services to
                                    customers.</p>
                            </div>
                            <div class="col-md-5 d-flex justify-content-md-end">
                                <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-primary">Today</button>
                                    <button type="button" class="btn btn-outline-primary d-none d-md-block">Week</button>
                                    <button type="button" class="btn btn-primary">Month</button>
                                    <button type="button" class="btn btn-outline-primary">Year</button>
                                </div>
                            </div>
                        </div>
                        <div id="revenueChart"></div>
                    </div>
                </div>
            </div>
        </div> <!-- row --> --}}

        {{-- <div class="row">
            <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Monthly sales</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton4"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span
                                            class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="trash" class="icon-sm me-2"></i> <span
                                            class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="printer" class="icon-sm me-2"></i> <span
                                            class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="download" class="icon-sm me-2"></i> <span
                                            class="">Download</span></a>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted">Sales are activities related to selling or the number of
                            goods or services sold in
                            a given time period.</p>
                        <div id="monthlySalesChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Cloud storage</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton5"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span
                                            class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="trash" class="icon-sm me-2"></i> <span
                                            class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="printer" class="icon-sm me-2"></i> <span
                                            class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="download" class="icon-sm me-2"></i> <span
                                            class="">Download</span></a>
                                </div>
                            </div>
                        </div>
                        <div id="storageChart"></div>
                        <div class="row mb-3">
                            <div class="col-6 d-flex justify-content-end">
                                <div>
                                    <label
                                        class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total
                                        storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                                    <h5 class="fw-bolder mb-0 text-end">8TB</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                            class="p-1 me-1 rounded-circle bg-primary"></span> Used
                                        storage</label>
                                    <h5 class="fw-bolder mb-0">~5TB</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Upgrade storage</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row --> --}}

        <div class="row">
            {{-- <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Inbox</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton6"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span
                                            class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="trash" class="icon-sm me-2"></i> <span
                                            class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="printer" class="icon-sm me-2"></i> <span
                                            class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="download" class="icon-sm me-2"></i> <span
                                            class="">Download</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
                                <div class="me-3">
                                    <img src="assets/images/faces/face2.jpg" class="rounded-circle wd-35" alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="fw-normal text-body mb-1">Leonardo Payne</h6>
                                        <p class="text-muted tx-12">12.30 PM</p>
                                    </div>
                                    <p class="text-muted tx-13">Hey! there I'm available...</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                                <div class="me-3">
                                    <img src="assets/images/faces/face3.jpg" class="rounded-circle wd-35" alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="fw-normal text-body mb-1">Carl Henson</h6>
                                        <p class="text-muted tx-12">02.14 AM</p>
                                    </div>
                                    <p class="text-muted tx-13">I've finished it! See you so..</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                                <div class="me-3">
                                    <img src="assets/images/faces/face4.jpg" class="rounded-circle wd-35" alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="fw-normal text-body mb-1">Jensen Combs</h6>
                                        <p class="text-muted tx-12">08.22 PM</p>
                                    </div>
                                    <p class="text-muted tx-13">This template is awesome!</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                                <div class="me-3">
                                    <img src="assets/images/faces/face5.jpg" class="rounded-circle wd-35" alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="fw-normal text-body mb-1">Amiah Burton</h6>
                                        <p class="text-muted tx-12">05.49 AM</p>
                                    </div>
                                    <p class="text-muted tx-13">Nice to meet you</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                                <div class="me-3">
                                    <img src="assets/images/faces/face6.jpg" class="rounded-circle wd-35" alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="fw-normal text-body mb-1">Yaretzi Mayo</h6>
                                        <p class="text-muted tx-12">01.19 AM</p>
                                    </div>
                                    <p class="text-muted tx-13">Hey! there I'm available...</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
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
    </div>
@endsection
