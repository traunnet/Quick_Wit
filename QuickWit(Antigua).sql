CREATE DATABASE QUICKWIT; -- Creación de la base de datos
USE QUICKWIT; -- Dar uso de la base de datos

/*_____________________________________________________________________________________________________________________________________________________________*/

-- Tabla Rol
CREATE TABLE Rol (
    idRol INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    descripcionRol VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- Tabla Usuario
CREATE TABLE Usuario (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    tipoDocUsuario VARCHAR(6) NOT NULL,
    numDocUsuario VARCHAR(15) NOT NULL,
    nombreUsuario VARCHAR(40) NOT NULL,
    apellidosUsuario VARCHAR(40) NOT NULL,
    direccionUsuario VARCHAR(40) NOT NULL,
    telefonoUsuario VARCHAR(12) NOT NULL,
    correoUsuario VARCHAR(40) NOT NULL,
    claveUsuario VARCHAR(20) NOT NULL,
    fotoUsuario VARCHAR(255),
    estadoUsuario VARCHAR(20) NOT NULL,
    idRol INT NOT NULL,
    CONSTRAINT fk_usuario_rol FOREIGN KEY (idRol) REFERENCES Rol(idRol) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla Domicilio
CREATE TABLE Domicilio (
    idDomicilio INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    horaDomicilio TIME(6) NOT NULL,
    estadoDomicilio VARCHAR(6) NOT NULL,
    idUsuario INT NOT NULL,
    CONSTRAINT fk_domicilio_usuario FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla Producto 
CREATE TABLE Producto (
    idProducto INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombreProducto VARCHAR(100) NOT NULL,
    descripcionProducto VARCHAR(255) NOT NULL,
    valorUnitarioProducto DOUBLE NOT NULL,
    estadoProducto VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

-- Tabla Pedido
CREATE TABLE Pedido (
    idPedido INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    fechaPedido DATETIME NOT NULL,
    cantidadPedido VARCHAR(100) NOT NULL,
    valorUnitarioPedido DOUBLE NOT NULL,
    estadoPedido VARCHAR(50) NOT NULL,
    idUsuario INT NOT NULL,
    idDomicilio INT NOT NULL,
    idProducto INT NOT NULL,
    CONSTRAINT fk_pedido_usuario FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)  ON DELETE CASCADE,
    CONSTRAINT fk_pedido_domicilio FOREIGN KEY (idDomicilio) REFERENCES Domicilio(idDomicilio)  ON DELETE CASCADE,
    CONSTRAINT fk_pedido_producto FOREIGN KEY (idProducto) REFERENCES Producto(idProducto)  ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla Venta 
CREATE TABLE Venta (
    idVenta INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    ImgProducto VARCHAR(255),
    descripcionProducto VARCHAR(100) NOT NULL,
    valorUnitarioProducto DOUBLE NOT NULL,
    estadoProducto VARCHAR(50) NOT NULL,
    idProducto INT NOT NULL,
    CONSTRAINT fk_venta_producto FOREIGN KEY (idProducto) REFERENCES Producto(idProducto)  ON DELETE CASCADE
) ENGINE=InnoDB;

/*_____________________________________________________________________________________________________________________________________________________________*/

/* Inserción de roles */
INSERT INTO Rol (idRol, descripcionRol) VALUES (1, 'Administrador');
INSERT INTO Rol (idRol, descripcionRol) VALUES (2, 'Cliente');

/* Inserción de usuarios */
INSERT INTO Usuario (idUsuario, tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, direccionUsuario, telefonoUsuario, correoUsuario, claveUsuario, fotoUsuario, estadoUsuario, idRol) 
VALUES 
(1, 'C.C', '1031648256', 'Abraham', 'Boada Suarez', 'calle 13 Este #66-15 Sur', '3134142106', 'abrahamboada95@gmail.com', 'abraham12345', '', 'Activo', 2),
(2, 'T.I', '1028863995', 'Juan', 'Hernadez Cadenas', 'calle 14 Este #65-14 Sur', '3222569322', 'juanpablo028w@gmail.com', 'juancho123', '', 'Activo', 2),
(3, 'C.C', '1045454554', 'Esteban', 'Giraldo Montez', 'calle 14 Este #66-15 Sur', '3112657854', 'esteban@gmail.com', 'esteban123', '', 'Activo', 1),
(4, 'T.I', '2123455678', 'Maria', 'Fernandez Ochoa', 'calle 14 Este #65-14 Sur', '3245893221', 'maria@gmail.com', 'maria123', '', 'Inactivo', 1);

/* Inserción de domicilios */
INSERT INTO Domicilio (idDomicilio, horaDomicilio, estadoDomicilio, idUsuario) 
VALUES 
(1, '12:23:12', 'Activo', 1),
(2, '01:11:12', 'Inactivo', 2),
(3, '09:23:12', 'Activo', 3),
(4, '11:01:12', 'Activo', 4);

/* Inserción de productos */
INSERT INTO Producto (idProducto, nombreProducto, descripcionProducto, valorUnitarioProducto, estadoProducto) 
VALUES 
(1, 'Gaseosa', 'Bebida carbonatada', 1000, 'Nuevo'),
(2, 'Cocacola', 'Bebida refrescante', 2500, 'Usado'),
(3, 'Jabon', 'Producto de higiene', 3000, 'Renovado'),
(4, 'Chocolate', 'Dulce de cacao', 2000, 'Nuevo');

/* Inserción de pedidos */
INSERT INTO Pedido (idPedido, fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idUsuario, idDomicilio, idProducto) 
VALUES 
(1, '2024-02-02 12:23:12', '20', 1000, 'Reenviado', 1, 1, 1),
(2, '2024-01-12 01:30:10', '10', 3000, 'Entregado', 3, 2, 2),
(3, '2024-02-13 03:12:15', '20', 2000, 'Enproceso', 4, 3, 3),
(4, '2024-02-12 03:12:15', '10', 2500, 'Entregado', 2, 4, 4);

/* Inserción de ventas */
INSERT INTO Venta (idVenta, ImgProducto, descripcionProducto, valorUnitarioProducto, estadoProducto, idProducto) 
VALUES 
(1, '', 'Venta de Gaseosa', 1000, 'Nuevo', 1),
(2, '', 'Venta de Cocacola', 2500, 'Usado', 2),
(3, '', 'Venta de Jabon', 3000, 'Renovado', 3),
(4, '', 'Venta de Chocolate', 2000, 'Nuevo', 4);

/*_____________________________________________________________________________________________________________________________________________________________*/
/*uso de sentencias*/

/* Consultas con operadores relacionales */
SELECT * FROM Venta WHERE valorUnitarioProducto = 2500;
SELECT * FROM Pedido WHERE valorUnitarioPedido > 500;
SELECT * FROM Venta WHERE valorUnitarioProducto < 2500;
SELECT * FROM Pedido WHERE valorUnitarioPedido <= 2000;

/* Consultas con LIKE */
SELECT * FROM pedido WHERE estadoPedido LIKE '%E%';
SELECT * FROM Venta WHERE descripcionProducto LIKE '%C%';
SELECT * FROM Usuario WHERE apellidosUsuario LIKE '%H%';
SELECT * FROM Domicilio WHERE estadoDomicilio LIKE '%d%';

SELECT * FROM domicilio WHERE estadoDomicilio LIKE '_c%';
SELECT * FROM pedido WHERE estadoPedido LIKE '_e%';
SELECT * FROM venta WHERE descripcionProducto LIKE '_a%';
SELECT * FROM usuario WHERE nombreUsuario LIKE '_u%';

/* Consultas con patrones y longitudes específicas */
SELECT * FROM Usuario WHERE nombreUsuario LIKE '_______';
SELECT * FROM Domicilio WHERE estadoDomicilio LIKE '______';
SELECT * FROM pedido WHERE estadoPedido LIKE '_________';
SELECT * FROM Venta WHERE estadoProducto LIKE '_____';

/*_____________________________________________________________________________________________________________________________________________________________*/
/* Consultas específicas */
SELECT telefonoUsuario FROM Usuario WHERE apellidosUsuario = 'Giraldo Montez';
SELECT descripcionProducto FROM Venta WHERE estadoProducto = 'Nuevo';
SELECT estadoDomicilio FROM Domicilio WHERE idDomicilio = 1;
SELECT cantidadPedido FROM Pedido WHERE idProducto = 4;
SELECT correoUsuario FROM Usuario WHERE apellidosUsuario = 'Fernandez Ochoa';

/* Consultas generales */
SELECT * FROM Usuario;
SELECT * FROM Venta, Rol;
SELECT * FROM Rol;
SELECT * FROM Domicilio;
SELECT * FROM Pedido;

/*_____________________________________________________________________________________________________________________________________________________________*/
/* Consultas multitabla */
SELECT u.apellidosUsuario, u.telefonoUsuario, r.descripcionRol 
FROM Usuario AS u 
INNER JOIN Rol AS r ON u.idRol = r.idRol;

SELECT p.fechaPedido, p.estadoPedido, p.cantidadPedido, v.descripcionProducto, v.estadoProducto 
FROM Pedido AS p 
INNER JOIN Venta AS v ON p.idProducto = v.idProducto;

SELECT d.estadoDomicilio, d.horaDomicilio, v.valorUnitarioProducto, v.descripcionProducto 
FROM Domicilio AS d 
INNER JOIN Venta AS v ON v.idVenta = d.idDomicilio;

SELECT d.idDomicilio, d.horaDomicilio, u.correoUsuario, u.nombreUsuario 
FROM Domicilio AS d 
INNER JOIN Usuario AS u ON d.idUsuario = u.idUsuario;
/*_____________________________________________________________________________________________________________________________________________________________*/
/*VIEW*/

/* Creación de vistas generales */
CREATE VIEW descripcionRol AS 
SELECT * FROM Rol WHERE descripcionRol = '';

CREATE VIEW tipoDocUsuario AS 
SELECT * FROM Usuario WHERE tipoDocUsuario = 'C.C';

CREATE VIEW estadoDomicilio AS 
SELECT * FROM Domicilio WHERE estadoDomicilio = 'Activo';

CREATE VIEW estadoProducto AS 
SELECT * FROM Venta WHERE estadoProducto = 'Nuevo';

CREATE VIEW estadoPedido AS 
SELECT * FROM Pedido WHERE estadoPedido = 'Entregado';

/* Creación de vistas específicas */
CREATE VIEW estado_Rol AS 
SELECT r.descripcionRol, u.nombreUsuario, u.apellidosUsuario, u.correoUsuario 
FROM Rol AS r 
INNER JOIN Usuario AS u ON r.idRol = u.idRol;

CREATE VIEW tipo_DocUsuario AS 
SELECT u.nombreUsuario, u.apellidosUsuario, u.tipoDocUsuario, d.horaDomicilio, d.estadoDomicilio 
FROM Usuario AS u 
INNER JOIN Domicilio AS d ON u.idUsuario = d.idUsuario;

CREATE VIEW estado_Domicilio AS 
SELECT d.horaDomicilio, d.idUsuario, v.estadoProducto, v.descripcionProducto, v.valorUnitarioProducto 
FROM Domicilio AS d 
INNER JOIN Venta AS v ON d.idDomicilio = v.idVenta;

CREATE VIEW estado_Producto AS 
SELECT p.fechaPedido, p.cantidadPedido, p.estadoPedido, v.idProducto, v.estadoProducto 
FROM Venta AS v 
INNER JOIN Pedido AS p ON v.idProducto = p.idProducto;

/*____________________________________________________TRIGGERS O DISPARADORES__________________________________________________________________________________________________________________________________________________________________*/

/* Tabla para registrar domicilio */
CREATE TABLE `registro_domicilio` (
  `idDomicilio` INT(12) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `horaDomicilio` TIME(6) NOT NULL,
  `estadoDomicilio` VARCHAR(6) NOT NULL,
  `idUsuario` INT(11) NOT NULL,
  `fechaModificada` DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* Volcado de datos para la tabla `registro_domicilio` */
INSERT INTO `registro_domicilio` (`horaDomicilio`, `estadoDomicilio`, `idUsuario`, `fechaModificada`) VALUES
('06:11:50.000000', 'activo', 4, '2024-05-06 16:26:44');

/* Tabla para actualizar domicilio */
CREATE TABLE `Actualizar_Domicilio` (
  `anterior_idDomicilio` INT(12) NOT NULL,
  `anterior_horaDomicilio` TIME(6) NOT NULL,
  `anterior_estadoDomicilio` VARCHAR(6) NOT NULL,
  `anterior_idUsuario` INT(11) NOT NULL,
  `nuevo_idDomicilio` INT(12) NOT NULL,
  `nuevo_horaDomicilio` TIME(6) NOT NULL,
  `nuevo_estadoDomicilio` VARCHAR(6) NOT NULL,
  `nuevo_idUsuario` INT(11) NOT NULL,
  `usuario` VARCHAR(15) NOT NULL,
  `fecha_modif` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* Establecer un delimitador para el trigger */
DELIMITER $$

/* Trigger para actualizar domicilio */
CREATE TRIGGER `Domicilio_BU`
BEFORE UPDATE ON `registro_domicilio`
FOR EACH ROW 
BEGIN
  INSERT INTO `Actualizar_Domicilio` 
  (`anterior_idDomicilio`, `anterior_horaDomicilio`, `anterior_estadoDomicilio`, `anterior_idUsuario`, 
   `nuevo_idDomicilio`, `nuevo_horaDomicilio`, `nuevo_estadoDomicilio`, `nuevo_idUsuario`, `usuario`, `fecha_modif`) 
  VALUES 
  (OLD.idDomicilio, OLD.horaDomicilio, OLD.estadoDomicilio, OLD.idUsuario, 
   NEW.idDomicilio, NEW.horaDomicilio, NEW.estadoDomicilio, NEW.idUsuario, 
   CURRENT_USER(), NOW());
END$$

/* Restaurar el delimitador por defecto */
DELIMITER ;

/* Ejemplo de actualización de domicilio */
UPDATE `registro_domicilio` SET estadoDomicilio='Desactivado' WHERE idDomicilio = 1;

/* Tabla para eliminar domicilio */
CREATE TABLE `eliminar_domicilio` (
  `idDomicilio` INT(12) NOT NULL,
  `horaDomicilio` TIME(6) NOT NULL,
  `estadoDomicilio` VARCHAR(6) NOT NULL,
  `idUsuario` INT(11) NOT NULL,
  `usuario` VARCHAR(15) NOT NULL,
  `fechaModificada` DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* Volcado de datos para la tabla `eliminar_domicilio` */
INSERT INTO `eliminar_domicilio` (`idDomicilio`, `horaDomicilio`, `estadoDomicilio`, `idUsuario`, `usuario`, `fechaModificada`) VALUES
(5, '06:11:50.000000', 'Desactivado', 4, 'root@localhost', '2024-05-06 16:26:44');


/*_____*/

-- Tabla para registrar pedidos
CREATE TABLE `registro_pedido` (
    `idPedido` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `fechaPedido` DATETIME NOT NULL,
    `cantidadPedido` VARCHAR(100) NOT NULL,
    `valorUnitarioPedido` DOUBLE NOT NULL,
    `estadoPedido` VARCHAR(50) NOT NULL,
    `idUsuario` INT NOT NULL,
    `idDomicilio` INT NOT NULL,
    `idProducto` INT NOT NULL
) ENGINE=InnoDB;

-- Inserción de datos en la tabla Pedido
INSERT INTO `registro_pedido` (`fechaPedido`, `cantidadPedido`, `valorUnitarioPedido`, `estadoPedido`, `idUsuario`, `idDomicilio`, `idProducto`) VALUES
('2024-03-05 09:30:00', '10', 1500, 'Entregado', 3, 3, 3);

-- Tabla para registrar actualizaciones de pedidos
CREATE TABLE `Actualizar_Pedido` (
  `anterior_idPedido` INT NOT NULL,
  `anterior_fechaPedido` DATETIME NOT NULL,
  `anterior_cantidadPedido` VARCHAR(100) NOT NULL,
  `anterior_valorUnitarioPedido` DOUBLE NOT NULL,
  `anterior_estadoPedido` VARCHAR(50) NOT NULL,
  `anterior_idUsuario` INT NOT NULL,
  `anterior_idDomicilio` INT NOT NULL,
  `anterior_idProducto` INT NOT NULL,
  `nuevo_idPedido` INT NOT NULL,
  `nuevo_fechaPedido` DATETIME NOT NULL,
  `nuevo_cantidadPedido` VARCHAR(100) NOT NULL,
  `nuevo_valorUnitarioPedido` DOUBLE NOT NULL,
  `nuevo_estadoPedido` VARCHAR(50) NOT NULL,
  `nuevo_idUsuario` INT NOT NULL,
  `nuevo_idDomicilio` INT NOT NULL,
  `nuevo_idProducto` INT NOT NULL,
  `usuario` VARCHAR(15),
  `fecha_modif` DATETIME
);

-- Establecer un delimitador para el trigger de actualización
DELIMITER $$

-- Trigger para registrar actualizaciones de pedidos
CREATE TRIGGER `Pedido_BU`
BEFORE UPDATE ON `Pedido`
FOR EACH ROW 
BEGIN
  INSERT INTO `Actualizar_Pedido` 
  (`anterior_idPedido`, `anterior_fechaPedido`, `anterior_cantidadPedido`, `anterior_valorUnitarioPedido`, 
   `anterior_estadoPedido`, `anterior_idUsuario`, `anterior_idDomicilio`, `anterior_idProducto`, 
   `nuevo_idPedido`, `nuevo_fechaPedido`, `nuevo_cantidadPedido`, `nuevo_valorUnitarioPedido`, 
   `nuevo_estadoPedido`, `nuevo_idUsuario`, `nuevo_idDomicilio`, `nuevo_idProducto`, 
   `usuario`, `fecha_modif`) 
  VALUES 
  (OLD.idPedido, OLD.fechaPedido, OLD.cantidadPedido, OLD.valorUnitarioPedido, 
   OLD.estadoPedido, OLD.idUsuario, OLD.idDomicilio, OLD.idProducto, 
   NEW.idPedido, NEW.fechaPedido, NEW.cantidadPedido, NEW.valorUnitarioPedido, 
   NEW.estadoPedido, NEW.idUsuario, NEW.idDomicilio, NEW.idProducto, 
   CURRENT_USER(), NOW());
END$$

-- Restaurar el delimitador por defecto
DELIMITER ;

-- Ejemplo de actualización de un pedido
UPDATE `Pedido` SET estadoPedido='Entregado' WHERE idPedido = 3;

-- Tabla para registrar eliminaciones de pedidos
CREATE TABLE `Eliminar_Pedido` (
  `idPedido` INT NOT NULL,
  `fechaPedido` DATETIME NOT NULL,
  `cantidadPedido` VARCHAR(100) NOT NULL,
  `valorUnitarioPedido` DOUBLE NOT NULL,
  `estadoPedido` VARCHAR(50) NOT NULL,
  `idUsuario` INT NOT NULL,
  `idDomicilio` INT NOT NULL,
  `idProducto` INT NOT NULL,
  `registrado` DATETIME
);

-- Establecer un delimitador para el trigger de eliminación
DELIMITER $$

-- Trigger para registrar eliminaciones de pedidos
CREATE TRIGGER `Pedido_AD`
AFTER DELETE ON `Pedido`
FOR EACH ROW 
BEGIN
  INSERT INTO `Eliminar_Pedido` 
  (`idPedido`, `fechaPedido`, `cantidadPedido`, `valorUnitarioPedido`, 
   `estadoPedido`, `idUsuario`, `idDomicilio`, `idProducto`, 
   `registrado`) 
  VALUES 
  (OLD.idPedido, OLD.fechaPedido, OLD.cantidadPedido, OLD.valorUnitarioPedido, 
   OLD.estadoPedido, OLD.idUsuario, OLD.idDomicilio, OLD.idProducto, 
   NOW());
END$$

-- Restaurar el delimitador por defecto
DELIMITER ;

-- Ejemplo de eliminación de un pedido
DELETE FROM `Pedido` WHERE idPedido = 4;

-- Consultar registros eliminados
SELECT * FROM `Eliminar_Pedido`;

/*_____*/

-- Crear tabla Registrar_Venta
CREATE TABLE Registrar_Venta 
(
    idVenta INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    ImgProducto VARCHAR(255),
    descripcionProducto VARCHAR(100) NOT NULL,
    valorUnitarioProducto DOUBLE NOT NULL,
    estadoProducto VARCHAR(50) NOT NULL,
    idDomicilio INT NOT NULL,
    idProducto INT NOT NULL
);

-- Trigger para insertar en Registrar_Venta después de una inserción en Venta
CREATE TRIGGER Venta_AI 
AFTER INSERT ON Venta 
FOR EACH ROW 
INSERT INTO Registrar_Venta (idVenta, ImgProducto, descripcionProducto, valorUnitarioProducto, estadoProducto, idProducto) 
VALUES (NEW.idVenta, NEW.ImgProducto, NEW.descripcionProducto, NEW.valorUnitarioProducto, NEW.estadoProducto, NEW.idProducto);

-- Ejemplo de inserción en la tabla Venta
INSERT INTO Venta (idVenta, ImgProducto, descripcionProducto, valorUnitarioProducto, estadoProducto, idProducto) 
VALUES (7, '', 'Jugo', 800, 'Nuevo', 3);

-- Consultar tabla Venta y Registrar_Venta
SELECT * FROM Venta;
SELECT * FROM Registrar_Venta;

-- Crear tabla Actualizar_Venta
CREATE TABLE Actualizar_Venta
(
    anterior_idProducto INT,
    anterior_descripcionProducto VARCHAR(100) NOT NULL,
    anterior_valorUnitarioProducto DOUBLE NOT NULL,
    anterior_estadoProducto VARCHAR(50) NOT NULL,
    nuevo_idProducto INT,
    nuevo_descripcionProducto VARCHAR(100) NOT NULL,
    nuevo_valorUnitarioProducto DOUBLE NOT NULL,
    nuevo_estadoProducto VARCHAR(50) NOT NULL,
    usuario VARCHAR(15),
    Fecha_modif DATETIME
);

-- Trigger para insertar en Actualizar_Venta antes de una actualización en Venta
CREATE TRIGGER Venta_BU 
BEFORE UPDATE ON Venta 
FOR EACH ROW 
INSERT INTO Actualizar_Venta (anterior_idProducto, anterior_descripcionProducto, anterior_valorUnitarioProducto, anterior_estadoProducto, nuevo_idProducto, nuevo_descripcionProducto, nuevo_valorUnitarioProducto, nuevo_estadoProducto, usuario, Fecha_modif) 
VALUES (OLD.idProducto, OLD.descripcionProducto, OLD.valorUnitarioProducto, OLD.estadoProducto, NEW.idProducto, NEW.descripcionProducto, NEW.valorUnitarioProducto, NEW.estadoProducto, CURRENT_USER(), NOW());

-- Ejemplo de actualización en la tabla Venta
UPDATE Venta SET estadoProducto = 'Usado' WHERE idProducto = 4;

-- Consultar tabla Actualizar_Venta
SELECT * FROM Actualizar_Venta;

-- Crear tabla Eliminar_Venta
CREATE TABLE Eliminar_Venta
(
    idProducto INT,
    descripcionProducto VARCHAR(100) NOT NULL,
    valorUnitarioProducto DOUBLE NOT NULL, 
    estadoProducto VARCHAR(50) NOT NULL,
    usuario VARCHAR(15),
    registrado DATETIME
);

-- Trigger para insertar en Eliminar_Venta después de una eliminación en Venta
CREATE TRIGGER Venta_AD 
AFTER DELETE ON Venta 
FOR EACH ROW 
INSERT INTO Eliminar_Venta (idProducto, descripcionProducto, valorUnitarioProducto, estadoProducto, usuario, registrado) 
VALUES (OLD.idProducto, OLD.descripcionProducto, OLD.valorUnitarioProducto, OLD.estadoProducto, CURRENT_USER(), NOW());

-- Ejemplo de eliminación en la tabla Venta
DELETE FROM Venta WHERE idProducto = 4;

-- Consultar tabla Eliminar_Venta
SELECT * FROM Eliminar_Venta;

/*_____*/

-- Crear tabla para registros de roles
CREATE TABLE REG_rol (
    idRol INT,
    descripcionRol VARCHAR(100),
    registrado DATETIME
);

-- Crear trigger para insertar en REG_rol después de insertar en Rol
CREATE TRIGGER Rol_AI 
AFTER INSERT ON Rol 
FOR EACH ROW 
INSERT INTO REG_rol (idRol, descripcionRol, registrado)
VALUES (NEW.idRol, NEW.descripcionRol, NOW());

-- Insertar un nuevo rol
INSERT INTO Rol (descripcionRol) VALUES ('Proveedor');

-- Consultas para mostrar los datos en Rol y REG_rol
SELECT * FROM Rol;
SELECT * FROM REG_rol;

-- Crear tabla para guardar registros de actualizaciones de Rol
CREATE TABLE actua_rol (
    anterior_idRol INT,
    anterior_descripcionRol VARCHAR(100) NOT NULL,
    nuevo_idRol INT,
    nuevo_descripcionRol VARCHAR(100) NOT NULL,
    fecha_mod DATETIME
);

-- Crear trigger para insertar en actua_rol antes de actualizar en Rol
CREATE TRIGGER ACL_rol 
BEFORE UPDATE ON Rol 
FOR EACH ROW 
INSERT INTO actua_rol (anterior_idRol, anterior_descripcionRol, nuevo_idRol, nuevo_descripcionRol, fecha_mod)
VALUES (OLD.idRol, OLD.descripcionRol, NEW.idRol, NEW.descripcionRol, NOW());

-- Actualizar la descripción del rol
UPDATE Rol SET descripcionRol = 'Vendedor' WHERE idRol = 3;

-- Consultar los registros en actua_rol
SELECT * FROM actua_rol;

-- Crear tabla para roles eliminados
CREATE TABLE rol_eliminados (
    idRol INT,
    descripcionRol VARCHAR(100),
    UsuarioGestor VARCHAR(30),
    Fecha_modif DATE
);

-- Crear trigger para insertar en rol_eliminados después de eliminar en Rol
CREATE TRIGGER ELIMPROD_rol 
AFTER DELETE ON Rol 
FOR EACH ROW 
INSERT INTO rol_eliminados (idRol, descripcionRol, UsuarioGestor, Fecha_modif)
VALUES (OLD.idRol, OLD.descripcionRol, CURRENT_USER, NOW());

-- Eliminar un rol
DELETE FROM Rol WHERE idRol = 3;

/*_____*/

-- Crear la tabla reg_usuario
CREATE TABLE reg_usuario (
    idUsuario INT(11),
    tipoDocUsuario VARCHAR(6), 
    numDocUsuario VARCHAR(15), 
    nombreUsuario VARCHAR(40), 
    apellidosUsuario VARCHAR(40), 
    direccionUsuario VARCHAR(40), 
    telefonoUsuario VARCHAR(12), 
    correoUsuario VARCHAR(40), 
    claveUsuario VARCHAR(20), 
    fotoUsuario BLOB, 
    estadoUsuario VARCHAR(20),
    fecha_modi DATETIME
);

-- Trigger para insertar en reg_usuario después de un nuevo registro en Usuario
DELIMITER //

CREATE TRIGGER usuario_act 
AFTER INSERT ON Usuario 
FOR EACH ROW 
BEGIN
    INSERT INTO reg_usuario (
        idUsuario, tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, 
        direccionUsuario, telefonoUsuario, correoUsuario, claveUsuario, 
        fotoUsuario, estadoUsuario, fecha_modi
    ) VALUES (
        NEW.idUsuario, NEW.tipoDocUsuario, NEW.numDocUsuario, NEW.nombreUsuario, 
        NEW.apellidosUsuario, NEW.direccionUsuario, NEW.telefonoUsuario, 
        NEW.correoUsuario, NEW.claveUsuario, NEW.fotoUsuario, NEW.estadoUsuario, NOW()
    );
END; //

DELIMITER ;

-- Crear la tabla act_usuario
CREATE TABLE act_usuario (
    anterior_idUsuario INT(11),
    anterior_tipoDocUsuario VARCHAR(6), 
    anterior_numDocUsuario VARCHAR(15), 
    anterior_nombreUsuario VARCHAR(40), 
    anterior_apellidosUsuario VARCHAR(40), 
    anterior_direccionUsuario VARCHAR(40), 
    anterior_telefonoUsuario VARCHAR(12), 
    anterior_correoUsuario VARCHAR(40), 
    anterior_claveUsuario VARCHAR(20), 
    anterior_fotoUsuario BLOB, 
    anterior_estadoUsuario VARCHAR(20),
    anterior_idRol INT,
    nuevo_idUsuario INT(11),
    nuevo_tipoDocUsuario VARCHAR(6), 
    nuevo_numDocUsuario VARCHAR(15), 
    nuevo_nombreUsuario VARCHAR(40), 
    nuevo_apellidosUsuario VARCHAR(40), 
    nuevo_direccionUsuario VARCHAR(40), 
    nuevo_telefonoUsuario VARCHAR(12), 
    nuevo_correoUsuario VARCHAR(40), 
    nuevo_claveUsuario VARCHAR(20), 
    nuevo_fotoUsuario BLOB, 
    nuevo_estadoUsuario VARCHAR(20),
    nuevo_idRol INT,
    usuario VARCHAR(15),
    fecha_modif DATETIME
);

-- Trigger para insertar en act_usuario antes de actualizar un registro en Usuario
DELIMITER //

CREATE TRIGGER ACTUALIZA_us 
BEFORE UPDATE ON Usuario 
FOR EACH ROW 
BEGIN
    INSERT INTO act_usuario (
        anterior_idUsuario, anterior_tipoDocUsuario, anterior_numDocUsuario, anterior_nombreUsuario, 
        anterior_apellidosUsuario, anterior_direccionUsuario, anterior_telefonoUsuario, 
        anterior_correoUsuario, anterior_claveUsuario, anterior_fotoUsuario, 
        anterior_estadoUsuario, anterior_idRol, nuevo_idUsuario, nuevo_tipoDocUsuario, 
        nuevo_numDocUsuario, nuevo_nombreUsuario, nuevo_apellidosUsuario, nuevo_direccionUsuario, 
        nuevo_telefonoUsuario, nuevo_correoUsuario, nuevo_claveUsuario, nuevo_fotoUsuario, 
        nuevo_estadoUsuario, nuevo_idRol, usuario, fecha_modif
    ) VALUES (
        OLD.idUsuario, OLD.tipoDocUsuario, OLD.numDocUsuario, OLD.nombreUsuario, 
        OLD.apellidosUsuario, OLD.direccionUsuario, OLD.telefonoUsuario, 
        OLD.correoUsuario, OLD.claveUsuario, OLD.fotoUsuario, OLD.estadoUsuario, 
        OLD.idRol, NEW.idUsuario, NEW.tipoDocUsuario, NEW.numDocUsuario, 
        NEW.nombreUsuario, NEW.apellidosUsuario, NEW.direccionUsuario, 
        NEW.telefonoUsuario, NEW.correoUsuario, NEW.claveUsuario, 
        NEW.fotoUsuario, NEW.estadoUsuario, NEW.idRol, CURRENT_USER(), NOW()
    );
END; //

DELIMITER ;

-- Crear la tabla eliminar_usuario
CREATE TABLE eliminar_usuario (
    idUsuario INT(11),
    tipoDocUsuario VARCHAR(6), 
    numDocUsuario VARCHAR(15), 
    nombreUsuario VARCHAR(40), 
    apellidosUsuario VARCHAR(40), 
    direccionUsuario VARCHAR(40), 
    telefonoUsuario VARCHAR(12), 
    correoUsuario VARCHAR(40), 
    claveUsuario VARCHAR(20), 
    fotoUsuario BLOB, 
    estadoUsuario VARCHAR(20),
    fecha_modif DATETIME
);

-- Trigger para insertar en eliminar_usuario después de eliminar un registro en Usuario
DELIMITER //

CREATE TRIGGER ELIMPROD_us 
AFTER DELETE ON Usuario 
FOR EACH ROW 
BEGIN
    INSERT INTO eliminar_usuario (
        idUsuario, tipoDocUsuario, numDocUsuario, nombreUsuario, 
        apellidosUsuario, direccionUsuario, telefonoUsuario, 
        correoUsuario, claveUsuario, fotoUsuario, estadoUsuario, fecha_modif
    ) VALUES (
        OLD.idUsuario, OLD.tipoDocUsuario, OLD.numDocUsuario, OLD.nombreUsuario, 
        OLD.apellidosUsuario, OLD.direccionUsuario, OLD.telefonoUsuario, 
        OLD.correoUsuario, OLD.claveUsuario, OLD.fotoUsuario, OLD.estadoUsuario, NOW()
    );
END; //

DELIMITER ;

-- Ejemplo de inserción de un nuevo usuario
INSERT INTO Usuario VALUES (7, 't.i', '12656598765', 'Juan', 'Patiño', 'cll15n32sur', '3243547698', 'patiño@gmail.com', '12lp12', '', 'activo', '2');

-- Ejemplo de actualización de un usuario existente
UPDATE Usuario SET nombreUsuario = 'Juan' WHERE idUsuario = 2;

-- Consultas a las tablas de registro
SELECT * FROM reg_usuario;
SELECT * FROM act_usuario;
SELECT * FROM eliminar_usuario;

-- Ejemplo de eliminación de un usuario
DELETE FROM Usuario WHERE idUsuario = 7;

/*_____*/

/* Insertar registro */
DELIMITER $$
CREATE PROCEDURE PAinsertarDomicilio (
    IN idDomi INT,
    IN horaDomi TIME,
    IN estadoDomi VARCHAR(10),
    IN idUsu INT
)                     
BEGIN 
    INSERT INTO domicilio (idDomicilio, horaDomicilio, estadoDomicilio, idUsuario) 
    VALUES (idDomi, horaDomi, estadoDomi, idUsu);
END$$

CALL PAinsertarDomicilio(NULL, '06:30:01', 'activo', '3');

SELECT * FROM domicilio;

/* Actualizar registro */
DELIMITER $$
CREATE PROCEDURE PAactualizarDomicilio (
    IN idDomi INT,
    IN horaDomi TIME,
    IN estadoDomi VARCHAR(10),
    IN idUsu INT
)   
BEGIN
    UPDATE domicilio 
    SET horaDomicilio = horaDomi, estadoDomicilio = estadoDomi, idUsuario = idUsu
    WHERE idDomicilio = idDomi;
END$$ 

CALL PAactualizarDomicilio(3, '03:30:03', 'activo', '3');

/* Consultar registro */
DELIMITER $$
CREATE PROCEDURE PAconsultaDomicilio (
    IN idDomi INT
) 
BEGIN 
    SELECT * FROM domicilio 
    WHERE idDomicilio = idDomi;
END$$

CALL PAconsultaDomicilio(3);

/* Eliminar registro */
DELIMITER $$
CREATE PROCEDURE PAeliminarDomicilio (
    IN idDomi INT
) 
BEGIN 
    DELETE FROM domicilio 
    WHERE idDomicilio = idDomi;
END$$

CALL PAeliminarDomicilio(4);

SELECT * FROM domicilio;


/*_____*/

/* Insertar registro */
DELIMITER $$
CREATE PROCEDURE PAinsertarPedido (
    IN idPedi INT,
    IN fechaPedi DATETIME,
    IN cantidadPedi VARCHAR(100),
    IN valorUnitarioPedi DOUBLE,
    IN estadoPedi VARCHAR(50),
    IN idProduc INT
)                     
BEGIN 
    INSERT INTO pedido (idPedido, fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idProducto) 
    VALUES (idPedi, fechaPedi, cantidadPedi, valorUnitarioPedi, estadoPedi, idProduc);
END$$

CALL PAinsertarPedido(NULL, '2024-02-02 11:22:12', '20', '1000', 'En proceso', '1');

SELECT * FROM pedido;

/* Actualizar registro */
DELIMITER $$
CREATE PROCEDURE PAactualizarPedido (
    IN idPedi INT,
    IN fechaPedi DATETIME,
    IN cantidadPedi VARCHAR(100),
    IN valorUnitarioPedi DOUBLE,
    IN estadoPedi VARCHAR(50),
    IN idProduc INT
)   
BEGIN
    UPDATE pedido 
    SET fechaPedido = fechaPedi, 
        cantidadPedido = cantidadPedi, 
        valorUnitarioPedido = valorUnitarioPedi, 
        estadoPedido = estadoPedi, 
        idProducto = idProduc
    WHERE idPedido = idPedi;
END$$ 

CALL PAactualizarPedido(5, '2024-02-02 11:22:12', '20', '1000', 'En proceso', '1');

/* Consultar registro */
DELIMITER $$
CREATE PROCEDURE PAconsultarPedido (
    IN idPedi INT
) 
BEGIN 
    SELECT * FROM pedido 
    WHERE idPedido = idPedi;
END$$

CALL PAconsultarPedido(5);

/* Eliminar registro */
DELIMITER $$
CREATE PROCEDURE PAeliminarPedido (
    IN idPedi INT
) 
BEGIN 
    DELETE FROM pedido 
    WHERE idPedido = idPedi;
END$$

CALL PAeliminarPedido(1);

SELECT * FROM pedido;


/*_____*/

-- Delimitador para el final de las instrucciones
delimiter $

-- Procedimiento para insertar un rol
create procedure PAinsertarRol (
    in Idrol int,
    descripcionRol varchar(100)
)                       
begin 
    insert into rol (idRol, descripcionRol) 
    values (Idrol, descripcionRol);                   
end$

-- Llamadas para insertar roles
call PAinsertarRol(3, 'Domiciliario');
call PAinsertarRol(4, 'vendedor');

-- Consulta para mostrar todos los usuarios
select * from usuario;

-- Actualizar registro
delimiter $
create procedure PAactualizarRol (
    in idRol int,
    in descripcionR varchar(100)
) 
begin
    update rol 
    set descripcionRol = descripcionR
    where idRol = idRol;
end$ 
  
-- Llamada para actualizar un rol
call PAactualizarRol(2, 'Cliente');

-- Consultar registro
delimiter $
create procedure PAconsultarRol(
    in id int
) 
begin 
    select * from rol 
    where idRol = id;
end$

-- Llamada para consultar un rol
call PAconsultarRol(3);

-- Eliminar registro
delimiter $
create procedure PAeliminarRol(
    in IdRol int
) 
begin 
    delete from rol 
    where idRol = idRol;
end$

-- Llamada para eliminar un rol
call PAeliminarRol(4);

/*_____*/

/* Insertar registro */
DELIMITER $

CREATE PROCEDURE PAinsertarventa (
    IN IdProducto INT,
    IN DescripcionProducto VARCHAR(100),
    IN ValorUnitarioProducto VARCHAR(50),
    IN EstadoProducto VARCHAR(50),
    IN idDom INT
)                       
BEGIN 
    INSERT INTO venta (idProducto, descripcionProducto, valorUnitarioProducto, estadoProducto, idDomicilio) 
    VALUES (IdProducto, DescripcionProducto, ValorUnitarioProducto, EstadoProducto, idDom);        
END$

CALL PAinsertarventa(6, 'galletas', '1300', 'Nuevo', '3');

/* Actualizar registro */
DELIMITER $

CREATE PROCEDURE PAactualizarventa (
    IN IdPro INT,
    IN DescripcionPro VARCHAR(100),
    IN ValorUnitarioPro VARCHAR(50),
    IN EstadoPro VARCHAR(50),
    IN iddom INT
) 
BEGIN
    UPDATE venta 
    SET descripcionProducto = DescripcionPro,
        valorUnitarioProducto = ValorUnitarioPro,
        estadoProducto = EstadoPro,
        idDomicilio = iddom
    WHERE idProducto = IdPro;
END$ 
  
CALL PAactualizarventa(6, 'compota', '1990', 'Nuevo', '3');

/* Consultar registro */
DELIMITER $

CREATE PROCEDURE PAconsultarventa(IN id INT) 
BEGIN 
    SELECT * FROM venta WHERE idProducto = id;
END$

CALL PAconsultarventa(6);

/* Eliminar registro */
DELIMITER $

CREATE PROCEDURE PAeliminarventa(IN IdVTR INT) 
BEGIN 
    DELETE FROM venta WHERE idProducto = IdVTR;
END$

CALL PAeliminarventa(6);

/* Consulta a la tabla usuario */
SELECT * FROM usuario;

/*_____________________________________________________________CRUD________________________________________________________________________________________________*/

delimiter $$

create procedure CrudUsuario (
    in CRUD varchar(10),
    in _idUsuario int,
    in _tipoDocUsuario varchar(6),
    in _numDocUsuario varchar(15),
    in _nombreUsuario varchar(40),
    in _apellidosUsuario varchar(40),
    in _direccionUsuario varchar(40),
    in _telefonoUsuario varchar(12),
    in _correoUsuario varchar(40),
    in _claveUsuario varchar(20),
    in _fotoUsuario blob,
    in _estadoUsuario varchar(20),
    in _idRol int
)
begin 
    case CRUD
        when 'Insertar' then 
            insert into Usuario 
            values (_idUsuario, _tipoDocUsuario, _numDocUsuario, _nombreUsuario, _apellidosUsuario, 
                    _direccionUsuario, _telefonoUsuario, _correoUsuario, _claveUsuario, 
                    _fotoUsuario, _estadoUsuario, _idRol);
                    
        when 'Actualizar' then
            update Usuario 
            set tipoDocUsuario = _tipoDocUsuario,
                numDocUsuario = _numDocUsuario,
                nombreUsuario = _nombreUsuario,
                apellidosUsuario = _apellidosUsuario,
                direccionUsuario = _direccionUsuario,
                telefonoUsuario = _telefonoUsuario,
                correoUsuario = _correoUsuario,
                claveUsuario = _claveUsuario,
                fotoUsuario = _fotoUsuario,
                estadoUsuario = _estadoUsuario,
                idRol = _idRol
            where idUsuario = _idUsuario;
            
        when 'Consulta' then 
            select * from Usuario 
            where idUsuario = _idUsuario;
            
        when 'Eliminar' then 
            delete from Usuario 
            where idUsuario = _idUsuario;
    end case;
end $$

-- Ejecución de la rutina
call QUICKWIT.CrudUsuario('Insertar', NULL, 'C.C', '2451395687', 'Alan', 'Sanchez', 
                          'calle 11 Este #90-15', '1452698426', 
                          'alan11@gmail.com', '12345alan', '', 
                          'Activo', 2);

call QUICKWIT.CrudUsuario('Actualizar', 4, 'C.C', '584269518', 'Alejo', 'Perez', 
                          'calle 1 Este #9-15', '5842951387', 
                          'alejito11@gmail.com', 'alejo9898', '', 
                          'Activo', 2);

call QUICKWIT.CrudUsuario('Consulta', 3, '', '', '', '', '', '', '', '', '', '', '');

call QUICKWIT.CrudUsuario('Eliminar', 3, '', '', '', '', '', '', '', '', '', '', '');


/*_____*/

DELIMITER $$

CREATE PROCEDURE CrudVenta (
    IN CRUD VARCHAR(10),
    IN _idVenta INT,
    IN _imgProducto VARCHAR(255),
    IN _descripcionProducto VARCHAR(100),
    IN _valorUnitarioProducto DOUBLE,
    IN _estadoProducto VARCHAR(50),
    IN _idProducto INT
)
BEGIN 
    CASE CRUD
        WHEN 'Insertar' THEN 
            INSERT INTO Venta (ImgProducto, descripcionProducto, valorUnitarioProducto, estadoProducto, idProducto) 
            VALUES (_imgProducto, _descripcionProducto, _valorUnitarioProducto, _estadoProducto, _idProducto);
            
        WHEN 'Actualizar' THEN
            UPDATE Venta 
            SET ImgProducto = _imgProducto,
                descripcionProducto = _descripcionProducto,
                valorUnitarioProducto = _valorUnitarioProducto,
                estadoProducto = _estadoProducto,
                idProducto = _idProducto
            WHERE idVenta = _idVenta; -- Cambié el where a idVenta
            
        WHEN 'Consulta' THEN 
            SELECT * FROM Venta 
            WHERE idVenta = _idVenta; -- Cambié el where a idVenta
            
        WHEN 'Eliminar' THEN 
            DELETE FROM Venta 
            WHERE idVenta = _idVenta; -- Cambié el where a idVenta
    END CASE;
END $$

-- Ejecución de la rutina
CALL CrudVenta('Insertar', NULL, '', 'Hit', 1200.00, 'Nuevo', 1);
CALL CrudVenta('Actualizar', 1, '', 'Pan', 300.00, 'Nuevo', 2);
CALL CrudVenta('Consulta', 1, '', '', 0, '', 0);
CALL CrudVenta('Eliminar', 8, '', '', 0, '', 0); 

/*_____*/

DELIMITER $

CREATE PROCEDURE CrudDomicilio (
    IN CRUD VARCHAR(10),
    IN _idDomicilio INT,
    IN _horaDomicilio TIME(6),
    IN _estadoDomicilio VARCHAR(6),
    IN _idUsuario INT
)
BEGIN 
    CASE CRUD
        WHEN 'Insertar' THEN 
            INSERT INTO Domicilio 
            VALUES (_idDomicilio, _horaDomicilio, _estadoDomicilio, _idUsuario);
        
        WHEN 'Actualizar' THEN 
            UPDATE Domicilio 
            SET horaDomicilio = _horaDomicilio,
                estadoDomicilio = _estadoDomicilio,
                idUsuario = _idUsuario
            WHERE idDomicilio = _idDomicilio;
        
        WHEN 'Consulta' THEN 
            SELECT * 
            FROM Domicilio 
            WHERE idDomicilio = _idDomicilio;
        
        WHEN 'Eliminar' THEN 
            DELETE FROM Domicilio 
            WHERE idDomicilio = _idDomicilio;
    END CASE;
END $

-- Llamadas a la procedimiento
CALL QUICKWIT.CrudDomicilio('Insertar', NULL, '12:11:01', 'activo', '1');
CALL QUICKWIT.CrudDomicilio('Actualizar', 1, '06:30:03', 'activo', '1');
CALL QUICKWIT.CrudDomicilio('Consulta', 4, '', '', '');  
CALL QUICKWIT.CrudDomicilio('Eliminar', 4, '', '', '');  

/*_____*/

DELIMITER $
create procedure crudRol (
in CRUD varchar(10),
in _idRol int,
in _descripcionRol varchar(100)

)
begin
  case CRUD
	when 'Agregar' then
     insert into rol values(_idRol,_descripcionRol);
    when 'Actualizar' then
      update rol set descripcionRol=_descripcionRol
      where idRol=_idRol;
     when 'Consulta' then
      select *from rol where idRol=_idRol;
      when 'Eliminar' then
      delete from rol where idRol=_idRol;
	end case;
    end $
    
    call QUICKWIT.crudRol  ('Agregar',NULL,'pedido');
    call QUICKWIT.crudRol  ('Actualizar','3','venta');
    call QUICKWIT.crudRol ('Consulta',2,'');  
    call QUICKWIT.crudRol ('Consulta',3,''); 
    call QUICKWIT.crudRol ('Eliminar',5,'');  

/*_____*/

DELIMITER $

CREATE PROCEDURE crudpedido (
    IN CRUD VARCHAR(10),
    IN _idPedido INT(11), 
    IN _fechaPedido DATETIME, 
    IN _cantidadPedido VARCHAR(100), 
    IN _valorUnitarioPedido DOUBLE, 
    IN _estadoPedido VARCHAR(50), 
    IN _idUsuario INT,
    IN _idDomicilio INT,
    IN _idProducto INT
)
BEGIN
    CASE CRUD
        WHEN 'Agregar' THEN
            INSERT INTO Pedido (fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idUsuario, idDomicilio, idProducto)
            VALUES (_fechaPedido, _cantidadPedido, _valorUnitarioPedido, _estadoPedido, _idUsuario, _idDomicilio, _idProducto);
        
        WHEN 'Actualizar' THEN
            UPDATE Pedido 
            SET fechaPedido = _fechaPedido,
                cantidadPedido = _cantidadPedido,
                valorUnitarioPedido = _valorUnitarioPedido,
                estadoPedido = _estadoPedido,
                idUsuario = _idUsuario,
                idDomicilio = _idDomicilio,
                idProducto = _idProducto
            WHERE idPedido = _idPedido;
        
        WHEN 'Consulta' THEN
            SELECT * 
            FROM Pedido 
            WHERE idPedido = _idPedido;
        
        WHEN 'Eliminar' THEN
            DELETE FROM Pedido 
            WHERE idPedido = _idPedido;
    END CASE;
END $

-- Llamadas al procedimiento
CALL crudpedido('Agregar', NULL, '2024-02-02 12:23:12', '10', '1100', 'En proceso', 1, 2, 3);
CALL crudpedido('Actualizar', 3, '2024-02-02 12:23:12', '40', '1200', 'En proceso', 1, 2, 3);
CALL crudpedido('Consulta', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);  
CALL crudpedido('Eliminar', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


