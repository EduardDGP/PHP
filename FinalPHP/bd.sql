create database restaurante;

use restaurante;

-- Crear la tabla de Clientes
CREATE TABLE if not exists Clientes (
    correo VARCHAR(25) PRIMARY KEY,
    contrasena VARCHAR(25)
);

-- Crear la tabla de Empleados
CREATE TABLE if not exists Empleados (
    usuario VARCHAR(25),
    contrasena VARCHAR(25)
);

-- Crear la tabla de Reservas
CREATE TABLE if not exists Reservas (
    fecha date,
    hora time,
    mesa int,
    Descripcion VARCHAR(255),
    correo_clientes(255),
    foreign KEY (correo_clientes) references  Clientes(correo),
    constraint pk_reesrvas PRIMARY KEY (fecha, hora, mesa)
);

insert into Empleados (usuario, contrasena) values ('admin','admin');