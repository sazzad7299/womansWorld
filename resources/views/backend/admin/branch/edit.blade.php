@extends('backend.layouts.app')
@section('title', 'Edit Branch')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-3 col-xl-2">
                    <h5>Edit Branch</h5>
                </div>
                <div class="col-lg-9 col-xl-10">
                    <a href="{{route('admin.branches.index')}}" class="btn btn-primary mb-3 mb-lg-0  float-lg-end"><i class="bi bi-file-fill"></i>Branch List</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                @include('includes.error')
                @include('includes.message')
                <form class="forms-sample"
                    enctype="multipart/form-data" action="{{route('admin.branches.update',$branch->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <label class="form-label">{{ __('Title') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('title') }}"
                                    autocomplete="off" name="title" value="{{ old('title',$branch->title) }}" required=""
                                    id="name" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">{{ __('Content') }}</label>
                                <textarea name="content"   rows="8" class="form-control">{{ old('content',$branch->content) }}</textarea>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <center>
                                <button type="submit"
                                    class="btn btn-outline-primary">{{ __('Update') }}</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
    <script>
        $(function() {
            CKEDITOR.replace('editor')
        });
    </script>
@endpush
