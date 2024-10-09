<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>
    <!-- movie_booking_redirect() -->
    <script src="js/pages/movie_booking/render_seats.js"></script>

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
                    $ticket_quantity = $_POST["ticket_quantity"];
                    $Ticket_price_unit = $_POST["Ticket_price_unit"];
                    $total_price_number = $_POST["total_price_number"];

                    echo 'Cinema: Edinburgh Limelight  <br>
                    Date: <span class="day_booking"> '.$day.'  </span>
                    <br> 
                    Time: <span class="time_booking"> '.$time.' </span>
                    <br> 
                    Ticket quantity: <span class="ticket_quantity_booking"> '.$ticket_quantity.'  </span>
                    <br> 
                    Ticket price: <span class="ticket_price_booking"> '.$Ticket_price_unit.'</span>
                    <br> 
                    Total price: <span class="total_price_booking">'.$total_price_number.'</span>
                    <br> 
                    Seat Number:  <span class="seat_number_booking"> </span>';
                }
            
                
            ?>


                </p>
            </div>
           
          


        </div>

        <div class="choose-seats-container">
            <h3>Choose Seats</h3>
            <div class="seats-container-box">
            <div class="seats-grid">
                
            <script> renderSeats() </script>
            </div>
            
        </div>

       


    </div>
    <button class="button-custom confirm-booking-ticket">Confirm</button>
 
    
    <?php include("includes/footer.php")?>
    <script src="js/pages/movie_booking/movie_booking.js"></script>
   
  </body>
</html>