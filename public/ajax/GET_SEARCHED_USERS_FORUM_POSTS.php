
<?php include "../php/init.php"?>

<?php 
global $connection;
$search = $_POST["data"];

if(!empty($search)) {
    $message = "Results not found";
    $query = "SELECT * FROM forum_posts where post_title LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);
    $search_count = mysqli_num_rows($search_query);
    if(!$search_query) {
        die("Query Failed" . mysqli_error($connection));
    }
    if($search_count>=1) {
        while($row = mysqli_fetch_array($search_query)) {
            $post_title = $row["post_title"];
            $post_id = $row["id"];
            $post_img = $row["post_img"];
        ?>
        <?php

            echo '
            <a href=forum_post.php?id='.$post_id.'>
                <li class="post-searched row-custom">
                    <img class="search-movie-img"src="./'. $post_img.' ">
                    <p class="post-searched-title">'.$post_title.'</p>
             
                </li>
            </a>';
        ?>
      


    <?php }
    } else {
        echo $message;
    }



}




?>