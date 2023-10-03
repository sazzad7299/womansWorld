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
                            <h6 class="card-title">{{ __('View Request') }}</h6>
                            <a href="{{route('admin.requestproduct.index')}}" class="btn btn-outline-primary text-end"
                                href="">{{ __('All Request') }}</a>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <h4>Customer:{{$requestproduct->user->name}}</h4>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h4>Email: {{$requestproduct->user->email}}</h4>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h4>Phone: {{$requestproduct->user->phone}}</h4>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h4>Address: {{$requestproduct->user->address}}</h4>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h4>Product Name: {{$requestproduct->name}}</h4>
                            </div>
                            <div class="col-md-6 mt-2">
                                <h4>Buying Quantity: {{$requestproduct->quantity}}</h4>
                            </div>
                            <div class="col-md-12 mt-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, veritatis fugit ut sequi reprehenderit vitae distinctio facilis tempore expedita impedit consectetur ipsa mollitia sapiente cumque ea cupiditate. Quibusdam, suscipit corporis?</p>
                            </div>
                            @if($requestproduct->image != null)
                            <div class="col-md-12 mt-2 justify-content-center">
                                <img class="img-fluid" src="{{asset($requestproduct->image)}}" alt="" style="width: 50%;">

                            </div>
                            @endif

                        </div>
                    </div>
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




