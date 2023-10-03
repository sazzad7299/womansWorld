@extends('backend.layouts.app')

@section('title', 'All User')
@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('All User') }}</h6>
                        <a class="btn btn-outline-primary float-end" href="{{ route('admin.users.create') }}"
                            >{{ __('New User') }}</a>
                       </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">{{ __('Sl') }}</th>
                                        <th width="15%">{{ __('Name') }}</th>
                                        <th width="15%">{{ __('Email') }}</th>
                                        <th width="10%">{{ __('Phone') }}</th>
                                        <th width="35%">{{ __('Address') }}</th>
                                        <th width="10%">{{ __('Photo') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td class="py-1">
                                                <img src="{{ asset($item->photo) }}" alt="image">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>

                                                <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.users.destroy', [$item->id]) }}"
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
