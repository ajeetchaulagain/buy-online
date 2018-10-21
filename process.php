<?php

    // session_start();
    // //$customerID = $_SESSION['cus_id'];
    // echo $customerID;


    header('Content-Type:text/xml');

    $errorMessage = "";

    $xmlfile = '../data/goods.xml'; 

   

    if(!file_exists($xmlfile)){
        $errorMessage.= "Given file doesnot exist";

    }

    else{
        $xmlObject = simplexml_load_file($xmlfile);
    }

   

    echo "<table><tr class= 'table_head'><td>Item Number</td><td>Name</td><td>Price</td><td>Quantity Available</td><td>Quantity on Hold</td><td>Quantity Sold</td></tr>";

    foreach($xmlObject->children() as $obj){
        
        if($obj->quantity_sold>0){
            echo "
            <tr><td>{$obj->item_number}</td><td>{$obj->item_name}</td><td>{$obj->item_price}</td><td>{$obj->item_quantity}</td><td>{$obj->quantity_on_hold}</td><td>{$obj->quantity_sold}</td></tr>";
        }
        
    }

    echo "<tr class='table_head'><td colspan='6'><button id='proces' onclick ='process()'>Process</button></td></tr>";
    echo "</table>";


?>  