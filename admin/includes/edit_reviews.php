

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["id"])) {
        global $connection;
        $review_id_to_be_edited = $_GET["id"];
    }
    if(isset($_POST["edit_review"])) {
        $review_from_form   = $_POST['review_name'];
        
        $query_update = "UPDATE reviews SET ";
        $query_update .= "review = '{$review_from_form }' ";
       
        $query_update .= "WHERE id = {$review_id_to_be_edited}";
        
        $update_review = mysqli_query($connection, $query_update);
       
        alert_text("Review has been updated", "reviews.php");









    }









?>
<!--  -->
<?php
    if(isset($_GET["id"])) {
        global $connection;
        $review_id = $_GET["id"];
        $query = "SELECT * from reviews where id = $review_id";
        $select_reviews_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_reviews_query)) {
            $reviews = $row["review"];



        }
}


?>

<form action="" method="post" enctype="multipart/form-data">




    <div class="form-group">
        <label for="review_name">Review Content</label>
        <input type="text" class="form-control" name="review_name" value="<?php echo  $reviews?>">
    </div>


    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_review" value="Update Review">
    </div>

</form>