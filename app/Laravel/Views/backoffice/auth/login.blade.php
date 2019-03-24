@extends('backoffice._layouts.auth')
@section('content')
    <div class="login-page">
        <div class="dis-inline left-box">
                <img src="/dist/img/login-img.png">  
        </div>
        <div class="dis-inline right-box">
            <div class="login-box">
                <div class="login-logo">
                    <a href="#"> <img src="/dist/img/logo.png"> </a>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        @include('backoffice._components.alerts')
                    </div>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <form class="login-form validate-form" action="" method="post" novalidate>
                        {{ csrf_field() }}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="user-name" class="form-control" placeholder="Your Username" name="username" required>  
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">
                                <a href="#"> <i class="fa fa-lock"></i> forgot  password</a>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-lg btn-success btn-block login-form-btn">Log in</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.social-auth-links -->
                </div>
                <!-- /.login-box-body -->
            </div>
        </div>
    </div>


    <!-- <div class="limiter">
        <div class="container-login">
            <div class="wrap-login">
                <form class="login-form validate-form" action="" method="post" novalidate>
                    {{ csrf_field() }}
					<span class="login-form-title p-b-43">
						<img src="/backoffice/app_logo.png" style="width: 40%;" alt="branding logo">
					</span>
                    <div class="row">
                        <div class="col-xs-12">
                            @include('backoffice._components.alerts')
                        </div>
                    </div>
                    <div class="wrap-input validate-input">
                        <input class="input" type="text" id="user-name" placeholder="Your Username" name="username" required>
                    </div>

                    <div class="wrap-input validate-input" >
                        <input class="input" type="password" id="user-password" placeholder="Enter Password" name="password" required>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact-form-checkbox">
                            <input class="login-input-checkbox" id="remember-me" type="checkbox" name="remember_me">
                            <label class="login-label-checkbox" for="remember-me">
                                Remember me
                            </label>

                        </div>
                        {{--<a href="{{ route('backoffice.auth.forgot_password') }}"></a>--}}
                        <a href="#" class="txt1">
                            Forgot pwd?
                        </a>
                        <div>

                        </div>
                    </div>


                    <div class="container-login-form-btn">
                        <button class="login-form-btn">
                            Login
                        </button>
                    </div>

                </form>
                <div class="login-more" ><img src="/backoffice/bg-left.png">
                </div>
            </div>
        </div>
    </div> -->

@stop