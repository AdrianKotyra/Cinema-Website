
<section class="trending-section section-trending ">

<div class="wrapper-content">

<div class="row-custom header-section-container">
    <h5 class="section-header text-mid header-intersect2">Trending</h5>
    <a class="black-text" href="category.php?subcategory=trending">View All</a>

</div>

<span class="header-trigger2 trigger"></span>
    <div class="movies-container expandable-container">
    <img class="arrow-section slider-arrow-trending slider-arrow-trending-right black-filter"src="./imgs/icons/right-arrow.svg" alt="">
    <img class="arrow-section slider-arrow-trending slider-arrow-trending-left black-filter"src="./imgs/icons/left-arrow.svg" alt="">

        <div class="scrolling-wrapper slider-trending trends-slider row-custom full-screen-grid-cards">

            <?php get_kinds_movies_cards("trending", "movie_big_card"); ?>

        </div>

        <div class="scrolling-wrapper slider-trending trends-slider row-custom mobile-screen-grid-cards">

            <?php   get_kinds_movies_cards_mobile("trending", "movie_big_card", 6); ?>

        </div>

    </div>
</div>
<!-- <div class="black-gradient-animation">

</div>d -->


</section>
