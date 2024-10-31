<?php include("./php/init.php")?>
<?php  $user_id = $user->user_id;?>
<?php 
    if ($session->signed_in && $user->user_role=="Admin") {
     
        $admin_panel =  ' <a class="link mobile-link mobile-link-admin"href="../admin/index.php">
                <h3 class="mobile_header mobile-header-admin">Admin</h3>
            </a>';
    } else {
        $admin_panel = "";}
?>

    <img class=" nav_user_avatar mobile-user-avatar" src="imgs/users_avatars/<?php echo "$user->user_img";?>">

      
    <div class="col-custom mobile-user-container-settings-user">
        <span class="username_drop"><?php echo "$user->user_firstname $user->user_lastname";?></span>
        <div class="notification_container notification_container_mobile col-custom"> 
            <div class="not_trigger_container-mobile">
                <img class="nav_user_notification" src="imgs/icons/notification.svg">
                <span class="not_count_span not_count_span_mobile"><?php notifications_count($user_id);?></span>
            </div>
           
            <div class="user-notification-dropdown-mobile dropdown_nav">
                <div class="row-custom nots-label-container">
                    <span class="username_drop">Notifications</span>
                    <img class="nots_icons delete_nots_trigger delete_nots_trigger_mobile"src="./imgs/icons/tick.svg">
                
                
                </div>
                <div class="nots_container_list nots_container_list_mobile">
                    <?php include("./includes/notifications/bookings_notifications.php"); ?>
                    <?php include("./includes/notifications/forum_posts_notifications.php"); ?>
                </div>
           
          

   
            </div>
        </div>
        <div class="links-container-log-reg col-custom">
            <?php echo "$admin_panel";?>
       
            <a class="link mobile-link mobile-link-admin user_settings-link">
                <h3 class="mobile_header mobile-header-admin">Settings</h3>
            </a>
            <a class="link mobile-link mobile-link-admin user_logout-link">
                <h3 class="mobile_header mobile-header-admin ">Log out</h3>
            </a>
        </div>
    </div>