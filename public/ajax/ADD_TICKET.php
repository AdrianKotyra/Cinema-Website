<?php session_start();
include "../php/init.php";


    global $connection;
    global $session;
    global $user;
 

    if( $session->signed_in==true) {
        $currentDateTime = date("Y-m-d H:i:s");
        $ticket_id = $_POST["ticket_id"];
        $random_number = intval($_POST["random_number"]);
    
        $user_id = $user->user_id;
        $day = $_POST["day"];
        $time = $_POST["time"];
        $ticket_quantity = $_POST["ticket_quantity"];
        $ticket_price_unit = $_POST["Ticket_price_unit"];
        $total_price_number = $_POST["total_price_number"];
      
        $seat_number_array = explode(",", $_POST["seat_number"]); 
        foreach ($seat_number_array as $seat_number ) {
            $query = "INSERT INTO bookings(date_booking, time_show, ticket_quantity, ticket_id, seat_number, total_payment, ticket_price, user_id, serial_number) ";
    
            $query .= "VALUES('{$currentDateTime}','{$time}', '1' ,'{$ticket_id}','{$seat_number}','{$total_price_number}', '{$ticket_price_unit}', '{$user_id}', '{$random_number}' ) ";
            
            $create_ticket = mysqli_query($connection, $query);
        }
 
      

        // INSERT BOOKING NOTIFICATION
        $query2 = "INSERT INTO notifications_bookings(user_notification_id, ticket_id) ";
        $query2 .="VALUES('{$user_id}','{$ticket_id}' ) ";
        $create_nots_bookings = mysqli_query($connection, $query2);

        // GET MOVIE ID FROM BOUGHT TICKET TO USE IT AFTER BOOKING TO BACK TO PAGE MOVIE
        $query_Select_movie = "SELECT ticket_movie_id FROM tickets WHERE ticket_id =  $ticket_id";
        $select_movie = mysqli_query($connection, $query_Select_movie);

        // update tickets quantity from tickets movie data
        $query_update_ticket = "UPDATE tickets SET ticket_quantity = ticket_quantity - $ticket_quantity WHERE ticket_id = $ticket_id";
        $update_ticket = mysqli_query($connection, $query_update_ticket);

        while ($row = mysqli_fetch_array($select_movie)) {
            $movie_id = $row["ticket_movie_id"];
            $response_array = ["success", $movie_id];
            echo json_encode($response_array);
       
        }
   
    
   
    }


?>