<!DOCTYPE html>
<html lang="en">


<!-- CSS Files -->
{{-- <link rel="stylesheet" href="{{ asset('atlantis/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('atlantis/assets/css/atlantis.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('atlantis/assets/cssaja.css') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Sign In </h2>


            <!-- Icon -->


            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>id kamu salah</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="password" id="password" class="fadeIn third" name="password"
                            placeholder="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>password kamu salah juga beb</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="submit" class="fadeIn fourth" value="Log In">

                    </div>
                </div>



            </form>



        </div>
    </div>

</body>

</html>
