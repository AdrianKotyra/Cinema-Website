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
                       10 Most rated movies

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



                    default: include "includes/top_rated/view_all_top_rated.php";
                    break;


                }



            ?>



        </div>


    </div>


    <?php include("includes/admin_footer.php") ?>

</body>

</html>