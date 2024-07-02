
<?php include "../php/init.php"?>

<?php 
global $connection;
$search = $_POST["data"];

if(!empty($search)) {
    $message = "Results not found";
    $query = "SELECT * FROM movies where title LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);
    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }
    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $movie = $row["title"];
            $movie_id = $row["id"];
            $movie_img = $row["poster"];
        ?>
        <?php

            echo '
            <a href=movie.php?movie='.$movie_id.'>
                <li class="movie-searched row-custom">
                    <img class="search-movie-img"src="./'. $movie_img.' ">
                    <p class="movie-searched-title">'.$movie.'</p>
             
                </li>
            </a>';
        ?>
      


    <?php }
    } else {
        echo $message;
    }



}




?>