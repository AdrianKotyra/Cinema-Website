<?php session_start();
include "../php/init.php";
    global $session;
    global $user;
 

    if( $session->signed_in==true) {

        $user_review_id = $user->user_id;
        $movie_review_id =  $_POST["data"][0];
        $review   = $_POST["data"][1];
        $rating = $_POST["data"][2];
        $currentDateTime = date("Y-m-d H:i:s");


        $query = "SELECT * FROM reviews WHERE user_review_id = $user_review_id AND movie_review_id = $movie_review_id";
        $check_user = mysqli_query($connection, $query);
        
        if (mysqli_num_rows($check_user) >= 1 && $session->signed_in == true) {
            echo "review_exists";
        }
        else {
            $query2 = "INSERT INTO reviews( review, movie_review_id, user_review_id, review_date, review_rating ) ";
    
            $query2 .= "VALUES('{$review}','{$movie_review_id}','{$user_review_id}','{$currentDateTime}','{$rating}') ";
        
            $create_review_query = mysqli_query($connection, $query2);
            echo "success";
           
        }
    
       
       
    }
  
    elseif( $session->signed_in==false) {
        echo "not_logged";
    }
    
    


?>


