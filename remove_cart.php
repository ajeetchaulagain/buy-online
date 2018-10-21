<?php


header('Content-Type:text/xml');
$xmlfile = '../data/goods.xml'; 


$errorMessage = "";
$id = $_GET["id"];


if(!file_exists($xmlfile)){

    $errorMessage.="Given file doesnot exist";
}
else{
    $xmlObject = simplexml_load_file($xmlfile);
}

foreach($xmlObject->children() as $obj){
    
    
    if($obj->item_number==$id){
       if($obj->quantity_on_hold>0){
           $obj->quantity_on_hold-=1;
           $obj->item_quantity+=1;
           break;
       }

    }
}

echo $obj->quantity_on_hold;
file_put_contents($xmlfile, $xmlObject->saveXML());



?>