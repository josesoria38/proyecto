<?php

    class Producto {
        // Connection
        private $conn;

        // Table
        private $db_table = "productos";

        // Columns
        public $id;
        public $nombre;
        public $tipo;
        public $precio;
        public $imagen;


        // DB Connection
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get all
        public function getProduct() {
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // obtener
        public function getSingleProduct() {
            $sqlQuery = "SELECT * FROM " . $this->db_table . "
                        WHERE id = ? 
                        LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->nombre = $dataRow['nombre'];
            $this->tipo = $dataRow['tipo'];
            $this->precio = $dataRow['precio'];
            $this->imagen = $dataRow['imagen'];


        }

        // crear
        public function createProduct() {
            $sqlQuery = "INSERT INTO " . $this->db_table . " SET 
                nombre = :nombre, 
                tipo = :tipo, 
                precio = :precio, 
                imagen = :imagen
                ";
            $stmt = $this->conn->prepare($sqlQuery);

            // Sanitize
            $this->nombre = htmlspecialchars(strip_tags($this->nombre));
            $this->tipo = htmlspecialchars(strip_tags($this->tipo));
            $this->precio = htmlspecialchars(strip_tags($this->precio));
            $this->imagen = htmlspecialchars(strip_tags($this->imagen));


            // Bind data
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":tipo", $this->tipo);
            $stmt->bindParam(":precio", $this->precio);
            $stmt->bindParam(":imagen", $this->imagen);


            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // editar
        public function updateProduct() {
            $sqlQuery = "UPDATE " . $this->db_table . " SET 
                nombre = :nombre, 
                tipo = :tipo, 
                precio = :precio, 
                imagen = :imagen
                    WHERE 
                id = :id
                ";
            $stmt = $this->conn->prepare($sqlQuery);

            // Sanitize
            $this->nombre = htmlspecialchars(strip_tags($this->nombre));
            $this->tipo = htmlspecialchars(strip_tags($this->tipo));
            $this->precio = htmlspecialchars(strip_tags($this->precio));
            $this->imagen = htmlspecialchars(strip_tags($this->imagen));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Bind data
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":tipo", $this->tipo);
            $stmt->bindParam(":precio", $this->precio);
            $stmt->bindParam(":imagen", $this->imagen);
            $stmt->bindParam(":id", $this->id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //borrar producto
        public function deleteProduct() {
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }














    }
    

?>