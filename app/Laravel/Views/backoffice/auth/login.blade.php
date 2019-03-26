@extends('backoffice._layouts.auth')
@section('content')
    <div class="login-page">
        <div class="dis-inline left-box">
            <img src="/dist/img/login-img.png"> 
        </div>
        <div class="dis-inline right-box">
            <div class="login-box">
                <div class="login-logo">
                    <a href="/" class="hidden-xs hidden-sm"> <img src="/dist/img/logo.png"> </a>
                    <a href="/" class="hidden-lg hidden-md"> <img src="/dist/img/logo-mobile.png"> </a>
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
                            <div class="col-xs-6 text-right">
                                <a href="#"> <i class="fa fa-lock"></i> forgot password</a>
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

@stop