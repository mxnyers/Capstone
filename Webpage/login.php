<?php session_start();?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Midwest Fest Login</title>
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
              <h1 class="center">Login</h1>
          </header>

              <div class='sign-up'><h2>Account created successfully! Please login.</h2>
                <form action='loginaction-preferences.php' method='post'>
                  <div class='username'>
                    <label class='label' for='sign-up'>Username:</label>
                    <input type='text' name='username' placeholder='Enter Username'/>&nbsp;
                  </div>
                  <div class='password'>
                    <label class='label' for='sign-up'>Password:</label>
                    <input type='password' name='password' placeholder='Enter Password'/>&nbsp;
                  </div>
                  <input type='submit' type='submit' name='signup' value='Login'/>
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


</body>
</html>
