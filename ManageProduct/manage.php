<?php
 function addProduct($name,$price,$quantity){
    if(!isset($_SESSION['products'])){
        $_SESSION['products'] = [];
    }
    $newProduct = ['name'=>htmlspecialchars($name),
                   'price'=>floatval($price),
                   'quantity'=>intval($quantity)
            ];
    $_SESSION['products'][] = $newProduct;
 }
 
 function displayProducts($products){
    if(empty($products)){
        echo "<p>No products avaible.</p>";
        return;
    }
    echo "<table border = '1'>";
    echo "<tr><th>Name</th><th>Price</th><th>Quantity</th></tr>";
    foreach($products as $product){
       printf(
            "<tr><td>%s</td><td>%.2f</td><td>%d</td></tr>",
    $product['name'],
            $product['price'],
            $product['quantity']
        );
    }
    echo "</table>";
 }
function searchProduct($products,$key){
    $result = [];
    foreach($products as $product){
        if(strpos(strtolower($product['name']),strtolower($key)) !== false){
            $result[] = $product; 
        }
    }
    return $result;   
}
function sortProductByName(&$products){
    usort($products,function ($a,$b){
        return strcmp(strtolower($a['name']),strtolower($b['name']));
    });
}
session_start();
if(!isset($_SESSION['products'])){
    $_SESSION['products'] = [];
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["action"])) {
        $action = $_POST["action"];

    if($action == "add" && isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["quantity"])){
       $name = $_POST["name"];
       $price = $_POST["price"];
       $quantity = $_POST["quantity"];

       addProduct($name,$price,$quantity);
       echo "<p>Product added succefully!</p>";
    }
    elseif($action == "display"){
        displayProducts($_SESSION['products']);
    }
    elseif($action == "search" && isset($_POST['name'])){
        $key = $_POST['name'];
        $result = searchProduct($_SESSION['products'],$key);
        displayProducts($result);
    }
    elseif($action == "sort"){
        sortProductByName($_SESSION['products']);
        displayProducts($_SESSION['products']);
        }
    }
}
?>