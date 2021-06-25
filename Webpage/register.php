<?php session_start();?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Midwest Fest Registration</title>
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

  <main class="register">
      <div class="container">
          <header>
              <h1 class="center">Sign Up</h1>
          </header>
          <div class="container">
            <br>

            <form name="register" action="register.php" method="post">

            <input type="text" placeholder="First Name" id="firstname" name="firstname" size="40" required>
            <br>

            <input type="text" placeholder="Last Name" id="lastname" name="lastname" size="40" required>
            <br>

            <input type="text" placeholder="Email" id="email" name="email" size="40" required>
            <br>

            <input type="text" placeholder="Username" id="username" name="username" size="40" required>
            <br>

            <input type="password" placeholder="Password" id="password" name="password" size="40" required>
            <br>

            <input type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" size="40" required>
            <br>
            <br>

            <input type="submit" name="submit" value="Register">

          </div>
        </form>
      </div>

      <article class="contact-form">
          <form></form>
      </article>

      <footer>
          <h3>Follow Us On Social Media</h3>
          <div class="icons">
              <!--  https://stackoverflow.com/questions/35566603/make-font-awesome-icon-size-increase-on-mouseover -->
              <a href="#twitter"><i class="fab fa-twitter-square fa-2x"></i></a>
              <a href="#facebook"><i class="fab fa-facebook-square fa-2x"></i></a>
              <a href="#instagram"><i class="fab fa-instagram fa-2x"></i></a>
          </div>
      </footer>
      </div>

      <?php
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $password = $_POST['password'];
      $conn = mysqli_connect("db.soic.indiana.edu","i494f18_team07","my+sql=i494f18_team07","i494f18_team07");
      $sql_u = "SELECT username FROM forumusers WHERE username = '".$username."'";
      $sql_e = "SELECT email FROM forumusers WHERE email = '".$email."'";
      $res_u = mysqli_query($conn,$sql_u);
      $res_e = mysqli_query($conn,$sql_e);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      } //else echo "Connected successfully."//
      if($_POST["password"] != $_POST["confirmPassword"]) {
        echo "<div class='container' style='color: white; position: absolute; top: 43%; left: 50%; margin-left: -250px; width: 500px; height: auto; text-align: center;'>Passwords do not match. Try again.</div>";
        exit();
      }elseif(mysqli_num_rows($res_u) > 0) {
        echo "<div class='container' style='color: white; position: absolute; top: 43%; left: 50%; margin-left: -250px; width: 500px; height: auto; text-align: center;'>Sorry, that username already exists!</div>";
        exit();
      }elseif(mysqli_num_rows($res_e) > 0) {
        echo "<div class='container' style='color: white; position: absolute; top: 43%; left: 50%; margin-left: -250px; width: 500px; height: auto; text-align: center;'>Sorry, that email already exists!</div>";
        exit();
      }else{
        $sql = "INSERT INTO forumusers (id, username, password, email, firstname, lastname, type, forum_notifcation)
        VALUES (DEFAULT, '".$username."', '".$password."', '".$email."', '".$firstname."', '".$lastname."', DEFAULT, DEFAULT)";
        header("location: http://cgi.sice.indiana.edu/~team07/preferences.php");
      }

      if (mysqli_query($conn,$sql)){
        echo "User Added Successfully";
      } else {
        echo "Error Creating User: " . mysqli_error($conn);
      }
      ?>


</body>
</html>
