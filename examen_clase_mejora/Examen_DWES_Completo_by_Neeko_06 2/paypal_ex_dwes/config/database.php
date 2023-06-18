<?php

$currency	    = '&euro; '; //currency symbol
$shipping_cost	    = 1.50; //shipping cost
$taxes		    = array( //List your Taxes percent here.
			'IVA' => 12, 
			'Impuestos sobre Servicios' => 5,
			'Otros Servicios' => 10
);

    class Database{
        private $host = "localhost";
        private $database_name = "carrito_paypal";
        private $username = "app";
        private $password = "543210";

        public $conn;

        public function getConnection() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=".$this->host.
                                        ";dbname=".$this->database_name,
                                        $this->username, $this->password);
                $this->conn->exec("set names utf8");
            } catch (PDOException $ex) {
                echo "Database couldn't be connected: " . $ex->getMessage();
            }

            return $this->conn;
        }
    };

?>