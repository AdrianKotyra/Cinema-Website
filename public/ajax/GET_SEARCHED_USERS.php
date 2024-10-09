
<?php include "../php/init.php"?>

<?php 
global $connection;
$search = $_POST["data"];

if(!empty($search)) {
    $message = "Results not found";
    $query = "SELECT * FROM users where user_firstname or user_lastname  LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);
    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }
    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
            $user_img = $row["user_img"];
            $user_id = $row["user_id"];
            
        ?>
        <?php

            echo '
            <a href=user.php?id='.$user_id.'>
                <li class="movie-searched user_searched row-custom">
                    <img class="search-movie-img"src="./imgs/users_avatars/'. $user_img.' ">
                    <p class="movie-searched-title user_name_searched">'.$user_firstname.' '.$user_lastname. '</p>
             
                </li>
            </a>';
        ?>
      


    <?php }
    } else {
        echo $message;
    }



}




?>