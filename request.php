<?php 
require_once("inc/functions.php");
$token = "Your shop access token";
$shop = "shop name only "; //loki2499

$id =  $_GET['data'];

$products = shopify_call($token, $shop, "/admin/api/2021-01/products/" . $id . ".json", array(), 'GET');
$products = json_decode($products['response'], JSON_PRETTY_PRINT);
// echo "<pre>";
// print_r(json_encode($products));
echo $products['product']['variants'][0]['price'];
?>

