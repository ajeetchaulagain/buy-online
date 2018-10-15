<?php

header('Content-Type:text/xml');

echo "just a test";

if (isset($_GET['fname']) && isset($_GET["email"]) && isset($_GET["lname"]) && isset($_GET["password"]) && isset($_GET["phone"]) && isset($_GET["confirm
_password"]) ) {
    
    $fname = $_GET["fname"];
    $lname = $_GET["lname"];
    $email = $_GET["email"];
    $password = $_GET["password"];
    $conf_password = $_GET["confirm_password"];
    $phone = $_GET["phone"];

    $errorMessage = "";

    if(empty($fname)){
        $errorMessage.="You must enter a first name <br/>";
    }

    if(empty($lname)){
        $errorMessage.="You must enter a last name <br/>";
    }
    if(empty($emai)){
        $errorMessage.="You must enter email ID <br/>";
    }

    if(empty($password)){
        $errorMessage.="You must enter a password <br/>";
    }

    if(empty($conf_password)){
        $errorMessage.="You must enter a confirmation password <br/>";
    }

    
   

   

    if(empty($phone)){
        $errorMessage.="You must enter a phone number <br/>";
    }

    echo $errorMessage;
    

}


?>