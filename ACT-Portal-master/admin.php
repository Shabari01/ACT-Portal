<?php
$conn=mysql_connect("localhost","root","");
mysql_select_db("act",$conn);
$name=$_POST['name'];
$password=$_POST['password'];
$querry="select * from admin_table where Name='$name' && Password='$password';";
$result=mysql_query($querry,$conn);
if(!mysql_num_rows($result)){
	echo "'<script type='text/javascript'>
alert('wrong password & mail');
window.location='index.html';	
</script>'";
}
else
{
echo '
<script type="text/javascript">
window.location="OTP/adminUI.php";
</script>';
}
?>