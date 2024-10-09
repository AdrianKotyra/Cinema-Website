
<?php include "../php/init.php"?>

<?php 
global $connection;
$search = $_POST["data"];

if(!empty($search)) {
    $message = "Results not found";
    $query = "SELECT * FROM posts where post_header LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);
    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }
    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $post = $row["post_header"];
            $post_id = $row["post_id"];
            $post_img = $row["post_img"];
        ?>
        <?php

            echo '
            <a href=post.php?post='.$post_id.'>
                <li class="post-searched row-custom">
                    <img class="search-movie-img"src="./'. $post_img.' ">
                    <p class="post-searched-title">'.$post.'</p>
             
                </li>
            </a>';
        ?>
      


    <?php }
    } else {
        echo $message;
    }



}




?>