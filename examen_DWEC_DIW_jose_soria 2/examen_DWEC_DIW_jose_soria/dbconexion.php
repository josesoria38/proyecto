
<?php

$connection = mysqli_connect(
  'localhost', 'app', '543210', 'prueba'
);

// for testing connection
#if($connection) {
#  echo 'database is connected';
#}

?>
