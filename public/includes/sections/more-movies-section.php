<section class="more-section">
    <!-- <div class="black-gradient-animation-top ">

    </div> -->
   <div class="wrapper-content">
   <h5 class="section-header white-text  text-mid header-intersect5">You may like these</h5>
   <span class="header-trigger5 trigger"></span>
       <div class="container-custom more-movies-container full-screen-grid-cards">
            <?php get_kinds_movies_cards("others", "movie_more_card"); ?>



        </div>

        <div class="container-custom more-movies-container mobile-screen-grid-cards">

            <?php   get_kinds_movies_cards_mobile("others", "movie_more_card_mobile", 6); ?>

        </div>
        <button class="show-more-titles-button button-custom">
            show more
        </button>




    </div>
    <!-- <div class="black-gradient-animation">

    </div> -->

</section>