<a href="movies.php?source=add_movies">
    <button class="button-admin">Add movies</button>
</a>
<div class="searcher-container-posts">
    <?php include "search-movies.php"?>
</div>

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

                <tbody class="movies-table">

                    <?php select_and_display_movies();?>


                </tbody>
</table>
