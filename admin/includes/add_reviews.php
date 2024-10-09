<?php

if(isset($_POST['create_review'])) {
    alert_text("Review has been added", "reviews.php");


    $user_selected_id    = $_POST['user_review'];
    $movie_selected_id   = $_POST['movie_review'];
    $user_review    = $_POST['user_review_content'];
    $review_date  = $_POST['review_date'];


    


    $query = "INSERT INTO reviews( review, movie_review_id, user_review_id, review_date ) ";

    $query .= "VALUES('{$user_review}','{$movie_selected_id}','{$user_selected_id}','{$review_date}') ";



    $create_review_query = mysqli_query($connection, $query);



}



?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="user_review">User reviews</label>
        <br>
        <select name="user_review" id="">
            <?php select_user_option()?>



        </select>
    </div>

    <div class="form-group">
        <label for="movie_review">Movie reviewed</label>
        <br>
        <select name="movie_review" id="">
            <?php select_movies_option()?>



        </select>
    </div>




   
    <div class="form-group">
    
     
       <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Users Review</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="user_review_content" rows="3"></textarea>
        </div>

    </div>
    
    <div class="form-group">
        <label for="review_date">Review date</label>
        <input type="date" class="form-control" name="review_date" value="<?php echo date("Y-m-d")?>">
    </div>
   
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_review" value="Add Reviewr">
    </div>

</form>