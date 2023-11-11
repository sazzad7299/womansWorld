@extends('backend.layouts.app')
@section('title', 'Create Blog')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-3 col-xl-2">
                    <h5>Add Branch</h5>
                </div>
                <div class="col-lg-9 col-xl-10">
                    <a href="{{route('admin.branchs.index')}}" class="btn btn-primary mb-3 mb-lg-0  float-lg-end"><i class="bi bi-file-fill"></i>Branch List</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                @include('includes.error')
                <form class="forms-sample"
                    enctype="multipart/form-data" action="{{route('admin.branchs.index')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <label class="form-label">{{ __('Title') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('title') }}"
                                    autocomplete="off" name="title" value="{{ old('title') }}" required=""
                                    id="name" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">{{ __('Content') }}</label>
                                <textarea name="content" value="{{ old('content') }}"  rows="8" class="form-control"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <center>
                                <button type="reset"
                                    class="btn btn-outline-danger">{{ __('Reset') }}</button>
                                <button type="submit"
                                    class="btn btn-outline-primary">{{ __('Save') }}</button>
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
        function readPicture(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#product-photo')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            CKEDITOR.replace('editor')
        });

        $("#name").keyup(function() {
            var name = $("#name").val();
            var slug = (name.replace(/[^a-zA-Z0-9]+/g, '-')).toLowerCase();
            $("#slug").val(slug);
        });
    </script>
@endpush
