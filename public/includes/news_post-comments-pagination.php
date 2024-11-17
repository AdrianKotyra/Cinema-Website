<?php
    global $database;

    $post_id = $_GET["post"];
    // Get the current page number or set it to 1 if not present
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    // Calculate the starting row for the query
    $start = ($page - 1) * $limit;
    // Retrieve the data
    $sql = "SELECT * FROM comments_news where comment_post_id = $post_id LIMIT $start, $limit";
    $result = $connection->query($sql);

    $sql_total = "SELECT COUNT(comment_id) FROM comments_news where comment_post_id = $post_id";
    $total_result = $database-> query_array($sql_total);
    $total_records = $total_result->fetch_array()[0];

    $total_pages = ceil($total_records / $limit);

?>

<div class="pagination-container ">
    <ul class="row-custom">
        <?php if($page > 1): ?>
            <li><a class="white-text" href="?post=<?php echo $post_id; ?>&page=<?php echo $page-1; ?>">Previous</a></li>
        <?php endif; ?>

        <?php for($i = 1; $i <= $total_pages; $i++): ?>
            <li style="margin: 0 5px;">
            <a class="white-text <?php if($i == $page) echo 'active-page'; ?>"
            href="?post=<?php echo $post_id; ?>&page=<?php echo $i; ?>">
            <?php echo $i; ?>
            </a>

            </li>
        <?php endfor; ?>

        <?php if($page < $total_pages): ?>
            <li><a class="white-text" href="?post=<?php echo $post_id; ?>&page=<?php echo $page+1; ?>">Next</a></li>
        <?php endif; ?>
    </ul>
</div>