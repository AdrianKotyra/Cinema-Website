
<?php include "../php/init.php"?>

<?php
    global $connection;
    if (isset($_POST["data"])) {

        $movie_id = $_POST["data"];
        $query = "SELECT * from movies where id = $movie_id";
        $search_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($search_query)) {
            $movie_title = $row["title"];
            $movie_desc  = $row["description"];




        }

        $query2 = "SELECT * from movies_views where movie_id = $movie_id";
        $search_views = mysqli_query($connection, $query2);
        while ($row = mysqli_fetch_array($search_views)) {
            $movie_views= $row["views"];

        }

        $data[] = [$movie_title, $movie_desc,  $movie_views, $movie_id ];


    echo json_encode($data);
}

?>