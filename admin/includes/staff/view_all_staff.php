
<a href="staff.php?source=add_staff">
  <button class="button-admin">Add staff</button>
</a>

<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Description</th>
                        <th>Vocation</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>

              <?php select_and_display_staff()?>


                </tbody>
</table>