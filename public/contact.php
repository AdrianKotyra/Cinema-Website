<?php include "includes/header.php"?>
<link rel="stylesheet" href="./css/contact.css">
<body>

  <?php include "includes/nav.php"?>
    <section class="about_container contact_container">
      
   
       
    
         <?php contact_slider()?>
        <div class="hero-text hero-text-sub">
        <h3 class="text-big">Contact <br>
        
        </div>
    </section>
    <section class="contact-section">
        <div class="contact-form-container">
        <div class="container col-custom">
    
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
            dolorum adipisci recusandae praesentium dicta!
          </p>

          <div class="info">
            <div class="information">
              <i class="fas fa-map-marker-alt"></i> &nbsp &nbsp

              <p>92 Cherry Drive Uniondale, NY 11553</p>
            </div>
            <div class="information">
              <i class="fas fa-envelope"></i> &nbsp &nbsp
              <p>lorem@ipsum.com</p>
            </div>
            <div class="information">
              <i class="fas fa-phone"></i>&nbsp&nbsp
              <p>123-456-789</p>
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
            <input value="Send" class="btn send-contact-form-btn" />
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