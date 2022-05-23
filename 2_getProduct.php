<?php

$host = "aa18dimcgoe3xw3.csoetfgjmkbw.us-east-1.rds.amazonaws.com";
$user = "uts";
$psw = "internet";
$database = "assignment1";

$product_id = $_GET['product_id'];

$connection = mysqli_connect($host,$user,$psw,$database);


$query_string = "select * from products where product_id = $product_id";

$result = mysqli_query($connection,$query_string);

$responseText = "";
if ( mysqli_num_rows($result) > 0){
    while($a_row = mysqli_fetch_assoc($result)){
        $responseText = $responseText.$a_row['product_id'].",".$a_row['product_name'].",".$a_row['unit_price'].",".$a_row['unit_quantity'].",".$a_row['in_stock'];
    }
}

// echo $responseText;
header("Location: 2_showProduct.php?productDetail=".$responseText,"_self");

?>