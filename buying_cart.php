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
       if($obj->item_quantity>0){
           $obj->quantity_on_hold+=1;
           $obj->item_quantity-=1;
       }
    }
}

file_put_contents($xmlfile, $xmlObject->saveXML());

$xmlObject = simplexml_load_file($xmlfile);

echo "<table><tr class='table_head'><td>Item Number</td><td>Price</td><td>Quantity</td><td>Remove</td></tr>";
$total =0;
foreach($xmlObject->children() as $obj){
    if($obj->quantity_on_hold>0){
        
    $total = $total + ($obj->item_price*$obj->quantity_on_hold);

    echo "
        <tr><td>{$obj->item_number}</td><td>$$obj->item_price</td><td id='q{$obj->item_number}'>{$obj->quantity_on_hold}</td><td><button id='<?php echo $obj->item_number; ?>' onclick='initRemove($obj->item_number)'>Remove From Cart</button></td></tr>";
    }
}
echo "<tr><td colspan='3'>Total:</td><td>$total</td></tr>";
echo "<tr class='table_head'><td colspan='2'><button id='confirm' onclick='confirm_purchase()'>Confirm Purchase</button></td><td colspan='2'><button id='cancel' onclick='cancel_purchase()'>Cancel Purchase</button></td>";

echo "</table>";

// header('Content-Type:text/xml');

// $errorMessage = "";
// $id = $_GET["id"];

// echo "item id is".$id;


// $xmlfile = '../data/goods.xml'; 

// $doc= new DomDocument();

// if(!file_exists($xmlfile)){

//         $errorMessage.="Given file doesnot exist";
// }

// else{
//     $doc->preserveWhiteSpace = FALSE;
//     $doc->load($xmlfile);

// }

// $xmlObject = simplexml_load_file($xmlfile);


?>