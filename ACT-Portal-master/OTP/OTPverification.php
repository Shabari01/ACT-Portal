<?php  
session_start();
$conn=mysql_connect("localhost","root","");
mysql_select_db("act",$conn);
$mobile=$_SESSION['mobile'];
$email=$_SESSION['email'];
$username=$_SESSION['username'];
$otp=$_GET['otp'];
$_SESSION['OTP']=$otp;
$result=mysql_query("select * from video_table where OTP='$otp'",$conn);
if (!mysql_num_rows($result)) {
	echo "Incorrect OTP";
}
else{
	echo "successfull";
}
?>