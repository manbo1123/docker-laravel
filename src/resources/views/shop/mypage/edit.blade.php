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

    <shop-edit-component 
        :shop='@json($shop)'
        :holiday='@json($holiday)'
    ></shop-edit-component>
@endsection