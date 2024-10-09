

<!--    
        $limit = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $sql_total = "SELECT COUNT(post_id) FROM posts";
        $total_result = $database-> query_array($sql_total);
        $total_records = $total_result->fetch_array()[0];
        $total_pages = ceil($total_records / $limit);
         -->
    
   
        <h5 class="section-header text-mid">All <?php display_user_name_by_id()?> <br> reviews</h5>
      
      
        <div class="reviews-all-container all-posts-list-container col-custom">
            <?php get_user_comments()?>
          

        </div>
       

       
      
          
        <!--include("includes/posts-pagination.php") -->
       
    
   
   
   
  
      
    
  
  
  </body>
</html>