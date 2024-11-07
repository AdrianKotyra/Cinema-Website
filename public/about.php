<?php include "includes/header.php"?>

<body>

  <?php include "includes/nav.php"?>
  <section class="about_container">
      
   
       
   
   <?php about_slider()?>
    <div class="hero-text hero-text-sub">
      <h3 class="text-big">When you’re here, you’re home. <br>
      So is all your entertainment.
    </div>
    

  

      
  
   
     

  

   
  </section>


  <section class="about_Section">
    <div class="about_container_header">
      <h1 class="header_About">We’re fans at heart.</h1>
      <p>Of films, shows, music and well, all things entertainment. So much so that we built an app that brings it all together – streaming services, personal media, ratings and watchlists. As beautiful as it is easy to use, Plex gives fans everywhere a way to discover, save and enjoy the entertainment they love the most.</p>


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
            <img src="./imgs/blog_features.jpg" alt="">
            <div class="text_feature_card">
              <h5>Forum</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              Numquam minus aliquam, blanditiis dolor expedita error.
              </p>
              <a  target="_blank" href="forum_posts_all.php"> 
                <button class="button-custom">check here</button>
              </a>


            </div>
            
          </div>
         
          <div class="col-custom features_col">
            <img src="./imgs/news_features.jpg" alt="">
            <div class="text_feature_card">
              <h5>News</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              Numquam minus aliquam, blanditiis dolor expedita error.
              </p>
              <a  target="_blank" href="posts.php"> 
                <button class="button-custom">check here</button>
              </a>

            </div>
            
          </div>
         
          <div class="col-custom features_col">
            <img src="./imgs/users_features.jpg" alt="">
            <div class="text_feature_card">
              <h5>Users</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              Numquam minus aliquam, blanditiis dolor expedita error.
              </p>
              <a  target="_blank" href="users.php"> 
                <button class="button-custom">check here</button>
              </a>
             

            </div>
            
          </div>
         
          <div class="col-custom features_col">
            <img src="./imgs/reviews_features.jpg" alt="">
            <div class="text_feature_card">
              <h5>Reviews</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              Numquam minus aliquam, blanditiis dolor expedita error.
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