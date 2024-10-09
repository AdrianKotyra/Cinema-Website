<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>title</th>
                        <th>release_date</th>
                        <th>description</th>
                        <th>trailer_link</th>
                        <th>poster</th>
                        <th>age</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>

                    <?php select_and_display_movies();?>
                

                </tbody>
</table>