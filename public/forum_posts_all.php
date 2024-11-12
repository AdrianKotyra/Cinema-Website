<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>
<?php
        $limit = 12;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $sql_total = "SELECT COUNT(id) FROM forum_posts";
        $total_result = $database-> query_array($sql_total);
        $total_records = $total_result->fetch_array()[0];
        $total_pages = ceil($total_records / $limit);

    ?>
<section class="about_container">



    <video class=" video_about_all" height="100%" autoplay muted loop>
        <source src="./videos/user_posts/slider.mp4" type="video/mp4">


    </video>

    <div class="hero-text hero-text-sub">
        <h3 class="text-big">Users Posts </h3>
    </div>












</section>
<section class="wrapper-content news-section ">


    <div class="searcher-container-reviews">
        <form role="search" method="get" action="" class="search-post-container forum-seacher">
            <div class="input-container">
                <input type="search" class="search-forum-posts-input" value="" name="r" placeholder="Search users posts" />
                <div class="search-results-posts">
                    <ul class="list-searched-forum-posts col-custom">

                    </ul>
                </div>
            </div>
        </form>
    </div>
    <!-- if user logged in show to post form -->
    <button class="add_form_post_trigger button-custom">
        Add Post
    </button>





    <div class="posts_forum-all-container">
        <?php get_render_forum_posts($limit, $start)?>

    </div>

    <?php include("includes/forum_posts-pagination.php")?>

    <!-- post form hidden -->
    <?php
            include("includes/add-post-form.php");
        ?>





</section>










<?php include("includes/footer.php")?>


</body>

</html>