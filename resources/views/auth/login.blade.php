@extends('layouts.login')
@section('title')
    <center>
        <h1>Selamat Datang Di Website Apotek</h1>
    </center>
@endsection
@section('content')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content" style="padding-top: 40px; padding-bottom: 15px;">
                <div class="signin-image">
                    <figure><img src="{{asset('/images/dokter.jpg')}}" alt="sing up image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Login / Masuk</h2>
                    <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="Email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus/>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required/>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <center>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" style="width: 200px;"/>
                        </div>
                        </center>
                        <a href="{{ route('register') }}" class="signup-image-link">Create an account</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
