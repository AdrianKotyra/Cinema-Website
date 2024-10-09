<?php session_start();
include "../php/init.php"?>

<?php 
 
    $user_password = trim($_POST['userPassword']);
    $user_email = trim($_POST['userEmail']);
    $result_finding_users = $database -> query_array("SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'");
    $num_rows = mysqli_num_rows($result_finding_users);
    if($num_rows==0) {
        // no need json encoding because it is simple string
        $alert_message = "<div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>Wrong Credentials</div>";
        echo trim($alert_message);
    } 
    else {
        while ($row = mysqli_fetch_array($result_finding_users)) {
            $user_id = $row["user_id"];
              //    CREATE NEW SESSION AND BASED ON PASSED PARAMETER USER ID TO IT CREATE NEW USER CLASS
            $session->login($user_id);
            $user = new User();
            $user->create_user($session->user_id);

        }
  
   
    if ($user->user_age < 17) {
        $user_age_modal = '<div class="row-custom membership_container">  
        <img class="login-modal-age-avatar-img" src="imgs/junior_member.jpg" alt="">
            <span>You are a Junior member </span> 
        </div>';
        } else {
        $user_age_modal = '<div class="row-custom membership_container">  
        <img class="login-modal-age-avatar-img" src="imgs/adult_member.jpg" alt="">
            <span>You are Adult member </span> 
        </div>';
        }
    
    // Initialize the login modal HTML
    $login_modal = '<div class="container-reg-conf col-custom login-modal-container">
        <div class="col-custom">
        <h5>Welcome ' . htmlspecialchars($user->user_firstname) . '</h5>
        ' . htmlspecialchars($user->user_occupation) . '
        <img class="login-modal-avatar-img" src="imgs/users_avatars/' . htmlspecialchars($user->user_img) . '" alt="">
        <p>You have successfully logged in!</p>
        <button class="button-custom accept-buttom-login">
            OK
        </button> <br>'.$user_age_modal.'';
 
 
        
    $data = [$login_modal];
    // encoding data to json because it contains variables from classes

    echo json_encode($data);
}
    

    
   





?>