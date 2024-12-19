<a href="faq.php?source=add_faq">
    <button class="button-admin">Add faq</button>
</a>


<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>faq_id</th>
                        <th>question</th>
                        <th>answer</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>

                   <?php render_faq_table()?>


                </tbody>
</table>