<a href="admin_messages.php?delete_nots"><button class="button-admin">Delete notifications</button></a>
<table class="table table-bordered table-hover">
                <thead>
        
                    <tr>
                        <th>Message id</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Message</th>
                        <th>date</th>
                        <th>email</th>
                        <th>Reply</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                <?php select_and_display_admins_messages() ?>
           
                

                </tbody>

           
</table>
