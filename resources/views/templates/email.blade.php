<!doctype html>
<html>

<head>
</head>

<body>
    Hello <h3><?php  echo $user->first_name; ?>!</h3>
    <br>
    Please click on the link to reset password <a href="{{url('forgot_password/'.$user->reset_token)}}">Reset
        Password</a>

</body>

</html>
