<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>
<?php movie_booking_redirect() ?>
    <script src="js/pages/movie_booking/render_seats.js"></script>
    <?php
    if(isset($_POST["submit_booking"])) {
        global $connection;
        $movie_id_booking = $_GET["movie"];
        $query = "select ticket_id from tickets where ticket_movie_id = $movie_id_booking";
        $select_ticket_id_query = mysqli_query($connection, $query );

        while($row = mysqli_fetch_array($select_ticket_id_query)) {
            $ticket_id = $row["ticket_id"];

        }
        $random_number = intval($_POST["random_number"]);
        $day = $_POST["day"];
        $time = $_POST["time"];
        $ticket_quantity = $_POST["ticket_quantity"];
        $Ticket_price_unit = $_POST["Ticket_price_unit"];
        $total_price_number = $_POST["total_price_number"];
        $ticket = 0;}
    ?>
    <div class="movie-booking-section">

        <div class="movie-booking-banner">

            <img src="<?php get_selected_movie_img()?>" alt="">
        </div>

        <div class="booking-info">
            <div class="row-custom info-booking">
                <div class="col-custom">
                    <p class="booking_title_movie">
                        <?php get_selected_movie_name()?> <br>

                    </p>
                    <div class="img_movie_checkout_container">
                        <img src="<?php get_selected_movie_img()?>" alt="">
                    </div>

                </div>


                <p class="booking_date_movie">

                <?php

                    echo 'Cinema: Edinburgh Limelight <br>
                        Date: <span class="day_booking"> '.$day.' </span><br>
                        Time: <span class="time_booking"> '.$time.' </span><br>
                        Quantity: <span class="ticket_quantity_booking">'.$ticket_quantity.'</span><br>
                        Ticket price: <span class="ticket_price_booking"> '.$Ticket_price_unit.'</span><br>
                        Total price: <span class="total_price_booking">'.$total_price_number.'</span><br>';


                        for ($i = 1; $i <= $ticket_quantity; $i++) {
                            echo 'Seat Number ' . $i . ': <span class="seat_number_booking seat_number_booking'.$i.'"> </span><br>';
                        }

                    echo '
                        <span class="ran_number hidden-form-review-input"> '.$random_number.' </span><br>
                        <span class="ticket_id hidden-form-review-input"> '.$ticket_id.' </span><br>';





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