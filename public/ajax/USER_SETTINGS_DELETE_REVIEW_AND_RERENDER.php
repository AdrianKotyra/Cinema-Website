
<?php include "../php/init.php"?>

<?php 
    global $connection;
    if (isset($_POST["data"])) {
       
        $review_id = $_POST["data"];
        $query = "DELETE from reviews where id = $review_id";
        $search_query = mysqli_query($connection, $query);
    //     while ($row = mysqli_fetch_array($search_query)) {
    //         $movie_title = $row["title"];
    //         $movie_desc  = $row["description"];
    //         $data[] = [$movie_title, $movie_desc];

        
         
    
    //     }

    // echo json_encode($data);
}

?>