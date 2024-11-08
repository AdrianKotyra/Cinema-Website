<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>
    <?php  
        $limit = 10;
        
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $sql_total = "SELECT COUNT(user_id) FROM users";
        $total_result = $database-> query_array($sql_total);
        $total_records = $total_result->fetch_array()[0];
        $total_pages = ceil($total_records / $limit);
        
    ?> 
    <section class="about_container">
      
   
       
   
        <video class=" video_about_all"  height="100%" autoplay  muted loop >
            <source src="./videos/members/slider.mp4" type="video/mp4">
        
        
        </video>
       <div class="hero-text hero-text-sub">
         <h3 class="text-big">Users </h3>
       </div>
       
   
     
   
         
     
      
        
   
     
   
      
    </section>
    <section class="wrapper-content news-section ">
        
    
        <?php include("includes/search-users.php")?>

        <div class="users-all-container">
          <?php display_all_users($limit, $start)?>
          
        </div>


        <?php

            // get_render_user();

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
           

            

        ?>
  
        <?php include("includes/users-pagination.php")?>

      
       
       
    </section>
   
   
     

      
 
   

 
  
    <?php include("includes/footer.php")?>
  
  
  </body>
</html>