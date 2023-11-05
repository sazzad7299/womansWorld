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
    <div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true"
        id="create">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{ __('New Coupon') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" action="{{ route('admin.orders.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row col-md-12 mb-3">
                            <div class="form-group col-md-3">
                                <label class="form-label">{{ __('Title') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Title') }}"
                                    autocomplete="off" name="title" value="{{ old('title') }}" required=""
                                    id="title" />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">{{ __('Code') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Code') }}"
                                    autocomplete="off" name="code" value="{{ old('code') }}" required=""
                                    id="code" />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">{{ __('Discount Type') }}</label>
                                <select class="form-select" data-width="100%" name="amount_type">
                                    <option value=""> Select Type</option>
                                    <option value="1">{{ __('Reguler') }}</option>
                                    <option value="2">{{ __('Percent') }}</option>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">{{ __('Amount') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('Amount') }}"
                                    autocomplete="off" name="amount" value="{{ old('amount') }}" required=""
                                    id="amount" />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">{{ __('Expires Date') }}</label>
                                <input type="date" class="form-control" placeholder="{{ __('Expires Date') }}"
                                    autocomplete="off" name="expires_at" value="{{ old('expires_at') }}" required=""
                                    id="expires_at" />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">{{ __('Type') }}</label>
                                <select class="form-select" data-width="100%" name="type">
                                    <option value=""> Select Type</option>
                                    <option value="1">Flat</option>
                                    <option value="2">Category</option>
                                    <option value="3">Brand</option>
                                    <option value="4">Products</option>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">{{ __('Limit') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('Limit') }}"
                                    autocomplete="off" name="limit" value="{{ old('limit') }}" required=""
                                    id="limit" />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">{{ __('Status') }}</label>
                                <select class="form-select" data-width="100%" name="status" id="status">
                                    <option value="">{{ __('Status') }}</option>
                                    @foreach (getStatus() as $status)
                                        <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-outline-danger">{{ __('Reset') }}</button>
                                    <button type="submit" class="btn btn-outline-primary">{{ __('Save') }}</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true" id="edit">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{ __('Edit Coupon') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="editdata">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(".editcoupon").click(function() {
                let coupon = $(this).data('id');
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.orders.edit', ':id') }}".replace(':id', coupon),
                    success: function(resp) {
                        $("#editdata").html(resp);
                    },
                    error: function(error) {}
                })

            });
        });
    </script>
@endpush
