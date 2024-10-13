<?php session_start();
include "../php/init.php";


    global $connection;
    global $session;
    global $user;
 

    if( $session->signed_in==true) {
        $currentDateTime = date("Y-m-d H:i:s");
        $ticket_id = $_POST["ticket_id"];

        $user_id = $user->user_id;
        $day = $_POST["day"];
        $time = $_POST["time"];
        $ticket_quantity = $_POST["ticket_quantity"];
        $ticket_price_unit = $_POST["Ticket_price_unit"];
        $total_price_number = $_POST["total_price_number"];
        $seat_number = $_POST["seat_number"];

        $query = "INSERT INTO bookings(date_booking, time_show, ticket_quantity, ticket_id, seat_number, total_payment, ticket_price, user_id) ";
    
        $query .= "VALUES('{$currentDateTime}','{$time}','{$ticket_quantity}','{$ticket_id}','{$seat_number}','{$total_price_number}', '{$ticket_price_unit}', '{$user_id}' ) ";
        
        $create_ticket = mysqli_query($connection, $query);
        // GET MOVIE ID FROM BOUGHT TICKET TO USE IT AFTER BOOKING TO BACK TO PAGE MOVIE
        $query_Select_movie = "SELECT ticket_movie_id FROM tickets WHERE ticket_id =  $ticket_id";
        $select_movie = mysqli_query($connection, $query_Select_movie);
   
        while ($row = mysqli_fetch_array($select_movie)) {
            $movie_id = $row["ticket_movie_id"];
            $response_array = ["success", $movie_id];
            echo json_encode($response_array);
        }
   
    
   
    }


?>