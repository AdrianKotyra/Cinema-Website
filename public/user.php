<?php include "includes/header.php"?>
    <?php include "includes/nav.php"?>
    <?php user_redirect()?>
    <section class="wrapper-content news-section ">
        <h5 class="section-header text-mid header-subpage">Users</h5>
        <form role="search" method="get" action="" class="search-post-container search-user">
            <div class="input-container">
                <input type="search" class="search-users" value="" name="s" placeholder="Search user..." />
                <div class="search-results-posts">
                    <ul class="list-searched-posts col-custom">

                    </ul>
                </div>
            </div>
        </form>

        <div class="users-all-container">


        </div>


        <?php

            get_render_user();

            if(isset($_GET["source"])) {
                $source = $_GET["source"];

            }
            else {
                $source = "";
            }
            switch($source) {
                case 'all_posts';
                include "includes/user_posts.php";
                break;



            }
            switch($source) {
                case 'all_reviews';
                include "includes/user_reviews.php";
                break;



            }




        ?>





    </section>










    <?php include("includes/footer.php")?>


  </body>
</html>