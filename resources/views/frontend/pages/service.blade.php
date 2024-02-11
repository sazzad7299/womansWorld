@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/service.css')}}">

@endpush
@section('frontend-content')
<!-- Body Treatment Start  -->
<div class="body-treatment-section tm-padding-section">
    <div class="container">
        @foreach ($services as $service)
        <div class="row @if ($loop->iteration % 2 == 0) flex-row-reverse @endif body-treatment-inner mb-5">
            <div class="col-lg-6 treatment-img">
                <div class="treatment-bg-img">
                    <img src="{{ asset('public/frontend/assets/images/services/bg.png')}}" alt="">
                </div>
                <div class="item-image">
                        <div class="tm-blog-imageslider">
                            @foreach ($service->photos as $photo)
                                <img src="{{ asset($photo->photo)}}" alt="blog image">
                            @endforeach
                        </div>
                </div>
            </div>
            <div class="col-lg-6 treatment-content">
                <h2>{{ $service->name }}</h2>
                <p> {!! $service->description !!}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Body Treatment Start  -->
@endsection
