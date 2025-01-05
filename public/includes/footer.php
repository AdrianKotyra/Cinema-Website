





<footer>
        <div class="up-section">
            <a class="logo-container row-custom footer-logo" href="index.php">
                <img src="./imgs/icons/cinema.svg" alt="">
                <div class="logo_name_footer">
                    Limelight Cinema
                </div>


            </a>

            <ul>
                <h1>Company</h1>
                <li><a href="about.php">Teams</a></li>
                <li><a href="about.php">Services</a></li>
                <li><a href="contact.php">Contact us</a></li>
                <li><a href="about.php">Support</a></li>
            </ul>

            <ul>
                <h1>About</h1>
                <li><a href="about.php">Company</a></li>
                <li><a href="contact.php">Location</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="about.php">Our Services</a></li>
            </ul>

            <ul>
                <h1>Contact us</h1>
                <li><p>+1 123 456 7890</p></li>
                <li><p>24 Milton Rd E, </p></li>
                <li><p>Edinburgh EH15 2PQ</p></li>
            </ul>
        </div>

        <div class="down-section">
            <ul>
                <h1>Explore</h1>
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="users.php">Members</a></li>
                <li><a href="posts.php">News</a></li>
                <li><a href="forum_posts_all.php">Community</a></li>
            </ul>

            <ul>
                <h1>Support</h1>
                <li><a href="">Settings</a></li>
                <li><a href="">Privacy</a></li>
                <li><a href="">Help</a></li>
                <li><a href="">Blog</a></li>
            </ul>

            <div class="social">
                <h1>Social</h1>

                <div class="social-icons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>


        </div>


    </footer>






<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>



        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="./js/global.js"></script>
        <script src="./js/user_settings.js"></script>
        <script src="./js/user_login_register.js"></script>

        <?php ob_end_flush();?>

    </footer>