<?php session_start();
include "../php/init.php";
    
    global $user;
    $user_id = $user->user_id;
    $forumCommentId   = $_POST["data"][0];
    $post_id   = $_POST["data"][1];
    $to_be_liked = "./imgs/icons/thumbs-up-empty.svg";
    $liked = "./imgs/icons/thumbs-up-filled.svg";

    // check number of comment likes after adding or deleting if like already exists
    function check_num_likes_query($forumCommentId){
        global $connection;
        $query = "SELECT * FROM forum_comments_likes where forum_comment_id = $forumCommentId";
        $check_likes_query = mysqli_query($connection, $query);
        $user_num_likes = mysqli_num_rows($check_likes_query);
        return $user_num_likes;
    }

    if( $session->signed_in==true) {
       
        $query1 = "SELECT * FROM forum_comments_likes where forum_comment_id = $forumCommentId AND user_liker_id =  $user_id";
        $check_user_likes_query = mysqli_query($connection, $query1);
        $user_num_likes = mysqli_num_rows($check_user_likes_query);
        if($user_num_likes>=1) {
           
            $query3 = "DELETE FROM forum_comments_likes WHERE forum_comment_id = $forumCommentId AND user_liker_id =  $user_id";
            $delete_like_query = mysqli_query($connection, $query3);
           $number_likes = check_num_likes_query($forumCommentId);
           
            $data = [ $number_likes ,$to_be_liked] ;
            echo   json_encode($data);
        }
        else {
            $query2 = "INSERT INTO forum_comments_likes( forum_comment_id, user_liker_id, forum_comment_post_id) ";
    
            $query2 .= "VALUES('{$forumCommentId}','{$user_id}','{$post_id}') ";
           
            $create_review_query = mysqli_query($connection, $query2);
            $number_likes = check_num_likes_query($forumCommentId);

            $data =[$number_likes , $liked];
            echo  json_encode($data);
        }
     
       
       
    }
  
    elseif( $session->signed_in==false) {
        echo "not_logged";
    }
    
    


?>


