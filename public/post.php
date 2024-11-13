<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>

    <section class="news-section ">
        <?php get_selected_post_header()?>
        <div class="selected-post-wrapper row-custom">

            <div class="selected-post-container col-custom">

                <?php get_selected_post()?>

            </div>


            <div class="widget-posts">
            <div class="searcher-container-reviews">
            <form role="search" method="get" action="" class="search-post-container">
                <div class="input-container">
                    <input type="search" class="search-post" value="" name="s" placeholder="Search post..." />
                    <div class="search-results-posts">
                        <ul class="list-searched-posts col-custom">

                        </ul>
                    </div>
                </div>
            </form>
            </div>
                <?php recent_posts('recent_posts_all_literal_main_page', 5, 0)?>
                <a href="posts.php">
                    <button class="button-custom">
                        See more
                    </button>
                </a>
            </div>


        </div>
        <?php include "includes/comment-form-news.php"?>

        <?php include("includes/news_post-comments-pagination.php")?>

        <div class="mobile-more-posts-container">
            <?php include "includes/search-posts.php"?>
            <div class="widget-posts-mobile row-custom">

                <?php recent_posts('recent_posts_all_literal_main_page', 5, 0)?>

            </div>
            <a href="posts.php">
                <button class="button-custom">
                    See more
                </button>
            </a>
        </div>


    </section>












    <?php include("includes/footer.php")?>


  </body>
</html>