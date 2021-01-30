<?php

namespace App\Http\Controllers\Admin;

use App\Shared\Common;
use App\Shared\Message;
use Illuminate\Http\Request;
use App\Models\Admin\AdminUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('user')){
            return view('admin.index');
        }
       return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if($request->session()->has('user')){
            return redirect()->route('dashboard');
        }
        if ($request->isMethod('GET')) {
            return view('admin.login');
        }
        if ($request->isMethod('POST')) {

            $validator = validator()->make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }
            $arrCredentials = $request->only('email', 'password');
            $varPassword = isset($arrCredentials['password']) && !empty($arrCredentials['password']) ? md5($arrCredentials['password']) : '';
            // print_r($varPassword);
            // die('safsd');
            $objData = AdminUser::where('email', '=', $arrCredentials['email'])->where('password', '=', $varPassword)->first();
        
            if (!empty($objData)) {
                Session::put('user', $objData->getOriginal());
                return response()->json(['success' => true, 'errors' => ["Logged In Succesfully!"], 'isIncorrectCredentials' => false]);
            } else {
                return response()->json(['success' => false, 'errors' => ['Incorrect Credentials!'], 'isIncorrectCredentials' => true, 'toasterMessage' => 'Incorrect Credantials!!']);
            }
        }
    }

    /**
     * Function to change User Password
     */
    public function ChangePassword(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.change-password');
        }
        if ($request->isMethod('POST')) {
            $varCurrentUser = Common::getCurrentLoginUser('id');
            $objUser = AdminUser::where('id', '=', $varCurrentUser)->first();
            $varInputPassword = md5($request->input('old_password'));
            // print_r($varInputPassword);
            // print_r($objUser->customer_password);
            //  die;
            $validator = validator()->make($request->all(), [

                'old_password' => 'required',
                'new_password' => 'required|min:4',
                'confirm_password' => 'required|same:new_password',
            ], [
                'old_password.required' => Message::getErrorMessage('oldPasswordMatch'),
                'new_password.required' => Message::getErrorMessage('passwordRequired'),
                'new_password.min' => Message::getErrorMessage('passwordLength'),
                'confirm_password.required' => Message::getErrorMessage('confirmPasswordRequired'),
                'confirm_password.same' => Message::getErrorMessage('confirmPasswordMatch'),
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }
            if ($varInputPassword == $objUser->password) {
                $objUser->password = md5(request('confirm_password'));
                $objUser->save();

                return response()->json(['success' => true, 'errors' => ['Data Saved'],'tosatrMessage'=>'Password Changed']);
            } else {
                return response()->json(['success' => false, 'errors' => ['incorrect'], 'isMatch' => false]);

            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }    
    /**
     * logOut
     *
     * @return void
     */
    public function logOut()
    {
        Session::flush('user');
        return redirect()->route('login');
    }    
    /**
     * forgotPassword
     *
     * @return void
     */
    public function forgotPassword(Request $request)
    {
        if($request->isMethod('GET')){
            return view('admin.forgot-password');
        }
      if($request->isMethod('POST')){
        
        $validator = validator()->make($request->all(), [
            'email' => 'required|email|',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors(),'messages' ]);
        } else {
            $arrCredentials = $request->only('email');

            $objData = AdminUser::where('email', '=', $arrCredentials['email'])->first();

            if (!empty($objData)) {
                $varToken = md5(rand(11111, 99999));
                $objData->reset_token = $varToken;
                $objData->save();
                $html = 'Hello ' . $objData->username . '<br>
                  Please Click the link to Reste your Password <a href=' . url("admin/reset_password/" . $objData->reset_token) . '>Reset Password</a>';

                Common::sendMail(env('MAIL_USERNAME'), $objData->email, 'Welcome', $html);

                return response()->json(['success' => true, 'is_login' => false, 'errors' => ["Mail Sent Succesfully!"]]);
            } else {
                return response()->json(['success' => false, 'errors' => ['Email Not Matched Try Again!']]);
            }
        }  
      }
    }
    
    /**
     * resetPassword
     *
     * @param  mixed $request
     * @param  mixed $token
     * @return void
     */
    public function resetPassword(Request $request,$argToken=null){
        if ($request->isMethod('GET')) {
            if (empty($argToken)) {
                return redirect()->route('login');
               
            }

            $objUser = AdminUser::where('reset_token', '=', $argToken)->first();
       
            if (!empty($objUser)) {
                return \view('admin.reset-password')->with('argToken', $argToken);
            } else {
                return  redirect()->route('login');
            }
        }
        if ($request->isMethod('POST')) {
            $validator = validator()->make($request->all(), [

                'password' => 'required|min:4',
                'confirm_password' => 'required|same:password',
            ], [
                'password.required' => Message::getErrorMessage('passwordRequired'),
                'password.min' => Message::getErrorMessage('passwordLength'),
                'confirm_password.required' => Message::getErrorMessage('confirmPasswordRequired'),
                'confirm_password.same' => Message::getErrorMessage('confirmPasswordMatch'),
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }
            $varToken = $request->input('reset_token');
            // print_r($varToken);
            // die();
            if (empty($varToken)) {
                return response()->json(['success' => false, 'errors' => ['Invalid Url'], 'invalidUrl' => true, 'toasterMessage' => message::getErrorMessage('incorrectUrl')]);
            } else {
                $objUser = AdminUser::where('reset_token', '=', $varToken)->first();

                $objUser->password = md5($request->input(('password')));

                if ($objUser->save()) {
                    $objUser->reset_token = '';
                }
                $objUser->save();
                return response()->json(['success' => true, 'errors' => ['Password Changed Succesfully!'], 'toasterMessage' => 'Password Updated Successfully']);
            }
        }
    }
}
