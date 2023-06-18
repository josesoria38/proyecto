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

    $stmt = $item->getcamiseta();
    $itemCount = $stmt->rowCount();

    if ($itemCount > 0) {
        $arrCamiseta = array();
        $arrCamiseta['body'] = array();
        $arrCamiseta['itemCount'] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $e = array(
                "id" => $id,
                "product_name" => $product_name,
                "product_desc" => $product_desc,
                "product_code" => $product_code,
                "product_image" => $product_image,
                "product_price" => $product_price,
            );

            array_push($arrCamiseta["body"], $e);
        }
        echo json_encode(($arrCamiseta));
    } else {
        http_response_code(404);
        echo json_encode(array(
            "message" => "No record found"
        ));
    }
?>
