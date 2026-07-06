CREATE TABLE departamentos(
	id SERIAL PRIMARY KEY,
	nombre VARCHAR(50) NOT NULL,
	ciudad VARCHAR(100) NOT NULL
);

CREATE TABLE empleados(
	id SERIAL PRIMARY KEY,
	nombre VARCHAR(50) NOT NULL,
	apellidos VARCHAR(100) NOT NULL,
	salario MONEY NOT NULL,
	comision MONEY,
	fecha_contrato DATE,
	id_departamento SERIAL,--FK
	CONSTRAINT fk_departamento FOREIGN KEY(id_departamento) REFERENCES departamentos(id)
);

ALTER TABLE empleados
	ADD COLUMN id_empleado_jefe INT --FK
;

ALTER TABLE empleados
	ADD CONSTRAINT fk_empleado FOREIGN KEY(id_empleado_jefe) REFERENCES empleados(id);

