<?php include "./php/init.php"?>

<?php 
global $connection;
    $user_id = $user->user_id;

 
    $query = "SELECT * FROM notifications_forum_posts_comments where user_notification_id = $user_id ";
    $search_query = mysqli_query($connection, $query);
    $search_count = mysqli_num_rows($search_query);
  
    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $comment_user_id = $row["comment_user_id"];
            $post_id = $row["post_id"];

            $query2 = "SELECT * FROM users where user_id = $comment_user_id ";
            $search_query2 = mysqli_query($connection, $query2);
            if($search_count>=1) {
                while($row = mysqli_fetch_array($search_query2)) {
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];

      

                echo 

                '<span class="notification_card">
                    <a href="forum_post.php?id='.$post_id.'">
                        <img src="./imgs/icons/comment.svg">
                        '.$user_firstname.' '.$user_lastname.' 
            
                        commented your post
                    </a>

                </span>';
            }        
        }                
                
            
           

    }  
}


            
?>

    