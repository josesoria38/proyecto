<?php

    class Producto {
        // Connection
        private $conn;

        // Table
        private $db_table = "shop_products";

        // Columns
        public $id;
        public $product_name;
        public $product_desc;
        public $product_code;
        public $product_image;
        public $product_price;

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

        // Get employee
        public function getSingleProduct() {
            $sqlQuery = "SELECT * FROM " . $this->db_table . "
                        WHERE id = ? 
                        LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->product_name = $dataRow['product_name'];
            $this->product_desc = $dataRow['product_desc'];
            $this->product_code = $dataRow['product_code'];
            $this->product_image = $dataRow['product_image'];
            $this->product_price = $dataRow['product_price'];

        }

        // Create
        public function createProduct() {
            $sqlQuery = "INSERT INTO " . $this->db_table . " SET 
                product_name = :product_name, 
                product_desc = :product_desc, 
                product_code = :product_code, 
                product_image = :product_image, 
                product_price = :product_price 
                ";
            $stmt = $this->conn->prepare($sqlQuery);

            // Sanitize
            $this->product_name = htmlspecialchars(strip_tags($this->product_name));
            $this->product_desc = htmlspecialchars(strip_tags($this->product_desc));
            $this->product_code = htmlspecialchars(strip_tags($this->product_code));
            $this->product_image = htmlspecialchars(strip_tags($this->product_image));
            $this->product_price = htmlspecialchars(strip_tags($this->product_price));

            // Bind data
            $stmt->bindParam(":product_name", $this->product_name);
            $stmt->bindParam(":product_desc", $this->product_desc);
            $stmt->bindParam(":product_code", $this->product_code);
            $stmt->bindParam(":product_image", $this->product_image);
            $stmt->bindParam(":product_price", $this->product_price);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Update
        public function updateProduct() {
            $sqlQuery = "UPDATE " . $this->db_table . " SET 
                product_name = :product_name, 
                product_desc = :product_desc, 
                product_code = :product_code, 
                product_image = :product_image, 
                product_price = :product_price 
                    WHERE 
                id = :id
                ";
            $stmt = $this->conn->prepare($sqlQuery);

            // Sanitize
            $this->product_name = htmlspecialchars(strip_tags($this->product_name));
            $this->product_desc = htmlspecialchars(strip_tags($this->product_desc));
            $this->product_code = htmlspecialchars(strip_tags($this->product_code));
            $this->product_image = htmlspecialchars(strip_tags($this->product_image));
            $this->product_price = htmlspecialchars(strip_tags($this->product_price));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Bind data
            $stmt->bindParam(":product_name", $this->product_name);
            $stmt->bindParam(":product_desc", $this->product_desc);
            $stmt->bindParam(":product_code", $this->product_code);
            $stmt->bindParam(":product_image", $this->product_image);
            $stmt->bindParam(":product_price", $this->product_price);
            $stmt->bindParam(":id", $this->id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Delete employee
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