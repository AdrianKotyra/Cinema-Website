<?php include "php/init.php";
    $text_mixed = '
    <h3 class="text-big">Welcome to Limelight Cinema</h3>
    <p class="text-mid-hero">"Where every visit is an adventure for all ages!"</p>
    <button class="button-custom sign_up_link">Sign up</button>
      <p> admin/admin - admin Account<br>
        daniela/daniela - kid Account <br>
        tester/tester - adult Account
    </p>
    ';
   $text_kids =
   '
   <h3 class="text-big">Welcome to Limelight Cinema</h3>
   <p class="text-mid-hero">Where the magic of movies comes alive. 
   Escape into a world of captivating stories, unforgettable moments, 
    </p>
   <button class="button-custom sign_up_link">Sign up</button>
    <p> admin/admin - admin Account<br>
        daniela/daniela - kid Account <br>
        tester/tester - adult Account
    </p>
   ';

   $text_adults = 
   '
   <h3 class="text-big">Welcome to Limelight Cinema</h3>
   <p class="text-mid-hero">Where fun, and imagination are just a movie away! Get ready for a journey through magical worlds !</p>
   <button class="button-custom sign_up_link ">Sign up</button>
    <p> admin/admin - admin Account<br>
        daniela/daniela - kid Account <br>
        tester/tester - adult Account
    </p>
   ';

if ($session->signed_in && $user->user_age>=17) {
  echo $text_adults;
} 
elseif ($session->signed_in && $user->user_age<=16) {
  echo $text_kids ;
}
elseif ($session->signed_in ==false) {
    echo $text_mixed;
}

    
  


?>