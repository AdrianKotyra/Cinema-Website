

<!-- UPDATE FROM FORM TO MYSQL -->

<?php

    
    if(isset($_GET["faq_id"])) {
        global $connection;
        $faq_id_to_be_edited = $_GET["faq_id"];
    }
    if(isset($_POST["edit_faq"])) {


      
        $question   = $_POST['question'];
        $answer    = $_POST['answer'];
        

        $query_update = "UPDATE faq SET ";
        $query_update .="question  = '{$question}', ";
        $query_update .="answer = '{$answer}'";
        $query_update .= "WHERE id = {$faq_id_to_be_edited} ";

        $update_faq= mysqli_query($connection,$query_update);
    

        alert_text("FAQ has been updated", "faq.php");








    }









?>
<!--  -->
<?php
    global $connection;
    if(isset($_GET["faq_id"])) {
        $faq_id_to_be_edited = $_GET["faq_id"];
        $query = "SELECT * from faq where id={$faq_id_to_be_edited}";
        $select_faq_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($select_faq_query);


        $question_db = $row["question"];
        $answer_db = $row["answer"];
       

    


    }




?>

<form action="" method="post" enctype="multipart/form-data">






<div class="form-group">
        <label for="question">FAQ Question</label>
        <input type="text" class="form-control" name="question">
    </div>


    <div class="form-group">
        <label for="answer">FAQ Answer</label>
        <input type="text" class="form-control" name="answer">
    </div>


   
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_faq" value="edit faq">
    </div>

</form>