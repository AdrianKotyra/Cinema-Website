<?php session_start();
include("../php/init.php");

    global $database;
    global $connection;

    $query_quiz = $database-> query_array("SELECT question, choices, correct_answer, img_src FROM quiz ");
    $questions = [];

    while ($row = mysqli_fetch_array($query_quiz)) {
        $questions[] = [
            "question" => $row["question"],
            "choices" => json_decode($row["choices"]), // Decode JSON choices from the database
            "correct" => (int)$row["correct_answer"],
            "img_src" => $row["img_src"]
        ];
    }


echo json_encode($questions);
