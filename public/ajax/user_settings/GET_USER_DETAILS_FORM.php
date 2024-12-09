<?php session_start();
include("../../php/init.php");

$user_id_logged = $user->user_id;

if($user_id_logged) {
    global $connection;
    $query = "SELECT * from users where user_id={$user_id_logged}";
    $select_users_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users_query)) {


        $user_id = $row["user_id"];
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
// get_user_posts()
$user_age = $user->user_age;

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
$user_form = '

<div class=user_details_form_container">
    <div class="col-custom user_info_setttings_header">
            <h1 class="user_details_header"> Account Information </h1>
            <span class="user_details_header">'.$user_age_modal.' </span>
    </div>

    <div class="user_details_grid">
    <span class="user_info_row">
        <h5> <b> User Age</b></h5>
        '.$user_age.'
    </span>
    <span class="user_info_row">
        <h5> <b> User posts</b></h5>
        '.get_user_posts_number($user_id).'
    </span>
    <span class="user_info_row">
            <h5> <b> User reviews</b></h5>
            '.get_user_reviews_number($user_id).'

    </span>



    <span class="user_info_row">
    <h5> <b>Firstname</b></h5>'
        .$user_firstname.'
    </span>

    <span class="user_info_row">
    <h5> <b>Lastname</b></h5>'
        .$user_lastname.'
    </span>

    <span class="user_info_row">
    <h5> <b>Date of birth</b></h5>'
        .$user_DOB.'
    </span>

    <span class="user_info_row">
    <h5> <b>Occupation</b></h5>'
        .$user_occupation.'
    </span>

    <span class="user_info_row">
    <h5> <b>Email</b></h5>'
        .$user_email.'
    </span>

    <span class="user_info_row">
    <h5> <b>Role</b></h5>'
        .$user_role.'
    </span>

    <span class="user_info_row">
    <h5> <b>Bio</b></h5>'
        .$user_bio.'
    </span>
    <span class="user_info_row">
    <h5> <b>facebook</b></h5>'
        .$user_facebook.'
    </span>
    <span class="user_info_row">
    <h5> <b>Twitter</b></h5>'
        .$user_twitter.'
    </span>
    <span class="user_info_row">
    <h5> <b>Linkedin</b></h5>'
        .$user_linkedin.'
    </span>
    </div>

</div>


';
echo $user_form;
