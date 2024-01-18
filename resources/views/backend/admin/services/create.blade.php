@extends('backend.layouts.app')
@section('title', 'New Service')
@section('content')
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-2">
                            <h5>Add Service</h5>
                        </div>
                        <div class="col-lg-9 col-xl-10">
                            <a href="{{route('admin.services.index')}}" class="btn btn-primary mb-3 mb-lg-0  float-lg-end"><i class="bi bi-file-fill"></i>Service List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        @include('includes.message')
                        <form class="forms-sample" method="POST" action="{{ route('admin.services.store') }}"
                        enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Name') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Name') }}"
                                                autocomplete="off" name="name" value="{{ old('name') }}" required=""
                                                id="name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Slug') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Slug') }}"
                                                autocomplete="off" name="slug" value="{{ old('slug') }}" required=""
                                                id="slug" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Category') }}</label>
                                            <select name="category_id"  id="category_id"
                                            required="" class="js-example-basic-single form-select" data-width="100%">
                                            <option value=""> Select Category</option>
                                                @foreach ($indentedCategories as $categoryId => $categoryName)
                                                    <option value="{{ $categoryId }}" >{{ html_entity_decode($categoryName) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">{{ __('Description') }}</label>
                                            <textarea id="editor" name="description" />{{ old('description') }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card" style="margin-top: 28px">
                                        <div class="card-header">{{ __('Services Photo') }}</div>
                                        <div class="card-body">
                                            <center>
                                                <img src="//placehold.it/100x100">
                                                <p class="card-text mb-3" style="color: red">
                                                    {{ __('Photo Max Size 600px') }}</p>
                                                <input type="file" name="photo[]" multiple="">
                                            </center>
                                        </div>
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
