<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>
    <?php  
        $limit = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $sql_total = "SELECT COUNT(id) FROM reviews";
        $total_result = $database-> query_array($sql_total);
        $total_records = $total_result->fetch_array()[0];
        $total_pages = ceil($total_records / $limit);
        
    ?> 
    <section class="wrapper-content news-section ">
        <h5 class="section-header text-mid"><?php get_seleected_movie_reviews_title()?> <br> Reviews</h5>
        <div class="searcher-container-reviews">
            <?php include "includes/search-reviews.php"?>
        </div>
  

        <div class="reviews-all-container">
          
          
        </div>


        <?php

            get_render_movie_reviews()

        ?>
  
        
      
       
       
    </section>
   
   
     

      
 
   

 
  
    <?php include("includes/footer.php")?>
  
  
  </body>
</html>