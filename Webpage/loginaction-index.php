<?php
session_start();
include_once("searchheader.php");

if (isset($_POST['username'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $sql = "Select * from forumusers where username='".$username."' and password='".$password."' limit 1";
    $results = mysqli_query($conn,$sql) or die(mysqli_error());

    if (mysqli_num_rows($results) == 1){
        $row=mysqli_fetch_assoc($results);
        $_SESSION['uid']=$row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname'] = $row['firstname'];
        header("Location: http://cgi.sice.indiana.edu/~team07/index.php");
        exit();
    }else {
        echo "Invalid Login Information. Please return to the previous <a href='http://cgi.sice.indiana.edu/~team07/index.php'> page.</a>";

        exit();
    }
}
?>
