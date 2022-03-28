@extends('layout')

@section('content')
    <item-detail-component :shop-item='@json($shop_item)'></item-detail-component>
@endsection