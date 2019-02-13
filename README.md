# Pagina_BD
Repo para aprender de PHP + Mysql

Requerimientos:

PHP 5.6+
Mysql 5+
Apache o Nginx

Instrucciones:

Renombrar 'credentials-example.json' a 'credentials.json' y poner ahí tus datos de conexión a Mysql

Estructura de tabla 'productos':

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) DEFAULT NULL,
  `precio` float(7,2) DEFAULT NULL,
  `unidades` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;