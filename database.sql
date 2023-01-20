CREATE DATABASE `twitter_clone`CHARACTER SET utf8 COLLATE utf8_unicode_ci; 

CREATE TABLE `twitter_clone`.`usuarios` ( 
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `usuario` VARCHAR(50) NOT NULL, 
    `email` VARCHAR(100) NOT NULL, 
    `senha` VARCHAR(32) NOT NULL, 
    PRIMARY KEY (`id`) 
); 

CREATE TABLE `twitter_clone`.`tweet` ( 
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `id_usuario` INT(11) NOT NULL, 
    `tweet` VARCHAR(140) NOT NULL, 
    `data_inclusao` DATETIME DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`id`) 
); 

CREATE TABLE `twitter_clone`.`usuarios_seguidores` ( 
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `id_usuario` INT(11) NOT NULL, 
    `id_usuario_seguindo` INT(11) NOT NULL, 
    `data_registro` DATETIME DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`) 
); 

