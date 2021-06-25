<?php
$servername = "db.soic.indiana.edu";
$username = "i308s18_mxnyers";
$password = "my+sql=i308s18_mxnyers";
$database = "i308s18_mxnyers";
$con=mysqli_connect($servername,$username,$password,$database);

if(mysqli_connect_errno())
	{echo nl2br("Failed to connect to MySQL:" . mysqli_connect_error() . "\n");}
else
	{echo nl2br("Established Database Connection \n");}

$sanuname = $_POST['username'];
$sanupass = $_POST['userpass'];


$sql="INSERT INTO user (username, userpass) VALUES ('$sanuname','$sanupass')";
if (!mysqli_query($con,$sql))
	{die('Error; ' . mysqli_error($con));}

echo "User added";
mysqli_close($con);
?>
