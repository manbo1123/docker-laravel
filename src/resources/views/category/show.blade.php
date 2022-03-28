@extends('layout')

@section('content')
    <div class="m-4">
        <h2 style="border-bottom: 1px solid gray;">
            @if ($target_cat->icon)
                <img src='{{ "/storage/cat_img/".$target_cat->icon }}' width=35 height=35>
            @endif
            {{ $target_cat->name }}
        </h2>

        <category-items-component 
            :parent-cat='@json($parent_cat)' 
            :items='@json($items)' 
        ></category-items-component>
    </div>
@endsection