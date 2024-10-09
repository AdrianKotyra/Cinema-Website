<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>
    <?php  movie_booking_redirect()?>

    <div class="movie-booking-section">

        <div class="movie-booking-banner">
      
            <img src="<?php get_selected_movie_img()?>" alt="">
        </div>

        <div class="booking-info">
            <div class="row-custom info-booking">
                <p class="booking_title_movie"><?php get_selected_movie_name()?></p>
                <p class="booking_date_movie">

                <?php 
                if(isset($_POST["submit_booking"])) {
                    
                    $day = $_POST["day"];
                    $time = $_POST["time"];
                 
                    echo 'Cinema: Edinburgh Limelight  <br>
                    Date: '.$day.' 
                    <br> 
                    Time: '.$time.'';
                  
                   
                }
            
                
            ?>


                </p>
            </div>
           
          


        </div>

        <div class="choose-seats-container">
            <h3>Choose Seats</h3>
            <div class="seats-grid">
                <div class="seat-card">
                    
                    <span class="seat-number">1</span>
                    <img src="./imgs/icons/sofa-chair.svg" alt="">
                </div>
            </div>
        </div>


    </div>
   
   
    
    <?php include("includes/footer.php")?>
   
  </body>
</html>