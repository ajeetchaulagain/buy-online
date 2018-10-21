<?php

header('Content-Type:text/xml');

$xmlfile = '../data/goods.xml'; 

$errorMessage = "";


if(!file_exists($xmlfile)){

    $errorMessage.="Given file doesnot exist";
}
else{
    
	$xmlObject = simplexml_load_file($xmlfile);
}

$xmlObject = simplexml_load_file($xmlfile);

$total = 0;
foreach($xmlObject->children() as $obj){
    if($obj->quantity_on_hold>0){
        $obj->item_quantity+=$obj->quantity_on_hold;
        $obj->quantity_on_hold=0;

    }

}

file_put_contents($xmlfile, $xmlObject->saveXML());

echo "<h1>Your purchase request has been cancelled, welcome to shop next time</h1>";


?>