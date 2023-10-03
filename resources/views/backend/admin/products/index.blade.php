@extends('backend.layouts.app')

@section('title', 'All Products')
@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('All Products') }}</h6>
                        <a class="btn btn-outline-primary text-end" href="{{ route('admin.products.create') }}"
                            >{{ __('New Product') }}</a>
                       </div>
                        <div class="table-responsive">
                            <table  class="table table-stripe">
                                <thead>
                                    <tr>
                                        <th width="5%">{{ __('Sl') }}</th>
                                        <th width="15%">{{ __('Name') }}</th>
                                        <th width="10%">{{ __('Brand') }}</th>
                                        {{-- <th width="10%">{{ __('Sizes') }}</th>
                                        <th width="10%">{{ __('Colors') }}</th> --}}
                                        <th width="15%">{{ __('Price') }}</th>
                                        <th width="10%">{{ __('Photo') }}</th>
                                        <th width="15%">{{ __('Status') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>{{ serialNumber($products, $loop) }}</td>
                                            <td>{{ Str::limit($item->name, 25) }}</td>

                                            <td>{{ $item->brand->name }}</td>
                                            {{-- <td>
                                                @foreach ($item->size as $s)
                                                    {{ $s->name }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($item->colors as $s)
                                                    {{ $s->name }}
                                                @endforeach
                                            </td> --}}
                                            <td>{{ $item->price }}</td>
                                            <td class="py-1">
                                                <img src="{{ asset($item->display) }}" alt="image">
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    {!! $item->product_status !!}
                                                    <button class="btn p-0" type="button" id="dropdownMenuButton3"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">

                                                        <i class="" data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="javascript:;"> <span>Active</span></a>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="javascript:;"> <span>Inactive</span></a>
                                                            <a class="dropdown-item d-flex align-items-center"
                                                            href="javascript:;"> <span>Pending</span></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>

                                                <a href="" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.products.destroy', [$item->id]) }}"
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
                            <div class="d-flex justify-content-center">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
