

<!-- UPDATE FROM FORM TO MYSQL -->
<?php
  
    if(isset($_GET["movie_id"])) {
        global $connection;
        $movie_id= $_GET["movie_id"];
    

        $query2 = "SELECT * from movies where id = $movie_id";
        $select_user_query = mysqli_query($connection, $query2);
        while($row = mysqli_fetch_assoc($select_user_query)) {
            $movie_title = $row["title"];
            $movie_img = $row["poster"];
        
        }
        


    }


    
?>
<?php

    function form($movie_title, $movie_img){
        echo '
        <form action="" method="post" enctype="multipart/form-data">
    
        <h3> <b>Movie:'.$movie_title.'</b></h3>
        <img class="edit_tickets_img"src="../public/'.$movie_img.'">
    
        <div class="form-group">
            <label for="post_title">Ticket Price</label>
            <input required type="number" class="form-control" name="ticket_price">
        </div>
    
    
        <div class="form-group">
            <label for="post_date">Ticket Quantity</label>
            <input required type="number" class="form-control" name="ticket_quantity">
        </div>
    
        
    
       
        
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="edit_ticket" value="Assign Movie">
        </div>
    
    </form>';
    }

    if(isset($_POST["edit_ticket"]) && $_GET["movie_id"]) {
        $movie_id= $_GET["movie_id"];

        $ticket_price    = $_POST['ticket_price'];
        $ticket_quantity   = $_POST['ticket_quantity'];
     
        if($ticket_price == 0  || $ticket_quantity== 0 ) {
            
            echo '<div class="alert alert-warning text-center alert_header row-custom" role="alert">
            Use different values than 0
            </div>';
            form($movie_title, $movie_img);
        }
        else {
            $query_update = "INSERT INTO `tickets` (`ticket_movie_id`, `ticket_price`, `ticket_quantity`) ";
            $query_update .= "VALUES ('{$movie_id}', '{$ticket_price}', '{$ticket_quantity}')";
    
            $update_ticket= mysqli_query($connection,$query_update);
        
    
            alert_text("Movies ticket has been assigned", "tickets.php");
    
        }
      


    }
    else {
        form($movie_title, $movie_img);
    }



?>
<!--  -->


