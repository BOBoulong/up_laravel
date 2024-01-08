@extends('layout.backend')

@section('content')
    <h1>Create customer</h1>
    @if(Session::has('category_create'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('customer_create') !!}
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
    {!! Form::open(['url' => 'customer']) !!}
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', '',array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('mobile_number', 'Mobile number: ') !!}
    {!! Form::text('mobile_number', '',array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Create',array('class'=> 'btn btn-primary')) !!}
    <a class="btn btn-secondary" href="{{route('customer.list')}}">Back</a>
    {!! Form::close() !!}
@endsection
