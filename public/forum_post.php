<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>


<section class="news-section row-custom post-section">

    <div class="selected-post-wrapper">
        <?php get_selected_forum_post_header()?>
        <div class="selected-post-container col-custom">


            <?php get_selected_forum_post()?>

        </div>

        <?php include "includes/comment-form-forum-posts.php"?>

        <?php include("includes/forum_post-comments-pagination.php")?>




    </div>
    <div class="widget-posts">
        <form role="search" method="get" action="" class="search-post-container forum-seacher">
            <div class="input-container">
                <input type="search" class="search-forum-posts-input" value="" name="r" placeholder="Search users posts" />
                <div class="search-results-posts">
                    <ul class="list-searched-forum-posts col-custom">

                    </ul>
                </div>
            </div>
        </form>
            <?php recent_forum_posts('recent_forum_posts_literal', 10, 0)?>
            <a href="forum_posts_all.php">

                    See more

            </a>
    </div>







</section>
<div class="mobile-more-posts-container">
    <form role="search" method="get" action="" class="search-post-container forum-seacher">
        <div class="input-container">
            <input type="search" class="search-forum-posts-input" value="" name="r" placeholder="Search users posts" />
            <div class="search-results-posts">
                <ul class="list-searched-forum-posts col-custom">

                </ul>
            </div>
        </div>
    </form>

        <div class="widget-posts-mobile row-custom">

            <?php recent_forum_posts('recent_forum_posts_literal', 4, 0)?>

        </div>
        <a href="forum_posts_all.php">
            <button class="button-custom">
                See more
            </button>
        </a>
    </div>












    <?php include("includes/footer.php")?>


</body>
</html>
