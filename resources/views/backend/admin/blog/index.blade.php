@extends('backend.layouts.app')

@section('title', 'All blogs')
@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('includes.error')
                <div class="d-flex justify-content-between">
                    <h6 class="card-title">{{ __('All blogs') }}</h6>
                    <a class="btn btn-outline-primary text-end"
                        href="{{route('admin.blog.create')}}">{{ __('New Blog') }}</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-stripe">
                        <thead>
                            <th>SL.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Publish Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($blogs as $item)
                                <tr>
                                    <td>{{ serialNumber($blogs, $loop) }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->category_id }}</td>
                                    <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary editcoupon" data-bs-toggle="modal"
                                            data-bs-target="#edit" data-id="{{ $item->id }}"><i class="bi bi-pencil-fill"></i></a>

                                        <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delete"
                                            onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                class="bi bi-trash-fill"></i></a>
                                        <form action="{{ route('admin.blogs.destroy', [$item->id]) }}" method="post"
                                            style="display: none;" id="delete-form-{{ $item->id }}">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Blog Founds</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
