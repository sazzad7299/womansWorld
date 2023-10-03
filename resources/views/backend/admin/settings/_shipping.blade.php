@include('includes.error')
<div class="card-body">
    <table class="table">
        <thead>
            <th>Sl:</th>
            <th>Title</th>
            <th>Details</th>
            <th>Cost</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse ($shippinoption as $item)
            <tr>
                <td>{{ serialNumber($shippinoption, $loop) }}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->details}}</td>
                <td>{{$item->cost}}</td>
                <td>{{$item->status == 1 ? "Active": "Inactive"}}</td>
                <td>
                    <a class="btn btn-outline-primary text-end edit_shipping" data-toggle="modal" data-target="#edit"
                         href="javascript:void(0)" data-id="{{ $item->id }}"><i data-feather="edit"></i></a>
                    <a href="" class="btn btn-sm btn-outline-danger"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                        onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                            data-feather="x-square"></i></a>
                    <form action="{{ route('admin.shippingoption.destroy', [$item->id]) }}"
                        method="post" style="display: none;"
                        id="delete-form-{{ $item->id }}">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-5 text-danger">No Shipping Option added</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$shippinoption->links()}}

</div>

