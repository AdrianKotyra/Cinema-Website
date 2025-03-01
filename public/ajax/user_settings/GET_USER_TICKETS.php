<?php session_start();
include("../../php/init.php");

$user_id_logged = $user->user_id;
if($user_id_logged) {
    global $connection;
    $query_select_user = $database-> query_array("SELECT * FROM users where user_id = $user_id_logged ");
    while($row = mysqli_fetch_array($query_select_user)) {
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
    }

    $query = $database-> query_array("SELECT * FROM bookings where user_id = $user_id_logged order by date_booking desc  ");

    echo  '   <h1 class="edit_post_header">Users Tickets</h1>
    <div class="user_settings_tickets_container">';
    while($row = mysqli_fetch_array($query)) {
        $booking_id = $row["id"];
        $date_booking = $row["date_booking"];
        $date_booking_trimmed = substr(  $date_booking, 0 ,10);
        $time_show = $row["time_show"];
        $ticket_quantity = $row["ticket_quantity"];
        $ticket_id = $row["ticket_id"];
        $seat_number = $row["seat_number"];
        $total_payment = $row["total_payment"];
        $ticket_price = $row["ticket_price"];
        $serial_number = $row["serial_number"];

        $query2 = $database-> query_array("SELECT * from tickets where ticket_id = $ticket_id");


        while ($row = mysqli_fetch_array($query2)) {
            $ticket_movie_id = $row["ticket_movie_id"];
            $query3 = $database-> query_array("SELECT * from movies where id = $ticket_movie_id");
            while ($row = mysqli_fetch_array($query3)) {
                $movie_id = $row["id"];
                $movie_img = $row["poster"];
                $movie_title = $row["title"];
                echo '
                <div class="ticket-small settings_user_card">
                    <div class="settings_card_options options-tickets-container">


                        <p class="option_card_settings download_settings_button" data-booking-id="'.$booking_id.'"> Download </p>
                    </div>
                    <div class="title">
                        <p class="cinema">Limelight Cinema</p>
                        <p class="movie-title">'.  $movie_title.'</p>
                    </div>
                    <div class="poster">
                        <img src="'.$movie_img.'" alt="Movie: Only God Forgives" />
                    </div>
                    <div class="info">

                    <table>
                        <tr>

                            <th>NAME</th>
                            <th>SURNAME</th>
                        </tr>
                        <tr>

                            <td class="ticket_data">'.$user_firstname .'</td>
                            <td class="ticket_data">'. $user_lastname .'</td>
                        </tr>
                    </table>

                    <table>
                        <tr>

                            <th>DATE</th>
                            <th>TIME</th>
                        </tr>
                        <tr>

                            <td class="ticket_data">'.$date_booking_trimmed.'</td>
                            <td class="ticket_data">'. $time_show.'</td>
                        </tr>
                    </table>
                    <table>
                        <tr>

                            <th>PRICE</th>
                            <th>QUANTITY</th>
                        </tr>
                        <tr>

                            <td class="ticket_data">'.$ticket_price.'£</td>
                            <td class="ticket_data">'. $ticket_quantity.'</td>
                        </tr>
                    </table>
                    <table>
                        <tr>

                            <th>SEAT</th>
                            <th>TOTAL</th>
                        </tr>
                        <tr>

                            <td class="ticket_data">'.$seat_number.'</td>
                            <td class="ticket_data">'. $ticket_price.'£</td>
                        </tr>
                    </table>

                    </div>

                    <div class="serial">
                        <table class="barcode"><tr></tr></table>
                        <div class="numbers">

                            <span>'.$serial_number.'</span>

                        </div>
                    </div>
                </div>
                ';

            }
        }





}
echo ' </div>';

}