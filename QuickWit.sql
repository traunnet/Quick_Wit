CREATE DATABASE QUICKWIT; -- Creación de la base de datos
USE QUICKWIT; -- Dar uso de la base de datos

/*_____________________________________________________________________________________________________________________________________________________________*/

/* Tabla Rol */
CREATE TABLE Rol (
    idRol INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    descripcionRol VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

/* Tabla Usuario */
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

/* Tabla Domicilio */
CREATE TABLE Domicilio (
    idDomicilio INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    horaDomicilio TIME(0) NOT NULL,
    estadoDomicilio VARCHAR(15) NOT NULL,
    idUsuario INT NOT NULL,
    CONSTRAINT fk_domicilio_usuario FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE
) ENGINE=InnoDB;

/* Tabla Producto */
CREATE TABLE Producto (
    idProducto INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    ImgProducto TEXT,
    categoria VARCHAR(50) NOT NULL,
    nombreProducto VARCHAR(100) NOT NULL,
    descripcionProducto VARCHAR(255) NOT NULL,
    valorUnitarioProducto DOUBLE NOT NULL,
    estadoProducto VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

ALTER TABLE Producto MODIFY ImgProducto TEXT;

/* Tabla Pedido */
CREATE TABLE Pedido (
    idPedido INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    fechaPedido DATETIME NOT NULL,
    cantidadPedido VARCHAR(100) NOT NULL,
    valorUnitarioPedido DOUBLE NOT NULL,
    estadoPedido VARCHAR(50) NOT NULL,
    idUsuario INT NOT NULL,
    idDomicilio INT NOT NULL,
    idProducto INT NOT NULL,
    CONSTRAINT fk_pedido_usuario FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE,
    CONSTRAINT fk_pedido_domicilio FOREIGN KEY (idDomicilio) REFERENCES Domicilio(idDomicilio) ON DELETE CASCADE,
    CONSTRAINT fk_pedido_producto FOREIGN KEY (idProducto) REFERENCES Producto(idProducto) ON DELETE CASCADE
) ENGINE=InnoDB;

/* Tabla Venta */
CREATE TABLE Venta (
    idVenta INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    ImgProducto TEXT,
    categoria VARCHAR(50) NOT NULL,
    nombreProducto VARCHAR(100) NOT NULL,
    valorUnitario DOUBLE NOT NULL,
    cantidad VARCHAR(100) NOT NULL,
	valorTotal DOUBLE NOT NULL,
    estadoProducto VARCHAR(50) NOT NULL,
    idProducto INT NOT NULL,
    CONSTRAINT fk_venta_producto FOREIGN KEY (idProducto) REFERENCES Producto(idProducto) ON DELETE CASCADE
) ENGINE=InnoDB;

/*_____________________________________________________________________________________________________________________________________________________________*/

/* Inserción de roles */
INSERT INTO Rol (idRol, descripcionRol) VALUES (1, 'Administrador');
INSERT INTO Rol (idRol, descripcionRol) VALUES (2, 'Cliente');
INSERT INTO Rol (idRol, descripcionRol) VALUES (3, 'Domiciliario');

/* Inserción de usuarios */
INSERT INTO Usuario (idUsuario, tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, direccionUsuario, telefonoUsuario, correoUsuario, claveUsuario, fotoUsuario, estadoUsuario, idRol) 
VALUES 
(1, 'C.C', '1031648256', 'Abraham', 'Boada Suarez', 'calle 13 Este #66-15 Sur', '3134142106', 'abrahamboada95@gmail.com', 'abraham12345', '', 'Activo', 2),
(2, 'T.I', '1028863995', 'Juan', 'Hernadez Cadenas', 'calle 14 Este #65-14 Sur', '3222569322', 'juanpablo028w@gmail.com', 'juancho123', '', 'Activo', 2),
(3, 'C.C', '1045454554', 'Esteban', 'Giraldo Montez', 'calle 14 Este #66-15 Sur', '3112657854', 'esteban@gmail.com', 'esteban123', '', 'Activo', 1),
(4, 'T.I', '2123455678', 'Maria', 'Fernandez Ochoa', 'calle 14 Este #65-14 Sur', '3245893221', 'maria@gmail.com', 'maria123', '', 'Inactivo', 1),
(5, 'C.C', '1056789456', 'Laura', 'Martinez Rivera', 'calle 15 Este #67-10 Sur', '3001234567', 'laura.martinez@gmail.com', 'laura123', '', 'Activo', 2),
(6, 'T.I', '3004567890', 'Diego', 'Castillo Andrade', 'calle 16 Este #68-20 Sur', '3019876543', 'diego.castillo@gmail.com', 'diego123', '', 'Activo', 2),
(7, 'C.C', '9876543210', 'Sofia', 'Velez Cruz', 'calle 17 Este #69-30 Sur', '3051239876', 'sofia.velez@gmail.com', 'sofia123', '', 'Activo', 1),
(8, 'T.I', '1234567890', 'Pedro', 'Ramirez Gomez', 'calle 18 Este #70-40 Sur', '3123456789', 'pedro.ramirez@gmail.com', 'pedro123', '', 'Inactivo', 1),
(9, 'C.C', '4567890123', 'Valentina', 'López Torres', 'calle 19 Este #71-50 Sur', '3145678901', 'valentina.lopez@gmail.com', 'valentina123', '', 'Activo', 2),
(10, 'T.I', '2345678901', 'Cristian', 'Duran Castillo', 'calle 20 Este #72-60 Sur', '3178901234', 'cristian.duran@gmail.com', 'cristian123', '', 'Activo', 2);

/* Inserción de domicilios */
INSERT INTO Domicilio (idDomicilio, horaDomicilio, estadoDomicilio, idUsuario) 
VALUES 
(1, '12:23:12', 'Activo', 1),
(2, '01:11:12', 'Inactivo', 2),
(3, '09:23:12', 'Activo', 3),
(4, '11:01:12', 'Activo', 4);

/* Inserción de productos */
INSERT INTO Producto (idProducto, ImgProducto, categoria, nombreProducto, descripcionProducto, valorUnitarioProducto, estadoProducto) 
VALUES 
-- Tecnología y Electrónica
(1, '', 'Tecnología y Electrónica', 'Teléfono inteligente', 'Dispositivo móvil avanzado con pantalla OLED', 1500, 'Nuevo'),
(2, '', 'Tecnología y Electrónica', 'Portátil gaming', 'Computadora portátil de alto rendimiento para juegos', 3500, 'Nuevo'),
(3, '', 'Tecnología y Electrónica', 'Auriculares inalámbricos', 'Auriculares Bluetooth con cancelación de ruido', 300, 'Usado'),
(4, '', 'Tecnología y Electrónica', 'Smartwatch', 'Reloj inteligente con monitoreo de salud', 200, 'Renovado'),

-- Hogar y Decoración
(5, '', 'Hogar y Decoración', 'Sofá', 'Mueble cómodo de tres plazas para la sala', 800, 'Nuevo'),
(6, '', 'Hogar y Decoración', 'Lámpara de mesa', 'Lámpara moderna para decoración de interiores', 120, 'Nuevo'),
(7, '', 'Hogar y Decoración', 'Cortinas de lino', 'Cortinas de lino elegantes para la sala de estar', 90, 'Usado'),
(8, '', 'Hogar y Decoración', 'Estantería de madera', 'Estantería de madera con cinco niveles', 300, 'Nuevo'),

-- Belleza y Cuidado Personal
(9, '', 'Belleza y Cuidado Personal', 'Set de maquillaje', 'Kit completo de maquillaje para uso diario', 50, 'Nuevo'),
(10, '', 'Belleza y Cuidado Personal', 'Crema hidratante', 'Crema para el rostro con protección solar', 20, 'Nuevo'),
(11, '', 'Belleza y Cuidado Personal', 'Plancha para el cabello', 'Plancha alisadora con tecnología de iones', 75, 'Usado'),
(12, '', 'Belleza y Cuidado Personal', 'Cepillo eléctrico', 'Cepillo de dientes eléctrico recargable', 40, 'Renovado'),

-- Deportes
(13, '', 'Deportes', 'Bicicleta de montaña', 'Bicicleta con marco de aluminio y suspensión delantera', 600, 'Nuevo'),
(14, '', 'Deportes', 'Balón de fútbol', 'Balón de fútbol de cuero tamaño oficial', 50, 'Nuevo'),
(15, '', 'Deportes', 'Raqueta de tenis', 'Raqueta profesional de fibra de carbono', 200, 'Usado'),
(16, '', 'Deportes', 'Cinta para correr', 'Máquina de correr con pantalla táctil y múltiples velocidades', 1500, 'Renovado'),

-- Juguetes y Niños
(17, '', 'Juguetes y Niños', 'Muñeco de acción', 'Muñeco articulado de superhéroe con accesorios', 30, 'Nuevo'),
(18, '', 'Juguetes y Niños', 'Set de bloques de construcción', 'Juego de bloques de construcción para niños de 5 años', 40, 'Nuevo'),
(19, '', 'Juguetes y Niños', 'Pelota saltarina', 'Pelota inflable de goma para actividades al aire libre', 15, 'Usado'),
(20, '', 'Juguetes y Niños', 'Casa de muñecas', 'Casa de muñecas de madera con mobiliario', 120, 'Renovado'),

-- Libros y Papelería
(21, '', 'Libros y Papelería', 'Libro de aventuras', 'Novela de aventuras para jóvenes adultos', 15, 'Nuevo'),
(22, '', 'Libros y Papelería', 'Agenda 2024', 'Agenda de bolsillo con vista semanal y mensual', 10, 'Nuevo'),
(23, '', 'Libros y Papelería', 'Cuadernos escolares', 'Paquete de cuadernos escolares de 100 hojas', 8, 'Nuevo'),
(24, '', 'Libros y Papelería', 'Bolígrafo de gel', 'Bolígrafo de tinta de gel con punta fina', 2, 'Nuevo');

/* Inserción de pedidos */
INSERT INTO Pedido (idPedido, fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idUsuario, idDomicilio, idProducto) 
VALUES 
(1, '2024-02-02 12:23:12', '20', 1000, 'Reenviado', 1, 1, 1),
(2, '2024-01-12 01:30:10', '10', 3000, 'Entregado', 3, 2, 2),
(3, '2024-02-13 03:12:15', '20', 2000, 'Enproceso', 4, 3, 3),
(4, '2024-02-12 03:12:15', '10', 2500, 'Entregado', 2, 4, 4);

/* Inserción de ventas */
INSERT INTO Venta (ImgProducto, categoria, nombreProducto, valorUnitario, cantidad, valorTotal, estadoProducto, idProducto) 
VALUES 
-- Ventas relacionadas con productos existentes
('', 'Tecnología y Electrónica', 'Teléfono inteligente', 1500, 1, 1500, 'Venta realizada', 1),
('', 'Tecnología y Electrónica', 'Portátil gaming', 3500, 1, 3500, 'Venta realizada', 2),
('', 'Hogar y Decoración', 'Sofá', 800, 1, 800, 'Venta realizada', 5),
('', 'Hogar y Decoración', 'Lámpara de mesa', 120, 1, 120, 'Venta realizada', 6),
('', 'Belleza y Cuidado Personal', 'Set de maquillaje', 50, 1, 50, 'Venta realizada', 9),
('', 'Belleza y Cuidado Personal', 'Crema hidratante', 20, 5, 100, 'Venta realizada', 10), -- 5 unidades
('', 'Deportes', 'Bicicleta de montaña', 600, 1, 600, 'Venta realizada', 13),
('', 'Deportes', 'Balón de fútbol', 50, 2, 100, 'Venta realizada', 14), -- 2 unidades
('', 'Juguetes y Niños', 'Muñeco de acción', 30, 1, 30, 'Venta realizada', 17),
('', 'Libros y Papelería', 'Libro de aventuras', 15, 1, 15, 'Venta realizada', 21);

/*_____________________________________________________________________________________________________________________________________________________________*/
/*uso de sentencias*/

/* Consultas con operadores relacionales */
SELECT * FROM Venta WHERE valorUnitario = 2500;
SELECT * FROM Pedido WHERE valorUnitarioPedido > 500;
SELECT * FROM Venta WHERE valorUnitario < 2500;
SELECT * FROM Pedido WHERE valorUnitarioPedido <= 2000;

/* Consultas con LIKE */
SELECT * FROM pedido WHERE estadoPedido LIKE '%E%';
SELECT * FROM Venta WHERE nombreProducto LIKE '%C%';
SELECT * FROM Usuario WHERE apellidosUsuario LIKE '%H%';
SELECT * FROM Domicilio WHERE estadoDomicilio LIKE '%d%';

SELECT * FROM domicilio WHERE estadoDomicilio LIKE '_c%';
SELECT * FROM pedido WHERE estadoPedido LIKE '_e%';
SELECT * FROM venta WHERE nombreProducto LIKE '_a%';
SELECT * FROM usuario WHERE nombreUsuario LIKE '_u%';

/* Consultas con patrones y longitudes específicas */
SELECT * FROM Usuario WHERE nombreUsuario LIKE '_______';
SELECT * FROM Domicilio WHERE estadoDomicilio LIKE '______';
SELECT * FROM pedido WHERE estadoPedido LIKE '_________';
SELECT * FROM Venta WHERE estadoProducto LIKE '_____';

/*_____________________________________________________________________________________________________________________________________________________________*/
/* Consultas específicas */
SELECT telefonoUsuario FROM Usuario WHERE apellidosUsuario = 'Giraldo Montez';
SELECT nombreProducto FROM Venta WHERE estadoProducto = 'Venta realizada';
SELECT estadoDomicilio FROM Domicilio WHERE idDomicilio = 1;
SELECT cantidadPedido FROM Pedido WHERE idProducto = 4;
SELECT correoUsuario FROM Usuario WHERE apellidosUsuario = 'Fernandez Ochoa';

/* Consultas generales */
SELECT * FROM Rol;
SELECT * FROM Usuario;
SELECT * FROM Domicilio;
SELECT * FROM Producto;
SELECT * FROM Pedido;
SELECT * FROM Venta;

/*_____________________________________________________________________________________________________________________________________________________________*/
/* Consultas multitabla */
-- 1. Obtener información de pedidos con detalles del usuario y el producto
SELECT 
    p.idPedido,
    p.fechaPedido,
    p.cantidadPedido,
    p.valorUnitarioPedido,
    p.estadoPedido,
    u.nombreUsuario,
    u.apellidosUsuario,
    d.horaDomicilio,
    pr.nombreProducto,
    pr.descripcionProducto
FROM 
    Pedido p
JOIN 
    Usuario u ON p.idUsuario = u.idUsuario
JOIN 
    Domicilio d ON p.idDomicilio = d.idDomicilio
JOIN 
    Producto pr ON p.idProducto = pr.idProducto;

-- 2. Listar las ventas con el nombre del producto y el rol del usuario que realizó la compra
SELECT 
    v.idVenta,
    v.nombreProducto,
    v.valorUnitario,
    v.estadoProducto,
    pr.nombreProducto,
    u.nombreUsuario,
    u.apellidosUsuario,
    r.descripcionRol
FROM 
    Venta v
JOIN 
    Producto pr ON v.idProducto = pr.idProducto
JOIN 
    Pedido pe ON pr.idProducto = pe.idProducto
JOIN 
    Usuario u ON pe.idUsuario = u.idUsuario
JOIN 
    Rol r ON u.idRol = r.idRol;

-- 3. Obtener domicilios activos y la información del usuario asociado
SELECT 
    d.idDomicilio,
    d.horaDomicilio,
    d.estadoDomicilio,
    u.nombreUsuario,
    u.apellidosUsuario,
    u.telefonoUsuario,
    u.correoUsuario
FROM 
    Domicilio d
JOIN 
    Usuario u ON d.idUsuario = u.idUsuario
WHERE 
    d.estadoDomicilio = 'Activo';

-- 4. Resumen de productos vendidos con la cantidad y el total de ventas
SELECT 
    pr.nombreProducto,
    SUM(pe.cantidadPedido) AS totalCantidad,
    SUM(pe.cantidadPedido * pe.valorUnitarioPedido) AS totalVendido
FROM 
    Producto pr
JOIN 
    Pedido pe ON pr.idProducto = pe.idProducto
JOIN 
    Venta v ON pr.idProducto = v.idProducto
GROUP BY 
    pr.nombreProducto;

-- 5. Listar todos los usuarios y su rol
SELECT 
    u.nombreUsuario,
    u.apellidosUsuario,
    r.descripcionRol
FROM 
    Usuario u
JOIN 
    Rol r ON u.idRol = r.idRol;
/*_____________________________________VISTAS________________________________________________________________________________________________________________________*/

/* Vistas Generales */
CREATE VIEW descripcionRol AS 
SELECT * FROM Rol WHERE descripcionRol = 'Cliente';

CREATE VIEW estadoDomicilio AS 
SELECT * FROM Domicilio WHERE estadoDomicilio = 'Activo';

CREATE VIEW estadoPedido AS 
SELECT * FROM Pedido WHERE estadoPedido = 'Entregado';

CREATE VIEW estadoProducto AS 
SELECT * FROM Venta WHERE estadoProducto = 'Nuevo';

CREATE VIEW tipoDocUsuario AS 
SELECT * FROM Usuario WHERE tipoDocUsuario = 'C.C';

/* Vistas Específicas */

/* Vista que muestra información de usuarios y sus roles */
CREATE VIEW usuarios_con_roles AS 
SELECT 
    u.idUsuario, 
    u.nombreUsuario, 
    u.apellidosUsuario, 
    u.correoUsuario, 
    r.descripcionRol 
FROM 
    Usuario AS u 
INNER JOIN 
    Rol AS r ON u.idRol = r.idRol;

/* Vista que muestra pedidos y su estado junto con el usuario que lo realizó */
CREATE VIEW pedidos_con_usuario AS 
SELECT 
    p.idPedido, 
    p.fechaPedido, 
    p.cantidadPedido, 
    p.estadoPedido, 
    u.nombreUsuario, 
    u.apellidosUsuario 
FROM 
    Pedido AS p 
INNER JOIN 
    Usuario AS u ON p.idUsuario = u.idUsuario;

/* Vista que muestra domicilios y los usuarios asociados */
CREATE VIEW domicilios_con_usuario AS 
SELECT 
    d.idDomicilio, 
    d.horaDomicilio, 
    d.estadoDomicilio, 
    u.nombreUsuario, 
    u.apellidosUsuario 
FROM 
    Domicilio AS d 
INNER JOIN 
    Usuario AS u ON d.idUsuario = u.idUsuario;

/* Vista que muestra ventas y los productos vendidos */
CREATE VIEW ventas_con_productos AS 
SELECT 
    v.idVenta, 
    v.cantidad, 
    v.valorTotal, 
    p.nombreProducto, 
    p.categoria 
FROM 
    Venta AS v 
INNER JOIN 
    Producto AS p ON v.idProducto = p.idProducto;

/* Vista que muestra el detalle de los pedidos, incluidos los domicilios y productos */
CREATE VIEW detalle_pedido AS 
SELECT 
    p.idPedido, 
    p.fechaPedido, 
    p.cantidadPedido, 
    p.valorUnitarioPedido, 
    p.estadoPedido, 
    d.horaDomicilio, 
    v.estadoProducto, 
    pr.nombreProducto 
FROM 
    Pedido AS p 
INNER JOIN 
    Domicilio AS d ON p.idDomicilio = d.idDomicilio 
INNER JOIN 
    Venta AS v ON p.idProducto = v.idProducto 
INNER JOIN 
    Producto AS pr ON p.idProducto = pr.idProducto;

/*_____________________________________________________________________________________________________________________________________________________________*/

/* Consultas para eliminar */
DELETE FROM Usuario WHERE idUsuario = 4;
DELETE FROM Pedido WHERE idPedido = 3;
DELETE FROM Rol WHERE idRol = 3;
DELETE FROM Domicilio WHERE idDomicilio = 2;
DELETE FROM Venta WHERE idVenta = 2;

/* Consultas para actualizar */
UPDATE Usuario 
SET estadoUsuario = 'Inactivo' 
WHERE idUsuario = 2;

UPDATE Pedido 
SET estadoPedido = 'Entregado' 
WHERE idPedido = 1;

UPDATE Rol 
SET descripcionRol = 'Usuario' 
WHERE idRol = 2;

UPDATE Domicilio 
SET estadoDomicilio = 'Activo' 
WHERE idDomicilio = 1;

UPDATE Venta 
SET estadoProducto = 'En proceso' 
WHERE idVenta = 3;

/*________________________________TRIGGERS O DISPARADORES__________________________________*/

CREATE TABLE Triggers_Rol 
(
    idRol INT,
    descripcionRol VARCHAR(100) NOT NULL,
    operacion VARCHAR(10) NOT NULL, -- 'INSERT', 'UPDATE', 'DELETE'
    usuario VARCHAR(15),
    fecha_modif DATETIME
);

CREATE TRIGGER Rol_AI 
AFTER INSERT ON Rol 
FOR EACH ROW 
INSERT INTO Triggers_Rol (idRol, descripcionRol, operacion, usuario, fecha_modif) 
VALUES (NEW.idRol, NEW.descripcionRol, 'INSERT', CURRENT_USER(), NOW());

CREATE TRIGGER Rol_BU 
BEFORE UPDATE ON Rol 
FOR EACH ROW 
INSERT INTO Triggers_Rol (idRol, descripcionRol, operacion, usuario, fecha_modif) 
VALUES (OLD.idRol, OLD.descripcionRol, 'UPDATE', CURRENT_USER(), NOW());

CREATE TRIGGER Rol_AD 
AFTER DELETE ON Rol 
FOR EACH ROW 
INSERT INTO Triggers_Rol (idRol, descripcionRol, operacion, usuario, fecha_modif) 
VALUES (OLD.idRol, OLD.descripcionRol, 'DELETE', CURRENT_USER(), NOW());

/*EJEMPLOS*/

INSERT INTO Rol (descripcionRol) VALUES ('Vendedor');
SELECT * FROM Rol;
SELECT * FROM Triggers_Rol;

UPDATE Rol SET descripcionRol = 'Super Administrador' WHERE idRol = 1;
SELECT * FROM Rol;
SELECT * FROM Triggers_Rol;

DELETE FROM Rol WHERE idRol = 4;
SELECT * FROM Rol;
SELECT * FROM Triggers_Rol;

/*_____*/

CREATE TABLE Triggers_Usuario (
    idUsuario INT,
    tipoDocUsuario VARCHAR(6),
    numDocUsuario VARCHAR(15),
    nombreUsuario VARCHAR(40),
    apellidosUsuario VARCHAR(40),
    direccionUsuario VARCHAR(40),
    telefonoUsuario VARCHAR(12),
    correoUsuario VARCHAR(40),
    claveUsuario VARCHAR(20),
    fotoUsuario VARCHAR(255),
    estadoUsuario VARCHAR(20),
    operacion VARCHAR(10) NOT NULL, -- 'INSERT', 'UPDATE', 'DELETE'
    usuario VARCHAR(15),
    fecha_modif DATETIME
);

CREATE TRIGGER Usuario_AI 
AFTER INSERT ON Usuario 
FOR EACH ROW 
INSERT INTO Triggers_Usuario (idUsuario, tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, direccionUsuario, telefonoUsuario, correoUsuario, claveUsuario, fotoUsuario, estadoUsuario, operacion, usuario, fecha_modif) 
VALUES (NEW.idUsuario, NEW.tipoDocUsuario, NEW.numDocUsuario, NEW.nombreUsuario, NEW.apellidosUsuario, NEW.direccionUsuario, NEW.telefonoUsuario, NEW.correoUsuario, NEW.claveUsuario, NEW.fotoUsuario, NEW.estadoUsuario, 'INSERT', CURRENT_USER(), NOW());

CREATE TRIGGER Usuario_BU 
BEFORE UPDATE ON Usuario 
FOR EACH ROW 
INSERT INTO Triggers_Usuario (idUsuario, tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, direccionUsuario, telefonoUsuario, correoUsuario, claveUsuario, fotoUsuario, estadoUsuario, operacion, usuario, fecha_modif) 
VALUES (OLD.idUsuario, OLD.tipoDocUsuario, OLD.numDocUsuario, OLD.nombreUsuario, OLD.apellidosUsuario, OLD.direccionUsuario, OLD.telefonoUsuario, OLD.correoUsuario, OLD.claveUsuario, OLD.fotoUsuario, OLD.estadoUsuario, 'UPDATE', CURRENT_USER(), NOW());

CREATE TRIGGER Usuario_AD 
AFTER DELETE ON Usuario 
FOR EACH ROW 
INSERT INTO Triggers_Usuario (idUsuario, tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, direccionUsuario, telefonoUsuario, correoUsuario, claveUsuario, fotoUsuario, estadoUsuario, operacion, usuario, fecha_modif) 
VALUES (OLD.idUsuario, OLD.tipoDocUsuario, OLD.numDocUsuario, OLD.nombreUsuario, OLD.apellidosUsuario, OLD.direccionUsuario, OLD.telefonoUsuario, OLD.correoUsuario, OLD.claveUsuario, OLD.fotoUsuario, OLD.estadoUsuario, 'DELETE', CURRENT_USER(), NOW());

/*EJEMPLOS*/

INSERT INTO Usuario (tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, direccionUsuario, telefonoUsuario, correoUsuario, claveUsuario, fotoUsuario, estadoUsuario, idRol) 
VALUES ('C.C', '1234567890', 'Lucas', 'Mendez', 'Calle 20', '3001234567', 'lucas@example.com', 'lucas123', NULL, 'Activo', 2);
SELECT * FROM Usuario;
SELECT * FROM Triggers_Usuario;

UPDATE Usuario SET estadoUsuario = 'Inactivo' WHERE idUsuario = 5;
SELECT * FROM Usuario;
SELECT * FROM Triggers_Usuario;

DELETE FROM Usuario WHERE idUsuario = 5;
SELECT * FROM Usuario;
SELECT * FROM Triggers_Usuario;

/*_____*/

CREATE TABLE Triggers_Domicilio 
(
    idDomicilio INT,
    horaDomicilio TIME(0),
    estadoDomicilio VARCHAR(6),
    operacion VARCHAR(10) NOT NULL, -- 'INSERT', 'UPDATE', 'DELETE'
    usuario VARCHAR(15),
    fecha_modif DATETIME
);

CREATE TRIGGER Domicilio_AI 
AFTER INSERT ON Domicilio 
FOR EACH ROW 
INSERT INTO Triggers_Domicilio (idDomicilio, horaDomicilio, estadoDomicilio, operacion, usuario, fecha_modif) 
VALUES (NEW.idDomicilio, NEW.horaDomicilio, NEW.estadoDomicilio, 'INSERT', CURRENT_USER(), NOW());

CREATE TRIGGER Domicilio_BU 
BEFORE UPDATE ON Domicilio 
FOR EACH ROW 
INSERT INTO Triggers_Domicilio (idDomicilio, horaDomicilio, estadoDomicilio, operacion, usuario, fecha_modif) 
VALUES (OLD.idDomicilio, OLD.horaDomicilio, OLD.estadoDomicilio, 'UPDATE', CURRENT_USER(), NOW());

CREATE TRIGGER Domicilio_AD 
AFTER DELETE ON Domicilio 
FOR EACH ROW 
INSERT INTO Triggers_Domicilio (idDomicilio, horaDomicilio, estadoDomicilio, operacion, usuario, fecha_modif) 
VALUES (OLD.idDomicilio, OLD.horaDomicilio, OLD.estadoDomicilio, 'DELETE', CURRENT_USER(), NOW());

/*EJEMPLOS*/

INSERT INTO Domicilio (horaDomicilio, estadoDomicilio, idUsuario) VALUES ('14:30:00', 'Activo', 1);
SELECT * FROM Domicilio;
SELECT * FROM Triggers_Domicilio;

UPDATE Domicilio SET estadoDomicilio = 'Inactivo' WHERE idDomicilio = 5;
SELECT * FROM Domicilio;
SELECT * FROM Triggers_Domicilio;

DELETE FROM Domicilio WHERE idDomicilio = 5;
SELECT * FROM Domicilio;
SELECT * FROM Triggers_Domicilio;


/*_____*/

/* Tabla Triggers_Producto */
CREATE TABLE Triggers_Producto 
(
    idProducto INT,
    ImgProducto TEXT,
    nombreProducto VARCHAR(100),
    descripcionProducto VARCHAR(255),
    valorUnitarioProducto DOUBLE,
    estadoProducto VARCHAR(50),
    operacion VARCHAR(10) NOT NULL, -- 'INSERT', 'UPDATE', 'DELETE'
    usuario VARCHAR(15),
    fecha_modif DATETIME
);

/* Trigger para insertar registros */
CREATE TRIGGER Producto_AI 
AFTER INSERT ON Producto 
FOR EACH ROW 
INSERT INTO Triggers_Producto (idProducto, ImgProducto, nombreProducto, descripcionProducto, valorUnitarioProducto, estadoProducto, operacion, usuario, fecha_modif) 
VALUES (NEW.idProducto, NEW.ImgProducto, NEW.nombreProducto, NEW.descripcionProducto, NEW.valorUnitarioProducto, NEW.estadoProducto, 'INSERT', CURRENT_USER(), NOW());

/* Trigger para actualizar registros */
CREATE TRIGGER Producto_BU 
BEFORE UPDATE ON Producto 
FOR EACH ROW 
INSERT INTO Triggers_Producto (idProducto, ImgProducto, nombreProducto, descripcionProducto, valorUnitarioProducto, estadoProducto, operacion, usuario, fecha_modif) 
VALUES (OLD.idProducto, OLD.ImgProducto, OLD.nombreProducto, OLD.descripcionProducto, OLD.valorUnitarioProducto, OLD.estadoProducto, 'UPDATE', CURRENT_USER(), NOW());

/* Trigger para eliminar registros */
CREATE TRIGGER Producto_AD 
AFTER DELETE ON Producto 
FOR EACH ROW 
INSERT INTO Triggers_Producto (idProducto, ImgProducto, nombreProducto, descripcionProducto, valorUnitarioProducto, estadoProducto, operacion, usuario, fecha_modif) 
VALUES (OLD.idProducto, OLD.ImgProducto, OLD.nombreProducto, OLD.descripcionProducto, OLD.valorUnitarioProducto, OLD.estadoProducto, 'DELETE', CURRENT_USER(), NOW());

/*EJEMPLOS*/

INSERT INTO Producto (ImgProducto, nombreProducto, descripcionProducto, valorUnitarioProducto, estadoProducto) 
VALUES ('', 'Té', 'Bebida caliente', 1500, 'Nuevo');
SELECT * FROM Producto;
SELECT * FROM Triggers_Producto;

UPDATE Producto SET estadoProducto = 'Usado' WHERE idProducto = 5;
SELECT * FROM Producto;
SELECT * FROM Triggers_Producto;  

DELETE FROM Producto WHERE idProducto = 5;
SELECT * FROM Producto;
SELECT * FROM Triggers_Producto; 

/*_____*/

CREATE TABLE Triggers_Pedido 
(
    idPedido INT,
    fechaPedido DATETIME,
    cantidadPedido VARCHAR(100),
    valorUnitarioPedido DOUBLE,
    estadoPedido VARCHAR(50),
    idUsuario INT,
    idDomicilio INT,
    idProducto INT,
    operacion VARCHAR(10) NOT NULL, -- 'INSERT', 'UPDATE', 'DELETE'
    usuario VARCHAR(15),
    fecha_modif DATETIME
);

CREATE TRIGGER Pedido_AI 
AFTER INSERT ON Pedido 
FOR EACH ROW 
INSERT INTO Triggers_Pedido (idPedido, fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idUsuario, idDomicilio, idProducto, operacion, usuario, fecha_modif) 
VALUES (NEW.idPedido, NEW.fechaPedido, NEW.cantidadPedido, NEW.valorUnitarioPedido, NEW.estadoPedido, NEW.idUsuario, NEW.idDomicilio, NEW.idProducto, 'INSERT', CURRENT_USER(), NOW());

CREATE TRIGGER Pedido_BU 
BEFORE UPDATE ON Pedido 
FOR EACH ROW 
INSERT INTO Triggers_Pedido (idPedido, fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idUsuario, idDomicilio, idProducto, operacion, usuario, fecha_modif) 
VALUES (OLD.idPedido, OLD.fechaPedido, OLD.cantidadPedido, OLD.valorUnitarioPedido, OLD.estadoPedido, OLD.idUsuario, OLD.idDomicilio, OLD.idProducto, 'UPDATE', CURRENT_USER(), NOW());

CREATE TRIGGER Pedido_AD 
AFTER DELETE ON Pedido 
FOR EACH ROW 
INSERT INTO Triggers_Pedido (idPedido, fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idUsuario, idDomicilio, idProducto, operacion, usuario, fecha_modif) 
VALUES (OLD.idPedido, OLD.fechaPedido, OLD.cantidadPedido, OLD.valorUnitarioPedido, OLD.estadoPedido, OLD.idUsuario, OLD.idDomicilio, OLD.idProducto, 'DELETE', CURRENT_USER(), NOW());

/*EJEMPLOS*/

INSERT INTO Pedido (fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idUsuario, idDomicilio, idProducto) VALUES ('2024-02-14 10:00:00', '15', 2000, 'Pendiente', 1, 1, 1);
SELECT * FROM Pedido;
SELECT * FROM Triggers_Pedido;

UPDATE Pedido SET estadoPedido = 'Entregado' WHERE idPedido = 5;
SELECT * FROM Pedido;
SELECT * FROM Triggers_Pedido;

DELETE FROM Pedido WHERE idPedido = 5;
SELECT * FROM Pedido;
SELECT * FROM Triggers_Pedido;

/*_____*/

CREATE TABLE Triggers_Venta 
(
    idVenta INT,
    ImgProducto TEXT,
    categoria VARCHAR(50) NOT NULL,      
    nombreProducto VARCHAR(100) NOT NULL,  
    valorUnitario DOUBLE NOT NULL,      
    cantidad VARCHAR(100) NOT NULL,    
    valorTotal DOUBLE NOT NULL,        
    estadoProducto VARCHAR(50) NOT NULL,     
    idProducto INT NOT NULL,                  
    operacion VARCHAR(10) NOT NULL,          -- 'INSERT', 'UPDATE', 'DELETE'
    usuario VARCHAR(15),
    fecha_modif DATETIME
);


CREATE TRIGGER Venta_AI 
AFTER INSERT ON Venta 
FOR EACH ROW 
INSERT INTO Triggers_Venta (idVenta, ImgProducto, categoria, nombreProducto, valorUnitario, cantidad, valorTotal, estadoProducto, idProducto, operacion, usuario, fecha_modif) 
VALUES (NEW.idVenta, NEW.ImgProducto, NEW.categoria, NEW.nombreProducto, NEW.valorUnitario, NEW.cantidad, NEW.valorTotal, NEW.estadoProducto, NEW.idProducto, 'INSERT', CURRENT_USER(), NOW());

CREATE TRIGGER Venta_BU 
BEFORE UPDATE ON Venta 
FOR EACH ROW 
INSERT INTO Triggers_Venta (idVenta, ImgProducto, categoria, nombreProducto, valorUnitario, cantidad, valorTotal, estadoProducto, idProducto, operacion, usuario, fecha_modif) 
VALUES (OLD.idVenta, OLD.ImgProducto, OLD.categoria, OLD.nombreProducto, OLD.valorUnitario, OLD.cantidad, OLD.valorTotal, OLD.estadoProducto, OLD.idProducto, 'UPDATE', CURRENT_USER(), NOW());

CREATE TRIGGER Venta_AD 
AFTER DELETE ON Venta 
FOR EACH ROW 
INSERT INTO Triggers_Venta (idVenta, ImgProducto, categoria, nombreProducto, valorUnitario, cantidad, valorTotal, estadoProducto, idProducto, operacion, usuario, fecha_modif) 
VALUES (OLD.idVenta, OLD.ImgProducto, OLD.categoria, OLD.nombreProducto, OLD.valorUnitario, OLD.cantidad, OLD.valorTotal, OLD.estadoProducto, OLD.idProducto, 'DELETE', CURRENT_USER(), NOW());

/*EJEMPLOS*/

INSERT INTO Venta (ImgProducto, categoria, nombreProducto, valorUnitario, cantidad, valorTotal, estadoProducto, idProducto) VALUES ('', 'Galletas', 'Venta de Galletas', 2000, '10', 20000, 'Nuevo', 1);
SELECT * FROM Venta;
SELECT * FROM Triggers_Venta;

UPDATE Venta SET estadoProducto = 'Usado' WHERE idVenta = 5;
SELECT * FROM Venta;
SELECT * FROM Triggers_Venta;

DELETE FROM Venta WHERE idVenta = 5;
SELECT * FROM Venta;
SELECT * FROM Triggers_Venta;


/*______________________________PROCEDURE_______________________________________________________________*/

DELIMITER //

CREATE PROCEDURE sp_insert_rol(
    IN p_descripcionRol VARCHAR(100)
)
BEGIN
    INSERT INTO Rol (descripcionRol) VALUES (p_descripcionRol);
END //

CREATE PROCEDURE sp_update_rol(
    IN p_idRol INT,
    IN p_descripcionRol VARCHAR(100)
)
BEGIN
    UPDATE Rol SET descripcionRol = p_descripcionRol WHERE idRol = p_idRol;
END //

CREATE PROCEDURE sp_delete_rol(
    IN p_idRol INT
)
BEGIN
    DELETE FROM Rol WHERE idRol = p_idRol;
END //

CREATE PROCEDURE sp_get_all_roles()
BEGIN
    SELECT * FROM Rol;
END //

DELIMITER ;

/*EJEMPLOS*/

-- Insertar un nuevo rol
CALL sp_insert_rol('Vendedor');

-- Actualizar un rol existente
CALL sp_update_rol(1, 'Administrador');

-- Eliminar un rol
CALL sp_delete_rol(5);

-- Obtener todos los roles
CALL sp_get_all_roles();

 
/*_____*/

DELIMITER //

CREATE PROCEDURE sp_insert_usuario(
    IN p_tipoDocUsuario VARCHAR(6),
    IN p_numDocUsuario VARCHAR(15),
    IN p_nombreUsuario VARCHAR(40),
    IN p_apellidosUsuario VARCHAR(40),
    IN p_direccionUsuario VARCHAR(40),
    IN p_telefonoUsuario VARCHAR(12),
    IN p_correoUsuario VARCHAR(40),
    IN p_claveUsuario VARCHAR(20),
    IN p_fotoUsuario VARCHAR(255),
    IN p_estadoUsuario VARCHAR(20),
    IN p_idRol INT
)
BEGIN
    INSERT INTO Usuario (tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, direccionUsuario, telefonoUsuario, correoUsuario, claveUsuario, fotoUsuario, estadoUsuario, idRol)
    VALUES (p_tipoDocUsuario, p_numDocUsuario, p_nombreUsuario, p_apellidosUsuario, p_direccionUsuario, p_telefonoUsuario, p_correoUsuario, p_claveUsuario, p_fotoUsuario, p_estadoUsuario, p_idRol);
END //

CREATE PROCEDURE sp_update_usuario(
    IN p_idUsuario INT,
    IN p_tipoDocUsuario VARCHAR(6),
    IN p_numDocUsuario VARCHAR(15),
    IN p_nombreUsuario VARCHAR(40),
    IN p_apellidosUsuario VARCHAR(40),
    IN p_direccionUsuario VARCHAR(40),
    IN p_telefonoUsuario VARCHAR(12),
    IN p_correoUsuario VARCHAR(40),
    IN p_claveUsuario VARCHAR(20),
    IN p_fotoUsuario VARCHAR(255),
    IN p_estadoUsuario VARCHAR(20),
    IN p_idRol INT
)
BEGIN
    UPDATE Usuario
    SET tipoDocUsuario = p_tipoDocUsuario,
        numDocUsuario = p_numDocUsuario,
        nombreUsuario = p_nombreUsuario,
        apellidosUsuario = p_apellidosUsuario,
        direccionUsuario = p_direccionUsuario,
        telefonoUsuario = p_telefonoUsuario,
        correoUsuario = p_correoUsuario,
        claveUsuario = p_claveUsuario,
        fotoUsuario = p_fotoUsuario,
        estadoUsuario = p_estadoUsuario,
        idRol = p_idRol
    WHERE idUsuario = p_idUsuario;
END //

CREATE PROCEDURE sp_delete_usuario(
    IN p_idUsuario INT
)
BEGIN
    DELETE FROM Usuario WHERE idUsuario = p_idUsuario;
END //

CREATE PROCEDURE sp_get_all_usuarios()
BEGIN
    SELECT * FROM Usuario;
END //

DELIMITER ;

/*EJEMPLOS*/

-- Insertar un nuevo usuario
CALL sp_insert_usuario('C.C', '1234567890', 'Carlos', 'Perez', 'Calle 10 #20-30', '3001234567', 'carlos@gmail.com', 'carlospass', '', 'Activo', 2);

-- Actualizar un usuario existente
CALL sp_update_usuario(1, 'C.C', '1031648256', 'Abraham', 'Boada', 'Calle 13 Este #66-15 Sur', '3134142106', 'abrahamboada95@gmail.com', 'abraham12345', '', 'Activo', 2);

-- Eliminar un usuario
CALL sp_delete_usuario(6);

-- Obtener todos los usuarios
CALL sp_get_all_usuarios();


/*_____*/

DELIMITER //

CREATE PROCEDURE sp_insert_domicilio(
    IN p_horaDomicilio TIME(0),
    IN p_estadoDomicilio VARCHAR(6),
    IN p_idUsuario INT
)
BEGIN
    INSERT INTO Domicilio (horaDomicilio, estadoDomicilio, idUsuario) VALUES (p_horaDomicilio, p_estadoDomicilio, p_idUsuario);
END //

CREATE PROCEDURE sp_update_domicilio(
    IN p_idDomicilio INT,
    IN p_horaDomicilio TIME(0),
    IN p_estadoDomicilio VARCHAR(15),
    IN p_idUsuario INT
)
BEGIN
    UPDATE Domicilio
    SET horaDomicilio = p_horaDomicilio,
        estadoDomicilio = p_estadoDomicilio,
        idUsuario = p_idUsuario
    WHERE idDomicilio = p_idDomicilio;
END //

CREATE PROCEDURE sp_delete_domicilio(
    IN p_idDomicilio INT
)
BEGIN
    DELETE FROM Domicilio WHERE idDomicilio = p_idDomicilio;
END //

CREATE PROCEDURE sp_get_all_domicilios()
BEGIN
    SELECT * FROM Domicilio;
END //

DELIMITER ;

/*EJEMPLOS*/

-- Insertar un nuevo domicilio
CALL sp_insert_domicilio('14:30:00', 'Activo', 1);

-- Actualizar un domicilio existente
CALL sp_update_domicilio(1, '12:00:00', 'Inactivo', 2);

-- Eliminar un domicilio
CALL sp_delete_domicilio(6);

-- Obtener todos los domicilios
CALL sp_get_all_domicilios();


/*_____*/

DELIMITER //

CREATE PROCEDURE sp_insert_producto(
    IN p_ImgProducto TEXT,
    IN p_categoria VARCHAR(50),  -- Nueva columna
    IN p_nombreProducto VARCHAR(100),
    IN p_descripcionProducto VARCHAR(255),
    IN p_valorUnitarioProducto DOUBLE,
    IN p_estadoProducto VARCHAR(50)
)
BEGIN
    INSERT INTO Producto (ImgProducto, categoria, nombreProducto, descripcionProducto, valorUnitarioProducto, estadoProducto)
    VALUES (p_ImgProducto, p_categoria, p_nombreProducto, p_descripcionProducto, p_valorUnitarioProducto, p_estadoProducto);
END //

CREATE PROCEDURE sp_update_producto(
    IN p_idProducto INT,
    IN p_ImgProducto TEXT,
    IN p_categoria VARCHAR(50),  -- Nueva columna
    IN p_nombreProducto VARCHAR(100),
    IN p_descripcionProducto VARCHAR(255),
    IN p_valorUnitarioProducto DOUBLE,
    IN p_estadoProducto VARCHAR(50)
)
BEGIN
    UPDATE Producto
    SET ImgProducto = p_ImgProducto,
        categoria = p_categoria,  -- Nueva columna
        nombreProducto = p_nombreProducto,
        descripcionProducto = p_descripcionProducto,
        valorUnitarioProducto = p_valorUnitarioProducto,
        estadoProducto = p_estadoProducto
    WHERE idProducto = p_idProducto;
END //

CREATE PROCEDURE sp_delete_producto(
    IN p_idProducto INT
)
BEGIN
    DELETE FROM Producto WHERE idProducto = p_idProducto;
END //

CREATE PROCEDURE sp_get_all_productos()
BEGIN
    SELECT * FROM Producto;
END //

DELIMITER ;

/*EJEMPLOS*/

-- Insertar un nuevo producto
CALL sp_insert_producto('', 'Bebida', 'Agua Mineral', 'Bebida sin gas', 1500, 'Nuevo');

-- Actualizar un producto existente
CALL sp_update_producto(1, '', 'Bebida', 'Gaseosa', 'Bebida carbonatada', 1200, 'Nuevo');

-- Eliminar un producto
CALL sp_delete_producto(3);

-- Obtener todos los productos
CALL sp_get_all_productos();


/*_____*/

DELIMITER //

CREATE PROCEDURE sp_insert_pedido(
    IN p_fechaPedido DATETIME,
    IN p_cantidadPedido VARCHAR(100),
    IN p_valorUnitarioPedido DOUBLE,
    IN p_estadoPedido VARCHAR(50),
    IN p_idUsuario INT,
    IN p_idDomicilio INT,
    IN p_idProducto INT
)
BEGIN
    INSERT INTO Pedido (fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idUsuario, idDomicilio, idProducto)
    VALUES (p_fechaPedido, p_cantidadPedido, p_valorUnitarioPedido, p_estadoPedido, p_idUsuario, p_idDomicilio, p_idProducto);
END //

CREATE PROCEDURE sp_update_pedido(
    IN p_idPedido INT,
    IN p_fechaPedido DATETIME,
    IN p_cantidadPedido VARCHAR(100),
    IN p_valorUnitarioPedido DOUBLE,
    IN p_estadoPedido VARCHAR(50),
    IN p_idUsuario INT,
    IN p_idDomicilio INT,
    IN p_idProducto INT
)
BEGIN
    UPDATE Pedido
    SET fechaPedido = p_fechaPedido,
        cantidadPedido = p_cantidadPedido,
        valorUnitarioPedido = p_valorUnitarioPedido,
        estadoPedido = p_estadoPedido,
        idUsuario = p_idUsuario,
        idDomicilio = p_idDomicilio,
        idProducto = p_idProducto
    WHERE idPedido = p_idPedido;
END //

CREATE PROCEDURE sp_delete_pedido(
    IN p_idPedido INT
)
BEGIN
    DELETE FROM Pedido WHERE idPedido = p_idPedido;
END //

CREATE PROCEDURE sp_get_all_pedidos()
BEGIN
    SELECT * FROM Pedido;
END //

DELIMITER ;

/*EJEMPLOS*/

-- Insertar un nuevo pedido
CALL sp_insert_pedido('2024-03-15 12:00:00', '5', 2500, 'Pendiente', 2, 1, 1);

-- Actualizar un pedido existente
CALL sp_update_pedido(6, '2024-02-02 12:23:12', '10', 1000, 'Entregado', 1, 1, 1);

-- Eliminar un pedido
CALL sp_delete_pedido(2);

-- Obtener todos los pedidos
CALL sp_get_all_pedidos();

/*_____*/

DELIMITER //

CREATE PROCEDURE sp_insert_venta(
    IN p_ImgProducto TEXT,
    IN p_categoria VARCHAR(50),           
    IN p_nombreProducto VARCHAR(100),     
    IN p_valorUnitario DOUBLE,
    IN p_cantidad VARCHAR(100),        
    IN p_valorTotal DOUBLE,               
    IN p_estadoProducto VARCHAR(50),
    IN p_idProducto INT
)
BEGIN
    INSERT INTO Venta (ImgProducto, categoria, nombreProducto, valorUnitario, cantidad, valorTotal, estadoProducto, idProducto)
    VALUES (p_ImgProducto, p_categoria, p_nombreProducto, p_valorUnitario, p_cantidad, p_valorTotal, p_estadoProducto, p_idProducto);
END //

CREATE PROCEDURE sp_update_venta(
    IN p_idVenta INT,
    IN p_ImgProducto TEXT,
    IN p_categoria VARCHAR(50),           
    IN p_nombreProducto VARCHAR(100),    
    IN p_valorUnitario DOUBLE,
    IN p_cantidad VARCHAR(100),           
    IN p_valorTotal DOUBLE,                
    IN p_estadoProducto VARCHAR(50),
    IN p_idProducto INT
)
BEGIN
    UPDATE Venta
    SET ImgProducto = p_ImgProducto,
        categoria = p_categoria,             
        nombreProducto = p_nombreProducto,   
        valorUnitario = p_valorUnitario,
        cantidad = p_cantidad,           
        valorTotal = p_valorTotal,         
        estadoProducto = p_estadoProducto,
        idProducto = p_idProducto
    WHERE idVenta = p_idVenta;
END //

CREATE PROCEDURE sp_delete_venta(
    IN p_idVenta INT
)
BEGIN
    DELETE FROM Venta WHERE idVenta = p_idVenta;
END //

CREATE PROCEDURE sp_get_all_ventas()
BEGIN
    SELECT * FROM Venta;
END //

DELIMITER ;

/* EJEMPLOS */

-- Insertar una nueva venta
CALL sp_insert_venta('', 'Bebidas', 'Venta de Agua Mineral', 1500, '10', 15000, 'Nuevo', 1);

-- Actualizar una venta existente
CALL sp_update_venta(1, '', 'Bebidas', 'Venta de Gaseosa', 1200, '5', 6000, 'Usado', 1);

-- Eliminar una venta
CALL sp_delete_venta(4);

-- Obtener todas las ventas
CALL sp_get_all_ventas();

/*___________________________________CRUD___________________________________________________________*/

DELIMITER $$

CREATE PROCEDURE CrudRol (
    IN CRUD VARCHAR(10),
    IN _idRol INT,
    IN _descripcionRol VARCHAR(100)
)
BEGIN 
    CASE CRUD
        WHEN 'Insertar' THEN 
            INSERT INTO Rol (descripcionRol) VALUES (_descripcionRol);
            
        WHEN 'Actualizar' THEN
            UPDATE Rol 
            SET descripcionRol = _descripcionRol
            WHERE idRol = _idRol;
            
        WHEN 'Consulta' THEN 
            SELECT * FROM Rol 
            WHERE idRol = _idRol;
            
        WHEN 'Eliminar' THEN 
            DELETE FROM Rol 
            WHERE idRol = _idRol;
    END CASE;
END $$

DELIMITER ;

/*EJEMPLOS*/

CALL CrudRol('Insertar', NULL, 'Supervisor');
CALL CrudRol('Actualizar', 6, 'Repartidor');
CALL CrudRol('Consulta', 1, '');
CALL CrudRol('Eliminar', 6, '');

/*_____*/

DELIMITER $$

CREATE PROCEDURE CrudUsuario (
    IN CRUD VARCHAR(10),
    IN _idUsuario INT,
    IN _tipoDocUsuario VARCHAR(6),
    IN _numDocUsuario VARCHAR(15),
    IN _nombreUsuario VARCHAR(40),
    IN _apellidosUsuario VARCHAR(40),
    IN _direccionUsuario VARCHAR(40),
    IN _telefonoUsuario VARCHAR(12),
    IN _correoUsuario VARCHAR(40),
    IN _claveUsuario VARCHAR(20),
    IN _fotoUsuario BLOB,
    IN _estadoUsuario VARCHAR(20),
    IN _idRol INT
)
BEGIN 
    CASE CRUD
        WHEN 'Insertar' THEN 
            INSERT INTO Usuario (tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, 
                                 direccionUsuario, telefonoUsuario, correoUsuario, 
                                 claveUsuario, fotoUsuario, estadoUsuario, idRol) 
            VALUES (_tipoDocUsuario, _numDocUsuario, _nombreUsuario, _apellidosUsuario, 
                    _direccionUsuario, _telefonoUsuario, _correoUsuario, 
                    _claveUsuario, _fotoUsuario, _estadoUsuario, _idRol);
                    
        WHEN 'Actualizar' THEN
            UPDATE Usuario 
            SET tipoDocUsuario = _tipoDocUsuario,
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
            WHERE idUsuario = _idUsuario;
            
        WHEN 'Consulta' THEN 
            SELECT * FROM Usuario 
            WHERE idUsuario = _idUsuario;
            
        WHEN 'Eliminar' THEN 
            DELETE FROM Usuario 
            WHERE idUsuario = _idUsuario;
    END CASE;
END $$

DELIMITER ;

/*EJEMPLOS*/

CALL CrudUsuario('Insertar', NULL, 'C.C', '2467891234', 'Sofia', 'Martinez', 
                 'calle 12 Este #10-20', '3012345678', 
                 'sofia@gmail.com', 'sofia123', '', 
                 'Activo', 2);
CALL CrudUsuario('Actualizar', 7, 'C.C', '2456789123', 'Pedro', 'Alvarez', 
                 'calle 15 Este #12-15', '3005678901', 
                 'pedro@gmail.com', 'pedro123', '', 
                 'Activo', 1);
CALL CrudUsuario('Consulta', 2, '', '', '', '', '', '', '', '', '', '', '');
CALL CrudUsuario('Eliminar', 7, '', '', '', '', '', '', '', '', '', '', '');


/*_____*/

DELIMITER $$

CREATE PROCEDURE CrudDomicilio (
    IN CRUD VARCHAR(10),
    IN _idDomicilio INT,
    IN _horaDomicilio TIME,
    IN _estadoDomicilio VARCHAR(6),
    IN _idUsuario INT
)
BEGIN 
    CASE CRUD
        WHEN 'Insertar' THEN 
            INSERT INTO Domicilio (horaDomicilio, estadoDomicilio, idUsuario) 
            VALUES (_horaDomicilio, _estadoDomicilio, _idUsuario);
            
        WHEN 'Actualizar' THEN
            UPDATE Domicilio 
            SET horaDomicilio = _horaDomicilio,
                estadoDomicilio = _estadoDomicilio,
                idUsuario = _idUsuario
            WHERE idDomicilio = _idDomicilio;
            
        WHEN 'Consulta' THEN 
            SELECT * FROM Domicilio 
            WHERE idDomicilio = _idDomicilio;
            
        WHEN 'Eliminar' THEN 
            DELETE FROM Domicilio 
            WHERE idDomicilio = _idDomicilio;
    END CASE;
END $$

DELIMITER ;

/*EJEMPLOS*/

CALL CrudDomicilio('Insertar', NULL, '14:30:00', 'Activo', 1);
CALL CrudDomicilio('Actualizar', 7, '15:00:00', 'Inactivo', 2);
CALL CrudDomicilio('Consulta', 2, '', '', '');
CALL CrudDomicilio('Eliminar', 7, '', '', '');


/*_____*/

DELIMITER $$

CREATE PROCEDURE CrudProducto (
    IN CRUD VARCHAR(10),
    IN _idProducto INT,
    IN _ImgProducto TEXT,
    IN _categoria VARCHAR(50), 
    IN _nombreProducto VARCHAR(100),
    IN _descripcionProducto VARCHAR(255),
    IN _valorUnitarioProducto DOUBLE,
    IN _estadoProducto VARCHAR(50)
)
BEGIN 
    CASE CRUD
        WHEN 'Insertar' THEN 
            INSERT INTO Producto (ImgProducto, categoria, nombreProducto, descripcionProducto, 
                                  valorUnitarioProducto, estadoProducto) 
            VALUES (_ImgProducto, _categoria, _nombreProducto, _descripcionProducto, 
                    _valorUnitarioProducto, _estadoProducto);
            
        WHEN 'Actualizar' THEN
            UPDATE Producto 
            SET ImgProducto = _ImgProducto,
                categoria = _categoria, 
                nombreProducto = _nombreProducto,
                descripcionProducto = _descripcionProducto,
                valorUnitarioProducto = _valorUnitarioProducto,
                estadoProducto = _estadoProducto
            WHERE idProducto = _idProducto;
            
        WHEN 'Consulta' THEN 
            SELECT * FROM Producto 
            WHERE idProducto = _idProducto;
            
        WHEN 'Eliminar' THEN 
            DELETE FROM Producto 
            WHERE idProducto = _idProducto;
    END CASE;
END $$

DELIMITER ;

/*EJEMPLOS*/

CALL CrudProducto('Insertar', NULL, '', 'Bebida', 'Agua Mineral', 'Agua purificada', 1500, 'Nuevo');
CALL CrudProducto('Actualizar', 7, '', 'Bebida', 'Gaseosa', 'Bebida refrescante', 1200, 'Usado');
CALL CrudProducto('Consulta', 2, '', '', '', '', '', '');
CALL CrudProducto('Eliminar', 7, '', '', '', '', '', '');


/*_____*/

DELIMITER $$

CREATE PROCEDURE CrudPedido (
    IN CRUD VARCHAR(10),
    IN _idPedido INT,
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
        WHEN 'Insertar' THEN 
            INSERT INTO Pedido (fechaPedido, cantidadPedido, valorUnitarioPedido, 
                                estadoPedido, idUsuario, idDomicilio, idProducto) 
            VALUES (_fechaPedido, _cantidadPedido, _valorUnitarioPedido, 
                    _estadoPedido, _idUsuario, _idDomicilio, _idProducto);
            
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
            SELECT * FROM Pedido 
            WHERE idPedido = _idPedido;
            
        WHEN 'Eliminar' THEN 
            DELETE FROM Pedido 
            WHERE idPedido = _idPedido;
    END CASE;
END $$

DELIMITER ;

/*EJEMPLOS*/

CALL CrudPedido('Insertar', NULL, '2024-09-16 10:00:00', '5', 2000, 'Enviado', 2, 1, 1);
CALL CrudPedido('Actualizar', 7, '2024-09-17 11:00:00', '10', 1500, 'Entregado', 1, 1, 1);
CALL CrudPedido('Consulta', 6, '', '', '', '', '', '', '');
CALL CrudPedido('Eliminar', 7, '', '', '', '', '', '', '');


/*_____*/

DELIMITER $$

CREATE PROCEDURE CrudVenta (
    IN CRUD VARCHAR(10),
    IN _idVenta INT,
    IN _ImgProducto TEXT,
    IN _categoria VARCHAR(50),             
    IN _nombreProducto VARCHAR(100),    
    IN _valorUnitario DOUBLE,
    IN _cantidad VARCHAR(100),            
    IN _valorTotal DOUBLE,                   
    IN _estadoProducto VARCHAR(50),
    IN _idProducto INT
)
BEGIN 
    CASE CRUD
        WHEN 'Insertar' THEN 
            INSERT INTO Venta (ImgProducto, categoria, nombreProducto, valorUnitario, 
                               cantidad, valorTotal, estadoProducto, idProducto) 
            VALUES (_ImgProducto, _categoria, _nombreProducto, _valorUnitario, 
                    _cantidad, _valorTotal, _estadoProducto, _idProducto);
            
        WHEN 'Actualizar' THEN
            UPDATE Venta 
            SET ImgProducto = _ImgProducto,
                categoria = _categoria,           
                nombreProducto = _nombreProducto, 
                valorUnitario = _valorUnitario,
                cantidad = _cantidad,             
                valorTotal = _valorTotal,        
                estadoProducto = _estadoProducto,
                idProducto = _idProducto
            WHERE idVenta = _idVenta;
            
        WHEN 'Consulta' THEN 
            SELECT * FROM Venta 
            WHERE idVenta = _idVenta;
            
        WHEN 'Eliminar' THEN 
            DELETE FROM Venta 
            WHERE idVenta = _idVenta;
    END CASE;
END $$

DELIMITER ;

/* EJEMPLOS */

CALL CrudVenta('Insertar', NULL, '', 'Bebidas', 'Venta de Galletas', 2000, '10', 20000, 'Nuevo', 1);
CALL CrudVenta('Actualizar', 7, '', 'Bebidas', 'Chocolatina', 2500, '5', 12500, 'Usado', 2);
CALL CrudVenta('Consulta', 6, '', '', '', '', '', '', '', '');  
CALL CrudVenta('Eliminar', 7, '', '', '', '', '', '', '', ''); 

FLUSH TABLES QUICKWIT; /*Accion para poder cerrar todas las tablas ejecutadas*/