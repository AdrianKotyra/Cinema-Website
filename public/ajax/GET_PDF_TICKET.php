<?php session_start();
include '../php/init.php'; 
include '../php/composer/vendor/autoload.php'; 

use Mpdf\Mpdf;

if (isset($_POST["data"])) {
    global $connnection;
    global $database;
    $booking_id = $_POST["data"];
    $query = $database->query_array("SELECT * FROM bookings WHERE id = $booking_id");

    while ($row = mysqli_fetch_array($query)) {
        $date_booking = $row["date_booking"];
        $time_show = $row["time_show"];
        $ticket_quantity = $row["ticket_quantity"];
        $ticket_id = $row["ticket_id"];
        $seat_number = $row["seat_number"];
        $total_payment = $row["total_payment"];
        $ticket_price = $row["ticket_price"];
        $serial_number = $row["serial_number"];
        $user_id = $row["user_id"];

        $query_select_user = $database-> query_array("SELECT * FROM users where user_id = $user_id "); 
        while($row = mysqli_fetch_array($query_select_user)) {
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
        }
        $query2 = $database->query_array("SELECT * FROM tickets WHERE ticket_id = $ticket_id");

        while ($row2 = mysqli_fetch_array($query2)) {
            $ticket_movie_id = $row2["ticket_movie_id"];
            $query3 = $database->query_array("SELECT * FROM movies WHERE id = $ticket_movie_id");

            while ($row3 = mysqli_fetch_array($query3)) {
                $movie_id = $row3["id"];
                $movie_img = $row3["poster"];
                $movie_title = $row3["title"];
            }
        }

        $ticket_html = '
        <div class="ticket-small settings_user_card">
            <div class="settings_card_options options-tickets-container">
                <p class="option_card_settings delete_settings_button" data-ticket-id="'.$ticket_id.'"> Cancel </p>
                <p class="option_card_settings download_settings_button" data-ticket-id="'.$ticket_id.'"> Download </p>
            </div>
            <div class="title">
                <p class="cinema">Limelight Cinema</p>
                <p class="movie-title">'. $movie_title .'</p>
            </div>
            <div class="poster">
                <img src="'.$movie_img.'" alt="Movie Poster" />
            </div>
            <div class="info">
                <table>
                    <tr><th>NAME</th><th>SURNAME</th></tr>
                    <tr><td class="ticket_data">'.$user_firstname.'</td><td class="ticket_data">'. $user_lastname.'</td></tr>
                </table>
                <table>
                    <tr><th>DATE</th><th>TIME</th></tr>
                    <tr><td class="ticket_data">'.$date_booking.'</td><td class="ticket_data">'. $time_show.'</td></tr>
                </table>
                <table>
                    <tr><th>PRICE</th><th>QUANTITY</th></tr>
                    <tr><td class="ticket_data">'.$ticket_price.'£</td><td class="ticket_data">'. $ticket_quantity.'</td></tr>
                </table>
                <table>
                    <tr><th>SEAT</th><th>TOTAL</th></tr>
                    <tr><td class="ticket_data">'.$seat_number.'</td><td class="ticket_data">'. $total_payment.'£</td></tr>
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

        // Create the PDF using mPDF
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($ticket_html);

        // Output the PDF as a download
        $mpdf->Output('ticket_'.$serial_number.'.pdf', 'D'); // 'D' forces the download
        exit();
    }
}
