<?php
session_start(); //start session
include("config.inc.php");

// insert payment details
$insertPayment = "INSERT INTO shop_payment(order_id, payment_status, payment_response)VALUES('".$order_id."', '".$payment_status."', '".$payment_response."')";
//Salim: Se ha comentado por que no he añadido el código que recupera los datos de la transacción de PAYPAL
//mysqli_query($mysqli_conn, $insertPayment) or die("database error:". mysqli_error($mysqli_conn));

// update order status after payment. Salim: la actualización del estado de la orden debería usar como id: la que envía paypal para más 
// seguridad que se envió en payment.php <input type='hidden' name='item_number' value=""> como valor oculto.
$updateOrder = "UPDATE shop_order set order_status = 'PAID' WHERE id = ". $_SESSION["orderId"];
mysqli_query($mysqli_conn, $updateOrder) or die("database error:". mysqli_error($mysqli_conn));


?>
