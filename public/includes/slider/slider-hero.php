<?php 
    if($session->signed_in && $user->user_age<=17) {
        include("includes/slider/slider-hero-kids.php");
        
    
    } elseif($session->signed_in && $user->user_age>=17) {
    
        include("includes/slider/slider-hero-adults.php");
    } elseif($session->signed_in===false)  {
        include("includes/slider/slider-hero-mixed.php");
    }
 ?>
