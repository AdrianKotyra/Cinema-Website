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
<section class="about_container">




    <video class=" video_about_all video_sub" height="100%" autoplay muted loop>
        <source src="./videos/reviews/miles-morales-falling-spiderman-into-the-spiderverse-moewalls-com.mp4" type="video/mp4">


    </video>
    <div class="hero-text hero-text-sub">
        <h3 class="text-big white-text ">Reviews </h3>
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
    <!-- if user logged in show to add review -->
    <button class="add_review_post_trigger button-custom">
        Add Review
    </button>


    <div class="reviews-all-container">
        <?php get_render_reviews($limit, $start)?>

    </div>

    <!-- review form hidden -->

    <?php
            include("includes/add-review-form.php");
        ?>

    <?php include("includes/reviews-pagination.php")?>






</section>










<?php include("includes/footer.php")?>


</body>

</html>