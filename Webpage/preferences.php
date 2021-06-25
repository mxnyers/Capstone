<?php session_start();?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Midwest Fest User Preferences</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

  <!--Learned how to make profile cards from: https://www.w3schools.com/howto/howto_css_profile_card.asp -->
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    if (!isset($_SESSION['uid'])){
      echo "<header><h1>Welcome To Midwest Fest!!!</h1></header>";
    }else {
      echo "<header><h1>Welcome To Midwest Fest, ".$_SESSION['firstname']."!!!</h1></header>";
    }
    ?>


    <?php
    if (isset($_POST['submit'])){
      header("location: http://cgi.sice.indiana.edu/~team07/index.php");
    }
    ?>
    <form name="preferences" action="" method="post">
      <br>
        <h3> Select your preferences so we can make festival recommendations!</h3>
        <div class='media_container'>
          <div class='easy_access'>
            <div class='home_reviews'>
              <h2> Locations </h2>
              <div class="links">
                <input type="checkbox" id="wi" name="location[]" value="WI">Wisconsin           <br>
                <input type="checkbox" id="il" name="location[]" value="IL">Illinois        <br>
                <input type="checkbox" id="ia" name="location[]" value="IA">Iowa          <br>
                <input type="checkbox" id="mi" name="location[]" value="MI">Michigan          <br>
              </div>
              <div class="links">
                <input type="checkbox" id="in" name="location[]" value="IN">Indiana          <br>
                <input type="checkbox" id="oh" name="location[]" value="OH">Ohio          <br>
                <input type="checkbox" id="mo" name="location[]" value="MO">Missouri       <br>
                <input type="checkbox" id="mn" name="location[]" value="MN">Minnesota           <br>
              </div>
            </div>
          </div>

          <div class="easy_access">
            <div class='home_reviews'>
                <h2> Genres</h2>
                  <div class="links">
                    <input type="checkbox" id="Rap" name="genre[]" value="Hip Hop / Rap">Hip Hop / Rap      <br>
                    <input type="checkbox" id="Funk" name="genre[]" value="Funk">Funk       <br>
                    <input type="checkbox" id="Electronic" name="genre[]" value="Electronic">Electronic          <br>
                    <input type="checkbox" id="Rock" name="genre[]" value="Rock">Rock          <br>
                    <input type="checkbox" id="Pop" name="genre[]" value="Pop">Pop       <br>
                    <input type="checkbox" id="Soul" name="genre[]" value="R&B / Soul">R&B / Soul         <br>
                  </div>
                  <div class="links">
                    <input type="checkbox" id="reggae" name="genre[]" value="Reggae">Reggae            <br>
                    <input type="checkbox" id="house" name="genre[]" value="House Music">House Music        <br>
                    <input type="checkbox" id="dubstep" name="genre[]" value="Dubstep">Dubstep            <br>
                    <input type="checkbox" id="alternative" name="genre[]" value="Alternative Rock">Alternative Rock           <br>
                    <input type="checkbox" id="country" name="genre[]" value="Country">Country          <br>
                  </div>
                </div>
              </div>
            </div>


        <br><br>
        <a href="index.php"><input type="submit" name="submit" value="Submit"></a><br><br>
        <a href="index.php">Skip</a>
      </div>
    </form>

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
    $conn = mysqli_connect("db.soic.indiana.edu","i494f18_team07","my+sql=i494f18_team07","i494f18_team07");
    $_SESSION['uid'];
    $user = $_SESSION['uid'];
    $checkbox1 = $_POST['location'];
    $checkbox2 = $_POST['genre'];
    $check="";
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    } //else echo "Connected successfully."//
    if (isset($_POST['submit'])){
      foreach($checkbox1 as $key => $value){
        $sql1 = "INSERT INTO Preferences (Userid, Location, Genre) VALUES ('".$user."', '".$value."', NULL)";
        $query = mysqli_query($conn, $sql1);
      }
      foreach($checkbox2 as $key => $value){
        $sql2 = "INSERT INTO Preferences (Userid, Location, Genre) VALUES ('".$user."', NULL, '".$value."')";
        $query = mysqli_query($conn, $sql2);
      }
    }
    ?>

</body>
</html>
