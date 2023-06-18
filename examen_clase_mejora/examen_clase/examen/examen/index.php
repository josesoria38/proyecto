<?php
	session_start(); //start session
	include("config/database.php");; //include config file
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Carrito de Compra en Ajax</title>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<link href="style/style.css" rel="stylesheet" type="text/css">
	
	</head>
	<body>
	<div align="center">
		<h3>Carrito de compra en Ajax</h3>
	</div>

	<a href="#" class="cart-box" id="cart-info" title="Ver Carrito">
		<?php 
		if(isset($_SESSION["products"])){
			echo count($_SESSION["products"]); 
		}else{
			echo 0; 
		}
		?>
	</a>

	<div class="shopping-cart-box">
		<a href="#" class="close-shopping-cart-box" >Close</a>
		<h3>Tu carrito de compra</h3>
		<div id="shopping-cart-results">
		</div>
	</div>

	<ul class="products-wrp" id="products-wrp"></ul>



	
	<script type="text/javascript" src="js/javaindex.js" >
	</script>
	<script type="text/javascript" src="js/examen.js" >
	</script>
	</body>
</html>
