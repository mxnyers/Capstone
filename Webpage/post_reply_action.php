<?php 
session_start();
if ($_SESSION['uid']){
    if (isset($_POST['reply_submit'])){
        include_once("searchheader.php");
        $creator = $_SESSION['uid'];
        $cid = $_POST['cid'];
        $tid = $_POST['tid'];
        $reply_content = $_POST['reply_content'];
        $sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) values ('".$cid."','".$tid."','".$creator."','".$reply_content."',now())";
        $results = mysqli_query($conn,$sql);
        
        $sql2 = "UPDATE festivalcategory set lastpost_date=now(), lastuser_posted='".$creator."' where id = '".$cid."' limit 1";
        $results2 = mysqli_query($conn,$sql2);
        
        $sql3 = "UPDATE topics set topic_reply_date=now(), topic_last_user='".$creator."' where id = '".$tid."' limit 1";
        $results3 = mysqli_query($conn,$sql3);
        
        if ( ($results) && ($results2) && ($results3)){
            echo "<p> Your reply has been successfully added! <a href='view_festival_topic.php?cid=".$cid."&tid=".$tid."'>Click here to return to the topic.</a> </p>";
            
        }else { echo "<p>There was a problem posting your reply. Please try again later.</p>";}
        
    }else {
        exit();}
}else {
    exit();}
?>