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
                        <h1>All Users</h1>
                        <h3><a class="btn btn-primary" href= "{{url('user/create')}}" style="padding-top: 5px">Create New</a></h3>
                    </div>
                    @if (count($users) > 0)

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th><div>{!! $user->id !!}</div></th>
                                    <td>
                                        <div>{!! $user->name !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $user->description !!}</div>
                                    </td>
                                    <td>
                                        <div>{{ Html::img('img/'.$user->image, $user->name) }}</div>
                                    </td>
                                    <td>
                                        <div>{!! $user->price !!}</div>
                                    </td>

                                    <td><a class="btn btn-primary" href="{!! url('user/' . $user->id . '/edit') !!}">Edit</a></td>

                                    <td>
                                        {{ Html::form('DELETE','/user/'. $user->id)->open()}}
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
