<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Max-Age: 3600');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

    include_once('../config/database.php');
    include_once('../class/producto.php');

    $database = new Database();
    $db = $database->getConnection();

    $item = new Producto($db);

    // $data = json_decode(file_get_contents("php://input"));


    $item->id = $_POST['id'];
    $item->nombre = $_POST['nombre'];
    $item->tipo = $_POST['tipo'];
    $item->precio = $_POST['precio'];
    $item->imagen = $_POST['imagen'];


    if ($item->updateProduct()) {
        echo "Product updated successfully";
    } else {
        echo "Product couldn't be updated";
    }


?>