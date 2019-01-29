@extends('backoffice._layouts.auth')
@section('content')
<div class="robust-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
            <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                    <div class="card-header no-border">
                        <div class="card-title text-xs-center">
                        <img src="/backoffice/waveone.png" alt="branding logo">
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>We will send you a link to reset your password.</span></h6>
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

                                <fieldset class="form-group has-feedback has-icon-left mb-1 {{ $errors->has('email') ? "has-danger" : NULL }}">
                                    <input type="email" class="form-control form-control-lg input-lg" id="user-email" name="email" value="{{ old('email') }}" placeholder="Your Email Address" required>
                                    <div class="form-control-position">
                                        <i class="icon-mail6"></i>
                                    </div>
                                     @if($errors->has('email')) <small class="danger text-muted">{{ $errors->first('email') }}</small> @endif
                                </fieldset>
                                
                                <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Recover Password</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer no-border">
                        <p class="float-sm-left text-xs-center"><a href="{{ route('backoffice.auth.login') }}" class="card-link">Login</a></p>
                        <p class="float-sm-right text-xs-center">New to {{ config('app.name') }} ? <a href="{{ route('backoffice.auth.register') }}" class="card-link">Create Account</a></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
@stop