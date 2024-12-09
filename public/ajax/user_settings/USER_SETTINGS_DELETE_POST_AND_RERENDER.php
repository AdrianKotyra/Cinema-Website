
<?php include("../../php/init.php");?>

<?php
    global $connection;
    if (isset($_POST["data"])) {

        $post_id = $_POST["data"];
        $query = "DELETE from forum_posts where id = $post_id";
        $delete_post = mysqli_query($connection, $query);

        $query2 = "DELETE from comments_forum where comment_post_id = $post_id";
        $delete_comments_posts = mysqli_query($connection, $query2);

        $query3 = "DELETE from forum_comments_likes where forum_comment_post_id = $post_id";
        $delete_likes_posts = mysqli_query($connection, $query2);

}

?>