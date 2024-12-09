<?php session_start();

include("../../php/init.php");


echo '   <a href="user.php?id='.$user->user_id.'">
<img class="form_user_setting_profile_img"src="./imgs/users_avatars/'.$user->user_img.'" alt="">
 </a>';

?>