@extends('layout')

@section('content')
    @if ($errors->any())
        <div class="m-0 alert alert-danger">
            <ul class=m-0>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <item-post-component :parent-cat='@json($parent_cat)'></item-post-component>
@endsection