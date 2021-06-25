<?php session_start();?>
<html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Midwest Fest Festival: Lollapalooza</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Learned how to place logo as icon from https://stackoverflow.com/questions/25952907/favicon-ico-vs-link-rel-shortcut-icon -->
      <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

    <!--Learned how to make profile cards from: https://www.w3schools.com/howto/howto_css_profile_card.asp -->
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Midwest Fest Logo"></a>
        </div>
        <div class="links">
            <a href="forumindex.php">Reviews</a>
            <a href="festivals.html">Festivals</a>
            <a href="social.html">Social</a>
            <a href="contact.html">Contact</a>
            <a href="searchbarv4.php">Search</a>
            <a href="register.html">Login</a>
        </div>
    </nav>
    <div class="container">
    <div class="forum_header">
        <h2> Festival Review Forums</h2>
        <p> Here you will find the forums where you can discuss your favorite festivals!</p>
        <?php
        if (!isset($_SESSION['uid'])){
            echo "<form action='loginaction.php' method='post'>
            Username: <input type='text' name='username'/>&nbsp;
            Password: <input type='text' name='password'/>&nbsp;
            <input type='submit' name='submit' value='login'/>
            ";


        }else {
            echo "<p> You are logged in as ".$_SESSION['username']." &bull; <a href='logoutaction.php'> Logout </a>";
        }
        ?>

        <?php
            include_once("searchheader.php");
            $sql= "Select * from festivalcategory order by category_title asc";
            $results = mysqli_query($conn,$sql) or die(mysqli_error());
            $categories="";
            if (mysqli_num_rows($results) > 0 ){
                while ($row=mysqli_fetch_assoc($results)){
                    $id=$row['id'];
                    $title = $row['category_title'];
                    $description = $row['category_description'];
                    $categories .= "<p><a href='viewfestivalcategory.php?cid=".$id."' class='' >".$title." - <font size='-1'>".$description."</font> </a>&nbsp</p>";
                }
                echo $categories;
    }   else {
            echo "<p>There are no categories available.</p>";

    }
            ?>
        </div>
        </div>
    </body>

</html>
