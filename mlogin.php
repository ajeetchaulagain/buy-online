<?php


header('Content-Type:text/xml');




$id = $_GET["id"];
$password = $_GET["password"];




if (isset($id) && isset($password)){
 
    $errorMessage = "";

    

    if(empty($id)){
        $errorMessage.="* Please enter manager ID<br/>";
       
    }

    if(empty($password)){
        $errorMessage.="* Please enter password <br/>";
    }

    if($errorMessage==""){
        $textFile = "../data/manager.txt";

        // AJEET, AJ101

        $document = file_get_contents($textFile);
        $lines = explode("\n",$document);

        $managerExist=false;
        foreach($lines as $newLine){
            $idFromFile = substr($newLine,0,strpos($newLine,","));
            $passwordFromFile=substr($newLine,strpos($newLine,",")+2,strlen($newLine));
            if(($idFromFile==$id) && ($passwordFromFile==$password)){
                $managerExist = true;
                break;
            }
        }

        if($managerExist){
            session_start();
            $_SESSION['man_id']=(string)$id;
            $loginStatus = "yes";
            echo $loginStatus;

        }
        else{
            $errorMessage.= "*Error in login. Please check id and password";
        }
        

    }
    echo $errorMessage;

}

?>