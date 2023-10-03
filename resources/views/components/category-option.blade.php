<option value="{{$category->id}}" class="form-controll" @if($category->isChild()) style="padding-left:20px" @endif >@if($category->isChild())<span class="ml-16">--</span> @endif{{$category->name}}</option>
<x-categories-select :categories="$category->children" />
