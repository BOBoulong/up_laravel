@extends('layout.backend')
@section('content')
@if(Session::has('customer_delete'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('customer_delete') !!}
    </div>
@endif
<h1>All Customers</h1>
<h3><a class="btn btn-primary" href= "{{url('customer/create')}}" style="padding-top: 5px">Create New</a></h3>
@if (count($customers) > 0)
    <table  class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>
                    {!! $customer->id !!}
                </td>
                <td>
                    {!! $customer->name !!}
                </td>
                <td>{!! $customer->mobile_number !!}</td>
                <td><a class="btn btn-primary" href="{!! url('customer/' . $customer->id . '/edit') !!}">Edit</a></td>
                <td>
                    {!! Form::open(array('url'=>'customer/'. $customer->id, 'method'=>'DELETE')) !!}
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
