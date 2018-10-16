<?php


header('Content-Type:text/xml');




$email = $_GET["email"];
$password = $_GET["password"];



if (isset($email) && isset($password)){

    $errorMessage = "";

    if(empty($email)){
        $errorMessage.="* Please enter email address <br/>";
    }

    if(empty($password)){
        $errorMessage.="* Please enter password <br/>";
    }



    if($errorMessage==""){
        
		$xmlfile = '../data/testData.xml'; 

	
	$doc = new DomDocument();
	
	if (!file_exists($xmlfile)){ // if the xml file does not exist, display file not exist message
		echo "xml file does not exist";
	}
	else { // load the xml file
		
		$doc->preserveWhiteSpace = FALSE; 	
        $doc->load($xmlfile);  
    }
	
		$xmlObject = simplexml_load_file($xmlfile);
    
        $customerExist=false;
        $customerId="";

		foreach($xmlObject->children() as $obj ){
			if($obj->email==$email && $obj->password==$password){	
                $customerExist=true;
                $customerId=$obj->id;
				break;
			}
        }
        
        if($customerExist){
            session_start();
            $_SESSION['cus_id']=(string)$customerId;
            $redirect= "yes";
            echo $redirect;
            
        } else{
            
                
                    $errorMessage.= "Error in login. Your email or password is incorrect";
             }

     }
            echo $errorMessage;

}


?>