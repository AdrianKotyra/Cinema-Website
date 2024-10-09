
<?php

if(isset($_POST['create_faq'])) {
    alert_text("faq has been added", "faq.php");



    $question   = $_POST['question'];
    $answer    = $_POST['answer'];
 
    $query = "INSERT INTO faq(question, answer) VALUES('{$question}', '{$answer}')";

    $create_faq_query = mysqli_query($connection, $query);



}



?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="question">FAQ Question</label>
        <input required type="text" class="form-control" name="question">
    </div>


    <div class="form-group">
        <label for="answer">FAQ Answer</label>
        <input required type="text" class="form-control" name="answer">
    </div>


   
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_faq" value="Add faq">
    </div>

</form>