@props(['categories'])

@foreach ($categories as $category)
    <li class=" @if($category->children->isNotEmpty()) tm-header-nav-dropdown @endif">
        <a href="@if($category->type ==1){{ route('shop.category',$category->slug)}} @elseif($category->type ==2) {{ route('service',$category->slug)}} @elseif($category->type ==3) {{ route('blog',$category->slug)}} @endif">{{ $category->name }}</a>
        @if ($category->children->isNotEmpty())
            <ul>
                <x-category-menu :categories="$category->children" />
            </ul>
        @endif
    </li>
@endforeach
{{-- @if($category->children->isNotEmpty() && $category->parent_id === null){{ route('service')}} @endif --}}
