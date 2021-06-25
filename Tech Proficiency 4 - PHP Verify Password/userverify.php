<?php
$servername = "db.soic.indiana.edu";
$username = "i308s18_mxnyers";
$password = "my+sql=i308s18_mxnyers";
$database = "i308s18_mxnyers";
$con=mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " .mysqli_connect_error();}
$sanuname = $_POST['username'];
//Encryption learned from I308 lecture 13
//Grab the password from form data sent via POST
$postPswd = $_POST['password'];
//encrypt the password
$encPswd=password_hash($postPswd,
PASSWORD_DEFAULT);
if (password_verify($postPswd, $encPswd)) {
    //https://stackoverflow.com/questions/7467330/php-headerlocation-force-url-change-in-address-bar
    header("Location: http://cgi.soic.indiana.edu/~mxnyers/index.html");
}
else {
    echo 'Invalid password.';
}
mysqli_close($con);
?>
