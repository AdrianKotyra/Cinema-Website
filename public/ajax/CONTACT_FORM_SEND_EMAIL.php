<?php include "../php/init.php"?>
<?php include "../emails/confirmation_message.php"?>
<?php 
global $connection;

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $text = trim($_POST['text']);
    $email = trim($_POST['email']);


    $errors = [];
    $min = 3;
    $max = 26;
    $max_message = 106;
  
 
    if(strlen($firstname)<=$min) {

        $errors[] = "Your username is too short, should be longer than $min characters";
    }
    if(strlen($firstname)>=$max) {

        $errors[] = "Your username is too long, should be shorter than $max characters";
    }
    
    if(strlen($lastname)<=$min) {
  
        $errors[] = "Your lastname is too short, should be longer than $min characters";
    }
    if(strlen($lastname)>=$max) {

        $errors[] = "Your lastname is too long, should be shorter than $max characters";
    }
    if(strlen($email)>=$max) {

        $errors[] = "Your email is too long, should be shorter than $max characters";
    }
    
    if(strlen($email)<=$min) {
  
        $errors[] = "Your email is too short, should be longer than $min characters";
    }
    if(strlen($text)>=$max_message) {

        $errors[] = "Your message is too long, should be shorter than $max_message characters";
    }
    
    if(strlen($text)<=$min) {
  
        $errors[] = "Your message is too short, should be longer than $min characters";
    }
  
    if(!empty($errors)) {
        foreach ($errors as $error) {
            echo "
           
            <div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>
                $error
            </div>
            <br>";
        }
    } 

    if(empty($errors)) {
        $email_template = email_confirmation();


        // SEND CONFIRMATION EMAIL TO SENDER
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $to      = $email;  // The email address of the recipient
        $subject = 'Limelight Cinema';   // The subject of the email
        $message = $email_template;  // The content of the email
    
        //    send confirmation msg to sender
        if(mail($to, $subject, $message, $headers)) {

            //    send msg to reciever

            $to      = 'adriankotyra@yahoo.com';  // The email address of the recipient
            $subject = 'Limelight Cinema';   // The subject of the email
      
            $msg = "Hello,\n\n";
            $msg .= "You have received a new message from your website contact form.\n\n";
            $msg .= "Name: $firstname $lastname\n";
            $msg .= "Email: $email\n";
            $msg .= "Message:\n$text\n";
            mail($to, $subject, $msg, $headers);
            

            // send query to add msg 
           
        

            $currentDateTime = date("Y-m-d H:i:s");

            $query2 = "INSERT INTO messages_to_admin(message, msg_date,  user_firstname, user_lastname, user_email) ";
            $query2 .= "VALUES('{$text}','{$currentDateTime}','{$firstname}','{$lastname}','{$email}') ";
            $create_msg_query = mysqli_query($connection, $query2);
            // Get the auto-incremented ID of the last inserted record

          
            
            
            $last_id = mysqli_insert_id($connection);
              
            

            // increment admin notifications
      
            $query3 = "INSERT INTO message_admin_notification(message_id) ";
            $query3 .= "VALUES('{$last_id}') ";
            $create_not_admin = mysqli_query($connection, $query3);
            echo  'success';

          
        

            
   



        } else {
            echo 'Failed to send email.';
        }

    
            
    
    }
    
// }   




?>