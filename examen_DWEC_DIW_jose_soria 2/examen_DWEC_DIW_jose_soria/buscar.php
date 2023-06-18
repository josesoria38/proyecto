<?php

include('dbconexion.php');

$search = $_POST['search'];
if(!empty($search)) {
  $query = "SELECT * FROM examen WHERE apellido LIKE '$search%'";
  $result = mysqli_query($connection, $query);

  if(!$result) {
    die('Query Error' . mysqli_error($connection));
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
}

?>
