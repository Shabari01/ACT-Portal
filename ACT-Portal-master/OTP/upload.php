
<?php
session_start();
$count=0;
$checkFilepath=array();
$OTP=$_SESSION['OTP'];
$username=$_SESSION['username'];
$vdo=$_FILES['file']['name'];   
$path="vid/".$username;
if (!file_exists("$path")) {
    mkdir("$path", 0777, true);
}
$target_path = $path."/";
$target_path = $target_path . basename( $_FILES['file']['name']);
$target_path . basename( $_FILES['file']['name']);
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
{
$db_name="act";
$tbl_name="video_table";
$conn=mysql_connect("localhost",'root','');
mysql_select_db ("$db_name",$conn);
$res=mysql_query("select * from video_table where Filepath='$target_path'&& Name='$username';",$conn);
if(mysql_num_rows($res)){
echo '
<script type="text/javascript">
	alert("Same File Name Already Exits");
	window.location.href="Index.php";
</script>';
}
else{
$update="UPDATE $tbl_name SET FilePath = '$target_path',VideoCount='$count' WHERE OTP = '$OTP'";
$result=mysql_query($update,$conn);
$sql1="select * from $tbl_name where Name='$username' && Filepath!='';";
$result=mysql_query($sql1,$conn);
$NameArray=array();
while ($row=mysql_fetch_array($result)) {
	$NameArray[]=$row['Name'];

}
$count=count($NameArray);
$updateVideoCount="UPDATE $tbl_name SET VideoCount='$count' WHERE Name = '$username';";
mysql_query($updateVideoCount,$conn);

echo '
<script type="text/javascript">
	alert("Upload Suessfully");
	window.location.href="Index.php";
</script>';
}
}
?>
