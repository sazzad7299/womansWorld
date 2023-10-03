@extends('backend.layouts.app')

@section('title', 'New Product')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">{{ __('New Product') }}</h6>
                            <a class="btn btn-outline-primary text-end"
                                href="{{ route('admin.products.index') }}">{{ __('All Product') }}</a>
                        </div>
                        <form class="forms-sample" method="POST" action="{{ route('admin.products.store') }}"
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
                                    {{-- <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Size') }}</label>
                                            <select class="js-example-basic-multiple form-select" data-width="100%"
                                                multiple="" name="sizes[]" id="sizes">
                                                @foreach ($sizes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Color') }}</label>
                                            <select class="js-example-basic-multiple form-select" data-width="100%"
                                                multiple="" name="colors[]" id="colors">
                                                @foreach ($colors as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
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
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Brand') }}</label>
                                            <select class="js-example-basic-single form-select" data-width="100%"
                                                name="brand_id" id="brand_id">
                                                <option value="">{{ __('Select Brand') }}</option>
                                                @foreach ($brands as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class="col-md-4">
                                            <label class="form-label">{{ __('Sell Price') }}</label>
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('Current Price') }}" autocomplete="off" name="price"
                                                value="{{ old('price') }}" required="" id="price" />
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">{{ __('Purchase Price') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Purchase Price') }}"
                                                autocomplete="off" required name="old_price" value="{{ old('old_price') }}"
                                                id="old_price" />
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="stock">{{ __('Quantity') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Quantity') }}"
                                                autocomplete="off" required name="stock" value="{{ old('discount') }}"
                                                id="stock" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label"
                                                for="discount_type">{{ __('Discount Type') }}</label>
                                            <select name="discount_type" id="discount_type" class="form-control">
                                                <option value="" selected>Discount Type</option>
                                                <option value="2">Percent</option>
                                                <option value="1">Regular</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="discount">{{ __('Discount') }}</label>
                                            <input type="number" class="form-control"
                                                placeholder="{{ __('Discount') }}" autocomplete="off" name="discount"
                                                value="{{ old('discount') }}" id="discount" />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">{{ __('Status') }}</label>
                                            <select class="js-example-basic-single form-select" data-width="100%"
                                                name="status" id="status">
                                                <option value="">{{ __('Status') }}</option>
                                                @foreach (getStatus() as $status)
                                                    <option value="{{ $status['value'] }}" {{$status['value'] ==1 ? 'selected':''}}>{{ $status['label'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">{{ __('Tags') }}</label>
                                            <textarea class="form-control" placeholder="{{ __('Tags') }}" autocomplete="off" name="tags"
                                                rows="3" />{{ old('tags') }}</textarea>
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
                                        <div class="card-header">{{ __('Extra') }}</div>
                                        <div class="card-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="featured">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  Featured
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="p_set">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                  Perfume Set
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="new">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                  New Arrival
                                                </label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="card" style="margin-top: 28px">
                                        <div class="card-header">{{ __('Display Photo') }}</div>
                                        <div class="card-body">
                                            <center>
                                                <img src="//placehold.it/100x100" id="product-photo">
                                                <p class="card-text mb-3" style="color: red">
                                                    {{ __('Photo Max Size 100px') }}</p>
                                                <input type="file" name="display" onchange="readPicture(this)">
                                            </center>
                                        </div>
                                    </div>
                                    <div class="card" style="margin-top: 28px">
                                        <div class="card-header">{{ __('More Photo') }}</div>
                                        <div class="card-body">
                                            <center>
                                                <img src="//placehold.it/100x100">
                                                <p class="card-text mb-3" style="color: red">
                                                    {{ __('Photo Max Size 100px') }}</p>
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
    </div>
@endsection

@section('footer')
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
@endsection
