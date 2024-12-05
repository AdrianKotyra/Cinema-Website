<section class="trending-section current-movies-section">

        <img class="arrow-section current-movie-arrow  slider-arrow-currnet-right black-filter"src="./imgs/icons/right-arrow.svg" alt="">
        <img class="arrow-section current-movie-arrow  slider-arrow-currnet-left black-filter"src="./imgs/icons/left-arrow.svg" alt="">
        <div class="wrapper-content">

            <div class="row-custom header-section-container">
                <h5 class="section-header text-mid header-intersect4">Currently playing</h5>
                <a class="black-text" href="category.php?subcategory=current">View All</a>

            </div>

        <span class="header-trigger4 trigger"></span>
            <div class="movies-container expandable-container">


                <div class="scrolling-wrapper row-custom current-slider full-screen-grid-cards">
                    <?php get_kinds_movies_cards("current", "movie_big_card")?>

                </div>

                <div class="scrolling-wrapper row-custom current-slider mobile-screen-grid-cards">

                    <?php   get_kinds_movies_cards_mobile("current", "movie_big_card", 6); ?>

                </div>
            </div>
        </div>



    </section>