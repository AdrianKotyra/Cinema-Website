<?php include("../../php/init.php");


if (isset($_POST["update_user_main"])) {

    global $connection;

    $errors = [];
    $min = 3;
    $max = 26;

    $user_id       =  $_POST['user_id'];
    $user_password =  $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname =  $_POST['user_lastname'];
    $user_email    =  $_POST['user_email'];
    $user_occupation_posted = trim($_POST["user_occupation"]);
    $user_bio_posted = $_POST['user_bio'];
    $user_facebook_posted = $_POST['user_facebook'];
    $user_twitter_posted  = $_POST['user_twitter'];
    $user_linkedin_posted = $_POST['user_linkedin'];
    $user_DOB_posted = $_POST['user_DOB'];
    $post_image          = $_FILES['image']['name'];
    $post_image_temp     = $_FILES['image']['tmp_name'];

    // Check if image is provided
    if (empty($post_image) || $post_image == "") {
        $query = "SELECT * FROM users WHERE user_id = $user_id";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $post_image = $row['user_img'];
        }
    } else {

        $destination = __DIR__ . "/../../imgs/users_avatars/" . time() . '_' . $post_image;

        if (!move_uploaded_file($post_image_temp, $destination)) {
            // Handle file upload failure
            die("File upload failed.");
        } else {
            // Optionally update image path to use the relative path
            $post_image = time() . '_' . $post_image;
        }
    }



    if (strpbrk($user_firstname, '0123456789')) {

        $errors[] = "Username can not include numbers";
    }
    if (strpbrk($user_lastname, '0123456789')) {

        $errors[] = "Lastname can not include numbers";
    }

    if(strlen($user_firstname)<=$min) {

        $errors[] = "Users username is too short, should be longer than $min characters";
    }
    if(strlen($user_firstname)>=$max) {

        $errors[] = "Users username is too long, should be shorter than $max characters";
    }

    if(strlen($user_lastname)<=$min) {

        $errors[] = "Users lastname is too short, should be longer than $min characters";
    }
    if(strlen($user_lastname)>=$max) {

        $errors[] = "Users lastname is too long, should be shorter than $max characters";
    }
    if(strlen($user_email)>=$max) {

        $errors[] = "Users email is too long, should be shorter than $max characters";
    }
    if(strlen($user_email)<=$min) {

        $errors[] = "Users email is too short, should be longer than $min characters";
    }


    if(!empty($errors)) {

        echo json_encode($errors);
    } else {
        echo json_encode("updated");
        // Now update the database

        $query_update = "UPDATE users SET ";
        $query_update .= "user_firstname = '{$user_firstname}', ";
        $query_update .= "user_password = '{$user_password}', ";
        $query_update .= "user_lastname = '{$user_lastname}', ";
        $query_update .= "user_email = '{$user_email}', ";
        $query_update .= "user_img = '{$post_image}', ";  // Update the image
        $query_update .= "user_bio = '{$user_bio_posted}', ";
        $query_update .= "user_facebook = '{$user_facebook_posted}', ";
        $query_update .= "user_twitter = '{$user_twitter_posted}', ";
        $query_update .= "user_linkedin = '{$user_linkedin_posted}', ";
        $query_update .= "user_DOB = '{$user_DOB_posted}', ";
        $query_update .= "user_occupation = '{$user_occupation_posted}' ";
        $query_update .= "WHERE user_id = {$user_id}";

        $update_user = mysqli_query($connection, $query_update);

        if (!$update_user) {
            die("Query Failed " . mysqli_error($connection));
        }
    }



}
?>
