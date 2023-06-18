<?php

  include('config/database.php');

if(isset($_POST['nombre'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $mesa = $_POST['mesa'];
  $fecha = $_POST['fecha'];
  $observaciones = $_POST['observaciones'];

  $query = "INSERT into reservas (nombre, apellido, mesa, fecha, observaciones) VALUES ('$nombre', '$apellido', '$mesa', '$fecha', '$observaciones')";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query fallido.');
  }

  echo "datos añadidos con exito";

}

?>