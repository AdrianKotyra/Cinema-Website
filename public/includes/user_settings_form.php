<?php include("./php/init.php");



?>


<div class="user_settings_container row-custom">
    <img class="user_Settings_cross"src="./imgs/icons/cross.svg" alt="">
    <div class="mobile-dashboard-user-settings">

        <div class="mobile-userimg-container col-custom">
        <img class="hamburger-menu-settings-mobile" src="./imgs/icons/hamburger.svg" alt="">
        <div class="user_img_modal_container">
            <a href="user.php?id=<?php echo $user->user_id; ?>">
                <img class="form_user_setting_profile_img" src="./imgs/users_avatars/<?php echo $user->user_img; ?>" alt="">
            </a>
        </div>

            <h3 class="form_user_setting_profile_name"><?php echo $user->user_firstname. " ". $user->user_lastname;?></h3>
        </div>


            <div class="user_avatar_dashboard_controller mobile-settings-links-container dashboard-mobile row-custom">


                <span class="row-custom user_tickets_link user_settings_link">
                    <img class="icon-user-setting" src="./imgs/icons/ticket.svg" alt="">
                    Tickets
                </span>
                <span class="row-custom user_reviews_link user_settings_link">
                    <img class="icon-user-setting" src="./imgs/icons/feedback.svg" alt="">
                    Reviews
                </span>

                <span class="row-custom user_posts_link user_settings_link">
                    <img class="icon-user-setting" src="./imgs/icons/house-solid.svg" alt="">
                    Posts
                </span>
                <span class="row-custom user_details_link user_settings_link user_settings_link_active">
                    <img  class="icon-user-setting"  src="./imgs/icons/profile.svg" alt="">
                    Account info
                </span>
                <span class="row-custom user_change_details_link user_settings_link">

                    <img class="icon-user-setting"  src="./imgs/icons/key-solid.svg" alt="">
                    Change Details

                </span>
                <span class="row-custom user_logout_link user_settings_link">

                    <img class="icon-user-setting "  src="./imgs/icons/log_out.svg" alt="">
                    Log out
                </span>





        </div>
    </div>

    <div class="user_dashboard_box col-custom">

        <div class="user_img_modal_container">
            <a href="user.php?id=<?php echo $user->user_id; ?>">
                <img class="form_user_setting_profile_img"src="./imgs/users_avatars/<?php echo $user->user_img;?>" alt="">
            </a>
        </div>
        <h3 class="form_user_setting_profile_name"><?php echo $user->user_firstname. " ". $user->user_lastname;?></h3>

        <div class="user_avatar_dashboard_controller  col-custom">


            <span class="row-custom user_tickets_link user_settings_link">
                <img class="icon-user-setting" src="./imgs/icons/ticket.svg" alt="">
                Tickets
            </span>
            <span class="row-custom user_reviews_link user_settings_link">
                <img class="icon-user-setting" src="./imgs/icons/feedback.svg" alt="">
                Reviews
            </span>

            <span class="row-custom user_posts_link user_settings_link">
                <img class="icon-user-setting" src="./imgs/icons/house-solid.svg" alt="">
                Posts
            </span>
            <span class="row-custom user_details_link user_settings_link user_settings_link_active">
                <img  class="icon-user-setting"  src="./imgs/icons/profile.svg" alt="">
                Account info
            </span>
            <span class="row-custom user_change_details_link user_settings_link">

                <img class="icon-user-setting"  src="./imgs/icons/key-solid.svg" alt="">
                Change Details

            </span>
            <span class="row-custom user_logout_link user_settings_link">

                <img class="icon-user-setting "  src="./imgs/icons/log_out.svg" alt="">
                Log out
            </span>


        </div>
    </div>
    <div class="user_dashboard_form">

        <div class="user_content_settings user_dashboard_form_tickets">

        </div>
        <div class="user_content_settings user_dashboard_form_details">

        </div>
        <div class="user_content_settings user_dashboard_form_posts">

        </div>
        <div class="user_content_settings user_dashboard_form_info user_content_settings_active">

        </div>
        <div class="user_content_settings user_dashboard_form_reviews">


        </div>









        <div class="user_dashboard_form_alerts">




        </div>






    </div>




</div>