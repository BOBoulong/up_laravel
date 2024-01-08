@extends('layout.backend')

@section('content')
    <h1>Create user</h1>
    @if(Session::has('user_create'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('user_create') !!}
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
    {!! Form::open(['url' => 'user']) !!}
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', '',array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('email', 'Email: ') !!}
    {!! Form::text('email', '',array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('password', 'Password: ') !!}
    {!! Form::text('password', '',array('class'=>'form-control')) !!}
    <br>

    {!! Form::submit('Create',array('class'=> 'btn btn-primary')) !!}
    <a class="btn btn-secondary" href="{{route('user.list')}}">Back</a>
    {!! Form::close() !!}
@endsection
