

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["image_id"])) {
        global $connection;
        $image_id_to_be_edited = $_GET["image_id"];
    }
    if(isset($_POST["edit_img"])) {

        $image_title= trim($_POST["image_title"]);
      
        $post_image        = $_FILES['image']['name'];
        $post_image_temp   = $_FILES['image']['tmp_name'];
        $destination_img_upload = "../public/imgs/gallery_cinema/$post_image";


        if(empty($post_image)) {
            echo "<div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>
                    please upload image
                </div>";
           
        } else {
            $query_update = "UPDATE gallery SET ";
            $query_update .= "image_name = '{$post_image}', ";
            $query_update .= "image_title = '{$image_title}' ";
            $query_update .= "WHERE id = {$image_id_to_be_edited}";
            
            
    
            $update_user= mysqli_query($connection,$query_update);
        
            move_uploaded_file($post_image_temp, $destination_img_upload);
    
            alert_text("Image has been updated", "gallery.php");

        }

      




    }


?>
<!--  -->

<?php
  
    if(isset($_GET["image_id"])) {
        global $connection;
        $image_id_to_be_edited = $_GET["image_id"];
        $query = "SELECT * from gallery where id = $image_id_to_be_edited";
        $select_image_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_image_query)) {
            $image_id = $row["id"];
            $image_name = $row["image_name"];
            $image_title = $row["image_title"];
    }}

?>
<form action="" method="post" enctype="multipart/form-data">


   
   
    
    <div class="form-group">
        <label for="image_title">image title</label>
        <input required type="text" class="form-control" name="image_title" value="<?php echo $image_title;?>">
    </div>

    <div class="form-group">

        <img width=200 src="<?php echo"../public/imgs/gallery_cinema/$image_name" ?>" alt="">
    </div>


    <div class="form-group">
        <label for="image">Image</label>
        <input required type="file"  name="image">
    </div>

   
   
  
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_img" value="Edit image">
    </div>

</form>