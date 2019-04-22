<?php
session_start();
$conn=mysql_connect("localhost","root","");
mysql_select_db("act",$conn);
$username='';
$email=$_POST['email'];
$password=$_POST['password'];
$querry="select * from signup_table where Email='$email' && Password='$password';";
$result=mysql_query($querry,$conn);
if(!mysql_num_rows($result)){
echo "'<script type='text/javascript'>
alert('wrong password &mail');
window.location='index.html';	
</script>'";
}
else{
	while ( $row=mysql_fetch_array($result)) {
		$username=$row['Name'];
		$_SESSION['username']=$username;
		$_SESSION['email']=$row['Email'];
		$_SESSION['mobile']=$row['Mobile'];	
	}
echo "'
<script type='text/javascript'>
window.location.href='OTP/Index.php' 
</script>";
}

//sqlplus sys/Oracle_1@pdborcl as sysdba;
//9543886525
//8110038994
?>