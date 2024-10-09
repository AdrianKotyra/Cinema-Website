<?php session_start();
include("../php/init.php");

$user_id_logged = $user->user_id;
if($user_id_logged) {
    global $connection;
    $query = "SELECT * FROM reviews where user_review_id = $user_id_logged order by review_date desc  ";
    $search_query = mysqli_query($connection, $query);
    echo  '   <h1 class="edit_post_header">Users Reviews</h1>
    <div class="user_settings_forum_reviews_container">';
    while($row = mysqli_fetch_array($search_query)) {
        $review = $row["review"];
        $movie_review_id = $row["movie_review_id"];
        $user_review_id = $row["user_review_id"];
        $review_date = $row["review_date"];
        $review_id = $row["id"];
        $review_rating = $row["review_rating"];
        $query2 = $database-> query_array("SELECT * from movies where id = $movie_review_id");

        while ($row = mysqli_fetch_array($query2)) {
            $movie_title = $row["title"];
            $movie_id = $row["id"];
            $movie_poster = $row["poster"];
        }

       
   
        echo '<div class="review-card review_sesttings_card row-custom vetical-scroll-grab-class settings_user_card">
                <p class="review_rating">'.$review_rating.'/10</p>
                <div class="settings_card_options">
                   <p class="option_card_settings"> <a  target="_blank" href="movie.php?movie='.$movie_review_id.'"> View </a> </p>
                    <p class="option_card_settings delete_settings_button" data-post-id="'.$review_id.'"> Delete </p>
                    <p class="option_card_settings edit_settings_button_review" data-post-id="'.$movie_review_id.'"> Edit </p>
                </div>
                <img class="movie-img-review settings_img_review" src="./'.$movie_poster.'" alt="">
              
                <div class="desc-container-review col-custom">
                <h5>'.$movie_title.'</h5>
              
                <p class="user_review_card">'.$review.'</p>
                <span class="review-date">'. $review_date.'</span>
            
                </div>


            </div>';
} 
echo ' </div>';

}