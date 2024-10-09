

<!-- UPDATE FROM FORM TO MYSQL -->
<?php  
    if(isset($_POST["submit-reply"])) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $to      = $user_email;  // The email address of the recipient
        $subject = 'Limelight Cinema RE:';   // The subject of the email
    
    
     
        mail($to, $subject, $message, $headers);
        alert_text("Message has been sent", "admin_messages.php");
    }
   
?>

<?php


    if(isset($_GET["msg_id"])) {
        global $connection;
        $msg_id = $_GET["msg_id"];
 

        global $connection;
        $query = "SELECT * from messages_to_admin where id = $msg_id";
        $select_messages_query = mysqli_query($connection, $query);

        

        while($row = mysqli_fetch_assoc($select_messages_query)) {
            $id  = $row["id"];
            $message = $row["message"];
            $msg_date = $row["msg_date"];
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
            $user_email = $row["user_email"];
    

        



        }
    }


?>




    <h3> <b>Message: </b><?php echo $message;?></h3>
    <h3> <b>User name:</b> <?php echo $user_firstname;?></h3>
    <h3> <b>User lastname:</b> <?php echo $user_lastname;?></h3>
    <h3> <b>User Email:</b> <?php echo $user_email;?></h3>
    <h3> <b>Date:</b> <?php echo $msg_date;?></h3>
    <form autocomplete="off" class="contact-form-main" method="post">
      
    

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Reply message</label>
            <textarea class="form-control" rows="3"></textarea>
        </div>
        <input value="Send" class="btn btn btn-primary" type="submit" name="submit-reply" />
    </form>
         

