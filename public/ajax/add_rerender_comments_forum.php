<?php session_start();
include "../php/init.php";




    global $database;
   
    $post_id =  $_POST["data"][0];
    $comment_user_id = $user->user_id;
    $comment_text   = $_POST["data"][1];
    $comment_date        = date("Y-m-d H:i:s");
    
  

    $query = "INSERT INTO comments_forum(comment_post_id, comment_user_id, comment_text, comment_date) ";
    
    $query .= "VALUES('{$post_id}','{$comment_user_id}','{$comment_text}','{$comment_date}') ";

    $query_add_comment = $database->query_array($query);

   
    add_forum_posts_notification($comment_user_id, $post_id );
   
    $query2 = $database-> query_array("SELECT * from comments_forum where comment_post_id = $post_id order by comment_date DESC");
    $rowcount=mysqli_num_rows($query2);
    if($rowcount>0) {
        while ($row = mysqli_fetch_array($query2)) {
            $comment_id = $row["comment_id"];
            $comment_user_id = $row["comment_user_id"];
            $comment_text = $row["comment_text"];
            $comment_date = $row["comment_date"];
            $comment_year = substr($comment_date, 0, 10);
            $comment_time = substr($comment_date, 11);
            $query3 = $database-> query_array("SELECT * from users where user_id = $comment_user_id");
       

            while ($row = mysqli_fetch_array($query3)) {
                $user_comment_name = $row["user_firstname"];
                $user_comment_lastname = $row["user_lastname"];
                $user_avatar = $row["user_img"];

                // ADD NOTIFICATION

                $likes_count = likes_count($comment_id);
                $like_icon = likeIconChange($comment_id);
             
                global $session;
                // only display reply if user is logged in 
                if($session->signed_in==true) {
                $user_reply = '<span class="replay" >Reply</span>';
                } else {$user_reply =  ' ';
                }
        
                // only display edit for users comments
                if($session->signed_in==true && $user->user_id == $comment_user_id ) {
                    $edit_options = '<div class="comment_edit_label col-custom"> 
                        <img class="edit_comment edit_comment_num_'.$comment_id.'"src="./imgs/icons/edit.svg">
                        <div class="comment_options">

                            <span class="edit_comment_trigger" data-comment-id="'.$comment_id.'" data-post-id = "'.$post_id.'"> Edit </span>
                            <span class="delete_comment_trigger"data-comment-id="'.$comment_id.'" data-post-id = "'.$post_id.'"> Delete </span>
                        </div>
                    </div>';

                } else {
                    $edit_options = ' ';
                }


                echo '<li class="box_result row comment_window">'
                    .$edit_options .'

                    <div class="row-custom comment-user-profile">
                        <div class="avatar_comment col-md-1">
                            <img class="comment_user_avatar" src="imgs/users_avatars/'.$user_avatar.' " alt="">
                        </div>

                        <h4>'. $user_comment_name . ' '. $user_comment_lastname. '</h4>
                    </div>
                    
                    <p class="comment_text">'.$comment_text .'</p>
                    <span class="comment_date">'.$comment_time.'</span>
                    <span class="comment_date">'.$comment_year.'</span>
                   
                    <div class="tools_comment">
                        '. $user_reply.'
                        <a data-comment-id="'.$comment_id.'"class="like " >'.$like_icon.'</a>
                      
                       <span class="count_'.$comment_id.'">likes: '.$likes_count.'</span> 
                     
                     
                    </div>
            </li>';
            }
        }}

    


?>


