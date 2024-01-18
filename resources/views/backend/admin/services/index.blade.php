@extends('backend.layouts.app')

@section('title', 'All Services')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-3 col-xl-2">
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                            class="bi bi-plus-square-fill"></i>Add Service</a>
                </div>
                <div class="col-lg-9 col-xl-10">
                    <form class="float-lg-end">
                        <div class="row row-cols-lg-auto g-2">
                            <div class="col-12">
                                <a href="javascript:;" class="btn btn-light mb-3 mb-lg-0"><i
                                        class="bi bi-download"></i>Export</a>
                            </div>
                            {{-- <div class="col-12">
                                <a href="javascript:;" class="btn btn-light mb-3 mb-lg-0"><i
                                        class="bi bi-upload"></i>Import</a>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
      
    </div>
@endsection
