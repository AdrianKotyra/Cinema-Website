<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>
  
    <section class="hero-section movie-section category_hero">
        <?php get_catgeory_page()?>
   

    

        <div class="black-gradient-animation">

        </div>
       
    </section>
    <section class="category_movies">
   
      <div class="wrapper-content">
      
        <div class="container-custom">
          <?php get_categories_movies_cards()?>
        </div>
      </div>
    </section>
   
     

      
 
   

 
  
    <?php include("includes/footer.php")?>
  
  
  </body>
</html>