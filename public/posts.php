<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>

    <?php  
        $limit = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $sql_total = "SELECT COUNT(post_id) FROM posts";
        $total_result = $database-> query_array($sql_total);
        $total_records = $total_result->fetch_array()[0];
        $total_pages = ceil($total_records / $limit);
        
    ?>
    <section class="wrapper-content news-section ">
        <h5 class="section-header text-mid">All News</h5>
        <!-- <select class="sort_by">
        
            <option>Newest</option>
            <option>Oldest</option>
		</select> -->

      

        
        <div class="searcher-container-posts">
            <?php include "includes/search-posts.php"?>
        </div>
  

        <div class="all-posts-list-container col-custom">
            <?php recent_posts('posts_literal',  $limit, $start)?>


        

           

        </div>
       

       
      
          
        <?php include("includes/posts-pagination.php")?>
          
     
       
    </section>
   
   
 

      
    <?php include("includes/footer.php")?>
  
  
  </body>
</html>