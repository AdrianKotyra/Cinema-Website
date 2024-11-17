<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>
    <?php
        $limit = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $sql_total = "SELECT COUNT(id) FROM reviews";
        $total_result = $database-> query_array($sql_total);
        $total_records = $total_result->fetch_array()[0];
        $total_pages = ceil($total_records / $limit);

    ?>
    <section class="hero-section hero-reviews-movie row-custom">

        <div class="hero-index-text">
            <div class="para-hero">
                <h3><?php get_seleected_movie_reviews_title()?> <br> Reviews</h3>
            </div>



        </div>
        <div class="slides_container">
            <img src="./<?php get_seleected_movie_reviews_img()?>" alt="">

        </div>






    </section>
    <section class="wrapper-content news-section ">

        <div class="searcher-container-reviews">
            <form role="search" method="get" action="" class="search-post-container search-review">
                <div class="input-container">
                    <input type="search" class="search-reviews" value="" name="r" placeholder="Search by movie" />
                    <div class="search-results-posts">
                        <ul class="list-searched-posts col-custom">

                        </ul>
                    </div>
                </div>
            </form>
        </div>


        <div class="reviews-all-container">


        </div>


        <?php

            get_render_movie_reviews()

        ?>





    </section>










    <?php include("includes/footer.php")?>


  </body>
</html>