
 <tr>
    <td @if($category->isChild())
        class="ml-16"
        @endif >{{ $category->id }}</td>
    <td>{{ $category->name }}</td>
    <td>{{ $category->slug }}</td>
    <td>{{ $parent_category  = $category->isChild() ?  App\Models\Category::hello($category->parent_id) : 'Main Category'  }}</td>
    <td class="py-1">
        <img src="{{ asset($category->logo) }}" alt="image">
    </td>
    <td>{{ $category->status =='1' ? 'Active':'Inactive' }}</td>
    <td>
        <a href="" class="btn btn-sm btn-outline-primary"
            data-toggle="modal" data-target="#edit" data-toggle="tooltip"
            data-placement="top" title="Edit" data-id="{{ $category->id }}"
            data-slug="{{ $category->slug }}" data-name="{{ $category->name }}"
            data-categoryid="{{ $category->parent_id }}" data-categoryname="{{ $category->isChild() ? $parent_category :'' }}" data-categorylogo="{{$category->logo}}"><i
                data-feather="edit"></i></a>

        <a href="" class="btn btn-sm btn-outline-danger"
            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
            onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $category->id }}').submit(); } else { event.preventDefault(); }"><i
                data-feather="x-square"></i></a>
        <form action="{{ route('admin.categories.destroy', [$category->id]) }}"
            method="post" style="display: none;"
            id="delete-form-{{ $category->id }}">
            @csrf
            {{ method_field('DELETE') }}
        </form>
    </td>
</tr>
<x-categories :categories="$category->children" />
