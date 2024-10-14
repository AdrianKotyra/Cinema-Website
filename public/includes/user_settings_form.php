<?php include("./php/init.php");



?>
        
 
<div class="user_settings_container row-custom">
    <img class="user_Settings_cross"src="./imgs/icons/cross.svg" alt="">
    <div class="user_dashboard_box col-custom">

        <div class="user_img_modal_container">
            <img class="form_user_setting_profile_img"src="./imgs/users_avatars/<?php echo $user->user_img;?>" alt="">
        </div>
        <h3 class="form_user_setting_profile_name"><?php echo $user->user_firstname. " ". $user->user_lastname;?></h3>
     
        <div class="user_avatar_dashboard_controller col-custom">
          

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
                                        
        
        <?php include("includes/user_details_profile.php");?>



        <div class="user_dashboard_form_alerts">
         



        </div>
        
                    



        
    </div>




</div>