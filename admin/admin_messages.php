<!DOCTYPE html>
<html lang="en">
<?php include("includes/admin_header.php")?>
    <?php delete_admin_nots_on_get()?>
    <body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/nav.php")?>

        <div id="page-wrapper">
            <div class="container-fluid">


            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header" >
                       Messages

                    </h1>
                    <p>You have <?php show_admin_messages_num()?> new messages</p>





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
                    case 'reply_msg';
                    include "includes/admin_msgs/reply_msg.php";
                    break;

                    default: include "includes/admin_msgs/view_all_admin_messages.php";
                    break;


                }



            ?>



        </div>


    </div>


    <?php include("includes/admin_footer.php") ?>

</body>

</html>