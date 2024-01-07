@extends('layout.backend')

@section('content')
    @if(Session::has('category_update'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('category_update') !!}
    </div>
    @endif
    @if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Something is Wrong</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{ Form::model($category , array('route' => array('category.update', $category->id), 'method'=>'PUT')) }}
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    <a class="btn btn-secondary" href="{{route('category.list')}}">Back</a>
    {!! Form::close() !!}
@endsection
