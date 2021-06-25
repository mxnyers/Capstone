<?php session_start();?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Midwest Fest Home Page</title>
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
                <?php
                $conn = mysqli_connect("db.soic.indiana.edu","i494f18_team07","my+sql=i494f18_team07","i494f18_team07");
                $_SESSION['uid'];
                $user = $_SESSION['uid'];

                if (!isset($_SESSION['uid'])){
                  echo "<header><h1>Welcome To Midwest Fest!!!</h1></header>
                  <div class='media_container'>
                  <div class='easy_access'><div class='sign-up'><h2>Login</h2>
                  <form action='loginaction-index.php' method='post'>
                  <div class='username'>
                  <label class='label' for='sign-up'>Username:</label>
                  <input type='text' name='username' placeholder='Enter Username'/>&nbsp;
                  </div>
                  <div class='password'>
                  <label class='label' for='sign-up'>Password:</label>
                  <input type='password' name='password' placeholder='Enter Password'/>&nbsp;
                  </div>
                  <input type='submit' type='submit' name='signup' value='Login'/>
                  <br><br><a href='register.html'>New User? Sign Up</a></div><br>
                  ";

                }else {
                  echo "<header><h1>Welcome To Midwest Fest, ".$_SESSION['firstname']."!!!</h1></header>
                  <div class='media_container'>
                  <div class='easy_access'>
                  <div class='home_reviews'><h2>Festivals For You</h2>
                  <div class='card_container'>";
                  $sql = "SELECT * FROM Preferences WHERE Userid = '".$user."'";
                  $results = mysqli_query($conn, $sql) or die(mysqli_error());
                  $counter = 0;
                  if (mysqli_num_rows($results) > 0){
                      while ($row=mysqli_fetch_assoc($results)){
                          $id=$row['Userid'];
                          $location = $row['Location'];
                          $genre = $row['Genre'];
                          if (!empty($location)) {
                            $sql2 = "SELECT * FROM Festival WHERE State = '".$location."' LIMIT 3";
                            $statefestival = mysqli_query($conn, $sql2);
                            while ($row=mysqli_fetch_assoc($statefestival)){
                                $num_rows = mysqli_num_rows($statefestival);
                                $festivalid=$row['Festivalid'];
                                $festivalname=$row['Festivalname'];
                                $festivalstate=$row['State'];
                                $div=$row['DivTag'];
                                $image = $row['Image'];
                                echo "<div class=".$div.">
                                <img src='images/".$image."' alt=".$festivalname."><p><a href='#blueox'>Learn More!</a></p></div>
                                ";
                                if ($num_rows=3){
                                  break;
                                }
                            }
                          }
                      }
                      echo "</div></div><br>";
                  }
                }

                ?>

                <div class='home_reviews'>
                  <h2>Recent Reviews</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>

              <div class="twitter">
                <h2>Follow Us On Twitter!</h2>
                <!--twitter widget learned from: https://publish.twitter.com/# -->
                <a class="twitter-timeline" href="https://twitter.com/fest_midwest?ref_src=twsrc%5Etfw">Tweets by fest_midwest</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div>
            </div>

        <footer>
          <h3>Follow Us On Social Media</h3>
          <div class="icons">
            <!--  https://stackoverflow.com/questions/35566603/make-font-awesome-icon-size-increase-on-mouseover -->
          <a href="#twitter"><i class="fab fa-twitter-square fa-2x"></i></a>
          <a href="#facebook"><i class="fab fa-facebook-square fa-2x"></i></a>
          <a href="#instagram"><i class="fab fa-instagram fa-2x"></i></a>
          </div>
        </footer>
        <a href='logoutaction-index.php'> Logout </a>

    </div>
        <script language="javascript">
        function check(form)
        {
            if(form.user.value == "username" && form.pass.value == "password")
            {
                window.open('LOGIN TAKE TO HOMEPAGE')
            }
            else
            {
                alert("Please enter a valid username and password")
            }
        }
    </script>
    </body>
    </html>
