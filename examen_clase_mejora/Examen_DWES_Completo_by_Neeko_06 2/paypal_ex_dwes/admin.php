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
		<ul id="lista_crear">
			<li>
				<div><img src="images/tshirt-1.jpg" width="80px"></div>
                <div>Produto ID: <input name="product_code" value="" id="create_codigo"/></div>
				<div>Producto: <input type="text" value="" id="create_titulo"/></div>
                <div>Descripición: <input type="text" value="" size="100" id="create_descripcion"/></div>
				<div>Precio : <input type="text" value="" size="6" id="create_precio"> &euro;</div>
				<br>
                <button id="create">Registrar nuevo producto</button>		
			</li>	
		</ul>
    </div>


	</div>
        <h4>Listado de productos</h4>
        <hr>
		<ul id="lista_editar">

		</ul>
        
    </div>


	<script src="js/javaAdmin.js"></script>
	</body>
</html>


