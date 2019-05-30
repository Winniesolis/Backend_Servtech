SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS servtech_v2;

USE servtech_v2;

DROP TABLE IF EXISTS contacto;

CREATE TABLE `contacto` (
  `idcontacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreC` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoC` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idcontacto`),
  KEY `idestado` (`idestado`),
  CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS departamento;

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDP` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipoDP` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`iddepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO departamento VALUES("1","RHH","Administracion");
INSERT INTO departamento VALUES("2","Contabilidad","Finanzas");
INSERT INTO departamento VALUES("3","Servicios digitales","informatica");



DROP TABLE IF EXISTS detalleventa;

CREATE TABLE `detalleventa` (
  `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `idventa` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  PRIMARY KEY (`iddetalleventa`),
  KEY `idproducto` (`idproducto`,`idventa`,`idservicio`),
  KEY `idservicio` (`idservicio`),
  KEY `idventa` (`idventa`),
  CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`idservicio`),
  CONSTRAINT `detalleventa_ibfk_3` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS empleado;

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idempleado`),
  KEY `idpersona` (`idpersona`,`iddepartamento`),
  KEY `iddepartamento` (`iddepartamento`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO empleado VALUES("2","1","1");
INSERT INTO empleado VALUES("3","2","2");
INSERT INTO empleado VALUES("6","2","2");
INSERT INTO empleado VALUES("4","9","2");
INSERT INTO empleado VALUES("5","10","1");
INSERT INTO empleado VALUES("7","10","2");



DROP TABLE IF EXISTS estado;

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreES` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO estado VALUES("1","Aguascalientes");
INSERT INTO estado VALUES("2","Baja California");
INSERT INTO estado VALUES("3","Baja California Sur");
INSERT INTO estado VALUES("4","Campeche");
INSERT INTO estado VALUES("5","Coahuila de Zaragoza");
INSERT INTO estado VALUES("6","Colima");
INSERT INTO estado VALUES("7","Chihuahua");
INSERT INTO estado VALUES("8","Distrito Federal");
INSERT INTO estado VALUES("9","Durango");
INSERT INTO estado VALUES("10","Guanajuato");
INSERT INTO estado VALUES("11","Guerrero");
INSERT INTO estado VALUES("12","Hidalgo");
INSERT INTO estado VALUES("13","Jalisco");
INSERT INTO estado VALUES("14","México");
INSERT INTO estado VALUES("15","Michoacán de Ocampo");
INSERT INTO estado VALUES("16","Morelos");
INSERT INTO estado VALUES("17","Nayarit");
INSERT INTO estado VALUES("18","Nuevo León");
INSERT INTO estado VALUES("19","Oaxaca de Juárez");
INSERT INTO estado VALUES("20","Puebla");
INSERT INTO estado VALUES("21","Querétaro");
INSERT INTO estado VALUES("22","Quintana Roo");
INSERT INTO estado VALUES("23","San Luis Potosí");
INSERT INTO estado VALUES("24","Sinaloa");
INSERT INTO estado VALUES("25","Sonora");
INSERT INTO estado VALUES("26","Tabasco");
INSERT INTO estado VALUES("27","Tamaulipas");
INSERT INTO estado VALUES("28","Tlaxcala");
INSERT INTO estado VALUES("29","Veracruz de Ignacio de la Llav");
INSERT INTO estado VALUES("30","Yucatán");
INSERT INTO estado VALUES("31","Zacatecas");



DROP TABLE IF EXISTS factura;

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `nombreF` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `RFC` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoF` int(11) DEFAULT NULL,
  `correoF` int(11) NOT NULL,
  `direccionF` int(11) NOT NULL,
  PRIMARY KEY (`idfactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS galeria;

