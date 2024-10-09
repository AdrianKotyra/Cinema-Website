<?php

if(isset($_POST['add_movie_genre'])) {
    alert_text("Genre has been added", "genres.php");
    global $connection;

    $genre_name    = $_POST['genre_name'];
    $genre_desc  = $connection -> real_escape_string($_POST['genre_desc']);
 
    $post_image        ='imgs/categories/'.$_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];

   

    //    if no uploaded image give it default image
    if($post_image ==='imgs/categories/'){

        $post_image="imgs/categories/default_image.jpg";

        
    }


    move_uploaded_file($post_image_temp, "../public/$post_image" );


    $query = "INSERT INTO genres(`name`, `desc`, category_img) ";

    $query .= "VALUES('{$genre_name}','{$genre_desc}','{$post_image}') ";



    $create_genre_query = mysqli_query($connection, $query);



}



?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="genre_name">Genre Name</label>
        <input required type="text" class="form-control" name="genre_name">
    </div>


    <div class="form-group">
        <label for="genre_desc">Genre Desc</label>
        <input required type="text" class="form-control" name="genre_desc">
    </div>




    <div class="form-group">
        <label for="image">Category Image</label>
        <input required type="file"  name="image">
    </div>

   
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_movie_genre" value="Add Genre">
    </div>

</form>