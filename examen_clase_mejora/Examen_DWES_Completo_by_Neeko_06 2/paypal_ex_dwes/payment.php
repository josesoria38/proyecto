<?php

session_start(); //start session
include("config.inc.php");

if(!empty($_POST["proceedPayment"])) {
	$member_id = 1111;
	$firstName = $_POST ['firstName'];
	$lastName = $_POST ['lastName'];
	$address = $_POST ['address'];
	$contactNumber = $_POST ['contactNumber'];
	$emailAddress = $_POST ['emailAddress'];
	$insertOrderSQL = "INSERT INTO shop_order(member_id, name, address, mobile, email, order_status, order_at, payment_type)VALUES('".$member_id."', '".$firstName." ".$lastName."', '".$address."', '".$contactNumber."', '".$emailAddress."', 'PENDING', '".date("Y-m-d H:i:s")."', 'PAYPAL')";
	echo $insertOrderSQL;
	mysqli_query($mysqli_conn, $insertOrderSQL) or die("database error:". mysqli_error($mysqli_conn));
	$order_id = mysqli_insert_id($mysqli_conn);
	//Esto se ha añadido por Salim para crear un paypal sin IPN y se ha generado datos
	$_SESSION["orderId"] = $order_id;
	$_SESSION["orderNumber"] = "45300996_" . $order_id;
}


if($order_id) {
	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) {
		foreach($_SESSION["products"] as $product){
		$insertOrderItem = "INSERT INTO shop_order_item(order_id, product_id, item_price, quantity)VALUES('".$order_id."', '".$product["product_code"]."', '". $product["product_price"]."', '".$product["product_qty"]."')";
		mysqli_query($mysqli_conn, $insertOrderItem) or die("database error:". mysqli_error($mysqli_conn));
		}
	}
}
?>

<form class="form-horizontal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
	<input type='hidden' name='business' value='salimtm_business_sandbox@gmail.com'>
	<input type='hidden' name='item_name' value='<?php echo $_SESSION["products"]; ?>'>
	<input type='hidden' name='item_number' value="<?php echo $order_id; ?>">
	<input type='hidden' name='amount' value='<?php echo $_SESSION["payableAmount"]; ?>'>
	<input type='hidden' name='currency_code' value='EUR'>
	<input type='hidden' name='cancel_return' value='http://localhost/paypal/cancel.php'>
	<input type='hidden' name='return' value='http://localhost/paypal/success.php'>
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="order" value="<?php echo $_SESSION["orderNumber"]; ?>">
	<br>
	<div class="form-group">
		<div class="col-sm-2">
			<input type="submit" class="btn btn-lg btn-block btn-danger" name="continue_payment" value="Pay Now">
		</div>
	</div>
</form>