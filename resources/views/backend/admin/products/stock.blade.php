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
                                        <th width="10%">{{ __('Stock') }}</th>
                                        <th width="15%">{{ __('Price') }}</th>
                                        <th width="10%">{{ __('Photo') }}</th>
                                        <th width="15%">{{ __('Status') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $item)
                                        <tr>
                                            <td>{{ serialNumber($products, $loop) }}</td>
                                            <td>{{ Str::limit($item->name, 25) }}</td>
                                            <td>{{ $item->stock }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td class="py-1">
                                                <img src="{{ asset($item->display) }}" alt="image">
                                            </td>
                                            <td>
                                                {!! $item->product_status !!}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-success">All products stock more then 20</td>
                                        </tr>
                                    @endforelse
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
