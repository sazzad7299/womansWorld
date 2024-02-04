@extends('backend.layouts.app')

@section('title', 'All Services')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-3 col-xl-2">
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                            class="bi bi-plus-square-fill"></i>Add Service</a>
                </div>
                <div class="col-lg-9 col-xl-10">
                    <form class="float-lg-end">
                        <div class="row row-cols-lg-auto g-2">
                            <div class="col-12">
                                {{-- <a href="javascript:;" class="btn btn-light mb-3 mb-lg-0"><i
                                        class="bi bi-download"></i>Export</a> --}}
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
        <div class="table-responsive">
            <table class="table table-stripe">
                <thead>
                    <th>SL.</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td>{{ serialNumber($services, $loop) }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->category->name }}</td>
                            <td>{{ $service->status ==1 ? 'Active':'Inactive' }}</td>
                            <td>
                                <a class="btn btn-xs btn-outline-primary p-1" href="{{route('admin.services.edit',$service->id)}}"><i class="bi bi-pencil"></i></a>
                                <a href="" class="btn btn-sm btn-outline-danger"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                        onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $service->id }}').submit(); } else { event.preventDefault(); }"><i
                                        class="bi bi-trash-fill"></i></a>
                                <form action="{{ route('admin.services.destroy', [$service->id]) }}"
                                    method="post" style="display: none;"
                                    id="delete-form-{{ $service->id }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Services Founds</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $services->links() }}
            </div>
        </div>
    </div>
@endsection
