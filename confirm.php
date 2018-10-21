<?php

// header('Content-Type:text/xml');

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
        $total = $total + ($obj->item_price*$obj->quantity_on_hold);
        $obj->quantity_sold=$obj->quantity_on_hold;
        $obj->quantity_on_hold= 0;
    }

}

file_put_contents($xmlfile, $xmlObject->saveXML());

echo "Your purchase has been confirmed and total amount to pay is $".$total;


?>