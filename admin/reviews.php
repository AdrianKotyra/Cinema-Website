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
                       Reviews

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
                    case 'add_reviews';
                    include "includes/add_reviews.php";
                    break;

                    case 'edit_reviews';
                    include "includes/edit_reviews.php";
                    break;


                    default: include "includes/view_all_reviews.php";
                    break;


                }
                


            ?>
           


        </div>
     

    </div>
 

    <?php include("includes/admin_footer.php") ?>

</body>

</html>