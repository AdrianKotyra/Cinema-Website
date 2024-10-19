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