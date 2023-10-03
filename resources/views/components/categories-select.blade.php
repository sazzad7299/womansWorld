

@foreach ($categories as $category)
<div class="{{ $category->isChild() ? 'ml-16' : null }}">
        <x-category-option :category="$category" />
</div>
@endforeach
