@extends('layout')

@section('content')
    <shop-detail-component 
        :parent-cat='@json($parent_cat)' 
        :shop='@json($shop)' 
        :holiday='@json($holiday)' 
    ></shop-detail-component>
@endsection