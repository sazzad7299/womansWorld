@extends('backend.layouts.app')

@section('title', 'All Products')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-3 col-xl-2">
                    <a href="{{route('admin.products.create')}}" class="btn btn-primary mb-3 mb-lg-0"><i class="bi bi-plus-square-fill"></i>Add
                        Product</a>
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
        <div class="card-header py-3">
            <div class="row g-3 align-items-center">
                <div class="col-lg-3 col-md-6 me-auto">
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-search"></i>
                        </div>
                        <input class="form-control ps-5" type="text" placeholder="search produts">
                    </div>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>All category</option>
                        <option>W.W Professional</option>
                        <option>W.W Cosmetics</option>
                        <option>Kona Cosmetics</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Latest added</option>
                        <option>Cheap first</option>
                        <option>Most viewed</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="product-grid">
                <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-3">
                    @foreach ($products as $item)
                        <div class="col">
                            <div class="card border shadow-none mb-0">
                                <div class="card-body text-center">
                                    <img src="{{ asset($item->display) }}" class="img-fluid mb-3" alt="" />
                                    <h6 class="product-title">{{ Str::limit($item->name, 25) }}</h6>
                                    <p class="product-price fs-5 mb-1"><span class="currency_symbol">৳</span>
                                        <span>{{ $item->price }}</span></p>
                                    <div class="rating mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-secondary"></i>
                                    </div>
                                    <small>55 Reviews</small>
                                    <div class="actions d-flex align-items-center justify-content-center gap-2 mt-3">
                                        <a href="{{ route('admin.products.edit', [$item->id]) }}"
                                            class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-fill"></i>
                                            Edit</a>
                                        <a href="javascript:;" class="btn btn-sm btn-outline-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                            onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                class="bi bi-trash-fill"></i>Delete</a>
                                        <form action="{{ route('admin.products.destroy', [$item->id]) }}" method="post"
                                            style="display: none;" id="delete-form-{{ $item->id }}">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div><!--end row-->
            </div>
            <nav class="float-end mt-4" aria-label="Page navigation">
                {{ $products->links() }}
            </nav>

        </div>
    </div>
@endsection
