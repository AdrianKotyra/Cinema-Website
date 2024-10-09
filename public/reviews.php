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
        <h5 class="section-header text-mid">Reviews</h5>
        <div class="searcher-container-reviews">
            <?php include "includes/search-reviews.php"?>
        </div>
        <!-- if user logged in show to add review -->
        <button class="add_review_post_trigger button-custom">
            Add Review
        </button>


        <div class="reviews-all-container">
            <?php get_render_reviews($limit, $start)?>
          
        </div>

        <!-- review form hidden -->

        <?php   
            include("includes/add-review-form.php");
        ?>
      
        <?php include("includes/reviews-pagination.php")?>
        
       
        
      
       
       
    </section>
   
   
     

      
 
   

 
  
    <?php include("includes/footer.php")?>
  
  
  </body>
</html>