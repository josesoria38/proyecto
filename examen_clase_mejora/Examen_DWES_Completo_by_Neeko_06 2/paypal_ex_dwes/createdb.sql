-- SALIM: Para evitar que los tildes y eñes fallen en PHP
-- SALIM: Además hay ue añadir este instrucción antes de recuperar datos: $acentos = $mysqli_conn->query("SET NAMES 'utf8'");
-- SALIM: Además el archivo php añadir: <html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
--
-- Base de datos: `carrito_paypal`
--
CREATE DATABASE IF NOT EXISTS `carrito_paypal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `carrito_paypal`;

-- --------------------------------------------------------

--
-- La información de nuestros productos se almacenarán dentro de la tabla shop_products.
--

CREATE TABLE `shop_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` text NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_image` varchar(60)NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
   PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Volcado de datos para la tabla `shop_products`
--

INSERT INTO `shop_products` (`id`, `product_name`, `product_desc`, `product_code`, `product_image`, `product_price`) VALUES
(1, 'Cool T-shirt', 'Cool T-shirt, Cotton Fabric. Lavar en agua normal con detergente suave', 'TSH1', 'tshirt-1.jpg', '8.50'),
(2, 'Camiseta HBD', 'Camiseta estampada Cool Happy Birthday. Confeccionada en algodón ligero y transpirable', 'TSH2', 'tshirt-2.jpg', '7.40'),
(3, 'Survival of Fittest', 'La camiseta amarilla es el complemento perfecto para tu guardarropa informal', 'TSH3', 'tshirt-3.jpg', '9.50'),
(4, 'Love Hate T-shirt', 'Elegante y moderna, esta camiseta de manga corta con cuello redondo está hecha con 100% algodón puro', 'TSH4', 'tshirt-4.jpg', '10.80');



-- La información de los pedidos se almacenarán en la tabla shop_order.

CREATE TABLE `shop_order` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`member_id` int(11) NOT NULL,
`name` varchar(100) NOT NULL,
`address` varchar(100) NOT NULL,
`mobile` int(11) NOT NULL,
`email` varchar(100) NOT NULL,
`order_status` varchar(255) NOT NULL,
`order_at` datetime NOT NULL,
`payment_type` varchar(255) NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Las líneas de cada pedido se almacenarán en la tabla shop_order_item.

CREATE TABLE `shop_order_item` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`order_id` int(11) NOT NULL,
`product_id` varchar(255) NOT NULL,
`item_price` double NOT NULL,
`quantity` int(11) NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


-- Y la información relacionada con los pagos se almacenarán en la tabla shop_payment.

CREATE TABLE `shop_payment` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`order_id` int(11) NOT NULL,
`payment_status` varchar(255) NOT NULL,
`payment_response` text NOT NULL,
`create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
