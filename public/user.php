<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>
    <?php user_redirect()?>   
    <section class="wrapper-content news-section ">
        <h5 class="section-header text-mid header-subpage">Users</h5>
        <?php include("includes/search-users.php")?>

        <div class="users-all-container">
         
          
        </div>


        <?php

            get_render_user();

            if(isset($_GET["source"])) {
                $source = $_GET["source"];

            }
            else {
                $source = "";
            }
            switch($source) {
                case 'all_posts';
                include "includes/user_posts.php";
                break;



            }
            switch($source) {
                case 'all_reviews';
                include "includes/user_reviews.php";
                break;



            }
           

            

        ?>
  
      
      
       
       
    </section>
   
   
     

      
 
   

 
  
    <?php include("includes/footer.php")?>
  
  
  </body>
</html>