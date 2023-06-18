<?php

  include('config/database.php');

if(isset($_POST['nombre'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $telefono = $_POST['telefono'];
  $dni = $_POST['dni'];
  $email = $_POST['email'];

  $query = "INSERT into usuario (nombre, apellido, telefono, dni, email) VALUES ('$nombre', '$apellido', '$telefono', '$dni', '$email')";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query fallido.');
  }

  echo "datos añadidos con exito";

}

?>
