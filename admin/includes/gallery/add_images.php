<?php

if(isset($_POST['add_image'])) {
    global $connection;
    alert_text("Image has been added to the gallery", "gallery.php");



    $image_title    = $_POST['image_title'];
    $post_image        = $_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];


   //    if no uploaded image give it default image
   if($post_image ===""){

    $post_image="imgs/posts/default_image.jpg";

    
    }
    move_uploaded_file($post_image_temp, "../public/imgs/gallery_cinema/$post_image" );

    $query = "INSERT INTO gallery(image_name, image_title) ";

    $query .= "VALUES('{$post_image}','{$image_title}') ";

    $create_image_query = mysqli_query($connection, $query);

}



?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="movie_title">image title</label>
        <input required type="text" class="form-control" name="image_title">
    </div>


    <div class="form-group">
        <label for="image">Image</label>
        <input required type="file"  name="image">
    </div>

   
   
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_image" value="Add Image">
    </div>

</form>