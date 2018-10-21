<?php

// header('Content-Type:text/xml');

session_start();

if(isset($_SESSION["man_id"])){
    $manager_id=$_SESSION['man_id'];

    echo "Thankyou. ".$manager_id; 
    session_destroy();

}
else{
    echo "Error in logging out";
}


?>