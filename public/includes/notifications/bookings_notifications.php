<?php include "./php/init.php";


    global $connection;
 
    $user_id = $user->user_id;
    $row_num =0;
 
    $query = "SELECT * FROM notifications_bookings where user_notification_id = $user_id ";
    $search_query = mysqli_query($connection, $query);
    $search_count = mysqli_num_rows($search_query);
 
    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $ticket_id = $row["ticket_id"];
         
          

            $query2 = "SELECT * FROM tickets where ticket_id = $ticket_id ";
            $search_query2 = mysqli_query($connection, $query2);
           
                while($row = mysqli_fetch_array($search_query2)) {
                $ticket_movie_id = $row["ticket_movie_id"];
                    
                $query3 = "SELECT * FROM movies where id = $ticket_movie_id ";

                $search_query3 = mysqli_query($connection, $query3);
                $search_count2 = mysqli_num_rows($search_query3);
                    
             
                while($row = mysqli_fetch_array($search_query3)) {
                    $row_num +=1;
                    $movie_title = $row["title"];
                    $movie_id = $row["id"];
                    $movie_img = $row["poster"];

                    echo '<span class="notification_card notification_card_bookings'.($row_num % 2 == 0 ? 'notification_card-even' : '').'">
                    <div class="movie_nots_container col-custom">
                        <span> You have bought ticket for </span>
                        <div class="row-custom movie_bookings_nots_container">
                         
                            <img class="nots_movie_img" src="./'.$movie_img.'">
                            '.$movie_title.' 
                        </div>
                    </div>
                </span>';
            

                }
      

             
            }  }      
        }                
                
            
           



            
?>

    