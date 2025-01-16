<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include '../core/functions_and_validations.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        if(isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_quantity'])){
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_quantity = $_POST['product_quantity'];
        }
        
    if (!isset($_POST['action'])) {
        $_POST['action'] = [];
    }}
          addtocart($product_id, $product_name, $product_price, $product_quantity);


}

$_SESSION['cartdata'] =[

    ['product_id' => 1 , 'product_name' => 'product1' , 'product_price' => 9.99 , 'quantity' => 1] ,
    ['product_id' => 2 , 'product_name' => 'product2' , 'product_price' => 19.99 , 'quantity' => 2] ,
    ['product_id' => 3 , 'product_name' => 'product3' , 'product_price' => 29.99 , 'quantity' => 1] ,
    
]

?>































?>