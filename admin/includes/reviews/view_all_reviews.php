<a href="reviews.php?source=add_reviews">
    <button class="button-admin">Add review</button>
</a>

<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>review_id</th>
                        <th>review</th>
                        <th>movie review id</th>
                        <th>movie review title</th>
                        <th>user review id</th>
                        <th>review_date</th>
                        <th>reviewed user name</th>
                        <th>reviewed user image</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>

                 <?php select_and_display_reviews()?>


                </tbody>
</table>