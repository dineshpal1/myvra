<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = validator()->make($request->all(), [
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }            

            $objCustomer = Customer::where('email', '=', $request->email)->where('is_deleted', '=', 0)->first();

            if (!empty($objCustomer)) {
                if($objCustomer->is_active === 0) {
                    return response()->json(['success' => false, 'isForgotPassword' => false,  'message' => ["Your account in inactive. Please connect with website administrator."]]);
                }

                $varToken = md5(rand(11111, 99999));
                $objCustomer->reset_token = $varToken;
                $objCustomer->save();

                $html = 'Hello ' . $objCustomer->customer_name . '<br> Please Click the link to Reste your Password <a href=' . url("resetPassword/" . $objCustomer->reset_token) . '>Reset Password</a>';

                try {
                    Mail::send([], ['body' => $html], function ($message) use ($objCustomer, $html) {
                        $message->to($objCustomer->email);
                        $message->from('project1.rd1@gmail.com', 'FoodCost ')->subject('Welcome!');
                        $message->setBody($html, 'text/html');
                    });

                    return response()->json(['success' => true, 'isForgotPassword' => true, 'message' => ["Mail Sent Succesfully!".' Click here to <a href=' . url("reset-password/" . $objCustomer->reset_token) . '>Reset Password</a>']]);
                } catch (Exception $e) {
                    return response()->json(['success' => false, 'isForgotPassword' => false, 'message' => ["Mail Not Sent Succesfully!"]]);
                }
            } else {
                return response()->json(['success' => false, 'errors' => ['email'=>'This email is not exists.']]);
            }
        }
    }

    public function resetPassword(Request $request)
    {
        if ($request->session()->has('customer')) {
            return redirect('home');
        }
        return view('frontend.auth.passwords.reset', ["token" => $request->token]);
    }    

    public function updatePassword(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $varToken = $request->input('token');

            if (empty($varToken)) {
                session()->flash('message', 'Invalid token!');
                Session::flash('alert-class', 'alert-danger');
                return Redirect::back();
            } else {
                $objCustomer = Customer::where('reset_token', '=', $varToken)->where('is_deleted', '=', 0)->first();

                if (empty($objCustomer)) {
                    session()->flash('message', 'Invalid token!');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::back();
                }

                if($objCustomer->is_active === 0) {
                    session()->flash('message', 'Your account in inactive. Please connect with website administrator.');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::back();
                }

                $objCustomer->password = Hash::make($request->input('password'));
                if ($objCustomer->save()) {
                    $objCustomer->reset_token = '';
                }
                $objCustomer->save();

                session()->flash('message', 'Password Changed Succesfully!');
                Session::flash('alert-class', 'alert-success');

                return redirect('login');
            }
        }

    }
}
