
-- Base de Datos ZOO

CREATE DATABASE  IF NOT EXISTS ZOO  charset=utf8;
USE ZOO;

-- TABLA CUIDADORES

CREATE TABLE IF NOT EXISTS CUIDADORES (
  DNI CHAR(9) NOT NULL,
  NOMBRE CHAR(50) NOT NULL,
  APELLIDOS CHAR(50),
  FECHA_NAC DATE,
  LOCALIDAD CHAR (60),
  PRIMARY KEY (DNI)
) ENGINE=InnoDB charset=utf8;


-- TABLA USUARIOS

CREATE TABLE IF NOT EXISTS USUARIOS (
  COD_USUARIO CHAR(5) NOT NULL,
  NOMBRE CHAR(50) NOT NULL,
  CLAVE CHAR(20) NOT NULL,
  PRIMARY KEY (COD_USUARIO)
) ENGINE=InnoDB charset=utf8;

-- TABLA ANIMALES

CREATE TABLE IF NOT EXISTS ANIMALES (
  COD_ANIMAL INT(5) NOT NULL,
  NOMBRE CHAR(10) NOT NULL,
  TIPO_ANIMAL CHAR(10) NOT NULL,
  GENERO CHAR(12),
  EDAD INT(4),
  TIPO_COMIDA CHAR(16),
  CUIDADOR CHAR(9) NOT NULL,
  PRIMARY KEY (COD_ANIMAL), 
  FOREIGN KEY (CUIDADOR) REFERENCES CUIDADORES(DNI)
) ENGINE=InnoDB charset=utf8;

-- INSERTAR DATOS EN TABLA CUIDADORES

INSERT INTO CUIDADORES (DNI, NOMBRE, APELLIDOS, FECHA_NAC, LOCALIDAD) VALUES
('25485755D', 'Jesus', 'Sanchez Olmedo', '1958/05/21', 'Malaga'),
('54254123P', 'Antonio', 'Dominguez Garcia', '1968/05/10', 'Malaga'),
('45752365J', 'Miriam', 'Garcia Fernandez', '1975/12/18', 'Malaga'),
('57894562H', 'Jennifer', 'Fernandez Florido', '1988/08/07', 'Malaga');


-- INSERTAR DATOS EN TABLA USUARIOS

INSERT INTO USUARIOS (COD_USUARIO, NOMBRE, CLAVE) VALUES
('001', 'Administrador', 'admin'),
('002', 'Jesus', 'jesus'),
('003', 'Antonio', 'antonio'),
('004', 'Miriam', 'miriam'),
('005', 'Jennifer', 'jennifer');


-- INSERTAR DATOS EN TABLA ANIMALES

INSERT INTO ANIMALES (COD_ANIMAL, NOMBRE, TIPO_ANIMAL, GENERO, EDAD ,TIPO_COMIDA, CUIDADOR) VALUES
('1', 'Bobby', 'Gorila', 'Macho', '10', 'Platano', '54254123P'),
('2', 'Samanta', 'Serpiente', 'Hembra', '2', 'Ratones', '25485755D'),
('3', 'Simba', 'Leon', 'Macho', '6', 'Carne', '57894562H'),
('4', 'Timon', 'Lemur', 'Hembra', '5', 'Insectos', '45752365J'),
('5', 'Dumbo', 'Elefante', 'Macho', '7', 'Cacahuetes', '25485755D'),
('6', 'Lenny', 'Tigre', 'Hembra', '3', 'Carne', '57894562H');
