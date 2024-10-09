<?php session_start();

include("../php/init.php");
$user_image = $user->user_img;
echo '<img class="nav_user_avatar" src="imgs/users_avatars/'.$user_image.'">';

