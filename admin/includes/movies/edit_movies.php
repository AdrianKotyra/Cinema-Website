

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["movie_id"])) {
        global $connection;
        $movie_id_to_be_edited = $_GET["movie_id"];
    }
    if(isset($_POST["edit_movie"])) {


        $movie_title    = $_POST['movie_title'];
        $release_date   = $_POST['release_date'];
        $movie_desc    = $connection -> real_escape_string($_POST['movie_desc']);
        $post_image        = 'images/'.$_FILES['image']['name'];
        $post_image_temp   = $_FILES['image']['tmp_name'];
        $trailer_link        = $_POST['trailer_link'];
        $movie_age = $_POST['movie_age'];
        $movie_director = $_POST['movie_director'];



        // IF IMAGE WASNT UPLOAD KEEP IT THE SAME
        if($post_image==="images/") {

            $query = "SELECT * FROM movies WHERE id = $movie_id_to_be_edited ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)) {

                $post_image = $row['poster'];

            }
        }

        $query_update = "UPDATE movies SET ";
        $query_update .="title  = '{$movie_title}', ";
        $query_update .="poster = '{$post_image}', ";
        $query_update .="year = '{$release_date}', ";
        $query_update .="description   = '{$movie_desc}', ";
        $query_update .="age   = '{$movie_age}', ";
        $query_update .="director   = '{$movie_director}', ";
        $query_update .="trailer_link= '{$trailer_link}'";
        $query_update .= "WHERE id = {$movie_id_to_be_edited} ";

        $update_user= mysqli_query($connection,$query_update);

        move_uploaded_file($post_image_temp, "../public/$post_image" );

        alert_text("Movie has been updated", "movies.php");


        // ----------------------------------UPDATEING RELATIONS CODE MOVIE_GENRE----------------------------------

        edit_movies_genres();
        // ----------------------------------UPDATEING RELATIONS CODE MOVIES_KINDS----------------------------------

        edit_movies_kinds();







    }









?>
<!--  -->
<?php
    global $connection;
    if(isset($_GET["movie_id"])) {
        $movie_id_to_be_edited = $_GET["movie_id"];
        $query = "SELECT * from movies where id={$movie_id_to_be_edited}";
        $select_users_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($select_users_query);

        $movie_direc = $row["director"];
        $movie_id_db = $row["id"];
        $movie_age = $row["age"];
        $movie_title_db = $row["title"];
        $movie_poster_db = $row["poster"];
        $release_date_db = $row["year"];
        $movie_desc_db  = $row["description"];
        $movie_trailer_link_db  = $row["trailer_link"];





    }




?>

<form action="" method="post" enctype="multipart/form-data">




<div class="form-group">
        <label for="movie_title">Movie title</label>
        <input type="text" class="form-control" name="movie_title" value="<?php echo $movie_title_db; ?>">
    </div>


    <div class="form-group">
        <label for="release_date">Release date</label>
        <input type="date" class="form-control" name="release_date" value=<?php echo "$release_date_db"?>>
    </div>
    <div class="form-group">
        <label for="movie_age">Movie audience age</label>
        <br>
        <input type="number" class="form-control" name="movie_age" value=<?php echo "$movie_age"?>>


    </div>
    <div class="form-group">
        <label for="movie_director">Movie director</label>
        <input required type="text" class="form-control" name="movie_director" value="<?php echo $movie_direc;?>">
    </div>
    <div class="form-group">
        <label for="movie_desc">Description</label>
        <input type="text" class="form-control" name="movie_desc" value="<?php echo $movie_desc_db;?>">
    </div>

    <div class="form-group">
        <label for="trailer_link">Trailer Link</label>
        <input type="text" class="form-control" name="trailer_link" value=<?php echo "$movie_trailer_link_db"?>>
    </div>
    <div class="form-group">

      <p>Select Movie Genres</p>
      <div class="genres-options-container">
          <?php display_genres_options()?>
      </div>

  </div>
  <div class="form-group">

      <p>Select Movie Kinds</p>
      <div class="genres-options-container">
          <?php display_kinds_options()?>
      </div>
  </div>

    <div class="form-group">

        <img width=200 src="../img/<?php echo"../public/$movie_poster_db"; ?>" alt="">
    </div>

    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file"  name="image">
    </div>




    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_movie" value="Update Movie">
    </div>

</form>