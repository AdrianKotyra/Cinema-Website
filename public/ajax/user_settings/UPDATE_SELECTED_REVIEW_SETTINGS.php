<?php include("../../php/init.php");


    if(isset($_POST["review_id"])) {
        global $connection;
        $review_id_to_be_edited = $_POST["review_id"];
        $review_from_form   = $_POST['edit_review_settings_input'];
        $rating_from_form = $_POST['rating'];

        $query_update = "UPDATE reviews SET ";
        $query_update .= "review = '{$review_from_form }',  ";
        $query_update .= "review_rating = '{$rating_from_form }' ";
        $query_update .= "WHERE id = {$review_id_to_be_edited}";

        $update_review = mysqli_query($connection, $query_update);

    }



?>
