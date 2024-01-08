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
    {{ Form::model($order , array('route' => array('order.update', $order->id), 'method'=>'PUT')) }}
    {!! Form::label('Quantity', 'Quantity:') !!}
    {!! Form::text('quantity',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('customer_id', 'Customer:') !!}
    {!! Form::select('customer_id', $customers, $order->customer_id ,array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('product_id', 'Product:') !!}
    {!! Form::select('product_id', $products, $order->product_id ,array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    <a class="btn btn-secondary" href="{{route('order.list')}}">Back</a>
    {!! Form::close() !!}
@endsection