CREATE TABLE `galeria` (
  `idgaleria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreG` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idgaleria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS persona;

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idpersona`),
  KEY `idsucursal` (`idsucursal`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`idsucursal`) REFERENCES `sucursal` (`idsucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO persona VALUES("1","winnie","solis","winnie@hotmail.com","2147483647","1");
INSERT INTO persona VALUES("2","Adriel","Mendiburu","Adriel97","2147483647","1");
INSERT INTO persona VALUES("3","winnieprueb","solis","winniÃ±e@hotmail.com","1234567891","4");
INSERT INTO persona VALUES("4","winnieprueba2","solis2","winniÃ±e@hotmail.com","2333232","4");
INSERT INTO persona VALUES("5","winnieprueba2","solis2","winniÃ±e@hotmail.com","2333232","4");
INSERT INTO persona VALUES("6","prueba1","pruebita","pruebit@hotmail.com","223323","4");
INSERT INTO persona VALUES("7","winnieprueba3","solis2","eferferfer","343344334","1");
INSERT INTO persona VALUES("8","Prueba4","solis","winniÃ±e@hotmail.com","233223","4");
INSERT INTO persona VALUES("9","miguel","gomez","miguel@hotmail.com","99956525","4");
INSERT INTO persona VALUES("10","miguelito","crespo","crespo@hotmail.com","651514","4");
INSERT INTO persona VALUES("11","secwsdf","scsfd","dfsdf","2323","4");
INSERT INTO persona VALUES("12","weewf","wefwef","wef","0","4");
INSERT INTO persona VALUES("13","fewf","wef","wef","0","4");
INSERT INTO persona VALUES("14","prb1","erfr","erf","0","4");
INSERT INTO persona VALUES("15","prb1","erfr","erf","0","4");
INSERT INTO persona VALUES("16","11111","sef","sef","0","4");
INSERT INTO persona VALUES("17","123","fvfdv","fvdf","0","4");
INSERT INTO persona VALUES("18","12345","vdfg","fdgdg","0","1");
INSERT INTO persona VALUES("19","jesus","sdfsdf","dsf","0","4");
INSERT INTO persona VALUES("20","Pruebin44","dsdfsd","sdfsdf","0","4");



DROP TABLE IF EXISTS producto;

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePD` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionPD` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precioPD` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idgaleria` int(11) NOT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `idproveedor` (`idproveedor`,`idgaleria`),
  KEY `idgaleria` (`idgaleria`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`),
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idgaleria`) REFERENCES `galeria` (`idgaleria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS proveedor;

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePV` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoPV` int(11) NOT NULL,
  `correoPV` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `RFCPV` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direcionPV` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idproveedor`),
  KEY `idestado` (`idestado`),
  CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO proveedor VALUES("1","$sdcsd","0","$dcsddc","$eweew","$weewded","1");
INSERT INTO proveedor VALUES("2","julio12","33232","ee3ewew","wewewe","wedde","9");
INSERT INTO proveedor VALUES("3","winnie","0","dscds","sdccd","sdcsd","10");



DROP TABLE IF EXISTS servicio;

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `idtiposervicio` int(11) NOT NULL,
  `nombreSV` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionSV` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idempleado` int(11) NOT NULL,
  PRIMARY KEY (`idservicio`),
  KEY `idtiposervicio` (`idtiposervicio`,`idempleado`),
  KEY `idempleado` (`idempleado`),
  CONSTRAINT `serv-empleado` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`),
  CONSTRAINT `serv-tiposerv` FOREIGN KEY (`idtiposervicio`) REFERENCES `tiposervicio` (`idtiposervicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO servicio VALUES("1","3","pruebaserv","prueba descrip","3");
INSERT INTO servicio VALUES("2","3","Desarrollo php","descripcion","3");
INSERT INTO servicio VALUES("3","2","Capacitacion RHH","wedwedew","5");
INSERT INTO servicio VALUES("4","4","Asesoria php","dwedwed","2");



DROP TABLE IF EXISTS sucursal;

CREATE TABLE `sucursal` (
  `idsucursal` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSC` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccionSC` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoSC` int(11) NOT NULL,
  `codigopostalSC` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idsucursal`),
  KEY `idestado` (`idestado`),
  CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO sucursal VALUES("1","Yucatan","sdfsdf","992642100","99565","1");
INSERT INTO sucursal VALUES("4","Campeche","cjnsdn","85778","652256","2");
INSERT INTO sucursal VALUES("5","ssd","sdfsdfdsf","232333","233232","1");
INSERT INTO sucursal VALUES("6","suc-sinaloa","dfvfgf","34343","343443","7");
INSERT INTO sucursal VALUES("7","suc-nuevo leon","erferf","343443","3443433","20");



DROP TABLE IF EXISTS tiposervicio;

CREATE TABLE `tiposervicio` (
  `idtiposervicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTS` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtiposervicio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tiposervicio VALUES("1","Capacitacion");
INSERT INTO tiposervicio VALUES("2","Capacitacion");
INSERT INTO tiposervicio VALUES("3","Desarrollo");
INSERT INTO tiposervicio VALUES("4","Asesoría");
INSERT INTO tiposervicio VALUES("5","consulto info");
INSERT INTO tiposervicio VALUES("6","servicito");
INSERT INTO tiposervicio VALUES("7","pribuanto12");



DROP TABLE IF EXISTS tipousuario;

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTU` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tipousuario VALUES("1","Administrador");
INSERT INTO tipousuario VALUES("2","Invitado");
INSERT INTO tipousuario VALUES("3","AllAdmin");
INSERT INTO tipousuario VALUES("4","edewed");
INSERT INTO tipousuario VALUES("5","wwqwq21212121");
INSERT INTO tipousuario VALUES("6","pruebintin");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `contrase` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `idpersona` (`idpersona`,`idtipousuario`),
  KEY `idtipousuario` (`idtipousuario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO usuario VALUES("1","1","0","1");
INSERT INTO usuario VALUES("2","2","12345","1");
INSERT INTO usuario VALUES("3","18","12345","1");
INSERT INTO usuario VALUES("4","19","sdf","2");
INSERT INTO usuario VALUES("5","20","sdfsdsdf","2");



DROP TABLE IF EXISTS usuariolog;

CREATE TABLE `usuariolog` (
  `idusuarioLog` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `nickName` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuarioLog`),
  KEY `idpersona` (`idpersona`),
  KEY `idtipousuario` (`idtipousuario`),
  CONSTRAINT `idpersn` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  CONSTRAINT `idtipous` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO usuariolog VALUES("1","7","Winnie_97","123456","3");
INSERT INTO usuariolog VALUES("2","13","Julio","123456","3");
INSERT INTO usuariolog VALUES("3","6","Winnikie_97","1234567","2");
INSERT INTO usuariolog VALUES("4","6","Winnikie_97","1234567","2");
INSERT INTO usuariolog VALUES("5","18","winnie","123","2");



DROP TABLE IF EXISTS venta;

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `idfactura` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `totalVN` int(11) NOT NULL,
  PRIMARY KEY (`idventa`),
  KEY `idfactura` (`idfactura`,`idusuario`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idfactura`) REFERENCES `factura` (`idfactura`),
  CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




SET FOREIGN_KEY_CHECKS=1;