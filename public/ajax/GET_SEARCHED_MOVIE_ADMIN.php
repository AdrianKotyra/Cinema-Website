<?php session_start() ?>
<?php include "../php/init.php"?>

<?php 
global $connection;
$search_movie = $_POST["data"];
$age_limit = user_logged_age_movies_selection();
if(!empty($search_movie)) {
    $message = "Results not found";
    $query = "SELECT * FROM movies where title LIKE '%$search_movie%'";
    $search_query = mysqli_query($connection, $query);
    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }


    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $movie_id = $row["id"];
            $movie_title = $row["title"];
            $movie_poster = $row["poster"];
            $movie_desc  = $row["description"];
            $movie_trailer_link  = $row["trailer_link"];
            $release_date  = $row["year"];
            $movie_age  = $row["age"];

           
        ?>
        <?php

            echo '
            <tr>
            <td>'.$movie_id.'</td>
            <td>.'.$movie_title.'</td>
            <td>.'.$release_date.'</td>
            <td>.'.$movie_desc.'</td>
            <td>.'.$movie_trailer_link.'</td>
            <td><img class="table_img" width=100 height=100 src="../public/'.$movie_poster.'"></td>
            <td>'.$movie_age.'+</td>
            <td><a href="movies.php?source=edit_movie&movie_id='.$movie_id.'">EDIT</a></td>
            <td> <span class="delete_button"  data-link="movies.php?delete_movie='.$movie_id.'"> Delete </span></td>
          
            
            </tr>';
           
        ?>
      


    <?php }
    } else {
        echo "No results";
    }



}




?>