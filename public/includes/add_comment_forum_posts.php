<?php 
if (isset($_POST['add_comment_forum']) && isset($_GET['id']) && $session->signed_in == true) {

    global $database;
   
    $comment_post_id = $_GET['id'];
    $comment_user_id = $user->user_id;
    $comment_text   = $_POST['comment_text'];
    $comment_date        = date("Y-m-d H:i:s");

    
    //    if no uploaded image give it default image

    $query = "INSERT INTO comments_forum(comment_post_id, comment_user_id, comment_text, comment_date) ";
    
    $query .= "VALUES('{$comment_post_id}','{$comment_user_id}','{$comment_text}','{$comment_date}') ";

    $query_add_comment = $database->query_array($query);

    // ADD NOTIFICATION
    $query2 = "SELECT * from forum_posts where id= $comment_post_id";
    $search_query= $database->query_array($query2);

       
    while($row = mysqli_fetch_array($search_query)) {
        $user_id = $row["post_user_id"];

        $query2 = "INSERT INTO notifications_forum_posts_comments(user_notification_id, comment_user_id, post_id) ";
        $query2 .= "VALUES('{$user_id}','{$comment_user_id}', '{$comment_post_id}') "; 
        $add_notification_query= mysqli_query($connection,$query2);
    }

   
    }

?>


