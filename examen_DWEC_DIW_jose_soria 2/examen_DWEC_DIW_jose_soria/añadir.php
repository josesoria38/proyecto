<?php

  include('dbconexion.php');

if(isset($_POST['nombre'])) {
  $datos_nombre = $_POST['nombre'];
  $datos_apellido = $_POST['apellido'];
  $datos_telefono = $_POST['telefono'];
  $datos_movil = $_POST['movil'];
  $datos_email = $_POST['email'];
  $datos_email2 = $_POST['email2'];
  $datos_observaciones = $_POST['observaciones'];

  $query = "INSERT into examen (nombre, apellido, telefono, movil, email, email2, observaciones) VALUES ('$datos_nombre', '$datos_apellido', '$datos_telefono', '$datos_movil', '$datos_email', '$datos_email2', '$datos_observaciones')";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query fallido.');
  }

  echo "datos añadidos con exito";

}

?>
