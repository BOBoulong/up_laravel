@extends('layout.backend')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <!-- @if(Session::has('product_create'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('product_create') !!}
                </div>
                @endif -->
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
                <!-- It Create the new Category -->
                {!! Html::form('POST','/order')->open() !!}

                {!! Html::label('Quantity:','quantity') !!}
                {!! Html::input('text','quantity', '')->class('form-control')  !!}
                <br>
                {!! Html::label('Category:','product_id') !!}
                {!! Html::select('product_id',$products,null)->class('form-control') !!}
                <br>
                {!! Html::label('Customer:','customer_id') !!}
                {!! Html::select('customer_id',$customers,null)->class('form-control') !!}
                <br>
                {{ Html::submit('Create')->class('btn btn-primary') }}

                <a class="btn btn-primary" href="{{route('order.list')}}">Back</a>

                {{ Html::form()->close() }}

            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
        </div>
    </div>
</main>
@endsection
