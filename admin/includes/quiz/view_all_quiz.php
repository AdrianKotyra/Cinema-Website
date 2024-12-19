<a href="gallery.php?source=add_image">
    <button class="button-admin">Add quiz question</button>
</a>

<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>question id</th>
                        <th>question</th>
                        <th>image</th>
                        <th>correct answer index</th>
                        <th>choices</th>

                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>

                   <?php render_quiz_table()?>


                </tbody>
</table>