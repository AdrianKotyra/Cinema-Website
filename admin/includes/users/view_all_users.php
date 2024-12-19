<a href="users.php?source=add_users">
    <button class="button-admin">Add user</button>
</a>

<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Password</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Role</th>
                        <th>DOB</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>

                    <?php select_and_display_users();?>


                </tbody>
</table>