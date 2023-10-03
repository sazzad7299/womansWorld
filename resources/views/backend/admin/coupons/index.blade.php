@extends('backend.layouts.app')

@section('title', 'All Coupons')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">{{ __('All Coupons') }}</h6>
                            <a class="btn btn-outline-primary text-end" data-toggle="modal" data-target="#create"
                                href="">{{ __('New Coupon') }}</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripe">
                                <thead>
                                    <th>SL.</th>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Amount</th>
                                    <th>Expire Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($coupons as $item)
                                        <tr>
                                            <td>{{ serialNumber($coupons, $loop) }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->amount }} {{ $item->amount_type == 1 ? 'TK' : '%' }}</td>
                                            <td>{{ date('d M, Y', strtotime($item->expires_at)) }}</td>
                                            <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-primary editcoupon" data-toggle="modal"
                                                    data-target="#edit" data-id="{{ $item->id }}"><i
                                                        data-feather="edit"></i></a>

                                                <a href="" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.coupons.destroy', [$item->id]) }}"
                                                    method="post" style="display: none;"
                                                    id="delete-form-{{ $item->id }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No Coupon Founds</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $coupons->links() }}
                            </div>
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
                    <form class="forms-sample" method="POST" action="{{ route('admin.coupons.store') }}"
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
                    url: "{{ route('admin.coupons.edit', ':id') }}".replace(':id', coupon),
                    success: function(resp) {
                        $("#editdata").html(resp);
                    },
                    error: function(error) {}
                })

            });
        });
    </script>
@endpush
