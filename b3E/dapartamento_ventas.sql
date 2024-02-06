-- Crear la base de datos
CREATE DATABASE DEPARTAMENTOS;

-- Usar la base de datos
USE DEPARTAMENTOS;

-- Crear la tabla de empleados
CREATE TABLE empleados (
    dni VARCHAR(10) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50) NOT NULL,
    es_candidato BOOLEAN NOT NULL,
    vota_a VARCHAR(9) 
);

-- Insertar empleados iniciales
INSERT INTO empleados (dni, nombre, apellido1, apellido2, es_candidato) VALUES
('11111111B', 'Mario', 'Torres', 'Gonzalez', true),
('22222222Z', 'Sara', 'Garcia', 'Millena', true),
('33333333A', 'Javier', 'Lopez', 'Diaz', false),
('44444444X', 'Marina', 'Gutierrez', 'Cano', false);

-- Crear un usuario para acceder a la base de datos
CREATE USER 'gestor_empleados'@'localhost' IDENTIFIED BY 'gestorGESTOR2';
GRANT ALL PRIVILEGES ON DEPARTAMENTOS.* TO 'gestor_empleados'@'localhost';
FLUSH PRIVILEGES;
