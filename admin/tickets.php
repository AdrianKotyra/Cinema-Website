<!DOCTYPE html>
<html lang="en">
<?php include("includes/admin_header.php")?>

    <body>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include("includes/nav.php")?>

        <div id="page-wrapper">
            <div class="container-fluid">

          
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">
                       Tickets

                    </h1>



                </div>
            </div>
        

            </div>



            <?php

                if(isset($_GET["source"])) {
                    $source = $_GET["source"];

                }
                else {
                    $source = "";
                }
                switch($source) {
               
                    
                    case 'edit_ticket';
                    include "includes/edit_ticket.php";
                    break;
                    case 'assign_ticket_movie';
                    include "includes/assign_ticket.php";
                    break;

                    default: include "includes/view_all_tickets.php";
                    break;


                }
                


            ?>
           


        </div>
     

    </div>
 

    <?php include("includes/admin_footer.php") ?>

</body>

</html>