-- AUTORES
CREATE TABLE autores(
	id SERIAL PRIMARY KEY,
	nombre VARCHAR(100),
	apellidos VARCHAR(100),
	nacionalidad VARCHAR(50)
);

--LIBROS
CREATE TABLE libros(
	id SERIAL PRIMARY KEY,
	isbn VARCHAR(13),
	titulo VARCHAR(100),
	ano_publicacion INT,
	editorial VARCHAR(50)
);


--LIBROS-AUTORES
CREATE TABLE AUTORIA(
	id_autor SERIAL,
	id_libro SERIAL,
	PRIMARY KEY(id_autor, id_libro),--la PK es la combinación de las dos
	CONSTRAINT fk_autor FOREIGN KEY (id_autor) REFERENCES autores(id),--clave foranea
	CONSTRAINT fk_libro FOREIGN KEY (id_libro) REFERENCES libros(id)--clave foranea
);

--SOCIOS
CREATE TABLE socios(
	num_socio SERIAL PRIMARY KEY, 
	nombre VARCHAR(50),
	apellidos VARCHAR(100),
	direccion VARCHAR(100),
	telefono INT,
	email VARCHAR(50)
);

--PRESTAMO
CREATE TABLE prestamo(
	id SERIAL PRIMARY KEY,
	id_socio SERIAL,
	id_libro SERIAL,
	fecha_prestamo TIMESTAMP,
	fecha_prevista_devol DATE,
	fecha_real_devol DATE,
	CONSTRAINT fk_socio FOREIGN KEY(id_socio) REFERENCES socios(num_socio),
	CONSTRAINT fk_libro FOREIGN KEY(id_libro) REFERENCES libros(id)
);


