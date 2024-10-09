<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>
<?php forum_post_redirect()?>   
<section class="news-section ">
    <?php get_selected_forum_post_header()?>
    <div class="selected-post-wrapper row-custom">
        <div class="selected-post-container col-custom">
            
            
            <?php get_selected_forum_post()?>
            
        </div>


        <div class="widget-posts">
            <?php include "includes/search-forum-posts.php"?>
            <?php recent_forum_posts('recent_forum_posts_literal', 4, 0)?>
            <a href="forum_posts_all.php">
                <button class="button-custom">
                    See more
                </button>
            </a>
        </div>


    </div>
    <?php include "includes/comment-form-forum-posts.php"?>

    
    
    
    
    
    
    
</section>

 
   
   
     

      
 
   

 
  
    <?php include("includes/footer.php")?>
  
  
</body>
</html>

