<section class="trending-section current-movies-section">
      
        <img class="arrow-section current-movie-arrow  slider-arrow-currnet-right"src="./imgs/icons/right-arrow.svg" alt="">
        <img class="arrow-section current-movie-arrow  slider-arrow-currnet-left"src="./imgs/icons/left-arrow.svg" alt="">
        <div class="wrapper-content">
        <h5 class="section-header text-mid header-intersect4">Currently playing</h5>
        <span class="header-trigger4 trigger"></span>
            <div class="movies-container expandable-container">
          

                <div class="scrolling-wrapper row-custom current-slider ">
                    <?php get_kinds_movies_cards("current", "movie_big_card")?>
                
                </div>        
            </div>
        </div>
    


    </section>