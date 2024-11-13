

<section class="blog-section">
        <!-- <div class="black-gradient-animation-top ">

        </div> -->
        <div class="wrapper-content blog-content">

        <div class="row-custom header-section-container">
            <h5 class="section-header white-text  text-mid header-intersect7">Lastest News</h5>
            <a href="posts.php">View All</a>

        </div>

        <span class="header-trigger7 trigger"></span>
            <div class="container-custom row-custom  posts-container">
                <?php recent_posts('recent_post_literal_main_page', 1, 0)?>
                <div class="col-50 col-custom old_posts">
                    <?php recent_posts('recent_posts_all_literal_main_page', 5, 1)?>



                </div>

            </div>
        </div>



</section>