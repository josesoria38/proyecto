<?php
session_start(); //start session
setlocale(LC_MONETARY,"es_ES");
var_dump($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Customer Shipping Details</h2>
	<div class="col-md-8">
	<form class="form-horizontal" method="post" enctype="multipart/form-data" action="payment.php">
		<div class="form-group">
			<div class="col-sm-6">
			<input type="text" class="form-control" placeholder="First Name" name="firstName" required />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
			<input type="text" class="form-control" placeholder="Last Name" name="lastName" required />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
			<textarea class="form-control" rows="5" placeholder="Address" name="address" required ></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-8">
			<input type="number" class="form-control" min="9" placeholder="Contact number" name="contactNumber" required />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
			<input type="email" class="form-control" placeholder="Email" name="emailAddress" required />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4">
			<input class="btn btn-primary" type="submit" name="proceedPayment" value="Proceed to payment"/>
			</div>
		</div>
	</form>
	</div>

</body>
</html>