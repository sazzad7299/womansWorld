@extends('backend.layouts.app')
@push('css')
@endpush
@section('title', 'Settings')
@section('content')
    <div class="page-content">
        <div id="accordion">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#payOption"
                            aria-expanded="false" aria-controls="payOption">
                            Pay Options
                        </button>
                        <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#shipping"
                            aria-expanded="false" aria-controls="shipping">
                            Shipping Method
                        </button>
                        <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#webinfo"
                            aria-expanded="false" aria-controls="webinfo" id="getwebinfo">
                            Website info
                        </button>
                        <button class="btn btn-primary  collapsed" data-toggle="collapse" data-target="#others"
                            aria-expanded="false" aria-controls="others">
                            Others
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="payOption" class="collapse show" aria-labelledby="payOption" data-parent="#accordion">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">{{ __('All Payment Options') }}</h6>
                                <a class="btn btn-outline-primary text-end" data-toggle="modal" data-target="#create"
                                href="" id="createPayment">{{ __('New Payment') }}</a>
                            </div>
                            @include('backend.admin.settings._paymentoptions')
                        </div>
                        <div id="shipping" class="collapse" aria-labelledby="shipping" data-parent="#accordion">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">{{ __('All Shipping Options') }}</h6>
                                <a class="btn btn-outline-primary text-end" data-toggle="modal" data-target="#create"
                                href="" id="createShipping">{{ __('New Shipping') }}</a>
                            </div>
                            @include('backend.admin.settings._shipping')
                        </div>
                        {{-- <div id="social" class="collapse" aria-labelledby="social" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div> --}}

                        <div id="webinfo" class="collapse" aria-labelledby="webinfo" data-parent="#accordion">
                            <div class="card-body" id="updateWebinfo">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
{{-- Add PayMent option --}}
<div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true"
    id="create">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="addForm">


        </div>
    </div>
</div>
{{-- Edit Pay option --}}
{{-- Add PayMent option --}}
<div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true" id="edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="edit-formget">

        </div>
    </div>
</div>

@endsection
@push('js')
<script>

        $(document).ready(function() {
            $("#createPayment").click(function(){
                $.ajax({
                    type:'get',
                    url:"{{route('admin.payoptions.create')}}",
                    success:function(resp){
                        $("#addForm").html(resp);
                    }
                });
            });

            $("#createShipping").click(function(){
                $.ajax({
                    type:'get',
                    url:"{{route('admin.shippingoption.create')}}",
                    success:function(resp){
                        $("#addForm").html(resp);
                    }
                });
            });
            $(".edit_payment").click(function() {
                let payoption = $(this).data('id');
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.payoptions.edit', ':id') }}".replace(':id', payoption),
                    success: function(resp) {
                        $("#edit-formget").html(resp);
                    },
                    error: function(error) {}
                })

            });
            $(".edit_shipping").click(function() {
                let shippingoption = $(this).data('id');
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.shippingoption.edit', ':id') }}".replace(':id', shippingoption),
                    success: function(resp) {
                        $("#edit-formget").html(resp);
                    },
                    error: function(error) {}
                })

            });
            $("#getwebinfo").click(function(){
                let webinfo =1;
                $.ajax({
                    type:'get',
                    url: "{{ route('admin.webinfo.edit', ':id') }}".replace(':id', webinfo),
                    success:function(resp){
                        $("#updateWebinfo").html(resp);
                    }
                });
            });
        });
</script>
@endpush
