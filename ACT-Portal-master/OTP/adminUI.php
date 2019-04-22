
<!DOCTYPE html>
<html>
<head>
<body>
  

	<title></title>
	<style type="text/css">
@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}
a{
  text-decoration: none;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}
	</style>
</head>
<table class="container">
	<thead>
		<tr>
			<th><h1>Sno</h1></th>
			<th><h1>Name</h1></th>
			<th><h1>Department</h1></th>
			<th><h1>VideoCount</h1></th>
		</tr>
	</thead>
	<tbody>
  <?php
$link=mysql_connect("localhost","root","");
mysql_select_db("act",$link);
$sql="SELECT DISTINCT Name,Email,VideoCount FROM video_table where VideoCount!='0';";
$selectValuesFromSignUptable="SELECT DISTINCT signup_table.Name,signup_table.Department FROM signup_table right join `video_table`on (signup_table.`Email`= `video_table`.`Email`) where signup_table.Name is not null";
$aResult=mysql_query($sql);
$aresult=mysql_query($selectValuesFromSignUptable);
$department=array();
$sno=array();
$email= array();
$name= array();
$videocount=array();
$i=1;
while($rows = mysql_fetch_array($aResult))
{ 
$sno[]=$i;
$videocount[]=$rows['VideoCount'];
$name[]= $rows['Name']; 
$i++;
}
while($rows = mysql_fetch_array($aresult))
{ 

$department[]=$rows['Department'];
}
$i=0;
$j=count($department);
while($i<$j)
{
echo "<tr>";
echo "<td>$sno[$i]</td>";
echo "<td><a href='adminvideo.php?name=$name[$i]'>$name[$i]</a></td>";
echo "<td>$department[$i]</td>";
echo "<td>$videocount[$i]</td>";
echo "</tr>";
$i++;
}
?>
</tbody>
</table>
</span>
</h1>
</body>
</script>
</html>