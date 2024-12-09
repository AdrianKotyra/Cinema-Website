<?php

if(isset($_POST['create_movie'])) {
    global $connection;
    alert_text("Post has been added", "posts.php");


    $post_title    = $_POST['post_title'];

    $post_text = mysqli_real_escape_string($connection, $_POST['post_text']);
    $post_header        = $_POST['post_header'];

    $post_img_name =   $_FILES['image']['name'];
    $post_img        = '../public/imgs/posts/'.$_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];
    $post_date =  date('Y-m-d H:i:s');

    //    if no uploaded image give it default image
    if($post_img_name ===""){

        $post_img="imgs/forum_posts/default_image.jpg";



    }



    move_uploaded_file($post_image_temp, "$post_img" );


    $query = "INSERT INTO posts(post_title, post_text, post_img, post_header, post_date) ";

    $query .= "VALUES('{$post_title}','{$post_text}','{$post_img}','{$post_header}', '{$post_date}') ";



    $create_movie_query = mysqli_query($connection, $query);



}



?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="post_title">Post title</label>
        <input required type="text" class="form-control" name="post_title">
    </div>




    <div class="form-group">
        <label for="post_text">Post Text</label>
        <textarea name="post_text" class="form-control" id="exampleFormControlTextarea1" class="text_area_admin"rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="post_header">Post header</label>
        <input required type="text" class="form-control" name="post_header">
    </div>



    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file"  name="image">
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_movie" value="Add Post">
    </div>

</form>