<?php session_start() ?>
<?php include "../php/init.php";

global $database;
global $connection;

if(isset($_POST["data"])) {
    $search = $_POST["data"][1];
    $movie_subcat = $_POST["data"][0];
    $age_limit = user_logged_age_movies_selection();

  
    $query =  $database-> query_array( "SELECT movies.title, movies.id, movies.poster, movies.year , movies.age, movies.description  FROM movies INNER JOIN 
    movies_kinds ON movies.id = movies_kinds.movie_id INNER JOIN kinds ON 
    movies_kinds.movie_kind_id = kinds.id WHERE kinds.name ='$movie_subcat' AND movies.title LIKE '%$search%'and movies.age <= $age_limit ");
  
    while ($row = mysqli_fetch_array($query)) {
            $movie_title = $row["title"];
            $movie_id = $row["id"];
            $movie_poster = $row["poster"];
            $movie_release_date = $row["year"];
            $movie_age = $row["age"];
            $movie_desc = $row["description"];
            $genres = get_selected_movie_genres_array_by_movie_id($movie_id);

            echo ' 
            <div class="card-layout-trending-card">
           <div class="movie-card movie-card-trending movie-card-expandable" data-id="'.$movie_id.'">
                
                <img loading="lazy" class="card-movie-img" src="./'.$movie_poster.'" alt="">
                    <div class="text-container card-info">
                       <div class="title_age_container">
                        <p class="card-movie-title">'.$movie_title.'</p>
                        <p class="age_info">'.$movie_age.'+</p>
                        </div>
                        <p class="card-movie-genres card-movie-hidden-info">'.$genres.'</p>
                        <button class="button-custom trigger-more-info-button">Book</button>
                        <a href="movie.php?movie='.$movie_id.'" class=" movie-link card-movie-hidden-info">Book</a>
                        <p class="card-movie-desc  card-movie-hidden-info">'.$movie_desc.'</p>
                       
                      
                    </div>
                </div>
            </div>
        ';
        
    }


}






?>