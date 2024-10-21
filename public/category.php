<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>
  
    <section class="hero-section movie-section category_hero">
        <?php get_catgeory_page()?>
   

    

       
    </section>
    <section class="category_movies ">
   
      <div class="wrapper-content">
        <div class="wrapper-search">
          <div class="search_box search-cat">
    
              <div class="search_field">
                <?php 
                if(isset($_GET["category"])){
                  echo '<input type="text" class="input search-movie search-movie-cat" placeholder="Search movie" >';
                } 
                else {
                   echo '<input type="text" class="input search-movie search-movie-subcat" placeholder="Search movie" >';
                }
                
                
                ?>
               
                <i class="fas fa-search"></i>
                <div class="search-results">
                  <ul class="list-searched-movies">

                  </ul>
                </div>
              </div>

          </div>
        </div>
      
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