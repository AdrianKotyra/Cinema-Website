<?php include("../php/init.php")?>

<?php 

    $default_nav_login_reg = 
    '<span class="login-trigger"> 
        <img src="./imgs/icons/profile.svg">
        <div class="login-reg-dropdown col-custom  dropdown_nav ">
            <div class="links-container-log-reg">
                <span class="hiddenNav active-link login-link link" >Log in</span>
                <span class="link sign_up_link active-link">Sign up</span>
            </div>
            
    </div>

    </span>';
    
    $session->signed_in? 
    $user_logged_nav = 
    '<span class="user-avatar-trigger"> 
        <img class="nav_user_avatar"src="imgs/users_avatars/'.$user->user_img.'">

        <div class="user-avatar-dropdown col-custom  dropdown_nav ">
            <div class="links-container-log-reg">
        
                <span class="hiddenNav active-link user_settings-link link" >Settings</span>
                <span class="link active-link user_logout-link">Sign out</span>
            </div>
            
        </div>

    </span>' : null;

?>

<?php echo $session->signed_in? $user_logged_nav : $default_nav_login_reg;



