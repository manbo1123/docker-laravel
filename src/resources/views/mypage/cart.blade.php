@extends('layout')

@section('content')
    <cart-component 
        :cart-items='@json($cart)' 
    ></cart-component>
@endsection