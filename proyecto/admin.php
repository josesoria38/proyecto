<?php
    session_start(); //start session
	include("config/database.php");; //include config file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">
<img src="img/logoBien.jpeg" alt="Logo" width="60" height="40" class="d-inline-block align-text-top">
</a>
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Principal </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sesion.php">inicioSesion/Registro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mapa.php">mapaMesas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">administracion <span class="sr-only">(actual)</span></a>
      </li>
      
    </ul>
    
  </div>
</nav>
<div align="center">
	<h3>Gestión de productos en carta</h3>
    </div>
      <h4>Crear nuevo productos</h4>
      <hr>
		  <ul id="create">
			  <li>
          <div>nombre: <input name="nombre" id="nombre" value=""></div><br>
				  <div>tipo: <input type="text" id="tipo" value=""/></div>
          <div>precio: <input type="text" id="precio" value="" size="20"/> &euro;</div>
				  <div>imagen : <input type="text" id="crear_imagen" value="" size="6"></div>
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
<script src="js/admin.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>
  
</body>
</html>