<?php include("./php/init.php")?>

<?php 
    
    $session->signed_in? 
    include("user_logged_nav.php")
    :    
    include("default_nav_login_reg.php")

?>





