@extends('frontend.layouts.welcome')

@section('content')
<section class="login-section">
    <div class="container">
        <div class="card card-login">
            <div class="card-body">
                <div class="row form mb-4">
                    <div class="col-md-7">
                        <div class="login-form">
                            <h3 class="heading">{{ __('Dashboard') }}</h3>
                            
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <p>
                                {{ __('You are logged in!') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="ragister_content">
                            <a href="{{ route('logout') }}" class="register-btn btn mt-4 mb-4">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
