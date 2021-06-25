<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Midwest Fest Searchbar</title>
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
    include 'searchheader.php';
?>

<div class="search_by">
    <h1> Search by:</h1>
    <h2>Band Name, Genre, Festival Name, State </h2>
    <form action=search.php method="post">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search" value="one"> Search by Band or Genre </button>
    <button type="submit" name="submit-search" value="two"> Search by Festival Name </button>
    </form>


    <!--<h2 class="search"> Search by:</h2>
    <h2 class="by"> Festival Name</h2>

    <form action=searchfestival.php method="post">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search"> Search </button>
    </form>

-->

    <h2> Bands in Festivals</h2>


       <form action="festivalbandsearch.php" method="post">
    Bandname: <select name="search" value="search">
    <?php

        $result = mysqli_query($conn,"SELECT * FROM Band");
        while ($row = mysqli_fetch_assoc($result)) {
                      $name = $row['Bandname'];
                      echo '<option value="'.$name.'">'.$name.'</option>';
    }
    ?>
        </select>
    <br>
    <input type="submit" name="submit-search" value="Run Query">
    </form>
    </div>

    <div class="search_filters">
    <h2> Festivals with Filters</h2>


    <div class="article-container">
       <form method="post" action="filteredfestival.php">
            <p>Filter by Date:</p>
                <input type="radio" name="dateorder" value="dateasc"><label for="dateasc">Ascending by Date</label><br>
                <input type="radio" name="dateorder" value="datedesc"><label for="datedesc">Descending by Date</label>
                <br>
                <input name="submit" type="submit">

        </form>
        <br>

        <form action="filteredfestivalstate.php" method="post">
    Filter by State: <select name="search" value="search">
    <?php

        $result = mysqli_query($conn,"SELECT distinct State FROM Festival");
        while ($row = mysqli_fetch_assoc($result)) {
                      $name = $row['State'];
                      echo '<option value="'.$name.'">'.$name.'</option>';
    }
    ?>
        </select>
    <br>
    <input type="submit" name="submit-search" value="Run Query">
    </form>
    <br>

    <form action="filteredfestivalcity.php" method="post">
    Filter by City: <select name="search" value="search">
    <?php

        $result = mysqli_query($conn,"SELECT distinct City FROM Festival");
        while ($row = mysqli_fetch_assoc($result)) {
                      $name = $row['City'];
                      echo '<option value="'.$name.'">'.$name.'</option>';
    }
    ?>
        </select>
    <br>
    <input type="submit" name="submit-search" value="Run Query">
    </form>
    <br>

    <form action="filteredfestivalrating.php" method="post">
    Filter by Rating: <select name="search" value="search">
            <option value="0">--Select Rating--</option>
            <option value="one">Rating 1+ star</option>
            <option value="two">Rating 2+ star</option>
            <option value="three">Rating 3+ star</option>
            <option value="four">Rating 4+ star</option>
            <option value="five">Rating 5+ star</option>
        </select>
    <br>
    <input type="submit" name="submit-search" value="Run Query">
    </form>
    <br>

    <form action="filteredfestivalprice.php" method="post">
    Filter by Rating: <select name="search" value="search">
            <option value="0">--Select Cost Range--</option>
            <option value="one">Under $100</option>
            <option value="two">$100-$199</option>
            <option value="three">$200-$299</option>
            <option value="four">$300-$399</option>
            <option value="five">$400+</option>
        </select>
    <br>
    <input type="submit" name="submit-search" value="Run Query">
    </form>
  </div>

</div>
</body>
</html>
