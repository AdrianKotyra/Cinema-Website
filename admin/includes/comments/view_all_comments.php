<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>comment_id</th>
                        <th>comment_post_id</th>
                        <th>Post title</th>
                        <th>comment_user_id</th>
                        <th>comment user firstname and lastname</th>
                        <th>comment_text</th>
                        <th>comment_date</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>

                    <?php select_and_display_comments();?>
                

                </tbody>
</table>