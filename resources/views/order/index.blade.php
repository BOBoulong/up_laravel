@extends('layout.backend')
@section('content')
@if(Session::has('order_delete'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('order_delete') !!}
    </div>
@endif
<h1>All Orders</h1>
<h3><a class="btn btn-primary" href= "{{url('order/create')}}" style="padding-top: 5px">Create New</a></h3>
@if (count($orders) > 0)
    <table  class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Quantity</th>
            <th>Customer Name</th>
            <th>Product Name</th>
            <th>Total Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <!-- {!! json_encode($orders) !!}
        {!! json_encode($customers) !!} -->
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>
                    {!! $order->id !!}
                </td>
                <td>
                    {!! $order->quantity !!}
                </td>
                <td>
                    {!! $customers[$order->customer_id] !!}
                </td>
                <td>
                    {!! $products[$order->product_id]['name'] !!}
                </td>
                <td>
                    {!! $order->quantity * $products[$order->product_id]['price'] !!}
                </td>
                <td><a class="btn btn-primary" href="{!! url('order/' . $order->id . '/edit') !!}">Edit</a></td>
                <td>
                    {!! Form::open(array('url'=>'order/'. $order->id, 'method'=>'DELETE')) !!}
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button class="btn btn-danger delete">Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
@endif
@endsection
