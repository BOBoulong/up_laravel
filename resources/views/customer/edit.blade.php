@extends('layout.backend')

@section('content')
    @if(Session::has('customer_update'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('customer_update') !!}
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
    {{ Form::model($customer , array('route' => array('customer.update', $customer->id), 'method'=>'PUT')) }}
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('mobile_number', 'Mobile Number:') !!}
    {!! Form::textarea('mobile_number',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    <a class="btn btn-secondary" href="{{route('customer.list')}}">Back</a>
    {!! Form::close() !!}
@endsection
