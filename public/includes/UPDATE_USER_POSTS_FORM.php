
<?php 
   
    if(isset($_POST["edit_post"])) {
        $post_id    = $_POST['post_id'];
        $post_title    = $_POST['post_title'];
        $post_text   = $_POST['post_text'];
    
        $post_img        = 'imgs/forum_posts/'.$_FILES['image']['name'];
        $post_image_temp   = $_FILES['image']['tmp_name'];
    
        if($post_img==="imgs/forum_posts/") {

            $query = "SELECT * FROM forum_posts WHERE id = $post_id ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)) {

            $post_img = $row['post_img'];

            }
        }

        $query_update = "UPDATE forum_posts SET ";
        $query_update .="post_title  = '{$post_title}', ";
        $query_update .="post_text = '{$post_text}', ";
        $query_update .="post_img = '{$post_img}'";
        $query_update .= "WHERE id = {$post_id} ";

        $update_user= mysqli_query($connection,$query_update);
    
        move_uploaded_file($post_image_temp, "../public/$post_img" );

       


    }

?>
