<?php session_start();
include("../php/init.php");

$user_id_logged = $user->user_id;
if($user_id_logged) {
    global $connection;
    $query = "SELECT * from users where user_id={$user_id_logged}";
    $select_users_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users_query)) {


        $user_id = $row["user_id"];
        $user_name = $row["user_firstname"];
        $user_password = $row["user_password"];
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
        $user_email = $row["user_email"];
        $user_image = $row["user_img"];
        $user_role = $row["user_role"];
        $user_bio = $row['user_bio'];
        $user_facebook = $row['user_facebook'];
        $user_twitter = $row['user_twitter'];
        $user_linkedin =  $row['user_linkedin'];
        $user_occupation =  $row['user_occupation'];
        $user_DOB =  $row['user_DOB'];
}}
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
$user_age = $user->user_age;
$user_form = '
<div class="col-custom user_info_setttings_header"> 
        <h1 class="user_details_header"> Account Information </h1>
        <span class="user_details_header">'.$user_age_modal.' </span>
</div>
<form id="user_form_Settings"action="" method="post" enctype="multipart/form-data">
     <input type="text" class="form-control hidden" name="user_id" value="'.$user_id_logged.'">
    <div class="form-group user-form-row">
        <label for="user_password">User Password</label>
        <input type="text" class="form-control user_password" name="user_password" value="'.$user_password.'">
    </div>
    <div class="form-group user-form-row">
        <label for="user_age_posted">User Age</label>
        <input type="date" class="form-control user_age_posted" name="user_DOB" value="'.$user_DOB.'">
    </div>


    <div class="form-group user-form-row">
        <label for="user_firstname">User Firstname</label>
        <input type="text" class="form-control user_firstname" name="user_firstname" value="'.$user_firstname.'">
    </div>


    <div class="form-group user-form-row">
        <label for="user_lastname">User Lastname</label>
        <input type="text" class="form-control user_lastname" name="user_lastname" value="'.$user_lastname.'">
    </div>

    <div class="form-group user-form-row">
        <label for="user_email">User Email</label>
        <input type="text" class="form-control user_email" name="user_email" value="'.$user_email.'">
    </div>

    <div class="form-group user-form-row">

        <img width=200 src="./imgs/users_avatars/'.$user_image.'" alt="">
    </div>

    <div class="form-group user-form-row">
        <label for="image">User Image</label>
        <input type="file"  name="image">
    </div>

    <div class="form-group user-form-row">
        <label for="user_bio">User Bio</label>
        <textarea class="form-control user_bio" name="user_bio" rows="6"><'.$user_bio.'></textarea>
    </div>
    <div class="form-group user-form-row">
        <label for="user_occupation">User Occupation</label>
        <input type="text" class="form-control user_occupation" name="user_occupation"  value="'.$user_occupation.'">
    </div>
    <div class="form-group user-form-row">
        <label for="user_twitter">User Twitter</label>
        <input type="text" class="form-control user_twitter" name="user_twitter" value="'.$user_twitter.'">
    </div>
    <div class="form-group user-form-row">
        <label for="user_linkedin">User Linkedin</label>
        <input type="text" class="form-control user_linkedin" name="user_linkedin" value="'.$user_linkedin.'">
    </div>
    <div class="form-group user-form-row">
        <label for="user_facebook">User Facebook</label>
        <input type="text" class="form-control user_facebook" name="user_facebook" value="'.$user_facebook.'">
    </div>
    
    <div class="form-group user-form-row">
        <input class="btn btn-primary update_user_main" value="Update User" name="update_user_main">
    </div>
  
    
</form>
<div class="user_dashboard_form_alerts">
        
</div>';
echo $user_form;
