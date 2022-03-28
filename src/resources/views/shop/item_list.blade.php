@extends('layout')

@section('content')
    <shop-item-list-component 
        :parent-cat='@json($parent_cat)' 
        :shop='@json($shop)' 
        :items='@json($items)' 
    ></shop-item-list-component>
@endsection