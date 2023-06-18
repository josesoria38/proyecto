<?php
	session_start(); //start session
	include("config/database.php"); //include config file
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Carrito de Compra en Ajax</title>
	<link href="style/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

		
	</head>
	<body>
	<div align="center">
	<h3>Gestión de Stock en Ajax</h3>
    </div>
        <h4>Crear nuevo productos</h4>
        <hr>
		<ul id="create">
			<li>
				<div><img src="images/tshirt-1.jpg" width="80px"></div>
                <div>Produto ID: <input name="product_code" id="crear_codigo" value=""></div><br>
				<div>Producto: <input type="text" id="crear_titulo" value=""/></div>
                <div>Descripición: <input type="text" id="crear_descripcion" value="" size="100"/></div>
				<div>Precio : <input type="text" id="crear_precio" value="" size="6"> &euro;</div>
				<br>
                <button id="crear">Registrar nuevo producto</button>		
			</li>	
		</ul>
    </div>

	</div>
        <h4>Listado de productos</h4>
        <hr>
		<ul id="list_edit"></ul>     
    </div>



	<script type="text/javascript" src="js/javaadmin.js"></script>
	</body>
</html>


