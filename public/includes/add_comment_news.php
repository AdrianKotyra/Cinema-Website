<?php 
if (isset($_POST['add_comment']) && isset($_GET['post']) && $session->signed_in == true) {

    global $database;
    $comment_post_id = $_GET['post'];
    $comment_user_id = $user->user_id;
    $comment_text   = $_POST['comment_text'];
    $comment_date        = date("Y-m-d H:i:s");

    
    //    if no uploaded image give it default image

    $query = "INSERT INTO comments_news(comment_post_id, comment_user_id, comment_text, comment_date) ";
    
    $query .= "VALUES('{$comment_post_id}','{$comment_user_id}','{$comment_text}','{$comment_date}') ";

    $query_add_comment = $database->query_array($query);
}

?>


