<?php
session_start();
if ($_SESSION['uid']== "") {
        header("Location: forumindex.php");
        exit();
            
                
}
if (isset($_POST['topic_submit'])) {
       if  (($_POST['topic_title'] == "") || ($_POST['topic_content'] == "")){
           echo "You did not fill in both fields. Please return to the previous page.";
           exit();
       }else {
           include_once("searchheader.php");
        $cid = mysqli_real_escape_string($conn,$_POST['cid']);
        //$tid = mysqli_real_escape_string($conn,$_POST['tid']);
        $title = mysqli_real_escape_string($conn,$_POST['topic_title']);
        $content =$_POST['topic_content'];
        $creator = $_SESSION['uid'];
        $sql ="INSERT INTO topics (category_id,topic_title,topic_creator,topic_date,topic_reply_date) values ('".$cid."','".$title."','".$creator."',now(),now())";
        $results = mysqli_query($conn,$sql);
        $new_topic_id=mysqli_insert_id($conn);
        $sql2 = "INSERT INTO posts (category_id,topic_id,post_creator,post_content,post_date) values ('".$cid."','".$new_topic_id."','".$creator."','".$content ."',now())";
        $results2 = mysqli_query($conn,$sql2);
        $sql3 ="Update festivalcategory set lastpost_date=now(), lastuser_posted='".$creator."' where id = '".$cid."' limit 1";
        $results3 = mysqli_query($conn,$sql3);
           if (($results) && ($results2) && ($results3) ) {
               header("Location: view_festival_topic.php?cid=".$cid."&tid=".$new_topic_id);
               echo "Sucess your topic was created successfully!";
           }else{
               echo"There was a problem creating your topic, please try again.";
           }
           
       }
            
                
        }
?>