
<!DOCTYPE html>
<html>
<head>
    <title>OTP</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<div class="container be-detail-container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <br>
            <img src="https://cdn2.iconfinder.com/data/icons/luchesa-part-3/128/SMS-512.png" class="img-responsive" style="width:200px; height:200px;margin:0 auto;"><br>
            
            <h1 class="text-center">Verify your mobile number</h1><br>
            <p class="lead" style="align:center"></p><p> An OTP has been sent to your Mobile Number. Please enter the 4 digit OTP below for Successful Registration</p>  <p></p>
        <br>
       
            
                <div class="row">                    
                <div class="form-group col-sm-8">
                     <span style="color:red;"></span>    
                     <input type="text" class="form-control" name="otp" placeholder="Enter your OTP number" required="" id="otpid">
                </div>
                <button type="submit" class="btn btn-primary  pull-right col-sm-3" onclick="verify()">Verify</button>
                </div>
                
        <br><br>
        </div>
    </div>        
</div>
</body>
</html>
<?php 
session_start();
$conn=mysql_connect("localhost","root","");
mysql_select_db("act",$conn);
$mobile=$_SESSION['mobile'];
$email=$_SESSION['email'];
$username=$_SESSION['username'];
require('textlocal.class.php');
$API_1='/*your message API key*/';//original API
$textlocal = new Textlocal(false, false, $API_1);
$otp=(String)rand(1000,9999);
$numbers = array($mobile);
$sender = "TXTLCL";
$message = "$otp";

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    mysql_query("insert into video_table(Name,Email,OTP,VideoCount) values('$username','$email','$otp','0');",$conn);
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}

 ?>
