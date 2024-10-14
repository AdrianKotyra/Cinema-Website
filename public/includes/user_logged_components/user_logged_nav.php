<?php include("./php/init.php")?>
<?php  $user_id = $user->user_id;?>
<?php 
    if ($session->signed_in && $user->user_role=="Admin") {
     
        $admin_panel =  '<a href="../admin/index.php"><span class="hiddenNav  link" >Admin</span></a>';
    } else {
        $admin_panel = "";}
?>
<div class="user-avatar-trigger row-custom"> 

        <div class="notification_container row-custom"> 
            <div class="not_trigger_container">
                <img class="nav_user_notification" src="imgs/icons/notification.svg">
                <span class="not_count_span"><?php notifications_count($user_id);?></span>
            </div>
           
            <div class="user-notification-dropdown dropdown_nav">
                <div class="row-custom nots-label-container">
                    <span class="username_drop">Notifications</span>
                    <img class="nots_icons delete_nots_trigger"src="./imgs/icons/tick.svg">
                
                
                </div>
                <div class="nots_container_list">
                    <?php include("./includes/notifications/bookings_notifications.php"); ?>
                    <?php include("./includes/notifications/forum_posts_notifications.php"); ?>
                </div>
           
          

   
            </div>
        </div>
        <div class="user_profile_img_container">
            <img class="nav_user_avatar" src="imgs/users_avatars/<?php echo "$user->user_img";?>">
        </div>
      
        <div class="user-avatar-dropdown col-custom dropdown_nav">
            <span class="username_drop"><?php echo "$user->user_firstname $user->user_lastname";?></span>
            <div class="links-container-log-reg">
                <?php echo "$admin_panel";?>
                <span class="hiddenNav user_settings-link link">Settings</span>
                <span class="link user_logout-link">Sign out</span>
            </div>
        </div>
    </div>