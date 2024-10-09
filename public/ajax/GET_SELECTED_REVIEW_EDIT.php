<?php include("../php/init.php");


?>

<!-- // get edited post query -->
<?php
  
  if(isset($_POST["data"])) {
    global $connection;
    $review_id = $_POST["data"];
   
   $query = "SELECT * FROM reviews where movie_review_id =  $review_id ";
   $search_query = mysqli_query($connection, $query);
  
   while($row = mysqli_fetch_array($search_query)) {
       $review = $row["review"];
       $review_id_selected = $row["id"];
       $movie_review_id = $row["movie_review_id"];
       $user_review_id = $row["user_review_id"];
       $review_date = $row["review_date"];
       $review_rating = $row["review_rating"];
       $query2 = $database-> query_array("SELECT * from movies where id = $movie_review_id");

       while ($row = mysqli_fetch_array($query2)) {
           $movie_title = $row["title"];
           $movie_id = $row["id"];
           $movie_poster = $row["poster"];
       }




    }}





echo '
    <h1 class="edit_post_header">Edit review</h1>

   <div class="review-card review_sesttings_card row-custom vetical-scroll-grab-class settings_user_card">
               
                <img class="movie-img-review settings_img_review" src="./'.$movie_poster.'" alt="">
              
                <div class="desc-container-review col-custom">
                <h5>'.$movie_title.'</h5>
              
                <p class="user_review_card">'.$review.'</p>
                <span class="review-date">'. $review_date.'</span>
            
                </div>


    </div>

    <form id="editReviewForm"action="" method="post" enctype="multipart/form-data">
    <label for="rating">Rating</label>
   <select name="rating" class="form-select" >
        <option  selected value="'.$review_rating.'">'.$review_rating.'</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        
      
    </select>

    <input class="edit_post_settings_input hidden"type="text" class="form-control" name="review_id" value="'.$review_id_selected.'">


    <div class="form-group user-form-row">
        <label for="post_text">Review text</label>
        <textarea class="form-control user_bio " name="edit_review_settings_input" rows="6">'.$review.'</textarea>
    </div>


   
    
    <div class="form-group">
        <input class="btn btn-primary edit_review_button" type="submit" name="edit_review" value="Update Review">
    </div>

</form>';

?>