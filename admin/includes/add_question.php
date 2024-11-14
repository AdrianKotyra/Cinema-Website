<?php

if(isset($_POST['add_question'])) {
    alert_text("Quiz question has been added", "quiz.php");


    $question    = $_POST['question'];
    $choice_1 = $_POST['choice_1'];
    $choice_2 = $_POST['choice_2'];
    $choice_3 = $_POST['choice_3'];

    $list_of_choices = ['"' . $choice_1 . '"', '"' . $choice_2 . '"', '"' . $choice_3 . '"'];
    $list_of_choices2 = '[' . implode(', ', $list_of_choices) . ']';

    $correct_answer = $_POST['correct_answer'];
    $post_img        = '../public/imgs/quiz/'.$_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];

    //    if no uploaded image give it default image
    if($post_img ===""){

        $post_img="imgs/quiz/default_image.jpg";


    }



    move_uploaded_file($post_image_temp, "$post_img" );


    $query = "INSERT INTO quiz(correct_answer, img_src, question, choices) ";

    $query .= "VALUES('{$correct_answer}', '{$post_img}','{$question}', '{$list_of_choices2}') ";



    $create_quiz_query = mysqli_query($connection, $query);



}



?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="question">question</label>
        <input required type="text" class="form-control" name="question">
    </div>


    <div class="form-group">
    <label for="correct_answer">correct answer</label>
        <select required name="correct_answer">
            <option value="0">0</option>
            <option value="0">1</option>
            <option value="0">2</option>



        </select>
    </div>



    <div class="form-group">
        <label for="image">Question Image</label>
        <input required type="file"  name="image">
    </div>
    <div class="form-group">
        <label for="choice_1">choice 1</label>
        <input required type="text" class="form-control" name="choice_1">
        <label for="choice_2">choice 2</label>
        <input required type="text" class="form-control" name="choice_2">
        <label for="choice_3">choice 3</label>
        <input required type="text" class="form-control" name="choice_3">
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_question" value="Add Question">
    </div>

</form>