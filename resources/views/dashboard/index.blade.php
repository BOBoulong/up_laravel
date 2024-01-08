@extends('layout.backend')
@section('content')
<h1 class="mb-4">Dashboard</h1>
<div class="row m-0 justify-content-between">
    <div class="card col-sm-6 col-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Product</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores quidem molestiae ipsum eius eveniet vel</p>
            <a href="/product/create" class="btn btn-primary">Create Product</a>
        </div>
    </div>
    <div class="card col-sm-6 col-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Category</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores quidem molestiae ipsum eius eveniet vel</p>
            <a href="/category/create" class="btn btn-primary">Create Category</a>
        </div>
    </div>
    <div class="card col-sm-6 col-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Customer</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores quidem molestiae ipsum eius eveniet vel</p>
            <a href="customer/create" class="btn btn-primary">Create Customer</a>
        </div>
    </div>
    <div class="card col-sm-6 col-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Order</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores quidem molestiae ipsum eius eveniet vel</p>
            <a href="order/create" class="btn btn-primary">Create Order</a>
        </div>
    </div>
</div>
<div class="panel panel-default my-4">
    <div class="panel-heading">
        <h1>All Products</h1>
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th><div>{!! $product->id !!}</div></th>
                    <td>
                        <div>{!! $product->name !!}</div>
                    </td>
                    <td>
                        <div>{!! $product->description !!}</div>
                    </td>
                    <td>
                        <div>{!! $product->price !!}</div>
                    </td>
                    <td>
                        <div>{!! $categories[$product->category_id] !!}</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
