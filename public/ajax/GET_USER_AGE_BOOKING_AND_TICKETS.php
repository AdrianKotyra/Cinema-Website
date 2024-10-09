<?php session_start();
include("../php/init.php"); 

global $user;
global $session;

$movie_id = $_POST["data"];
$query = "SELECT * from tickets where ticket_movie_id = $movie_id";
$select_movie_query = mysqli_query($connection, $query);
$number_rows = mysqli_num_rows($select_movie_query);
while($row = mysqli_fetch_assoc($select_movie_query)) {
    $ticket_quantity = $row["ticket_quantity"];
   

}
if($session->signed_in && $user->user_age<17) {
    echo  "false";
}
elseif($session->signed_in==true && $number_rows>=1 && $ticket_quantity==0) {
    echo "no_tickets";
}
elseif($session->signed_in==true && $number_rows==0 ) {
    echo "no_tickets";
}
elseif($session->signed_in==false ) {
    echo "no_logged";
}
elseif($session->signed_in && $user->user_age>=17) {
    echo  "true";
}




?>