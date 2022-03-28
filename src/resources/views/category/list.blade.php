@extends('layout')

@section('content')
    <category-list-component :categories='@json($categories)'></category-list-component>
@endsection