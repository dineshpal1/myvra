<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public static function getErrorMessage($argError)
    {
        //"Register Page" for "Invester" & "Startup" And "Login Page" And "Basic Information Page" and Admins Startup page

        $arrErrorMessage = [
            'firstNameRequired' => 'First Name is required',
            'firstNameInvalid' => 'First Name can only have characters',
            'middleNameInvalid' => 'Middle Name can only have characters',
            'lastNameRequired' => 'Last Name is required',
            'lastNameInvalid' => 'Last Name can only have characters',
            'emailRequired' => 'Email is required',
            'emailInvalid' => 'Please Enter Valid Email',
            'emailUnique' => 'Email has already been taken',
            'phoneRequired' => 'Phone No is required',
            'phoneInvalid' => 'Phone No must be a Number',
            'phoneLength' => 'Phone No must be 10 digits',
            'phoneUnique' => 'Phone No has already been taken',
            'businessNameRequired' => 'Business Name is Required',
            'businessNameInvalid' => 'Business Name can only have characters',
            'companyNameRequired' => 'Company Name is Required',
            'passwordRequired' => 'Password is Required',
            'passwordLength' => 'Password must be at least 4 characters',
            'websitRequired' => 'Website Name is required',
            'websitInvalid' => 'Website Url is invalid',
            'cityRequired' => 'City is required',
            'addressRequired' => 'Address is required',
            'stateRequired' => 'Select your State Name',
            'countryRequired' => 'Select your Country Name',
            'postalCodeRequired' => 'Postal Code is required',
            'postalCodeInvalid' => 'Postal Code must be a number',
            'postalCodeLength' => 'Postal Code must be 6 digits',
            'stageRequired' => 'Select your Stage',
            'productServiceRequired' => 'Product & Services is required',
            'yearIncorporationRequired' => 'Incorporation Date is required',
            'teamSizeReaquired' => 'Select your Team Size ',
            'currencyRequired' => 'Select Currency Name',
            'anualRevenueRequired' => 'Select Anual Revenue',

        ];
// Forgot Password Page
$arrErrorMessage +=[
    'confirmPasswordRequired'=>'Confirm Password is required',
    'confirmPasswordMatch'=>'Password not matched Please enter same Password',
    'oldPasswordMatch'=>'Please Enter your Old Password'
];
        // website Detalis

        $arrErrorMessage += [
            'nameRequired' => 'Name is required',
            'nameInvalid' => 'Name can only have characters',
            'googleUrlInvalid' => 'Google Url format is invalid',
            'linkedinUrlInvalid' => 'Linkedin Url format is invalid',
            'twitterUrlInvalid' => 'Twitter Url format is invalid',
            'facebookUrlInvalid' => 'Facebook Url format is invalid',
            'instagramUrlInvalid' => 'Instagram Url format is invalid',
            'imageRequired' => 'Please choose an image',
            'imageInvalid' => 'Image must be an image',
            'imageType' => 'Image must be a file of type:jpeg,png,gif',
            'imageSize' => 'Image may not be greater than 4 MB',
            'countryCodeRequired' => 'Country Code is required',
        ];

        //Slider Page

        $arrErrorMessage += [
            'headingRequired' => 'Heading is required',
            'subHeadingRequired' => 'Sub Headingis required',
            'shwoRequired' => 'Shwo On is required',

        ];

        //Widget Partner ,role Page

        $arrErrorMessage += [
            'partnernameRequired' => ' Widget Our Partner Name is required',
           'designationRequired' => 'Designation is Required',
           'modulesRequired' => 'Module is Required',

        ];


        //  Widget Page

        $arrErrorMessage += [
            'sectionIdRequired' => 'Section Id is Required',
            'sectionIdNumeric' => 'Section Id must be a Number',
            'sectionIdUnique' => 'Section has already been taken',
            'htmlRequired' => 'HTML is required',
        ];

        //Revenue Details Page

        $arrErrorMessage += [
            'totalRevenueRequired' => 'Total Revenue is required',
            'profitRequired' => 'Profit is required',
            'lossRequired' => 'Loss is required',
        ];

        // Investors

        $arrErrorMessage += [
            'paginationRequired' => 'Records per Page is required',
            'paginationInvalid' => 'Records per Page must be a number',
            'toatlPageRequired' => 'Total Page is required',
            'toatlPageInvalid' => 'Total Page must be a number',
        ];

        //investment Page

        $arrErrorMessage += [
            'titleRequired' => 'Title is required',
            'titleInvalid' => 'Title can only have characters',
            'titleUnique' => 'Title has already been taken',
            'descriptionRequired' => 'Description is required',
        ];

        //Admin
        //Faqs category Page and faqs
        $arrErrorMessage += [
            'categoryNameRequired' => 'Category Name is required',
            'categoryNameUnique' => 'Category Name has already been taken',
            'positionRequired' => 'Position is required',
            'positionUnique' => 'Position has already been taken',
            'positionInvalid' => 'Position must be a Number',

            'questionRequired' => 'Question is required',
            'answerRequired' => 'Answer is required',
            'faqCategoryRequired' => 'Please select category',

        ];

        //'Blog Category' and 'Blog Post' And "Pages" and 'Industry type'  page

        $arrErrorMessage += [
            'slugRequired' => 'Slug is required',
            'blogNameRequired' => 'Name is required',
            'pagesNameRequired' => 'Name is required',
            'shortDescriptionRequired' => 'Short Description is required',
            'longDescriptionRequired' => 'Long Description is required',
            'meteTitleRequired' => 'Meta Title is required',
            'meteKeywordsRequired' => 'Meta Keywords is required',
            'metedescriptionRequired' => 'Meta Description is required',

            'industryTypeNameRequired' => 'Industry type Name is required ',
        ];

        //Email Temaplate and Email Setting Page

        $arrErrorMessage += [
            'templateNameRequired' => 'Template name is required',
            'templateNameUnique' => 'Template name has already been taken',
            'subjectRequired' => 'Subject is required',
            'subjectUnique' => 'Subject has already been taken',
            'messageRequired' => 'Message is required',
            'smsMessageRequired' => 'SMS Message is required',

            'portNoRequired' => 'Port no is required',
            'portNoinvalid' => 'Port no must be a Number',
            'usernameRequired' => 'Username is required',
            'emailpasswordRequired' => 'Password is required',
            'sslTypeRequired' => 'SSL type is required',
        ];

        // Some other Toster Message
        $arrErrorMessage +=[
            'investmentAllrecordsLimit'=>'You can not Create More Thean 10',
            'customerGrowthQurterlyInvalid'=>'This Quarter is already Submited',
            'loginInvalid'=>'Incorrect Credentials! Please try Again!',
            'resetPasswordLink'=>'A reset Password link sent to your email! Plz Check yor email to rest now',
            'emailSettingLimit'=>'You Can not Add more then 1 Value',
            'termsRequired'=>'Please Check Our Terms & Condition!!',
            'otpSent'=>'Otp Sended Successfully!!',
            'otpInavlid'=>'Otp is Invalid!Plz Try agin!!',
            'otpRequired'=>'Otp is Required',

        ];
        // Api Mapping page
        $arrErrorMessage +=[
            'apiurlRequired'=>'Api Url is Required',
            'apifixedparamtersRequired'=>'Api Fixed Parametr is Required',
            'apiparamtermappingRequired'=>'Api Parametr Mapping is Required',

        ];
        // print_r($arrErrorMessage);
        // die;
        return isset($arrErrorMessage[$argError]) && !empty($arrErrorMessage[$argError]) ? $arrErrorMessage[$argError] : 'N/A';

    }
}
