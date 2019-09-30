DROP TABLE IF EXISTS `products`; 
CREATE TABLE IF NOT EXISTS `products` 
( 
`id` int(16) NOT NULL AUTO_INCREMENT, 
`product_code` varchar(100) NOT NULL, 
`name` varchar(60) NOT NULL, 
`price` varchar(16) NOT NULL, 
`category` varchar(50) NOT NULL,
 `description` longtext NOT NULL, 
 `picture` varchar(250) NOT NULL, 
 `stock` int(6) NOT NULL, 
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`)
)