@extends('layout.backend')
@section('content')
@if(Session::has('product_delete'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('product_delete') !!}
                </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>All Products</h1>
                        <h3><a class="btn btn-primary" href= "{{url('product/create')}}" style="padding-top: 5px">Create New</a></h3>
                    </div>
                    @if (count($products) > 0)

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
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
                                    <td><a class="btn btn-primary" href="{!! url('product/' . $product->id . '/edit') !!}">Edit</a></td>

                                    <td>
                                        {{ Html::form('DELETE','/product/'. $product->id)->open()}}
                        <button class="btn btn-danger delete">Delete</button>
                        {{ Html::form()->close() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                </div>
                <script>
                    $(".delete").click(function() {
                        var form = $(this).closest('form');
                        $('<div></div>').appendTo('body')
                            .html('<div><h6> Are you sure ?</h6></div>')
                            .dialog({
                                modal: true,
                                title: 'Delete message',
                                zIndex: 10000,
                                autoOpen: true,
                                width: 'auto',
                                resizable: false,
                                buttons: {
                                    Yes: function() {
                                        $(this).dialog('close');
                                        form.submit();
                                    },
                                    No: function() {
                                        $(this).dialog("close");
                                        return false;
                                    }
                                },
                                close: function(event, ui) {
                                    $(this).remove();
                                }
                            });
                        return false;
                    });
                </script>
                @endsection
