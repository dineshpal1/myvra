<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Customer;
use App\Models\Country;
use App\Models\State;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(Request $request) {
        if ($request->session()->has('customer')) {
            return redirect('home');
        }
        $states =  State::all()->pluck('state_name', 'id');
        $countries = Country::all()->pluck('country_name', 'id');

        return view('frontend.auth.register', ["countries" => $countries, "states" => $states]);
        // return view('frontend.auth.register', compact("countries","states");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'customer_name' => ['required', 'string', 'max:50'],
            'restaurant_name' => ['required', 'string', 'max:100'],
            'restaurant_address' => ['required', 'string', 'max:250'],
            'country_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:customers'],
            'password' => ['required', 'string', 'min:6', 'max:250', 'confirmed'],
            'captcha_code' => ['required', 'string', 'captcha'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator($data);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'isRegistered' => false, 'errors' => $validator->errors()]);
        }

        Customer::create([
            'customer_name' => $data['customer_name'],
            'restaurant_name' => $data['restaurant_name'],
            'restaurant_address' => $data['restaurant_address'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        session()->flash('message', 'Registered Successfully! Profile is under review.');
        Session::flash('alert-class', 'alert-success'); 

        return response()->json(['success' => true, 'isRegistered' => true, 'message' => ['Registered Successfully! Profile is under review.']]);
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
