<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Max-Age: 3600');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

    include_once('../config/database.php');
    include_once('../class/Productos.php');

    $database = new Database();
    $db = $database->getConnection();

    $item = new Producto($db);

    // $data = json_decode(file_get_contents("php://input"));


    $item->id = $_POST['id'];
    $item->product_name = $_POST['product_name'];
    $item->product_desc = $_POST['product_desc'];
    $item->product_code = $_POST['product_code'];
    $item->product_image = $_POST['product_image'];
    $item->product_price = $_POST['product_price'];

    if ($item->updateProduct()) {
        echo "Product updated successfully";
    } else {
        echo "Product couldn't be updated";
    }


?>