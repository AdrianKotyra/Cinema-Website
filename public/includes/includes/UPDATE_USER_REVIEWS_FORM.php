
<?php 
   
    if(isset($_POST["edit_review"])) {
        $review_id    = $_POST['id'];
        $review_text   = $_POST['review'];
    
       

        $query_update = "UPDATE reviews SET ";
        $query_update .="review  = '{$review_text}', ";
        $query_update .= "WHERE id = {$review_id} ";

        $update_reviews= mysqli_query($connection,$query_update);
    
       


    }

?>
