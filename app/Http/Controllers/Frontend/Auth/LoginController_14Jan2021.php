<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request) {
        
        if ($request->session()->has('customer')) {
           
            return redirect()->route('home');
        }
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
       // print_r($request->all());die;
       // print_r($request->all());die;
        $validator = validator()->make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        } else {
            $objCustomer = Customer::where('email', '=', $request->email)->where('is_deleted', '=', 0)->first();

            if (!empty($objCustomer)) {
                if(!Hash::check($request->password, $objCustomer->password)) {
                    return response()->json(['success' => false, 'errors' => ['password'=>'Incorrect Password']]);
                }

                if($objCustomer->is_active === 0) {
                    return response()->json(['success' => false, 'isIncorrectCredentials' => true,  'message' => ["Your account in inactive. Please connect with website administrator."]]);
                }

                if ($objCustomer->is_active === 1 && $objCustomer->customer_code == 0) {
                    return response()->json(['success' => false, 'isIncorrectCredentials' => true, 'message' => ["Awaiting for confirmation!"]]);
                }

                if ($objCustomer->is_active === 1 && !empty($objCustomer->customer_code)) {
                    $objCustomer->last_login = now();
                    $objCustomer->save();
                    Session::put('customer', $objCustomer->id);
                    session()->flash('message', 'Logged In Succesfully!');
                    return response()->json(['success' => true, 'isIncorrectCredentials' => false, 'messages' => ["Logged In Succesfully!"]]);
                }
            } else {
                return response()->json(['success' => false, 'isIncorrectCredentials' => true, 'message' => ['Incorrect Credentials!']]);
            }
        }
    }

    public function logout()
    {
        Session::flush('customer');
        return redirect()->route('login');
    }
}
