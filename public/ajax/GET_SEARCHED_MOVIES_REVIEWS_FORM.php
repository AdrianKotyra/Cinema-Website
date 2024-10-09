
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
            $movie_year = $row["year"];
            $trimmed_year = substr($movie_year, 0, 4);
        ?>
        <?php

            echo '
         
            <li class="movie-searched movie-searched-review row-custom" data-id="'.$movie_id.'">
                <input required class="hidden-form-review-input"type="text" value='.$movie_id.'>
                <img class="search-movie-img"src="./'. $movie_img.' ">
                <div class="custom-col movie_searched_col">
                    <p class="movie-searched-title">'.$movie.' ('.$trimmed_year.')</p>
                    
                </div>
            </li>
            ';
        ?>
      


    <?php }
    } else {
        echo $message;
    }



}




?>