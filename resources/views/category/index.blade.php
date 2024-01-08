@extends('layout.backend')
@section('content')
@if(Session::has('category_delete'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('category_delete') !!}
    </div>
@endif
<h1>Category</h1>
<h3><a class="btn btn-primary" href= "{{url('category/create')}}" style="padding-top: 5px">Create New</a></h3>
@if (count($categories) > 0)
    <table  class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Detail</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>
                    {!! $category->id !!}
                </td>
                <td>
                    {!! $category->name !!}
                </td>
                <th><a class="btn btn-primary" href="{!! url('/category/' . $category->id . '/') !!}">Detail</a></th>
                <td><a class="btn btn-primary" href="{!! url('category/' . $category->id . '/edit') !!}">Edit</a></td>
                <td>
                    {!! Form::open(array('url'=>'category/'. $category->id, 'method'=>'DELETE')) !!}
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
