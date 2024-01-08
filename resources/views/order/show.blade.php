@extends('layout.backend')

@section('content')
    <h1>Category details</h1>
    <p>name: {{$category->name}}</p>
    <p>description: {{$category->description}}</p>
    <a class="btn btn-secondary" href="{{route('category.list')}}">Back</a>
@endsection
