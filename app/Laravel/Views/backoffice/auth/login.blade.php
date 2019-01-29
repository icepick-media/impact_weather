@extends('backoffice._layouts.auth')
@section('content')
<div class="robust-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <section class="flexbox-container">

                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <div class="p-1"><img src="/backoffice/app_logo.png" style="width: 40%;" alt="branding logo"></div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login with {{ config('app.name') }}</span></h6>
                        </div>
                        <div class="card-body collapse in">

                            <div class="card-block">
                                <form class="form-horizontal form-simple" action="" method="post" novalidate>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            @include('backoffice._components.alerts')
                                        </div>
                                    </div>
                                    <fieldset class="form-group has-feedback has-icon-left mb-0">
                                        <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="Your Username" name="username" required>
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group has-feedback has-icon-left">
                                        <input type="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Enter Password" name="password" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group row">
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                            <fieldset>
                                                <input type="checkbox" id="remember-me" name="remember_me" class="chk-remember">
                                                <label for="remember-me"> Remember Me</label>
                                            </fieldset>
                                        </div>
                                        {{-- <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="{{ route('backoffice.auth.forgot_password') }}" class="card-link">Forgot Password?</a></div> --}}
                                    </fieldset>
                                    <button type="submit" class="btn btn-success btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="">
                                {{-- <p class="float-sm-left text-xs-center m-0"><a href="{{ route('backoffice.auth.forgot_password') }}" class="card-link">Recover password</a></p> --}}
                                {{-- <p class="float-sm-right text-xs-center m-0">New to {{ config('app.name') }}? <a href="{{ route('backoffice.auth.register') }}" class="card-link">Sign Up</a></p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

@stop