@foreach ($categories as $category)
    <div class="{{ $category->isChild() ? 'ml-16' : null }}">
        <x-category :category="$category" :model="$model" />
    </div>
@endforeach
