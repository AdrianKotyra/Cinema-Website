<?php

if(isset($_POST['create_movie'])) {
    global $connection;
    alert_text("Movie has been added", "movies.php");



    $movie_title    = $_POST['movie_title'];
    $release_date   = $_POST['year'];;
    $movie_desc    = $_POST['movie_desc'];
    $movie_age    = $_POST['movie_age'];
    $movie_director  = $_POST['movie_director'];
    $post_image        = $_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];
    $trailer_link        = $_POST['trailer_link'];

   //    if no uploaded image give it default image
   if($post_image ===""){

    $post_image="imgs/posts/default_image.jpg";


    }
    move_uploaded_file($post_image_temp, "../public/$post_image" );

    $query = "INSERT INTO movies(title, poster, description, year, trailer_link, age, director) ";

    $query .= "VALUES('{$movie_title}','{$post_image}','{$movie_desc}','{$release_date}', '{$trailer_link}','{$movie_age}','{$movie_director}') ";

    $create_movie_query = mysqli_query($connection, $query);

    $movie_id = mysqli_insert_id($connection);
    // ADD MOVIE GENRES
    if (isset($_POST['movie_genre'])) {
    $selected_genres_ids =  $_POST['movie_genre'];
    foreach ($selected_genres_ids as $genres_id) {

        $query2 = "INSERT INTO movies_genres(movie_id, genre_id) ";
        $query2 .= "VALUES('{$movie_id}','{$genres_id}') ";
        $query_insert_movies_genres = mysqli_query($connection, $query2);



    }}
    if (isset($_POST['movie_kinds'])) {
    // /ADD MOVIE KINDS
    $selected_kinds_ids =  $_POST['movie_kinds'];
    foreach ($selected_kinds_ids as $kind_id) {

        $query3 = "INSERT INTO movies_kinds(movie_id, movie_kind_id) ";
        $query3 .= "VALUES('{$movie_id}','{$kind_id}') ";
        $query_insert_movies_kinds = mysqli_query($connection, $query3);



    }
    }

}



?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="movie_title">Movie title</label>
        <input required type="text" class="form-control" name="movie_title">
    </div>


    <div class="form-group">
        <label for="release_date">Release date</label>
        <input required type="date" id="datePicker" class="form-control" name="year">
    </div>
    <div class="form-group">
        <label for="movie_age">Movie age</label>
        <input required type="number" id="datePicker" class="form-control" name="movie_age">
    </div>
    <div class="form-group">
        <label for="movie_director">Movie director</label>
        <input required type="text" class="form-control" name="movie_director">
    </div>
    <div class="form-group">
        <label for="movie_desc">Description</label>
        <input required type="text" class="form-control" name="movie_desc">
    </div>

    <div class="form-group">
        <label for="trailer_link">Trailer Link</label>
        <input required type="text" class="form-control" name="trailer_link">
    </div>

    <div class="form-group required">

        <p>Select Movie Genres</p>
        <div class="genres-options-container">
            <?php display_genres_options_add_movie()?>
        </div>

    </div>
    <div class="form-group required">

        <p>Select Movie Kinds</p>
        <div class="genres-options-container">
            <?php display_kinds_options_add_movie()?>
        </div>
    </div>





    <div class="form-group">
        <label for="image">Movie Poster</label>
        <input required type="file"  name="image">
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_movie" value="Add Movie">
    </div>

</form>