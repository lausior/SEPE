-- CREAR TABLA
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100),
    apellidos VARCHAR(100),
    dni VARCHAR(9),
    localidad VARCHAR(100),
    email VARCHAR(100)
);

