<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>

<footer class='<?php if($current_page == 'reviews.php'
||$current_page == 'users.php'
|| $current_page == 'forum_posts_all.php'
|| $current_page == 'posts.php'
|| $current_page == 'contact.php'
|| $current_page == 'user.php'
|| $current_page == 'category.php'
|| $current_page == 'movie_reviews.php'
|| $current_page == 'movie_booking.php'

)

{ echo 'bg-dark'; } ?>'>

        <div class="wrapper-content footer-content">
            <div class="logo-container-footer">
                        <a class="logo-container row-custom footer-logo" href="index.php">
                            <img src="./imgs/icons/cinema.svg" alt="">
                            <div class="logo_name_footer">
                                Limelight Cinema
                            </div>


                        </a>
            </div>
            <div class="footer-container <?php if($current_page == 'reviews.php'
                ||$current_page == 'users.php'
                || $current_page == 'forum_posts_all.php'|| $current_page == 'posts.php'
                || $current_page == 'contact.php'
                || $current_page == 'user.php'
                || $current_page == 'category.php'
                || $current_page == 'movie_reviews.php'
                || $current_page == 'movie_booking.php'

                )

                { echo 'white-text'; } ?>">


                <div class="col-footer col-custom">
                    <h5>Profile</h5>
                    <a>FAQ</a>
                    <a>Pricing plan</a>
                    <a>Order tracking</a>
                    <a>Returns</a>
                </div>
                <div class="col-footer col-custom">
                    <h5>Customer</h5>
                    <a>Help & contact us</a>
                    <a>Return</a>
                    <a>Online store</a>
                    <a>Terms and conditions</a>
                </div>
                <div class="col-footer col-custom">
                    <h5>Posts</h5>
                    <a>Blog</a>
                    <a>Recent post</a>
                    <a>Order tracking</a>
                    <a>Returns</a>
                </div>
                <div class="col-footer col-custom">
                    <h5>Contact</h5>
                    <div class="row-custom icons-footer">
                        <a href="">  <img class="contact-icon" id="fb-icon-footer"alt="" src="./imgs/icons/facebook.svg"></a>
                        <a href="">   <img class="contact-icon" alt="" src="./imgs/icons/linkedin.svg"></a>
                        <a href=""> <img class="contact-icon" alt="" src="./imgs/icons/twitter.svg"></a>

                    </div>

                </div>


            </div>

        </div>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="./js/global.js"></script>
        <script src="./js/user_settings.js"></script>
        <script src="./js/user_login_register.js"></script>

        <?php ob_end_flush();?>

    </footer>