<?php include "../php/init.php"?>

<?php
global $connection;

    $user_firstname = trim($_POST['userName']);
    $user_lastname = trim($_POST['userSurname']);
    $user_password = trim($_POST['userPassword']);
    $password_confirmed = trim($_POST['userPasswordConfirmation']);
    $user_email = trim($_POST['userEmail']);
    $email_confirmation = trim($_POST['userEmailConfirmation']);
    $user_age_date = $_POST['userDateAge'];

    $errors = [];
    $min = 3;
    $max = 26;

    $user_role  = "user";
    $post_image="default_avatar.jpg";




    $query_email = "SELECT * from users where user_email = '$user_email'";

    $query_email_check = mysqli_query($connection, $query_email);


    if($user_age_date==="" || empty($user_age_date)) {
        $errors[] = "Please select your age.";
    }

    if(strlen($user_firstname)<=2) {

        $errors[] = "Your username is too short, should be longer than 2 characters";
    }


    if(strlen($user_firstname)>=$max) {

        $errors[] = "Your username is too long, should be shorter than $max characters";
    }

    if(strlen($user_lastname)<=2) {

        $errors[] = "Your lastname is too short, should be longer than 2 characters";
    }
    if(strlen($user_lastname)>=$max) {

        $errors[] = "Your lastname is too long, should be shorter than $max characters";
    }
    if(strlen($user_email)>=$max) {

        $errors[] = "Your email is too long, should be shorter than $max characters";
    }

    if(strlen($user_email)<=$min) {

        $errors[] = "Your email is too short, should be longer than $min characters";
    }
    if($user_email!== $email_confirmation) {
        $errors[] = "Your email does not match the confirmation email";
    }

    if($user_password!== $password_confirmed) {
        $errors[] = "Your password does not match the confirmation password";
    }

    if(!empty($errors)) {
        foreach ($errors as $error) {
            echo "

            <div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>
                $error
            </div>
            <br>";
        }
    }

    if(empty($errors)) {
        $status = "false";

        // if no uploaded image give it default image
        if($post_image ===""){
            $post_image="default-avatar.jpg";
        }



        $query = "INSERT INTO users (user_firstname, user_lastname, user_role, user_email, user_password, user_img, user_DOB ) ";
        $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$user_email}', '{$user_password}', '{$post_image}', '{$user_age_date}')";



        $create_user_query = mysqli_query($connection, $query);

        if($create_user_query) {


            echo  'success';

        }
    }

// }




?>