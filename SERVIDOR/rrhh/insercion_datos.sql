-- Insertar departamentos
INSERT INTO departamentos (nombre, ciudad) VALUES 
('Ventas', 'Madrid'),
('Marketing', 'Barcelona'),
('Recursos Humanos', 'Valencia'),
('Tecnología', 'Madrid'),
('Finanzas', 'Barcelona'),
('Logística', 'Sevilla'),
('Calidad', 'Bilbao'),
('I+D', 'Madrid'),
('Atención al Cliente', 'Valencia'),
('Compras', 'Zaragoza');

-- Insertar empleados (primero los que no tienen jefe, luego los que sí)
-- NOTA: Los empleados sin jefe (id_empleado_jefe = NULL) deben insertarse primero

-- Empleados sin jefe (directivos)
INSERT INTO empleados (nombre, apellidos, salario, comision, fecha_contrato, id_departamento, id_empleado_jefe) VALUES 
('Ana', 'García Martínez', 85000, 10000, '2010-01-15', 1, NULL),  -- Directora de Ventas
('Carlos', 'López Fernández', 82000, 9500, '2011-03-20', 2, NULL), -- Director de Marketing
('María', 'Sánchez Rodríguez', 78000, 8000, '2012-05-10', 3, NULL), -- Directora de RRHH
('Javier', 'Pérez Gómez', 90000, 12000, '2009-11-01', 4, NULL),  -- Director de Tecnología
('Laura', 'Martínez Ruiz', 80000, 9000, '2011-08-15', 5, NULL),  -- Directora de Finanzas
('Miguel', 'Álvarez Moreno', 75000, 7000, '2013-02-20', 6, NULL); -- Director de Logística

-- Empleados con jefe (departamento de Ventas - jefe: Ana García)
INSERT INTO empleados (nombre, apellidos, salario, comision, fecha_contrato, id_departamento, id_empleado_jefe) VALUES 
('Pedro', 'González Romero', 45000, 5000, '2015-06-01', 1, 1),
('Elena', 'Díaz Pérez', 42000, 4500, '2016-09-15', 1, 1),
('Sergio', 'Ramírez Gil', 38000, 3500, '2017-11-20', 1, 1),
('Patricia', 'Navarro Ortiz', 41000, 4000, '2018-04-10', 1, 1);

-- Empleados con jefe (departamento de Marketing - jefe: Carlos López)
INSERT INTO empleados (nombre, apellidos, salario, comision, fecha_contrato, id_departamento, id_empleado_jefe) VALUES 
('Lucía', 'Serrano Torres', 43000, 4800, '2015-08-05', 2, 2),
('Andrés', 'Molina Jiménez', 39000, 4000, '2016-12-12', 2, 2),
('Cristina', 'Reyes Sánchez', 37000, 3500, '2017-07-25', 2, 2);

-- Empleados con jefe (departamento de Recursos Humanos - jefa: María Sánchez)
INSERT INTO empleados (nombre, apellidos, salario, comision, fecha_contrato, id_departamento, id_empleado_jefe) VALUES 
('Francisco', 'Ortega Martín', 40000, 4000, '2016-03-14', 3, 3),
('Marta', 'Vega Flores', 36000, 3000, '2017-10-01', 3, 3);

-- Empleados con jefe (departamento de Tecnología - jefe: Javier Pérez)
INSERT INTO empleados (nombre, apellidos, salario, comision, fecha_contrato, id_departamento, id_empleado_jefe) VALUES 
('Roberto', 'Garrido Morales', 55000, 6000, '2014-07-01', 4, 4),
('Silvia', 'Castro López', 48000, 5000, '2015-09-20', 4, 4),
('Daniel', 'Herrero Cano', 42000, 4000, '2016-11-11', 4, 4),
('Alicia', 'Nuñez Vázquez', 50000, 5500, '2016-02-28', 4, 4),
('Oscar', 'Campos Moreno', 46000, 4500, '2017-05-15', 4, 4);

-- Empleados con jefe (departamento de Finanzas - jefa: Laura Martínez)
INSERT INTO empleados (nombre, apellidos, salario, comision, fecha_contrato, id_departamento, id_empleado_jefe) VALUES 
('Susana', 'Delgado Pardo', 44000, 4800, '2015-10-08', 5, 5),
('Manuel', 'Domínguez Pérez', 40000, 4000, '2016-07-19', 5, 5),
('Beatriz', 'Cabrera Sánchez', 38000, 3500, '2017-12-03', 5, 5);

-- Empleados con jefe (departamento de Logística - jefe: Miguel Álvarez)
INSERT INTO empleados (nombre, apellidos, salario, comision, fecha_contrato, id_departamento, id_empleado_jefe) VALUES 
('Rafael', 'Méndez Ruiz', 39000, 3800, '2016-04-22', 6, 6),
('Nuria', 'Pardo Gómez', 36000, 3200, '2017-08-14', 6, 6),
('Jesús', 'Cortés Díez', 34000, 3000, '2018-01-30', 6, 6);