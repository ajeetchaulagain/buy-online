<?php 

// header('Content-Type:text/xml');

$xmlfile = '../data/goods.xml'; 

$errorMessage = "";
$id = $_GET["id"];


if(!file_exists($xmlfile)){

    $errorMessage.="Given file doesnot exist";
}
else{
    $xml = simplexml_load_file($xmlfile);
}

foreach($xml->children() as $obj){
    
    $quantity = $obj->item_quantity;
    
    if($obj->item_number==$id){
       $obj->item_quantity += 1;
    }
}

file_put_contents($xmlfile, $xml->saveXML());

?>