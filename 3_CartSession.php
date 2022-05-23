<?php
session_start();

// get all the data from the form submitted
$_SESSION['formData']=array(
    'form_pdtId' => $_REQUEST['product_id_sent'],
    'form_pdtName' => $_REQUEST['product_name_sent'],
    'form_pdtUnit' => $_REQUEST['unit_quatity_sent'],
    'form_unitPrice' => $_REQUEST['unit_price_sent'],
    'form_pdtStock' => $_REQUEST['in_stock_sent'],
    'form_qty' => $_REQUEST['qty'],
    'form_price' => $_REQUEST['unit_price_sent']*$_REQUEST['qty']
);


$alertMSG="";

if (!isset($_SESSION['item_pdtId'])){     //initial setup
    $_SESSION['item_pdtId'] = array('item1' => $_SESSION['formData']['form_pdtId']);
    $_SESSION['item_pdtName'] = array('item1' => $_SESSION['formData']['form_pdtName']);
    $_SESSION['item_pdtUnit'] = array('item1' => $_SESSION['formData']['form_pdtUnit']);
    $_SESSION['item_unitPrice'] = array('item1' => $_SESSION['formData']['form_unitPrice']);
    $_SESSION['item_pdtStock'] = array('item1' => $_SESSION['formData']['form_pdtStock']);
    $_SESSION['item_qty'] = array('item1' => $_SESSION['formData']['form_qty']);
    $_SESSION['item_price'] = array('item1' => $_SESSION['formData']['form_price']);


}else{
    $match = false;
    foreach($_SESSION['item_pdtId'] as $x => $x_value){//to verify if the product already in the cart
        if($_SESSION['formData']['form_pdtId']==$x_value){
            $match = true;
            $amountUpdated=$_SESSION['item_qty'][$x] + $_SESSION['formData']['form_qty'];
            if ($amountUpdated <= $_SESSION['item_pdtStock'][$x]){
                $_SESSION['item_qty'][$x] = $amountUpdated;
                $_SESSION['item_price'][$x] = $_SESSION['item_qty'][$x] * $_SESSION['item_unitPrice'][$x];
                break;
            } else {
                $alertMSG = "Sorry, we do not have sufficient stock of the selected product.<br>Please check the qty already in your cart and our stock amount";
                break;
            }
        }
    }

    //if the new item is not in the cart yet, a new item, for example item2, is created.
    if (!$match) {
        $newItem = "item".(count($_SESSION['item_pdtId'])+1);
        $_SESSION['item_pdtId'][$newItem] = $_SESSION['formData']['form_pdtId'];
        $_SESSION['item_pdtName'][$newItem] = $_SESSION['formData']['form_pdtName'];
        $_SESSION['item_pdtUnit'][$newItem] = $_SESSION['formData']['form_pdtUnit'];
        $_SESSION['item_unitPrice'][$newItem] = $_SESSION['formData']['form_unitPrice'];
        $_SESSION['item_pdtStock'][$newItem] = $_SESSION['formData']['form_pdtStock'];
        $_SESSION['item_qty'][$newItem] = $_SESSION['formData']['form_qty'];
        $_SESSION['item_price'][$newItem] = $_SESSION['formData']['form_price'];
    }
}


$cartContent = "";

foreach ($_SESSION['item_pdtId'] as $x=>$x_value){
    $cartContent = $cartContent.$x.','.$_SESSION['item_pdtId'][$x].','.$_SESSION['item_pdtName'][$x].','.$_SESSION['item_pdtUnit'][$x].','.$_SESSION['item_unitPrice'][$x].','.$_SESSION['item_pdtStock'][$x].','.$_SESSION['item_qty'][$x].','.$_SESSION['item_price'][$x].'::';
}

if(isset($_REQUEST['session_dstr'])){
    session_destroy();
    $cartContent = "";
}

if($alertMSG==""){
    header('Location: 3_showCart.php?cartContent='.$cartContent);
}else{
    header('Location: 3_showCart.php?cartContent='.$cartContent.'&alertMSG='.$alertMSG);
}

?>
