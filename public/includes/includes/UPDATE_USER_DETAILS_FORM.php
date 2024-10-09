<?php 
        
          
    
    if(isset($_POST["update_user_main"])) {
        global $connection;
        
        $user_id_to_be_edited = $user->user_id;
        $user_password       =  $_POST['user_password'];
        $user_firstname         =  $_POST['user_firstname'];
        $user_lastname         =  $_POST['user_lastname'];
        $user_email         =     $_POST['user_email'];
        $user_occupation_posted = trim($_POST["user_occupation"]);
        $user_bio_posted        =     $_POST['user_bio'];
        $user_facebook_posted        =  $_POST['user_facebook'];
        $user_twitter_posted       =  $_POST['user_twitter'];
        $user_linkedin_posted        =  $_POST['user_linkedin'];
        $user_DOB_posted         =  $_POST['user_DOB'];
        $post_image          =  $_FILES['image']['name'];
        $post_image_temp     =  $_FILES['image']['tmp_name'];

      
       


        if(empty($post_image) || $post_image=="") {

            $query = "SELECT * FROM users WHERE user_id = $user_id_to_be_edited ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)) {

            $post_image = $row['user_img'];

            }
        }
   
        $query_update = "UPDATE users SET ";
        $query_update .= "user_firstname = '{$user_firstname}', ";
        $query_update .= "user_password = '{$user_password}', ";
        $query_update .= "user_lastname = '{$user_lastname}', ";
        $query_update .= "user_email = '{$user_email}', ";
        $query_update .= "user_img = '{$post_image}', ";
        $query_update .= "user_bio = '{$user_bio_posted}', ";
        $query_update .= "user_facebook = '{$user_facebook_posted}', ";
        $query_update .= "user_twitter = '{$user_twitter_posted}', ";
        $query_update .= "user_linkedin = '{$user_linkedin_posted}', ";  
        $query_update .= "user_DOB = '{$user_DOB_posted}', ";  
        $query_update .= "user_occupation = '{$user_occupation_posted}' "; 
        $query_update .= "WHERE user_id = {$user_id_to_be_edited} ";
        

        $update_user= mysqli_query($connection,$query_update);
    
 
        move_uploaded_file($post_image_temp, "./imgs/users_avatars/$post_image" );
        // UPDATE USER IMG ETC. BY CREATING NEW USER BASED IN PROVIDED SESSION ID
        $user->create_user($session->user_id);
       
    }

      




    


// ?>
 <!--  -->

