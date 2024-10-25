<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>


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

    <?php include("includes/forum_post-comments-pagination.php")?>

    <div class="mobile-more-posts-container">
        <?php include "includes/search-forum-posts.php"?>

        <div class="widget-posts-mobile row-custom">
            
            <?php recent_forum_posts('recent_forum_posts_literal', 4, 0)?>
            
        </div>
        <a href="forum_posts_all.php">
            <button class="button-custom">
                See more
            </button>
        </a>
    </div>

   
    
    
    
</section>

 
   
   
     

      
 
   

 
  
    <?php include("includes/footer.php")?>
  
  
</body>
</html>

