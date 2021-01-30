@extends('frontend.layouts.welcome')

@section('content')

<section class="login-section">
    <div class="container">
        <p class="side_content"><span>*</span>Compulsory Fields</p>
        <div class="card card-login">
            <div class="card-body">
                <div class="row form mb-4">
                    <div class="col-md-7">
                        <div class="login-form">
                            <h3 class="mb-4">{{ __('Registration') }}</h3>
                            <form id="frm_register" method="POST" action="{{ route('register') }}">
                            @csrf

                                <div class="alert d-none" role="alert" id="err_toastr_register"></div>

                                @if(Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="property">*</span>
                                            <input id="customer_name" type="text" class="form-control register_input @error('customer_name') is-invalid @enderror register-page" name="customer_name" value="{{ old('customer_name') }}" maxlength="50" placeholder="Contact Name" required1 autocomplete="customer_name" autofocus>
                                            <span class="invalid-feedback" id="customer_name_register_error"></span>
                                            @error('customer_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="property pr-1">*</span>
                                            <input id="restaurant_name" type="text" class="form-control register_input @error('restaurant_name') is-invalid @enderror register-page" name="restaurant_name" value="{{ old('restaurant_name') }}" maxlength="100" placeholder="Restaurant Name" required1  autocomplete="restaurant_name">                                            
                                            <span class="invalid-feedback" id="restaurant_name_register_error"></span>
                                            @error('restaurant_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="property pr-1">*</span>
                                            <input id="restaurant_address" type="text" class="form-control register_input @error('restaurant_address') is-invalid @enderror register-page" name="restaurant_address" value="{{ old('restaurant_address') }}"  maxlength="250" placeholder="Restaurant Address" required1  autocomplete="restaurant_address">
                                            <span class="invalid-feedback" id="restaurant_address_register_error"></span>

                                            @error('restaurant_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="property pr-1">*</span>
                                            <select id="country_id" name=country_id class="form-control register_input register-page" >
                                                <option value="" selected disabled>Select Country</option>
                                                @foreach($countries as $key => $country)
                                                <option value="{{$key}}">{{$country}}</option>
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback" id="country_id_register_error"></span>

                                            @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="property pr-1">*</span>
                                            <select name="state_id" id="state_id" class="form-control register_input register-page">
                                                <option value="" selected disabled>Select States</option>  
                                                  @foreach($states as $key => $state)
                                                <option value="{{$key}}">{{$state}}</option>
                                                @endforeach                                                
                                            </select>
                                            <span class="invalid-feedback" id="state_id_register_error"></span>

                                            @error('state_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="property pr-1">*</span>
                                            <input id="city" type="text" class="form-control register_input @error('city') is-invalid @enderror register-page" name="city" value="{{ old('city') }}" maxlength="100" placeholder="City" required1  autocomplete="city">
                                            <span class="invalid-feedback" id="city_register_error"></span>

                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="property pr-1">*</span>
                                            <input id="phone" type="text" class="form-control register_input @error('phone') is-invalid @enderror register-page" name="phone" value="{{ old('phone') }}" maxlength="15" placeholder="Phone" required1  autocomplete="phone">
                                            <span class="invalid-feedback" id="phone_register_error"></span>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control register_input" name="bonus" maxlength="100" placeholder="Bonus/Referral Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="row bd-t">
                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror register-page"  maxlength="100" placeholder="E-mail Address" name="email" value="{{ old('email') }}" required1 autocomplete="email">
                                            <span class="label-title"><i class="fa fa-envelope-o"></i></span>
                                            <span class="invalid-feedback" id="email_register_error"></span>                                      

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror register-page"  minlength="6"  maxlength="50" placeholder="********" name="password" required1 autocomplete="new-password">
                                            <span class="label-title"><i class="fa fa-lock"></i></span>
                                            <span class="ml-3 message">(Minimum 6 characters, letter (a-z), number (0-9))</span>
                                            <span class="invalid-feedback" id="password_register_error"></span>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="confirm_password" type="password" class="form-control register-page" placeholder="Re-Enter Password" name="password_confirmation" required1 autocomplete="new-password">
                                            <span class="label-title"><i class="fa fa-lock"></i></span>
                                            <span class="invalid-feedback" id="confirm_password_register_error"></span>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-12">
                                        <div class="input-group mb-3">
                                            <input id="captcha_code" type="text" class="form-control register-page" name="captcha_code" placeholder="Enter Given Code" aria-label="" aria-describedby="basic-addon1">
                                            <div class="input-group-append">
                                                <span class="captcha">{!! captcha_img() !!}</span>
                                                <button class="btn btn-outline-secondary" type="button" id="btn_refresh_captcha"><i class="fa fa-refresh"></i></button>
                                            </div>
                                            <span class="invalid-feedback" id="captcha_code_register_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ml-3">
                                            <div class="login_checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" id="term_conditions" />
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    <div>I agree with the <a href="#"> Terms & Conditions </a>of Food Cost.</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="register_btns">
                                    <input type="button" class="btn send-btn" value="{{ __('Register') }}" name="btn_register" id="btn_register" />
                                    <input type="reset" class="btn send-btn ml-3" value="{{ __('Reset') }}" name="btn_reset" id="btn_reset" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="ragister_content">
                            <h3 class="mb-4">Already A Member?</h3>
                            <a class="login-btn btn mt-4 mb-4" href="{{ route('login') }}">Login Here</a>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        
    </div>
</section>
@endsection
