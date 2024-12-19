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
                    <a href="staff.php" class="text-center">
                        <h1 class="page-header">
                        Staff

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
                    case 'add_staff';
                    include "includes/staff/add_staff.php";
                    break;

                    case 'edit_staff';
                    include "includes/staff/edit_staff.php";
                    break;


                    default: include "includes/staff/view_all_staff.php";
                    break;


                }



            ?>



        </div>


    </div>


    <?php include("includes/admin_footer.php") ?>

</body>

</html>