@extends('backend.layouts.app')

@section('title', 'All branches')
@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('includes.error')
                @include('includes.message')
                <div class="d-flex justify-content-between">
                    <h6 class="card-title">{{ __('All branches') }}</h6>
                    <a class="btn btn-outline-primary text-end"
                        href="{{route('admin.branches.create')}}">{{ __('New Branch') }}</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-stripe">
                        <thead>
                            <th>SL.</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($branches as $item)
                                <tr>
                                    <td>{{ serialNumber($branches, $loop) }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! Str::limit($item->content, 30, '...') !!}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.branches.edit',$item->id) }}" ><i class="bi bi-pencil-fill"></i></a>

                                        <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delete"
                                            onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                class="bi bi-trash-fill"></i></a>
                                        <form action="{{ route('admin.branches.destroy', [$item->id]) }}" method="post"
                                            style="display: none;" id="delete-form-{{ $item->id }}">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Branch Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $branches->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
