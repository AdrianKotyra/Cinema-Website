<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>
  
    <section class="hero-section movie-section category_hero">
        <?php get_catgeory_page()?>
   

    

       
    </section>
    <section class="category_movies ">
   
      <div class="wrapper-content">
      
        <div class="container-custom category-movies-container">
          <?php get_categories_movies_cards()?>
        </div>

        <button class="show-more-titles-button button-custom">
            show more
        </button>
      </div>
    </section>
   
     

      
 
   

 
  
    <?php include("includes/footer.php")?>
    <script src="js/pages/category.js"></script>
  
  </body>
</html>