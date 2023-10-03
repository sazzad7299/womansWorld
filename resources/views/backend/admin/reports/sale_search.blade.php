@extends('backend.layouts.app')
@section('title', 'Order Details')
@push('css')
@endpush

@section('title', 'Sale Report')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <form action="{{route('admin.report.sale')}}" method="get" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label" for="payment_status">{{ __('From Date (Sale)') }}</label>
                                    <input type="date" name="from_date" class="form-control dateInput">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="discount_type">{{ __('End Date (Sale)') }}</label>
                                        <input type="date"  name="to_date" class="form-control dateInput">
                                    </div>
                                    <div class="col-md-4">

                                        <button type="submit" class="btn btn-primary mt-4 px-2"><i data-feather="settings"
                                            class="mr-3 icon-md"></i>Generate Report</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    // $(document).ready(function() {
    //     $(".dateInput").datepicker({
    //   });
    // });
</script>
@endpush
