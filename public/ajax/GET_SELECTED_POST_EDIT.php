<?php include("../php/init.php");


?>

<!-- // get edited post query -->
<?php

    if(isset($_POST["data"])) {
        global $connection;
        $post_id_to_be_edited = $_POST["data"];
        $query = "SELECT * from forum_posts where id={$post_id_to_be_edited}";
        $select_users_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_users_query)) {
            $post_id = $row["id"];
            $post_title    = $row['post_title'];
            $post_text   = substr($row['post_text'], 0, 36);
            $post_user_id   = $row['post_user_id'];
            $post_date       = $row['post_date'];
            $post_img       = $row['post_img'];
            $post_year = substr($post_date, 0, 10);
            $post_time = substr($post_date, 11);

            $query3 = $database-> query_array("SELECT * from comments_forum where comment_post_id = $post_id");
            $post_num_comments=mysqli_num_rows($query3);





        }


    }



// get edited post

echo '
    <div class="header-settings ">
        <img class="backer-settings-posts" src="./imgs/icons/left-arrow.svg">
        <h1 class="edit_post_header">Edit post</h1>
    </div>

    <div class="settings_user_card ">


    <img class="forum-post-img settings_post_img" src="'.$post_img.'" alt="">

    <div class="forum-container-text col-custom">

        <h5>'.$post_title.'</h5>
    <div class="post-reply-counter row-custom">
        <div class="col-custom date-settings-post">
            <span class="date-label-post">'. $post_year .'</span> <br>
            <span class="date-label-post">'. $post_time .'</span>
        </div>

        <div>
            <img class="forum-post-comment-img"src="imgs/icons/comment.svg" alt="">
            <span class="post-reply-counter-number">'.$post_num_comments.'</span>

        </div>


        </div>

        </div>


    </div>







    <form id="editPostForm"action="" method="post" enctype="multipart/form-data">



    <input class="edit_post_settings_input hidden"type="text" class="form-control" name="post_id" value="'.$post_id.'">
    <div class="form-group">
        <label for="post_title">Post title</label>
        <input class="edit_post_settings_input"type="text" class="form-control" name="post_title" value="'.$post_title.'">
    </div>



    <div class="form-group user-form-row">
        <label for="post_text">Post text</label>
        <textarea class="form-control user_bio edit_post_settings_input" name="post_text" rows="6">'.$post_text.'</textarea>
    </div>

    <div class="form-group">
        <label class="file">
        <img id="thumbnail" src="" alt="Image ">
        <input class="edit_post_settings_input"  required type="file"  name="image"id="imageInput">
        </label>
    </div>




    <div class="form-group">
        <input class="btn btn-primary edit_post_button" type="submit" name="edit_post" value="Update Post">
    </div>

</form>';

?>