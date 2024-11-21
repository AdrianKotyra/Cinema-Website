

<!-- UPDATE FROM FORM TO MYSQL -->

<?php


    if(isset($_GET["post_id"])) {
        global $connection;
        $post_id_to_be_edited = $_GET["post_id"];
    }
    if(isset($_POST["edit_post"])) {


        $post_title    = $_POST['post_title'];
        $post_text   = $_POST['post_text'];
        $post_date        = $_POST['post_date'];
        $post_img        = 'imgs/forum_posts/'.$_FILES['image']['name'];
        $post_image_temp   = $_FILES['image']['tmp_name'];
    

        

        if($post_img==="imgs/forum_posts/") {

            $query = "SELECT * FROM forum_posts WHERE id = $post_id_to_be_edited ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)) {

            $post_img = $row['post_img'];

            }
        }

        $query_update = "UPDATE forum_posts SET ";
        $query_update .="post_title  = '{$post_title}', ";
        $query_update .="post_text = '{$post_text}', ";
        $query_update .="post_date   = '{$post_date}', ";
        $query_update .="post_img = '{$post_img}'";
        $query_update .= "WHERE id = {$post_id_to_be_edited} ";

        $update_user= mysqli_query($connection,$query_update);
    
        move_uploaded_file($post_image_temp, "../public/$post_img" );

        alert_text("Post has been edited", "forum.php");









    }



?>
<!--  -->
<?php
  
    if(isset($_GET["post_id"])) {
        global $connection;
        $post_id_to_be_edited = $_GET["post_id"];
        $query = "SELECT * from forum_posts where id={$post_id_to_be_edited}";
        $select_users_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_users_query)) {

            $post_title_db    = $row['post_title'];
            $post_text_db   = $row['post_text'];
            $post_date_db        = $row['post_date'];
            $post_img_db        = $row['post_img'];
     

        }


    }




?>

<form action="" method="post" enctype="multipart/form-data">




<div class="form-group">
        <label for="post_title">Post title</label>
        <input type="text" class="form-control" name="post_title" value=<?php echo "$post_title_db"?>>
    </div>


    <div class="form-group">
        <label for="post_date">Post date</label>
        <input type="date" class="form-control" name="post_date" value=<?php echo "$post_date_db"?>>
    </div>

    <div class="form-group">
        <label for="post_text">Post Text</label>
        <input type="text" class="form-control" name="post_text" value=<?php echo "$post_text_db"?>>
    </div>
    
 

    <div class="form-group">

        <img width=200 src="../img/<?php echo"../public/$post_img_db" ?>" alt="">
    </div>

    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file"  name="image">
    </div>


   
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_post" value="Update Post">
    </div>

</form>