<?php

  include('config/database.php');

  $query = "SELECT * FROM productos";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Query fallido'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'nombre' => $row['nombre'],
      'tipo' => $row['tipo'],
      'precio' => $row['precio'],
      'imagen' => $row['imagen'],
      'id' => $row['id']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
