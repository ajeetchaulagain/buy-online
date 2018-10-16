<?php 

// header('Content-Type: text/xml');

$xmlfile = '../data/testData.xml';

if (!file_exists($xmlfile)){ // if the xml file does not exist
	echo "The xml file does not exist.";
} else {
	// $doc = new DomDocument();
	// //$doc->preserveWhiteSpace = FALSE; 
	// // $doc->load($xmlfile); 
	
    // // $xml= ($doc->saveXML());
    $xml = simplexml_load_file($xmlfile);
    

    // echo "title: ". $xml->customer->name;

    $email ="chaulagain";

    foreach($xml->children() as $obj ){
        if($obj->email==$email){
            echo "email already exist";
            break;
            echo "test";
        }
        echo "test";
       
        
    }
    echo "test";
    // $type = gettype($xml);
    // echo $type;
}
?>