<?php

  include('dbconexion.php');

  $query = "SELECT * FROM examen";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Query fallido'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'nombre' => $row['nombre'],
      'apellido' => $row['apellido'],
      'telefono' => $row['telefono'],
      'movil' => $row['movil'],
      'email' => $row['email'],
      'email2' => $row['email2'],
      'observaciones' => $row['observaciones'],
      'id' => $row['id']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
