
<?php include "../php/init.php"?>

<?php 

if (isset($_POST["data"])) {
  
    $movie_id = $_POST["data"];
    $query = query("SELECT * from movies where id = $movie_id");
    while ($row = mysqli_fetch_array($query)) {
        $movie_title = $row["title"];
        $movie_desc  = $row["description"];
        $data = [$movie_title, $movie_desc];

       
        echo json_encode($data);
    }
   
}



?>