<?php 
session_start();
include("../php/init.php");
require '../php/composer/vendor/autoload.php'; // Include the autoload file

use Mpdf\Mpdf;

// Assuming $database and $connection are already initialized in your project.
global $connection;
global $database;

$booking_id = $_POST["data"];
$query = $database->query_array("SELECT * FROM bookings WHERE id = $booking_id");

while ($row = mysqli_fetch_array($query)) {
    $date_booking = $row["date_booking"];

    $date_booking_trimmed = substr(  $date_booking, 0 ,10);
    $time_show = $row["time_show"];
    $ticket_quantity = $row["ticket_quantity"];
    $ticket_id = $row["ticket_id"];
    $seat_number = $row["seat_number"];
    $total_payment = $row["total_payment"];
    $ticket_price = $row["ticket_price"];
    $serial_number = $row["serial_number"];
    $user_id = $row["user_id"];

    $query_select_user = $database->query_array("SELECT * FROM users WHERE user_id = $user_id");
    while ($row = mysqli_fetch_array($query_select_user)) {
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
    }

    $query2 = $database->query_array("SELECT * FROM tickets WHERE ticket_id = $ticket_id");
    while ($row2 = mysqli_fetch_array($query2)) {
        $ticket_movie_id = $row2["ticket_movie_id"];
        $query3 = $database->query_array("SELECT * FROM movies WHERE id = $ticket_movie_id");
        while ($row3 = mysqli_fetch_array($query3)) {
            $movie_id = $row3["id"];
            $movie_poster= $row3["poster"];
            // LOCAL SOURCE
            //  $movie_img = 'http://localhost/Cinema Website/public/' . $movie_poster;
            $movie_img = 'https://adriankotyraprojects.co.uk/websites/Cinema%20Website/public/'.$movie_poster;
            $movie_title = $row3["title"];
        }
    }

    // Ticket HTML content
    $ticket_html = '
  <style>
    body {
    text-align: center;
    }
    .serial-number{
    letter-spacing: 12px; 
    }
 
    .ticket-small {
        overflow: hidden;
        background-color: #222224;
        border-radius: 8px;
        position: relative;
        padding: 10px; 
        color: white; 
    }

    .title {
        text-align: center; 
        margin: 10px 0; 
    }

    .title h2,
    .title h3 {
        margin: 0; 
    }

    .numbers span {
        letter-spacing: 12px;
        display: block;
        text-align: center;
    }

    .holes-lower {
        margin: 25px;
        border: 1px dashed #aaa;
    }

    .ticket-small .info {
        padding: 10px; 
    }

    .ticket-small .cinema {
        color: #31d92b;
        font-size: 1rem;
    }

    .ticket-small table {
        width: 100%;
        font-size: 1rem;
        margin-bottom: 15px;
        border-collapse: collapse;
    }

    .ticket-small table th,
    .ticket-small table td {
        border: 1px solid #ccc; 
        padding: 5px; 
        text-align: center; 
        width: 50%; 
        color: white; 
    }

    .ticket-small .serial {
        text-align: center;
        letter-spacing: 0.7rem;
        margin-top: 10px; 
    }
 
    .ticket-small .poster img {
            display: table;
            margin: auto;
            object-fit: cover;
          
            height: 300px; 
           
        }
</style>



    <div class="ticket-small">
        <div class="title">
            <h2>Limelight Cinema</h2>
            <h3>Movie: ' . htmlspecialchars($movie_title) . '</h3>
        </div>
        <div class="poster">
            <img style="text-align: center; width: 600px; max-height: 200px; display: table; margin: auto" src="' . htmlspecialchars($movie_img) . '" alt="Movie Poster">
        </div>
        <div class="info">
            <table>
                <tr><th>First Name</th><th>Last Name</th></tr>
                <tr><td>' . htmlspecialchars($user_firstname) . '</td><td>' . htmlspecialchars($user_lastname) . '</td></tr>
            </table>
            <table>
                <tr><th>Date</th><th>Time</th></tr>
                <tr><td>' . htmlspecialchars($date_booking_trimmed) . '</td><td>' . htmlspecialchars($time_show) . '</td></tr>
            </table>
            <table>
                <tr><th>Price</th><th>Quantity</th></tr>
                <tr><td>' . htmlspecialchars($ticket_price) . '£</td><td>' . htmlspecialchars($ticket_quantity) . '</td></tr>
            </table>
            <table>
                <tr><th>Seat</th><th>Total</th></tr>
                <tr><td>' . htmlspecialchars($seat_number) . '</td><td>' . htmlspecialchars($total_payment) . '£</td></tr>
            </table>
            <table class="serial-table">
                <tr><th>Serial Number</th></tr>
                <tr><td class="serial-number">' . htmlspecialchars($serial_number) . '</td></tr>
            </table>
        </div>
    </div>';

    // Create the PDF using mPDF
    $mpdf = new Mpdf();
    $mpdf->WriteHTML($ticket_html);

    // Output the PDF as a download
    $mpdf->Output('ticket_' . $serial_number . '.pdf', 'D'); // 'D' forces the download
    exit();
}
?>
