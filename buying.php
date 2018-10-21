<?php

    // session_start();
    // //$customerID = $_SESSION['cus_id'];
    // echo $customerID;


    header('Content-Type:text/xml');

    $errorMessage = "";

    $xmlfile = '../data/goods.xml'; 

    $doc = new DomDocument();

    if(!file_exists($xmlfile)){
        $errorMessage.= "Given file doesnot exist";

    }

    else{
        $doc->preserveWhiteSpace = FALSE;
        $doc->load($xmlfile);
    }

    $xmlObject = simplexml_load_file($xmlfile);

    echo "<table><tr class= 'table_head'><td>Item Number</td><td>Name</td><td>Description</td><td>Price</td><td>quantity</td><td>Add</td></tr>";

    foreach($xmlObject->children() as $obj){
        echo "
            <tr><td>{$obj->item_number}</td><td>{$obj->item_name}</td><td>{$obj->item_description}</td><td>{$obj->item_price}</td><td>{$obj->item_quantity}</td><td><button id='<?php echo $obj->item_number; ?>' onclick='initCart($obj->item_number,$obj->item_quantity)'>Add one to Cart</button></td></tr>";
    }

    echo "</table>";


?>  