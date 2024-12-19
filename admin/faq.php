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
                    <a href="faq.php" class="text-center">
                        <h1 class="page-header">
                        FAQ

                        </h1>
                    </a>



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
                    case 'add_faq';
                    include "includes/faq/add_faq.php";
                    break;

                    case 'edit_faq';
                    include "includes/faq/edit_faq.php";
                    break;


                    default: include "includes/faq/view_all_faq.php";
                    break;


                }



            ?>



        </div>


    </div>


    <?php include("includes/admin_footer.php") ?>

</body>

</html>