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
                    <h6 class="card-title">{{ __('All Reviews') }}</h6>
                    {{-- <a class="btn btn-outline-primary text-end" data-toggle="modal" data-target="#create"
                        href="">{{ __('New Coupon') }}</a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table table-stripe">
                        <thead>
                            <th>SL.</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Message</th>
                            <th>Review</th>
                        </thead>
                        <tbody>
                            @forelse ($reviews as $item)
                                <tr>
                                    <td>{{ serialNumber($reviews, $loop) }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{  $item->product->name }}</td>
                                    <td>{{ $item->body }}</td>
                                    <td >
                                        {{$item->rating}}
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
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

@endpush
