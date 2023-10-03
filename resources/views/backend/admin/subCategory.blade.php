@extends('backend.layouts.app')

@section('title', 'Sub Category')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <h6 class="card-title">{{ __('Sub Category') }}</h6>
                        @if (isset($subCategory))
                            <form class="forms-sample" method="POST" action="{{ route('admin.sub-categories.update', $subCategory->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Name') }}"
                                            autocomplete="off" name="name" value="{{ $subCategory->name }}" required="" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Category') }}</label>
                                        <select class="js-example-basic-single form-select" data-width="100%"
                                            name="category_id">
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" @if ($subCategory->category_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <center>
                                            <button type="reset" class="btn btn-outline-danger">{{ __('Reset') }}</button>
                                            <button type="submit"
                                                class="btn btn-outline-primary">{{ __('Update') }}</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form class="forms-sample" method="POST" action="{{ route('admin.sub-categories.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Name') }}"
                                            autocomplete="off" name="name" value="{{ old('name') }}" required="" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Category') }}</label>
                                        <select class="js-example-basic-single form-select" data-width="100%"
                                            name="category_id">
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" @if (old('category_id') == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->name }}</option>
                                            @endforeach

                                        </select>
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
                        @endif

                        <br />
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">{{ __('Sl') }}</th>
                                        <th width="40%">{{ __('Subcategory') }}</th>
                                        <th width="40%">{{ __('Category') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subCategories as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->category }}</td>
                                            <td>
                                                <a href="{{ route('admin.sub-categories.edit', $item->id) }}"
                                                    class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>

                                                <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.sub-categories.destroy', [$item->id]) }}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
