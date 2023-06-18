<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Max-Age: 3600');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

    include_once("../config/database.php");
    include_once('../class/camiseta.php');

    $database = new Database();
    $db = $database->getConnection();

    $item = new camiseta($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die(); 
    $item->getSinglecamiseta();

    if ($item->nombre != null) {
        $cami_array = array(
            "id" => $id,
            "product_name" => $item->product_name,
            "product_desc" => $item->product_desc,
            "product_code" => $item->product_code,
            "product_image" => $item->product_image,
            "product_price" => $item->product_price
        );
        http_response_code(200);
        echo json_encode($cami_array);
    } else {
        http_response_code(404);
        echo json_encode("Employee not found");
    }


?>
