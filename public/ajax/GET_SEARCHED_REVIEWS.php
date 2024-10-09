<?php session_start() ?>
<?php include "../php/init.php"?>

<?php 
global $connection;
$search_movie = $_POST["data"];
$age_limit = user_logged_age_movies_selection();
if(!empty($search_movie)) {
    $message = "Results not found";
    $query = "SELECT * FROM movies where title LIKE '%$search_movie%'  AND age <=$age_limit";
    $search_query = mysqli_query($connection, $query);
    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }

    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $movie_id = $row["id"];
            $movie_poster = $row["poster"];
            $movie_title = $row["title"];
           
        ?>
        <?php

          

            echo '
                <a href="movie_reviews.php?id='.$movie_id.'">
                <li class="post-searched row-custom">
                    <img class="search-movie-img"src="'. $movie_poster.' ">
                    <p class="post-searched-title">'. $movie_title.'</p>
             
                </li>
                </a>
           ';
        ?>
      


    <?php }
    } else {
        echo "fdsfdsfds";
    }



}




?>