<?php include "includes/header.php"?>
<link rel="stylesheet" href="./css/contact.css">
<body>

  <?php include "includes/nav.php"?>
    <section class="about_container contact_container">




    <video class=" video_about_all"  height="100%" autoplay  muted loop >
      <source src="./videos/contact/slider.mp4" type="video/mp4">


    </video>
        <div class="hero-text hero-text-sub">
        <h3 class="text-big white-text ">Contact <br>

        </div>
    </section>
    <section class="contact-section">
        <div class="contact-form-container">
        <div class="container col-custom">

      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
          Have a question or comment? Fill out the form below, and we’ll respond promptly. We look forward to connecting with you and helping in any way we can!
          </p>

          <div class="info">
            <div class="information">
              <i class="fas fa-map-marker-alt"></i> &nbsp &nbsp

              <p>24 Milton Rd E, Edinburgh EH15 2PQ</p>
            </div>
            <div class="information">
              <i class="fas fa-envelope"></i> &nbsp &nbsp
              <p>courseapps@edinburghcollege.ac.uk</p>
            </div>
            <div class="information">
              <i class="fas fa-phone"></i>&nbsp&nbsp
              <p>0131 297 8300 </p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form autocomplete="off" class="contact-form-main">
            <h3 class="title">Contact us</h3>
            <label for="firstname">firstname</label>
            <div class="input-container">
              <input type="text" name="firstname" class="input firstname" />

              <span></span>
            </div>
            <label for="lastname">lastname</label>
            <div class="input-container">
              <input type="text" name="lastname" class="input lastname" />

              <span></span>
            </div>
            <label for="Email">Email</label>
            <div class="input-container">
              <input type="email" name="email" class="input email" />


            </div>
            <label for="message">Message</label>
            <div class="input-container textarea">
              <textarea name="message" class="input msg"></textarea>


            </div>
            <input value="Send" class="btnform send-contact-form-btn" />
          </form>


        </div>


      </div>

    <div class="alert-container-contact">

          </div>

    </div>




    </section>




















  <?php include("includes/footer.php")?>
  <script src="js/pages/contact.js"></script>







</body>
</html>