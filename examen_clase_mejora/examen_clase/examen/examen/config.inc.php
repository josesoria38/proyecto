<?php
$db_username        = 'app'; //MySql database username root
$db_password        = '543210'; //MySql dataabse password Admin1$-
$db_name            = 'carrito_paypal'; //MySql database name
$db_host            = 'localhost'; //MySql hostname or IP

$currency	    = '&euro; '; //currency symbol
$shipping_cost	    = 1.50; //shipping cost
$taxes		    = array( //List your Taxes percent here.
			'IVA' => 12, 
			'Impuestos sobre Servicios' => 5,
			'Otros Servicios' => 10
		           );

$mysqli_conn = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
if ($mysqli_conn->connect_error) {//Output any connection error
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}


//aqui tieness que coger la carpeta del config y ahi te pones a quitarlo todo
//y la parte del attay y demas se copia 