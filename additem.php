<?php


header('Content-Type:text/xml');

$dummyVar="";


$item_name = $_GET["item_name"];

$item_number = 0;

$quantity_on_hold = 0;
$quantity_sold = 0;

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
            $itemExist = false;

            foreach($xmlObject->children() as $obj){
                if($obj->item_name==$item_name){
                    echo "Given item name (".$item_name.") already exist. Please add new item";
                    $itemExist = true;
                    break;
                }
            }


            foreach($xmlObject->children() as $obj){
                $item_number=(int)$obj->item_number;
            }

            $item_number = $item_number+1;

           

            if(!$itemExist){

                 //creating item node under items node  
                $items = $doc->getElementsByTagName('items')->item(0);
                $item=  $doc->createElement('item');
                $items->appendChild($item);


                // creating item_number node
                $itemNumber = $doc->createElement('item_number');
				$item->appendChild($itemNumber);
				$itemValue = $doc->createTextNode($item_number);
                $itemNumber->appendChild($itemValue);

                
                // creating item_name node
                $itemName = $doc->createElement('item_name');
				$item->appendChild($itemName);
				$itemNameVlaue = $doc->createTextNode($item_name);
                $itemName->appendChild($itemNameVlaue);
                
                // creating item_quantity node
                $itemQuantity = $doc->createElement('item_quantity');
                $item->appendChild($itemQuantity);
                $itemQuantityValue = $doc->createTextNode($item_quantity);
                $itemQuantity->appendChild($itemQuantityValue);
                  
                           
                // creating quantity_on_hold node
                $quantityHold = $doc->createElement('quantity_on_hold');
                $item->appendChild($quantityHold);
                $quantityHoldValue = $doc->createTextNode($quantity_on_hold);
                $quantityHold->appendChild($quantityHoldValue);

                 // creating quantity_sold node
                 $quantitySold = $doc->createElement('quantity_sold');
                 $item->appendChild($quantitySold);
                 $quantitySoldValue = $doc->createTextNode($quantity_sold);
                 $quantitySold->appendChild($quantitySoldValue);


                  // creating item_price node
                  $itemPrice = $doc->createElement('item_price');
                  $item->appendChild($itemPrice);
                  $itemPriceValue = $doc->createTextNode($item_price);
                  $itemPrice->appendChild($itemPriceValue);


                  // creating item_description node
                  $itemDescription = $doc->createElement('item_description');
                  $item->appendChild($itemDescription);
                  $itemDescriptionValue = $doc->createTextNode($item_description);
                  $itemDescription->appendChild($itemDescriptionValue);

                  $doc->formatOutput = true;
                  $doc->save($xmlfile);
                  echo "Item has been listed in the system, and the item number is ".$item_number;

            }



    echo $errorMessage;
}

}

?>