<a href="posts.php?source=add_posts">
    <button class="button-admin">Add posts</button>
</a>

<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Post title</th>
                        <th>Post text</th>
                        <th>Post img</th>
                        <th>Post Header</th>
                        <th>Post Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php select_and_display_posts();?>


                </tbody>
</table>