<?php 
require_once("inc/functions.php");

$token = "Your shop access token";
$shop = "shop name only "; //loki2499




$products = shopify_call($token, $shop, "/admin/api/2021-01/products.json", array(), 'GET');
$products = json_decode($products['response'], JSON_PRETTY_PRINT);

$i =0 ;
foreach($products as $cur_products) {
    foreach ($cur_products as $key => $value) {
     echo "<div>";
     echo "<strong>" . $i . "</strong> ";
    echo "<span class='pointer' data-id =" . $value['id'] . ">"  .$value['title'] . "</span>";
    echo " <span id='div1'></span>";
    echo "</div>";
    echo "<br>";
    $i++;
    }
}

// echo $product['products'][0]['title'];
// echo "<br>";
// echo "<pre>";
// print_r(json_encode($product));
// echo "</pre>";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">

      $(document).ready(function(){
  $("span").click(function(){
         // var dataId = $(this).find("span").attr("data-id");
     var dataId = $(this).attr("data-id");
     // alert(dataId);
    var put_data = $(this).siblings('span');

       $.ajax({
        type: "GET",
        // data: dataId,
        url: "request.php?data=" + dataId,
         success: function(result){
      $(put_data).html("Id: "+ dataId +" Price: " + result);
    }});

    })
})
</script>
<style type="text/css">
    .pointer{
        cursor: pointer;
    }
</style>
