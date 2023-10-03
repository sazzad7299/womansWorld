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
                            <h6 class="card-title">{{ __('All Request') }}</h6>
                            {{-- <a class="btn btn-outline-primary text-end" data-toggle="modal" data-target="#create"
                                href="">{{ __('New Coupon') }}</a> --}}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripe">
                                <thead>
                                    <th>SL.</th>
                                    <th>Product Name</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($requests as $item)
                                        <tr  @if($item->viewed ==0)style="background: #ccc" @endif>
                                            <td>{{ serialNumber($requests, $loop) }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->phone }} </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('admin.requestproduct.show',$item->id) }}" class="btn btn-sm btn-outline-primary ViewDataId"  data-id="{{ $item->id }}"><i
                                                        data-feather="eye"></i></a>

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
                                            <td colspan="5">No Product Request Available</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $requests->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true" id="ViewDataModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{ __('Request Details') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="ViewData">

                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('js')
    <script>
        $(document).ready(function() {
            $(".ViewDataId").click(function() {
                let requestproduct = $(this).data('id');
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.requestproduct.show', ':id') }}".replace(':id', requestproduct),
                    success: function(resp) {
                        $("#ViewData").html(resp);
                    },
                    error: function(error) {}
                })

            });
        });
    </script>
@endpush --}}
