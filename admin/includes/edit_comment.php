<?php
    global $connection;
    if(isset($_GET["comment_id"])) {
        $comment_id_to_be_edited = $_GET["comment_id"];
        $query = "SELECT * from comments where comment_id={$comment_id_to_be_edited}";
        $select_users_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_users_query)) {


            $comment_id = $row["comment_id"];
            $comment_post_id = $row["comment_post_id"];
            $comment_user_id = $row["comment_user_id"];
            $comment_text = $row["comment_text"];
            $comment_date = $row["comment_date"];


        }


    }




?>

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["comment_id"])) {
        global $connection;
        $comment_id_to_be_edited = $_GET["comment_id"];
    }
    if(isset($_POST["update_comment"])) {


        $comment_text_input    = $_POST['comment_text'];
   
    


        $query_update = "UPDATE comments SET ";
        $query_update .="comment_text  = '{$comment_text_input}' ";
       
        $query_update .= "WHERE comment_id = {$comment_id_to_be_edited} ";

        $update_user= mysqli_query($connection,$query_update);
    


        alert_text("Comment has been updated", "comments.php");









    }









?>
<!--  -->


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea name="comment_text" class="form-control" id="exampleFormControlTextarea1" class="text_area_admin"rows="3"><?php echo "$comment_text"?>
        </textarea>
    </div>





   
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_comment" value="Update Comment">
    </div>

</form>