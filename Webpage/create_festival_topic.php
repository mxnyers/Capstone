<?php session_start();?>
<?php
if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")) {
        header("Location: forumindex.php");
        exit();


        }
$cid = $_GET['cid'];
//$tid = $_GET['tid'];

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Midwest Fest Create Forun Topic</title>
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
            <a href="index.html"><img src="images/logo.png" alt="Midwest Fest Logo"></a>
        </div>
        <div class="links">
            <a href="forumindex.php">Reviews</a>
            <a href="festivals.html">Festivals</a>
            <a href="social.html">Social</a>
            <a href="contact.html">Contact</a>
            <a href="searchbarv4.php">Search</a>
            <a href="login.html">Login</a>
        </div>
    </nav>
    <div id="wrapper">
        <h2> Festival Review Forums</h2>
        <p> Here you will find the forums where you can discuss your favorite festivals!</p>
        <?php
        echo "<p> You are logged in as ".$_SESSION['username']." &bull; <a href='logoutaction.php'> Logout </a>";

        ?>
        <hr/>

    <div id="content">
       <form action="create_festival_topic_action.php" method="post">
        <p>Topic Title</p>
        <input type="text" name="topic_title" size="96" maxlength="125" />
        <p>Topic Content</p>
        <textarea name="topic_content" rows="5" cols="75"></textarea>
        <br/> <br/>
        <input type="hidden" name="cid" value="<?php echo $cid;?>"/>
        <input type="submit" name="topic_submit" value="Create your topic" />
         </form>
        </div>
        </div>
    </body>

</html>
