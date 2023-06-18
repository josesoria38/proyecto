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
      <li class="nav-item active navbar-right">
        <a class="nav-link" href="index.php">Principal <span class="sr-only">(actual)</span></a>
      </li>
      <li class="nav-item navbar-right">
        <a class="nav-link" href="sesion.php">inicioSesion/Registro</a>
      </li>
      <li class="nav-item navbar-right">
        <a class="nav-link" href="mapa.php">mapaMesas</a>
      </li>
      <li class="nav-item navbar-right">
        <a class="nav-link" href="admin.php">administracion</a>
      </li>
      
    </ul>
    
  </div>
</nav>
<div class="row">
  <div class="col-md-12" id="task-result">
    <div class="separacion"></div>
    <div>
      <li id="products-wrp"></li>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javaScript" src="js/index.js"></script>
</body>
</html>
