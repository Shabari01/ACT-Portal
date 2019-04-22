<?php
session_start();
$username=$_SESSION['username'];
$db_name="act";
$video=array();
$conn=mysql_connect("localhost",'root','');
mysql_select_db ("$db_name")or die("cannot select DB");
$r="select * from video_table where Name='$username' && FilePath!=''";
$d=mysql_query($r,$conn);
while ($row=mysql_fetch_array($d)) {
$video[]=$row['FilePath'];
}
$i=count($video);
$j=0;
while ($j<$i) {
echo "<video width='300' height='200' controls>
<source src=' $video[$j]' type='video/mp4'>
</video> &nbsp&nbsp&nbsp&nbsp&nbsp";
$j++;
}
?>