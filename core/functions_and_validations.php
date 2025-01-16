<?php


# add to cart


function addtocart($product_id, $product_name, $product_price, $product_quantity)
{
    $_SESSION['cart'][] = [
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_price' => $product_price,
        'product_quantity' => $product_quantity,
    ];
    $file = fopen('../Data/cart.csv', 'a');

    $product_store = $product_id . ',' . $product_name . ',' . $product_price . ',' . $product_quantity;
    fwrite($file, $product_store);

    fclose($file);
}



function sum_of_product($product_id , $product_price , $product_quantity){
if(isset($_SESSION['cart']['product_id'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        
    }
}

}



?>