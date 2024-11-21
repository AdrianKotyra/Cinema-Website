

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["staff_id"])) {
        global $connection;
        $user_id_to_be_edited = $_GET["staff_id"];
    }
    if(isset($_POST["edit_staff"])) {

        $staff_firstname= trim($_POST["staff_firstname"]);
        $staff_lastname= trim($_POST["staff_lastname"]);
        $staff_vocation= trim($_POST["staff_vocation"]) ;
        $staff_description= trim($_POST["staff_description"]) ;
   
        $post_image        = $_FILES['image']['name'];
        $post_image_temp   = $_FILES['image']['tmp_name'];
        $destination_img_upload = "../public/imgs/staff_images/$post_image";


        if(empty($post_image)) {

            $query = "SELECT * FROM staff WHERE id = $user_id_to_be_edited ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)) {

            $post_image = $row['staff_image'];

            }
        }

        $query_update = "UPDATE staff SET ";
        $query_update .= "staff_firstname = '{$staff_firstname}', ";
        $query_update .= "staff_lastname = '{$staff_lastname}', ";
        $query_update .= "staff_vocation = '{$staff_vocation}', ";
        $query_update .= "staff_description = '{$staff_description}', ";
        $query_update .= "staff_image = '{$post_image}' ";
        $query_update .= "WHERE id = {$user_id_to_be_edited}";
        
        

        $update_user= mysqli_query($connection,$query_update);
    
        move_uploaded_file($post_image_temp, $destination_img_upload);

        alert_text("Staff have been updated", "staff.php");




    }


?>
<!--  -->

<?php
  
    if(isset($_GET["staff_id"])) {
        global $connection;
        $staff_id_to_be_edited = $_GET["staff_id"];
        $query = "SELECT * from staff where id = $staff_id_to_be_edited";
        $select_genres_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_genres_query)) {
            $staff_id = $row["id"];
            $staff_lastname = $row["staff_lastname"];
            $staff_firstname = $row["staff_firstname"];
            $staff_description = $row["staff_description"];
            $staff_vocation = $row["staff_vocation"];
            $staff_image = $row["staff_image"];
    }}

?>
<form action="" method="post" enctype="multipart/form-data">


   
   
    <div class="form-group">
        <label for="user_firstname">Staff Firstname</label>
        <input required type="text" class="form-control" name="staff_firstname" value="<?php echo $staff_firstname?>">
    </div>


    <div class="form-group">
        <label for="user_lastname">Staff Lastname</label>
        <input required type="text" class="form-control" name="staff_lastname" value="<?php echo $staff_lastname?>">
    </div>

    
    <div class="form-group">
        <label for="staff_vocation">Staff Vocation</label>
        <input required type="text" class="form-control" name="staff_vocation" value="<?php echo $staff_vocation?>">
    </div>
    <div class="form-group">
        <label for="staff_description">Staff Description</label>
        <input required type="text" class="form-control" name="staff_description" value="<?php echo $staff_description?>">
    </div>
   
    <div class="form-group">

    <img width=200 src="../img/<?php echo"../public/imgs/staff_images/$staff_image" ?>" alt="">
    </div>

    <div class="form-group">
        <label for="image">Staff Image</label>
        <input type="file"  name="image">
    </div>

    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_staff" value="Edit staff">
    </div>

</form>