<section class="movies-section">



    <div class="popular-mobile-section wrapper-content">

        <div class="row-custom header-section-container">
            <h5 class="section-header white-text text-mid header-intersect22">Most popular</h5>
            <a href="category.php?subcategory=popular">View All</a>

        </div>
        <span class="header-trigger22 trigger"></span>
        <div class="movies-container expandable-container">
            <div class="scrolling-wrapper slider-trending row-custom mobile-screen-grid-cards">
                <?php   get_kinds_movies_cards_mobile("popular", "movie_big_card", 6); ?>


            </div>
        </div>
    </div>
    </div>
    <div class="wrapper-content col-custom movies-section-container col-custom">

        <div class="background-section-current-movie_popular">

        </div>


        <div class="row-custom header-section-container">
            <h5 class="section-header white-text  text-mid header-intersect1">Most popular</h5>
            <a href="category.php?subcategory=popular">View All</a>

        </div>



        <span class="header-trigger1 trigger"></span>
        <div class="row-custom container-popular-details-trailer">
            <div class="current-trending-movie-details">
                <div class="movie-card-info-container">
                    <a class="popular_movie_link"href="">
                        <h1 class="text-big text-white selected_movie_title selected_movie_title_popular ">

                        </h1>
                    </a>
                    <p class="text-mid selected_movie_description"></p>
                    <div class="popular-movie-views">
                        Views:
                        <span class="popular-movie-views-counter"></span>
                    </div>


                </div>
                <div class="trailers-selected-movies ">
                    <div class="container-trailers col-custom">

                        <div class="trailer-trending-selected-movie-card">
                            <iframe class="selected-popular-movie-trailer" width="100%" height="100%"
                                src="https://www.youtube.com/embed/hR1-ihzff3I?si=DvPZEjflRhqxEveA"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>


                    </div>
                </div>
                <a class="current-trending-button" href=""> <button
                class="button-custom current-trending-button">Book</button></a>


            </div>
            <div class=" col-custom vetical-scroll-grab-class container-popular-scroller full-screen-grid-cards">

                <?php get_popular_movies_cards("movie_small_card")?>
            </div>

        </div>












    </div>





</section>