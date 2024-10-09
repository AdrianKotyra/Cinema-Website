<?php session_start();
include("../php/init.php"); 

global $user;
global $session;


if($session->signed_in) {
    echo  "true";
}
else {
    echo "false";
}




?>