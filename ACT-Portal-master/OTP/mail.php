<?php
session_start();
$username=$_SESSION['username'];
$email_to=$_SESSION['email'];
//$email_to='kskrish75@gmail.com';
$conn=mysql_connect("localhost","root","");
mysql_select_db("act",$conn);
$otp=(String)rand(1000,9999);
$subject='OTP';
$email='/* your Email id*/';
$message="OTP from /*your message*/ $otp";
$headers = 'From: ' .$email . "\r\n". 
  'Reply-To: ' . $email. "\r\n" . 
  'X-Mailer: PHP/' . phpversion();
if(mail($email_to, $subject, $message, $headers)){
	echo "sendsuccessfully";
	mysql_query("insert into video_table(Name,Email,OTP,VideoCount) values('$username','$email_to','$otp','0');",$conn);
}
else{
	echo "notsend";
}
?>