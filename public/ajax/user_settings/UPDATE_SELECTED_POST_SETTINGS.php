<?php include("../../php/init.php");



if (isset($_POST["post_id"])) {
    $post_id = $_POST['post_id'];
    $post_title = $_POST['post_title'];
    $post_text = $_POST['post_text'];
    global $connection;

    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $file_name = basename($_FILES['image']['name']);
        $post_img = 'imgs/forum_posts/' . time() . '_' . $file_name;
        $destination = __DIR__ . "/../../imgs/forum_posts/" . time() . '_' . $file_name;  // Absolute path

        // Try to move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            echo "File uploaded successfully.";
        } else {
            echo "File upload failed.";
        }
    } else {
        // If no image is uploaded, retrieve the existing image
        $query = "SELECT * FROM forum_posts WHERE id = $post_id";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_image)) {
            $post_img = $row['post_img'];
        }
    }


    $query_update = "UPDATE forum_posts SET
                        post_title = '{$post_title}',
                        post_text = '{$post_text}',
                        post_img = '{$post_img}'
                    WHERE id = {$post_id}";

    $update_post = mysqli_query($connection, $query_update);


}
