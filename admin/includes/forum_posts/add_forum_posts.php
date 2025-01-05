<?php

if(isset($_POST['create_forum_post'])) {
    alert_text("Post has been added", "forum.php");

    $post_title    = $_POST['post_title'];
    $post_user_forum   = $_POST['post_user_forum'];
    $post_text   = $_POST['post_text'];
    $post_date        = $_POST['post_date'];
    $post_img        = '../public/imgs/forum_posts/'.$_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];

    //    if no uploaded image give it default image
    if($post_img ===""){

        $post_img="../public/imgs/forum_posts/default_image.jpg";


    }

    move_uploaded_file($post_image_temp, "$post_img" );
    $query = "INSERT INTO forum_posts(post_title, post_text, post_img, post_date, post_user_id ) ";
    $query .= "VALUES('{$post_title}','{$post_text}','{$post_img}', '{$post_date}', '{$post_user_forum}') ";
    $create_movie_query = mysqli_query($connection, $query);



}



?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="post_title">Post title</label>
        <input required type="text" class="form-control" name="post_title">
    </div>


    <div class="form-group">
        <label for="post_text">post text</label>
        <input required type="text" class="form-control" name="post_text">
    </div>

  <div class="form-group">
        <label for="post_text">User post</label>
        <br>
        <select name="post_user_forum">

        <?php select_user_option()?>

       </select>
    </div>

    <div class="form-group">
        <label for="post_date">Post Date</label>
        <input required type="date" class="form-control" id="datePicker" name="post_date">
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input required type="file"  name="image">
    </div>



    <div class="form-group">
        <input required class="btn btn-primary" type="submit" name="create_forum_post" value="Add Post">
    </div>

</form>