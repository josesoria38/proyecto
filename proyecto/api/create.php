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

    $item->nombre = $_POST['nombre'];
    $item->tipo = $_POST['tipo'];
    $item->precio = $_POST['preecio'];
    $item->imagen = $_POST['imagen'];

    if ($item->createProduct()) {
        echo json_encode("Product created successfully");
    } else {
        echo json_encode("Couldn't create product");
    }
    


?>