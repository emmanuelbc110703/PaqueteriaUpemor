

DROP TABLE IF EXISTS `usuario`;


CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `app` varchar(255) NOT NULL,
  `apm` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `correo` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuario VALUES("16","Jose Luis","Bravo","Flores","1984-11-23","bcjo22@Gmail.com","7771231234","1234","41");
INSERT INTO usuario VALUES("17","Micaela","Campos","Ramirez","1974-08-24","micaela@gmail.com","7772916775","1234","51");
INSERT INTO usuario VALUES("18","Honoria","Campos ","Campos","2025-11-23","honoria@gmail","777345678","2345","47");



