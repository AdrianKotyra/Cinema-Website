

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["ticket_id"])) {
        global $connection;
        $ticket_id_to_be_edited = $_GET["ticket_id"];
    }
    if(isset($_POST["edit_ticket"])) {

        $ticket_price    = $_POST['ticket_price'];
        $ticket_quantity   = $_POST['ticket_quantity'];

        $query_update = "UPDATE tickets SET ";
        $query_update .="ticket_price  = '{$ticket_price}', ";
        $query_update .="ticket_quantity = '{$ticket_quantity}' ";
        $query_update .= "WHERE ticket_id = {$ticket_id_to_be_edited} ";

        $update_ticket= mysqli_query($connection,$query_update);
    

        alert_text("Ticket has been edited", "tickets.php");

        edit_ticket_times();

    }



?>
<!--  -->
<?php
  
    if(isset($_GET["ticket_id"])) {
        global $connection;

        $query = "SELECT * from tickets";
        $select_genres_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_genres_query)) {
            $ticket_id = $row["ticket_id"];
            $ticket_movie_id = $row["ticket_movie_id"];
            $ticket_price = $row["ticket_price"];
            $ticket_quantity = $row["ticket_quantity"];


            $query2 = "SELECT * from movies where id = $ticket_movie_id";
            $select_user_query = mysqli_query($connection, $query2);
            while($row = mysqli_fetch_assoc($select_user_query)) {
                $movie_title = $row["title"];
                $movie_img = $row["poster"];
            
            }
        }


    }




?>

<form action="" method="post" enctype="multipart/form-data">

    <h3> <b>Movie: <?php echo $movie_title;?></b></h3>
    <img class="edit_tickets_img"src=<?php echo '../public/'.$movie_img.'' ?> alt="">

    <div class="form-group">
        <label for="post_title">Ticket Price</label>
        <input type="number" class="form-control" name="ticket_price" value=<?php echo "$ticket_price"?>>
    </div>


    <div class="form-group">
        <label for="post_date">Ticket Quantity</label>
        <input type="number" class="form-control" name="ticket_quantity" value=<?php echo "$ticket_quantity"?>>
    </div>
    <h3> <b>Available times:</b></h3>
    <?php display_times_table_options()?>
    

   
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_ticket" value="Update Ticket">
    </div>

</form>