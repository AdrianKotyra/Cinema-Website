<?php include "includes/header.php"?>

<body>

  <?php include "includes/nav.php"?>
  <section class="about_container">




    <video class=" video_about_all"  height="100%" autoplay  muted loop >
      <source src="./videos/about/slider.mp4" type="video/mp4">


    </video>
    <div class="hero-text hero-text-sub">
      <h3 class="text-big white-text">When you’re here, you’re home. <br>
      So is all your entertainment.
    </div>












  </section>


  <section class="about_Section">
    <div class="about_container_header">
      <h1 class="header_About">We’re fans at heart.</h1>
      <p>Welcome to Limelight Cinemas, your premier destination for experiencing the latest films across the UK, with a special focus on our vibrant Midlothian locations. Limelight Cinemas is dedicated to showcasing contemporary movies, and we’re thrilled to offer a new interactive website designed specifically for our Midlothian venues. This site is crafted to enhance your cinema experience, with convenient features like online ticket booking, membership options, and personalized access to age-appropriate films. For our junior members (17 and under), we've created a special section where they can easily find and explore movies suited to their age group, along with an engaging movie-themed quiz in the games section. Junior members won’t need to worry about booking but can enjoy the thrill of discovering what’s showing. For adult members, we provide access to film information, showtimes, and exclusive booking features after registration, making it easy to secure seats for upcoming movies. Our team at Limelight Cinemas ensures that our admin staff has full access to manage member details and event listings through a secure portal, keeping your information safe. With features like e-ticket printing and efficient stock control for tickets, we aim to make every step of your cinema experience smooth and enjoyable. Additionally, our website is designed to work seamlessly on both desktop and mobile devices, so you can stay connected with Limelight on the go. Accessible, engaging, and user-friendly, our new site is built to bring the excitement of Limelight Cinemas closer to you.</p>


    </div>







    <div class="container_about_section row-custom">
      <div class="col-custom text_about_col">
        <h1>25+ </h1>
        <h1>million</h1>
        <span> Global users</span>
        <h1>50k+</h1>
        <span> On-demand titles</span>
      </div>
      <div class="img_about_col">
        <img src="./imgs/about_img.png" alt="">
      </div>

    </div>






  </section>
  <section class="video_section">
    <h1 class="header_About">What is Limelight Cinema?</h1>
    <div class="video_container">
      <div class="video_box">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/KJymhrqnwLk?si=JleoZ1qRi7H91TPw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>

    </div>







  </section>

  <section class="map_section">
    <h1 class="header_About">Our Cinemas
    Leading and global Cinema Group operating in Midlothain with 5 venues.</h1>
    <div class="map_container row-custom">
      <div class="list_cinemas col-custom">
          <h5 class="cities1">- Edinburgh</h5>
          <span class="cities-trigger1"></span>
          <h5 class="cities2">- Glasgow</h5>
          <span class="cities-trigger2"></span>
          <h5 class="cities3">- Dundee</h5>
          <span class="cities-trigger3"></span>
          <h5 class="cities4">- Inverness</h5>
          <span class="cities-trigger4"></span>
          <h5 class="cities5">- Aberdeen</h5>
          <span class="cities-trigger5"></span>
      </div>

      <div class="map_box">
        <img src="./imgs/cinemas_map.jpg" alt="">
      </div>

    </div>



  </section>

  <section class="staff_section">
    <h1 class="header_About">Meet our starting line-up.</h1>
    <div class=" col-custom wrapper-content">




        <div class="faq-container staff-container row">
            <?php get_render_members()?>
        </div>

    </div>

    </div>


  </section>

  <section class="features_section">
    <h1 class="header_About">Go ahead, make yourself at home.</h1>

    <div class="features_grid">
          <div class="col-custom features_col">
            <img src="./imgs/features_posts.jpg" alt="">
            <div class="text_feature_card">
              <h5>Forum</h5>
              <p>Never miss a breaking story in entertainment! Our news section delivers real-time updates on movie
              releases, casting announcements, box office results, and more.
              </p>
              <a  target="_blank" href="forum_posts_all.php">
                <button class="button-custom">check here</button>
              </a>


            </div>

          </div>

          <div class="col-custom features_col">
            <img src="./imgs/features_news.jpg" alt="">
            <div class="text_feature_card">
              <h5>News</h5>
              <p>Stay up to date with the latest in the film industry! Our blog offers insightful articles, movie
              reviews, and behind-the-scenes stories
              </p>
              <a  target="_blank" href="posts.php">
                <button class="button-custom">check here</button>
              </a>

            </div>

          </div>

          <div class="col-custom features_col">
            <img src="./imgs/features_users.jpg" alt="">
            <div class="text_feature_card">
              <h5>Users</h5>
              <p> Connect with other film lovers, share your
              thoughts, and tailor your experience to match your unique movie preferences.
              </p>
              <a  target="_blank" href="users.php">
                <button class="button-custom">check here</button>
              </a>


            </div>

          </div>

          <div class="col-custom features_col">
            <img src="./imgs/features_reviews.jpg" alt="">
            <div class="text_feature_card">
              <h5>Reviews</h5>
              <p>Our movie reviews section helps you
                    decide what to watch next by offering ratings, detailed critiques, and insights into various aspects
                    of filmmaking.
              </p>
              <a  target="_blank" href="reviews.php">
                <button class="button-custom">check here</button>
              </a>


            </div>

          </div>



    </div>







  </section>

  <section class="gallery_about_section">
    <h1 class="header_About">Explore our facility.</h1>
    <div class="grid-gallery" id="gallery-wrap">
      <?php get_gallery_images()?>




    </div>



  </section>





  <?php include("includes/footer.php")?>
  <script src="js/pages/about.js"></script>







</body>
</html>