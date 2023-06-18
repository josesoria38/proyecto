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
        <a class="nav-link" href="mapa.php">mapaMesas <span class="sr-only">(actual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">administracion</a>
      </li>
      
    </ul>
    
  </div>
</nav>

<img src="img/mapa.png" class="img">
<form class="formulario" id="formulario" name="formulario">	
							<input type="hidden" name="" id="taskId">
							<fieldset>
								<div class="formularioS" id="grupo__nombre">
									<label>Nombre</label><br>
									<div class="formularioS-input">
										<input type="text" class="formulario__input" id="nombre" name="nombre"><br>
									</div>
									<p class="formulario__input-mal">mal, no esta permitido el uso de numeros</p>
								</div>
		
								<div class="formularioS" id="grupo__apellido">
									<label for="">Apellido</label><br>
									<div class="formularioS-input">
											<input type="text" class="formulario__input" id="apellido" name="apellido"><br>
									</div>
									<p class="formulario__input-mal">mal, no esta permitido el uso de numeros</p>
								</div>
		
								<div class="formularioS" id="grupo__mesa">
									<label for="">mesa</label><br>
									<div class="formularioS-input">
										<input type="number" class="formulario__input" id="mesa" name="mesa"><br>
									</div>
									<p class="formulario__input-mal">mal, mesa incorrecta</p>
								</div>
		
								<div class="formularioS" id="grupo__fecha">
									<label for="">fecha</label><br>
									<div class="formularioS-input">
											<input type="number" class="formulario__input" id="fecha"name="fecha"><br>
									</div>
									<p class="formulario__input-mal">la fecha es incorrecta</p>									
								</div>
							</fieldset>
							<hr>
							<hr>
							<label for="">observaciones</label><br>
							<textarea class="observacion" rows="3" cols="41" maxlength="200" name="observaciones" id="observaciones" name="observaciones">
							</textarea>
							<div id="contador">0/200</div>
							<br>
							<button type="submit" class="btn btn-primary btn-block bg-warning text-center">
								Guardar
							</button>
						</form>
					</div>
				</div>
				<div class="separacion"></div>
</form>					
<script type="text/javascript" src="js/mapa.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous">
</script>

</body>
</html>