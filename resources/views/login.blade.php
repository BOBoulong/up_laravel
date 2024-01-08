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
    <main>
        <form
            class="d-flex justify-content-center align-items-center flex-column"
            style="height: 100vh"
            action="{{ route('form.submit') }}" method="post">
            @csrf
            <h1>Login</h1>
            <div class="mb-3 col-3">
                <label for="username" class="form-label">username</label>
                <input type="username" class="form-control" id="username" name="username" placeholder="username">
                <div>
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 col-3">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                <div class="">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </main>
</html>