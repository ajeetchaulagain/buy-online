<?php


header('Content-Type:text/xml');

$dummyVar="";


$item_name = $_GET["item_name"];

$item_price = $_GET["item_price"];
$item_quantity = $_GET["item_quantity"];
$item_description = $_GET["item_description"];



if (isset($item_name) && isset($item_quantity) && isset($item_description) && isset($item_price)){


    $errorMessage = "";

    if(empty($item_name)){
        $errorMessage.="* Enter  item name <br/>";
    }

    if(empty($item_price)){
        $errorMessage.="* Enter a item price <br/>";
    }
    else if(!is_numeric($item_price)){
        $errorMessage.="* Price should have number values<br/>";
    }

    if(empty($item_quantity)){
        $errorMessage.="* Enter item quantity <br/>";
    }
    else if(!is_numeric($item_quantity)){
            $errorMessage.="* Item quantity should have number value<br/>";
    }

    if(empty($item_description)){
        $errorMessage.="* Enter description <br/>";
    }
   
    if($errorMessage!=""){
        echo $errorMessage;
    }
    else{
        $xmlfile = '../data/goods.xml'; 
        $doc = new DomDocument();
	
            if (!file_exists($xmlfile)){ // if the xml file does not exist, create a root node $items
                $items = $doc->createElement('items');
                $doc->appendChild($items);
                $doc->save($xmlfile);
            }
            else{
                $doc->preserveWhiteSpace = FALSE; 	
	        	$doc->load($xmlfile);
            }

            $xmlObject = simplexml_load_file($xmlfile);



    echo $errorMessage;
}
//     if(empty($conf_password)){
//         $errorMessage.="* You must enter a confirmation password <br/>";
//     }
   
//     if($password!=$conf_password){
//         $errorMessage.="* Your confirmation password doesn't matches with original password. Please enter correct password<br/>";
//     }

//     if(!empty($phone)){
        
//         if(!preg_match("/^[0][1-9][ ][0-9]{8}$/",$phone) && !preg_match("/^[(][0][1-9][)][0-9]{8}$/",$phone)){
//             $errorMessage.="* Invalid phone number";
//         }

//     }

//     if($errorMessage!=""){
//         echo $errorMessage;
//     }
//     else{
//         // $xmlfile = '../data/testData.xml'; // path for data folder in mercury server
        
// 		$xmlfile = '../data/testData.xml'; 

	
// 	$doc = new DomDocument();
	
// 	if (!file_exists($xmlfile)){ // if the xml file does not exist, create a root node $customers
// 		$customers = $doc->createElement('customers');
// 		$doc->appendChild($customers);
// 		echo "test 2";
// 		$doc->save($xmlfile);
// 	}
// 	else { // load the xml file
		
// 		$doc->preserveWhiteSpace = FALSE; 	
// 		$doc->load($xmlfile);
		  
// 	}
	
// 		$xmlObject = simplexml_load_file($xmlfile);
    
// 		$emailExist=false;

// 		foreach($xmlObject->children() as $obj ){
// 			if($obj->email==$email){
// 				echo "Given email (".$email.") ". "aready exixt. Please enter new one";
// 				$emailExist=true;
// 				break;
// 			}
// 		}
			
// 				if(!$emailExist){
// 				//create a customer node under customers node
// 				$customers = $doc->getElementsByTagName('customers')->item(0);
// 				$customer = $doc->createElement('customer');
// 				$customers->appendChild($customer);


// 				// create ID node ....
// 				$ID = $doc->createElement('id');
// 				$customer->appendChild($ID);
// 				$idValue = $doc->createTextNode($id);
// 				$ID->appendChild($idValue);

// 				// create a First Name node ....
// 				$firstName = $doc->createElement('fname');
// 				$customer->appendChild($firstName);
// 				$fnameValue = $doc->createTextNode($fname);
// 				$firstName->appendChild($fnameValue);

// 				// create a Last Name node ....
// 				$lastName = $doc->createElement('lname');
// 				$customer->appendChild($lastName);
// 				$lnameValue = $doc->createTextNode($lname);
// 				$lastName->appendChild($fnameValue);
				
// 				//create a Email node ....
// 				$Email = $doc->createElement('email');
// 				$customer->appendChild($Email);
// 				$emailValue = $doc->createTextNode($email);
// 				$Email->appendChild($emailValue);

				
// 				//create a password node ....
// 				$pwd = $doc->createElement('password');
// 				$customer->appendChild($pwd);
// 				$pwdValue = $doc->createTextNode($password);
// 				$pwd->appendChild($pwdValue);

					
// 				//create a phone node ....
// 				$Phone = $doc->createElement('phone');
// 				$customer->appendChild($Phone);
// 				$phoneValue = $doc->createTextNode($phone);
// 				$Phone->appendChild($phoneValue);
				
				
// 				//save the xml file
// 				$doc->formatOutput = true;
// 				$doc->save($xmlfile);  
// 				echo "Cheers. Your account is successfully registerd!<br/>";
		
// 				echo "<br/><span style='color:blue;'><a href='buyonline.htm' style='font-weight:bold; font-size:18px; background-color:black; color:white; padding:5px; text-decoration:none;';>Go back to home page</a></span>";
// 				}

// }
// }


?>