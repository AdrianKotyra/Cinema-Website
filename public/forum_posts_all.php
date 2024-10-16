<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>
    <?php  
        $limit = 12;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $sql_total = "SELECT COUNT(id) FROM forum_posts";
        $total_result = $database-> query_array($sql_total);
        $total_records = $total_result->fetch_array()[0];
        $total_pages = ceil($total_records / $limit);
        
    ?>
    <section class="wrapper-content news-section ">
        <h5 class="section-header text-mid header-subpage">Users Posts</h5>
    
        <div class="searcher-container-reviews">
            <?php include "includes/search-forum-posts.php"?>
        </div>
        <!-- if user logged in show to post form -->
        <button class="add_form_post_trigger">
            Add Post
        </button>

    
       
  

        <div class="posts_forum-all-container">
            <?php get_render_forum_posts($limit, $start)?>
          
        </div>
       
        <?php include("includes/forum_posts-pagination.php")?>

       <!-- post form hidden -->
        <?php   
            include("includes/add-post-form.php");
        ?>
      
     
      
       
       
    </section>
   
   
     

      
 
   

 
  
    <?php include("includes/footer.php")?>
  
  
  </body>
</html>