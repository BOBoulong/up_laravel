@extends('layout.backend')

@section('content')
    @if(Session::has('product_update'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('product_update') !!}
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
    {{ Form::model($product , array('route' => array('product.update', $product->id), 'method'=>'PUT')) }}
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name',null, array('class'=>'form-control')) !!}
    <br>
    <!-- {!! $product->category_id !!}
    {!! json_encode($categories) !!} -->
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, $product->category_id ,array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description',null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
    <a class="btn btn-secondary" href="{{route('category.list')}}">Back</a>
    {!! Form::close() !!}
@endsection
