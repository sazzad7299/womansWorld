@extends('backend.layouts.app')

@section('title', 'Brand')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">{{ __('Brand') }}</h6>
                            <a class="btn btn-outline-primary text-end" data-toggle="modal" data-target="#create"
                                href="">{{ __('New Brand') }}</a>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">{{ __('Sl') }}</th>
                                        <th width="25%">{{ __('Name') }}</th>
                                        <th width="25%">{{ __('Slug') }}</th>
                                        <th width="20%">{{ __('Logo') }}</th>
                                        <th width="10%">{{ __('Status') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td class="py-1">
                                                <img src="{{ asset($item->logo) }}" alt="image">
                                            </td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-outline-danger"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.brands.destroy', [$item->id]) }}"
                                                    method="post" style="display: none;"
                                                    id="delete-form-{{ $item->id }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel"
                            aria-hidden="true" id="create">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{ __('New Brand') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="POST"
                                            action="{{ route('admin.brands.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row col-md-12 mb-3">
                                                <div class="form-group col-md-4">
                                                    <label class="form-label">{{ __('Name') }}</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ __('Name') }}" autocomplete="off" name="name"
                                                        value="{{ old('name') }}" required="" id="name" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label">{{ __('Slug') }}</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ __('Slug') }}" autocomplete="off" name="slug"
                                                        value="{{ old('slug') }}" required="" id="slug" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-label">{{ __('Status') }}</label>
                                                    <select class="form-select" data-width="100%" name="status"
                                                        id="status">
                                                        <option value="">{{ __('Status') }}</option>
                                                        <option value="0">
                                                            Inactive</option>
                                                        <option value="1" selected>
                                                            Active</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3 d-flex justify-content-center">
                                                <div class="card" style="margin-top: 28px">
                                                    <div class="card-body">
                                                        <center>
                                                            <img src="//placehold.it/100x100" id="brand-logo">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        function readPicture(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#brand-logo')
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
                    $('#brand2-logo')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#name").keyup(function() {
            var name = $("#name").val();
            var slug = (name.replace(/[^a-zA-Z0-9]+/g, '-')).toLowerCase();
            $("#slug").val(slug);
        });
    </script>
@endsection
