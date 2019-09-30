DROP TABLE IF EXISTS `users`; 
CREATE TABLE IF NOT EXISTS `users` 
( `id` int(6) NOT NULL AUTO_INCREMENT, `username` varchar(50) NOT NULL, `passwd` varchar(100) NOT NULL, `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`) )