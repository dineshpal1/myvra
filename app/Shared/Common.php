<?php

namespace App\Shared;

use Exception;
use App\Customer;
use App\Admin\Role;
use App\Admin\EmailSetting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Common extends Model
{

    public static function getCurrentLoginUser($argType = null)
    {
        $objUser = Session::get('user');
        return !empty($argType) && isset($objUser[$argType]) ? $objUser[$argType] : $objUser;

    }
    /*
     * function to getActive status
     * @param $argId
     * @returns array  or string
     */

    public static function getActiveStatus($argId = null)
    {

        $arr = ['0' => 'Inactive', '1' => 'Active'];
        if ($argId || !empty($argId) || $argId == '0') {
            return isset($arr[$argId]) ? $arr[$argId] : "N/A";
        }
        return $arr;
    }
  
    public static function sendMail($argFrom, $argTo, $argSubject, $argTemplate)
    {
        // $mail = EmailSetting::all()->first();
        // //  print_r($mail);
        // //  die('dfdf');
        // if ($mail) //checking if table is not empty
        // {
        //     $config = array(
        //         'driver' => 'smtp',
        //         'host' => 'smtp.gmail.com',
        //         'port' => $mail->port_no,
        //         'encryption' => $mail->ssl_type,
        //         'username' => $mail->username,
        //         'password' => $mail->password,
        //     );
        //     Config::set('mail', $config);
        // }
        try {
            $response = Mail::send(['name' => 'test'], ['name' => 'testt'], function ($message) use ($argFrom, $argTo, $argSubject, $argTemplate) {
                $message->to($argTo);
                $message->from($argFrom, 'TotheStartup')->subject($argSubject);
                $message->setBody($argTemplate, 'text/html');

            });
        } catch (Exception $e) {
            $response = $e;
        }

        return true;
        //  $html = 'Hello ' . $customer->first_name . '!<br>Your password is ' . $varPassword . ' <br><br>
        // Please Click the link to activate your account <a href=' . url("activate_account/" . $customer->activation_code) . '>Activate You Account</a>';
        // Mail::send(['name' => $customer->first_name], ['name' => $customer->first_name], function ($message) use ($customer, $html) {
        //     $message->to($customer->email);
        //     $message->from('tothestartup@gmail.com', 'TotheStartup')->subject('Welcome!');
        //     $message->setBody($html, 'text/html');
        // });
        // return $response;
    }

    /*function to change change date format and return the converted date
    @params $argDate,$argFormat
    @returns string
     */
    public static function changeDateFormat($argDate, $argFormat)
    {
        $vrDate = !empty($argDate) && !empty($argFormat) ? \Carbon\Carbon::parse($argDate)->format($argFormat) : 'N/A';
        return $vrDate;
    }

}
