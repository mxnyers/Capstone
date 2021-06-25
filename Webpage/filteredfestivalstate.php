<?php
    include 'searchheader.php';
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Midwest Fest Search Results</title>
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
<h1>Search Page</h1>
<div class="search_by">
    <?php
    if (isset($_POST['search'])){
        $search = mysqli_real_escape_string($conn,$_POST['search']);
        $finalsearch = strtoupper($search);

        $sql = "Select * from Festival where State like '%$finalsearch%' ";
        $result = mysqli_query($conn,$sql);
        $queryresults = mysqli_num_rows($result);
        $bandname = $_POST['search'];

        echo "It appears there are " .$queryresults." festivals!";

        if($queryresults > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div>
                <h3>".$row['Festivalname']. "</h3>
                <p>".$row['StartDate']. "</p>
                <p>".$row['EndDate']. "</p>
                <p>".$row['City']. "</p>
                ".$row['State']. "
                </div>";
            }
        }
            else {echo " There are no Festivals that match your search that are happening in the Midwest any time soon!";}
    }

    ?>
</div>
</body>
</html>
