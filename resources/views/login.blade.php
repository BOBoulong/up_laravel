<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>UP Shop</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    </head>
    @if(Session::has('failed_login'))
        <div class="alert alert-danger alert-dismissible position-fixed top-0" style="top: 0px; right: 0px">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             {!! session('failed_login') !!}
        </div>
    @endif
    <main class="d-flex justify-content-center align-items-center" style="height: 100vh">
        {!! Form::open(['url' => '/', 'class' => 'w-25', ]) !!}
        {!! Form::label('email', 'Email: ') !!}
        {!! Form::text('email', '',array('class'=>'form-control')) !!}
        <br>
        {!! Form::label('password', 'Password: ') !!}
        {!! Form::password('password',array('class'=>'form-control')) !!}
        <br class="mt-1">
        {!! Form::submit('Login',array('class'=> 'btn btn-primary')) !!}
    </main>
</html>