<?php session_start();
include "../php/init.php";?>

<?php 

    $user_id = $user->user_id;
    $query = "DELETE FROM notifications_forum_posts_comments WHERE user_notification_id = $user_id";
    $delete_query = $database->query_array($query);

     
    $query2 = "DELETE FROM notifications_bookings WHERE user_notification_id = $user_id";
    $delete_query2 = $database->query_array($query2);


    

?>