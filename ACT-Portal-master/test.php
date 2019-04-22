<!DOCTYPE html>
<html>
<head>
	<title></title>
	   <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css"> 
</head>
<body bgcolor="red">

	<?php

	$na=$_POST['name'];
	echo "$na";
	?>

	<form method="POST" enctype="multipart/form-data" action="upload.php">
<section id="intro">

   	<div class="shadow-overlay"></div>

   	<div class="intro-content">
   		<div class="row">

   			<div class="col-twelve">

	   			<div class='video-link'>
	   				<!--<a href="#video-popup"><img src="images/play-button.png" alt=""></a>-->
	   				<input type="file" name="uf">
	   			</div>
	   			<input type="hidden" name="na" value="<?php echo $na; ?>">
	   			<input type="submit" name="U" value="Upload">
	   			<input type="submit" name="U" value="Display">
	   			

	   		</div>  
   			
   		</div>   		 		
   	</div> 
</form>
<?php
//$n=$_POST['name'];
//echo "$n";
 if(isset($_POST['Upload1'])){
//$name=$_POST['name'];
//$n=$_POST['n'];
$vdo=$_FILES['uf']['name'];   
 $target_path = "vid/";
// echo "$target_path";
$target_path = $target_path . basename( $_FILES['uf']['name']);
$target_path . basename( $_FILES['uf']['name']);
$path="vid/".$vdo;
//echo "$path";
if(move_uploaded_file($_FILES['uf']['tmp_name'], $target_path))

{ 
echo "ya"; 
$db_name="sample_db";
$tbl_name="images";
$conn=mysql_connect("localhost",'root','');
//mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db ("$db_name")or die("cannot select DB");
$sql="INSERT INTO $tbl_name VALUES('','$name','$path');";
//echo "$sql";
$result=mysql_query($sql,$conn);
}
}
 if(isset($_POST['Display'])){
 	$db_name="sample_db";
 	$conn=mysql_connect("localhost",'root','');
//mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db ("$db_name")or die("cannot select DB");
$r="select * from images where sno='4';";
$d=mysql_query($r,$conn);
while ($row=mysql_fetch_array($d)) {
	$h=$row['image'];
	$na=$row['name'];
	//echo "$h";
	?>
	<a href="#" ><?php echo $na;?></a>
 <video width="300" height="200" controls>
	<source src="<?php echo $h; ?>" " type="video/mp4">
	</video>;
	<?php
	# code...
}
echo "<div id='rslt'>"; echo "Thanks! video has been sent to "; 
}
//}

?>
</body>
</html>