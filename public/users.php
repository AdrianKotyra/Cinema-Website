<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>
<?php
        $limit = 10;

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $sql_total = "SELECT COUNT(user_id) FROM users";
        $total_result = $database-> query_array($sql_total);
        $total_records = $total_result->fetch_array()[0];
        $total_pages = ceil($total_records / $limit);

    ?>
<section class="about_container">




    <video class=" video_about_all video_sub" height="100%" autoplay muted loop>
        <source src="./videos/members/iron-man-vs-batman-moewalls-com.mp4" type="video/mp4">


    </video>
    <div class="hero-text hero-text-sub">
        <h3 class="text-big white-text ">Users </h3>
    </div>












</section>
<section class="wrapper-content news-section ">

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
        <?php display_all_users($limit, $start)?>

    </div>


    <?php

            // get_render_user();

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




        ?>

    <?php include("includes/users-pagination.php")?>




</section>










<?php include("includes/footer.php")?>


</body>

</html>