@extends('backend.layouts.app')
@push('css')
<style>
    .ml-16{
        margin-left: 16px!important;
    }
</style>
@endpush
@section('title', 'Category')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">{{ __('Category') }}</h6>
                            <a class="btn btn-outline-primary text-end" data-toggle="modal" data-target="#create"
                            href="">{{ __('New Category') }}</a>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">{{ __('Sl') }}</th>
                                        <th width="20%">{{ __('Name') }}</th>
                                        <th width="10%">{{ __('Slug') }}</th>
                                        <th width="10%">{{ __('Parent') }}</th>
                                        <th width="20%">{{ __('logo') }}</th>
                                        <th width="20%">{{ __('Status') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <x-categories :categories="$categories" />


                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel"
                            aria-hidden="true" id="create">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{ __('New Category') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="POST"
                                            action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row col-md-12 mb-3">
                                                <div class="form-group col-md-3">
                                                    <label class="form-label">{{ __('Name') }}</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ __('Name') }}" autocomplete="off" name="name"
                                                        value="{{ old('name') }}" required="" id="name" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="form-label">{{ __('Slug') }}</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ __('Slug') }}" autocomplete="off" name="slug"
                                                        value="{{ old('slug') }}" required="" id="slug" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="form-label">{{ __('Category') }}</label>
                                                    <select class="form-select" data-width="100%" name="parent_id"
                                                        id="category">
                                                        <option value=""> Select Category</option>
                                                        <x-categories-select :categories="$categories" />

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="form-label">{{ __('Status') }}</label>
                                                    <select class="form-select" data-width="100%" name="status"
                                                        id="status">
                                                        <option value="">{{ __('Status') }}</option>
                                                        {{-- @foreach (getStatus() as $status)
                                                            <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
                                                        @endforeach --}}
                                                        <option value="0">
                                                            Inactive</option>
                                                        <option value="1" selected>
                                                            Active</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="card" style="margin-top: 28px">
                                                    <div class="card-body">
                                                        <center>
                                                            <img src="//placehold.it/100x100" id="category-logo">
                                                            <p class="card-text mb-3" style="color: red">
                                                                {{ __('Logo Max Size 100px') }}</p>
                                                            <input type="file" name="logo"
                                                                onchange="readPicture(this)">
                                                        </center>
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
                        <div class="modal fade bd-example-modal-xl" tabindex="-1"
                            aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="edit">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="myExtraLargeModalLabel">
                                            {{ __('Update Category') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="POST" action="#"
                                            enctype="multipart/form-data" id="edit-form">
                                            @csrf
                                            @method('PUT')
                                            <div class="row col-md-12 mb-3">
                                                <div class="form-group col-md-3">
                                                    <label class="form-label">{{ __('Name') }}</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ __('Name') }}" autocomplete="off"
                                                        name="name" value="{{ old('name') }}" required=""
                                                        id="editname" />
                                                    <input type="hidden" name="id" id="id">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="form-label">{{ __('Slug') }}</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ __('Slug') }}" autocomplete="off"
                                                        name="slug" value="{{ old('slug') }}" required=""
                                                        id="editslug" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="form-label">{{ __('Category') }}</label>
                                                    <select class="form-select" data-width="100%" name="category"
                                                        id="editcategory">
                                                        <x-categories-select :categories="$categories" />
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="form-label">{{ __('Status') }}</label>
                                                    <select class="form-select" data-width="100%" name="status"
                                                        id="status">
                                                        <option value="">{{ __('Status') }}</option>
                                                        {{-- @foreach (getStatus() as $status)
                                                    <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
                                                @endforeach --}}
                                                        <option value="0">
                                                            Inactive</option>
                                                        <option value="1" selected>
                                                            Active</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="card" style="margin-top: 28px">
                                                    <div class="card-body">
                                                        <center>
                                                            <img src="//placehold.it/100x100" id="category2-logo">
                                                            <p class="card-text mb-3" style="color: red">
                                                                {{ __('Logo Max Size 100px') }}</p>
                                                            <input type="file" name="logo"
                                                                onchange="readPicture2(this)">
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <center>
                                                        <button type="reset"
                                                            class="btn btn-outline-danger">{{ __('Reset') }}</button>
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

                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @foreach ($categories as $category)
                            <x-category :category="$category" />
                                @foreach ($category->children as $sub)
                                    <x-category :category="$sub" />
                                        @foreach ($sub->children as $child)
                                            <x-category :category="$child" />
                                        @endforeach
                                @endforeach
                        @endforeach
                        <x-categories :categories="$categories" />
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

@section('footer')
    <script>
         function readPicture(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#category-logo')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readPicture2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#category2-logo')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#edit').on("show.bs.modal", function(event) {
            let base_url = '{!! url('/') !!}';
            let e = $(event.relatedTarget);
            let id = e.data('id');
            let name = e.data('name');
            let slug = e.data('slug');
            let logo = e.data('categorylogo');
            let categoryid = e.data('categoryid');
            let categoryname = e.data('categoryname');
            let action = '{{ URL::to('admin/categories/update') }}';

            $("#edit-form").attr('action', action);
            $("#id").val(id);
            $("#editname").val(name);
            $("#editslug").val(slug);
            $('#category2-logo').attr('src', base_url + '/' + logo);
            if (categoryid !='') {
                $("#editcategory").append('<option value="' + categoryid + '" selected>' + categoryname +
                '</option>');
            }

        });
        $("#name").keyup(function() {
            var name = $("#name").val();
            var slug = (name.replace(/[^a-zA-Z0-9]+/g, '-')).toLowerCase();
            $("#slug").val(slug);
        });
        $("#editname").keyup(function() {
            var name = $("#editname").val();
            var slug = (name.replace(/[^a-zA-Z0-9]+/g, '-')).toLowerCase();
            $("#editslug").val(slug);
        });
    </script>
@endsection
