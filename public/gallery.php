<?php include "includes/header.php"?>

<body>

  <?php include "includes/nav.php"?>
  <section class="about_container">




    <video class=" video_about_all video_sub"  height="100%" autoplay  muted loop >
      <source src="./videos/gallery/anna-frozen-2-moewalls-com.mp4" type="video/mp4">


    </video>
    <div class="hero-text hero-text-sub">
      <h3 class="text-big white-text">Gallery
    </div>












  </section>

  <section class="gallery_section">
    <h1 class="header_About">Explore our facility.</h1>
    <div class="grid-gallery" id="gallery-wrap">
      <?php get_gallery_images(0, 99)?>




    </div>



  </section>








  <?php include("includes/footer.php")?>
  <script src="js/pages/about.js"></script>







</body>
</html>