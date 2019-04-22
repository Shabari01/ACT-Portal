<?php
$conn=mysql_connect("localhost","root","");
mysql_select_db("act",$conn);
$name=$_POST['name'];
$department=$_POST['department'];
$year=$_POST['year'];
$email=$_POST['email'];
$password=$_POST['password'];
$mobile= (String)$_POST['mobileNO'];
$mobile="91".$mobile;
$resultCheck=mysql_query("select * from signup_table where Email='$email';",$conn);
if(mysql_num_rows($resultCheck)){
	echo "'<script type='text/javascript'>
alert('Same Mail Already Exits');
window.location='index.html';	
</script>'";
}
else{
$querry="insert into signup_table (Name,Department,Year,Email,Password,Mobile) values('$name','$department','$year','$email','$password','$mobile');";
mysql_query($querry,$conn);
echo '
<script type="text/javascript">
setTimeout(function(){
window.location="Index.html";
},3000)
</script>';
echo '
<center><h2>Signup Successfully  Wait For a Moment </h2></center>
';
}



?>