<?php
$servername = "db.soic.indiana.edu";
$username = "i308s18_mxnyers";
$password = "my+sql=i308s18_mxnyers";
$database = "i308s18_mxnyers";
$conn=mysqli_connect($servername,$username,$password,$database);
//// Check connection
//if (![$conn])
//	{die("Failed to connect to MySQL: " . mysqli_connect_error()); }
//else 
//	{echo "Established Database Connection <br />" ;}

//code adapted from https://www.w3schools.com/php/php_date.asp
date_default_timezone_set("US/Eastern");

//Used code to convert the hour into a string from https://stackoverflow.com/questions/8529656/how-do-i-convert-a-string-to-a-number-in-php
$first = date(H);
$hour = (int)$first;
$time = "The time is ". date("h:ia") . "<br />";

echo $time;

if (6<=$hour and $hour<12)
	{echo "Good Morning! <br />";}

elseif (12<=$hour and $hour<18)
	{echo "Good Afternoon! <br /> ";}

elseif (18<=$hour and $hour<23)
	{echo "Good Evening! <br />";}

elseif (0<=$hour and $hour<6)
	{echo "Good Evening! <br />";}

else
	{echo "error <br />";}
?>