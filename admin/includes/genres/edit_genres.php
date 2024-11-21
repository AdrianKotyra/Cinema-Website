

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["genre_id"])) {
        global $connection;
        $genre_id_to_be_edited = $_GET["genre_id"];
    }
    if(isset($_POST["edit_genre"])) {


     


        $genre_name    = $_POST['genre_name'];
        $genre_desc  = $_POST['genre_desc'];
     
        $post_image        ='imgs/categories/'.$_FILES['image']['name'];
        $post_image_temp   = $_FILES['image']['tmp_name'];
    

        // IF IMAGE WASNT UPLOAD KEEP IT THE SAME

        if(($post_image==="imgs/categories/")) {

            $query = "SELECT * FROM genres WHERE id = $genre_id_to_be_edited ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)) {

            $post_image = $row['category_img'];

            }
        }

        $query_update = "UPDATE genres SET ";
        $query_update .= "name = '{$genre_name}', ";
        $query_update .= "`desc` = '{$genre_desc}', ";
        $query_update .= "category_img = '{$post_image}' ";
        $query_update .= "WHERE id = {$genre_id_to_be_edited}";
        
        $update_genre = mysqli_query($connection, $query_update);
        


  
    
    
       
        move_uploaded_file($post_image_temp, "../public/$post_image" );

        alert_text("Genre has been updated", "genres.php");









    }









?>
<!--  -->
<?php
    global $connection;
    if(isset($_GET["genre_id"])) {
        $genre_id_to_be_edited = $_GET["genre_id"];
        $query = "SELECT * from genres where id={$genre_id_to_be_edited}";
        $select_users_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($select_users_query);

        $genre_id = $row["id"];
        $genre_name = $row["name"];
        $genre_desc = $row["desc"];
        $category_img = $row["category_img"];



    }


?>

<form action="" method="post" enctype="multipart/form-data">




<div class="form-group">
        <label for="movie_title">Genre name</label>
        <input type="text" class="form-control" name="genre_name" value="<?php echo $genre_name?>">
    </div>


    <div class="form-group">
        <label for="release_date">Genre description</label>
        <input type="text" class="form-control" name="genre_desc" value="<?php echo $genre_desc?>">
    </div>

    
    <div class="form-group">

        <img width=200 src="../img/<?php echo"../public/$category_img" ?>" alt="">
    </div>

    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file"  name="image">
    </div>


   
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_genre" value="Update Genre">
    </div>

</form>