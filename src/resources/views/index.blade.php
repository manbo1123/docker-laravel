@extends('layout')

@section('content')
    <wide-carousel-component></wide-carousel-component>

    <item-list-component 
        :parent-cat='@json($parent_cat)' 
        :shop-items='@json($shop_items)' 
    ></item-list-component>
@endsection