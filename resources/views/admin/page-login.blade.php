@extends('admin.layout.form_login')

@section('content')
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="{{route('admin.login')}}">
                        <img class="align-content" src="{{asset('assets/admin/images/logo.png')}}" alt="">
                    </a>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @include('includes.error_messages')
                        </div>
                    </div>
                </div>

                <div class="login-form">
                    <form  action="{{route('admin.login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input @if(old('remember')=='on') checked @endif type="checkbox" name="remember"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="{{route('admin.forgot.password')}}">Forgotten Password?</a>
                            </label>
                        </div>
                        <input type="submit" value="Logar" class="btn btn-success btn-flat m-b-30 m-t-30"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
