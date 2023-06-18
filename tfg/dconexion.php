<?php

$connection = mysqli_connect(
  'localhost', 'app', '543210', 'proyecto'
);

// for testing connection
#if($connection) {
#  echo 'database is connected';
#}

?>
