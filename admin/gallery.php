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
                    <a href="gallery.php" class="text-center">
                        <h1 class="page-header">
                        Gallery

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
                    case 'add_image';
                    include "includes/gallery/add_images.php";
                    break;

                    case 'edit_image';
                    include "includes/gallery/edit_images.php";
                    break;


                    default: include "includes/gallery/view_all_images.php";
                    break;


                }



            ?>



        </div>


    </div>


    <?php include("includes/admin_footer.php") ?>

</body>

</html>