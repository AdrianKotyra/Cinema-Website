<table class="table table-bordered table-hover">
                <thead>
                    <h4>Assigned Movies Tickets</h4>
                    <tr>
                        <th>ticket_id</th>
                        <th>ticket_movie_id</th>
                        <th>ticket_movie_title</th>
                        <th>ticket price</th>
                        <th>tickets quantity</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>

                    <?php select_and_display_tickets();?>
                

                </tbody>

           
</table>
<table class="table table-bordered table-hover">
    <thead>
        <h4>NOT Assigned Movies Tickets</h4>
        <tr>
            <th>movie_id</th>
            <th>ticket_movie_title</th>
    
            <th>Add</th>
            

        </tr>
    </thead>
    <tbody>

     <?php  select_and_display_tickets_not_assigned(); ?>


    </tbody>




</table>