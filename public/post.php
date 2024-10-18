<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>
  
    <section class="news-section ">
        <?php get_selected_post_header()?>
        <div class="selected-post-wrapper row-custom">
         
            <div class="selected-post-container col-custom">
                
                <?php get_selected_post()?>
             
            </div>


            <div class="widget-posts">
                <?php include "includes/search-posts.php"?>
                <?php recent_posts('recent_posts_all_literal_main_page', 5, 0)?>
                <a href="posts.php">
                    <button class="button-custom">
                        See more
                    </button>
                </a>
            </div>


        </div>
        <?php include "includes/comment-form-news.php"?>

        <?php include("includes/news_post-comments-pagination.php")?>
      
       
       
      
       
       
    </section>

 
   
   
     

      
 
   

 
  
    <?php include("includes/footer.php")?>
  
  
  </body>
</html>