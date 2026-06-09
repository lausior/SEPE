-- CREAR LA DB
CREATE DATABASE listado;

-- CREAR TABLA
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    apellidos VARCHAR(100),
    dni VARCHAR(9),
    edad int(3),
    localidad VARCHAR(100)
);

