<?php

header('Content-Type:text/xml');

$dummyVar="";

echo "Hello" ;

$id = $_GET["id"];

$fname = $_GET["fname"];
$lname = $_GET["lname"];
$email = $_GET["email"];
$password = $_GET["password"];
$conf_password = $_GET["confirm_password"];
$phone = $_GET["phone"];


echo $fname;
echo "br/>";
echo $id;

echo "<br/>";

echo $lname;
echo "<br/>";

echo $email;
echo "<br/>";

echo $password;
echo "<br/>";
echo $conf_password;
echo $phone;
// $dummyVar=$fname + " " + $lname + " " + $email + " " + $password + " " + $conf_password + " " + $phone;


if (isset($_GET['fname']) && isset($_GET["email"]) && isset($_GET["lname"]) && isset($_GET["password"]) && isset($_GET["phone"]) && isset($_GET["confirm
_password"]) ) {
    
    $fname = $_GET["fname"];
    $lname = $_GET["lname"];
    $email = $_GET["email"];
    $password = $_GET["password"];
    $conf_password = $_GET["confirm_password"];
    $phone = $_GET["phone"];

        echo "Inside isset";
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

    $errorMessage.="hey in php file";
    echo $errorMessage;
    

}


?>