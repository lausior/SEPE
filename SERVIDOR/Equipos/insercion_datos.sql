--EQUIPOS
INSERT INTO equipos (marca, modelo, numero_serie, fecha_adquisicion, ubicacion, caracteristicas)
VALUES
('Dell', 'OptiPlex 7010', 'DL7010-0001', '2023-01-15', 'Laboratorio A', 'Intel Core i5, 16 GB RAM, SSD 512 GB'),
('HP', 'ProDesk 400 G9', 'HP400G9-0002', '2023-03-22', 'Oficina 101', 'Intel Core i7, 32 GB RAM, SSD 1 TB'),
('Lenovo', 'ThinkCentre M70q', 'LNM70Q-0003', '2022-11-08', 'Biblioteca', 'Intel Core i5, 8 GB RAM, SSD 256 GB'),
('Apple', 'Mac mini M2', 'APMM2-0004', '2024-02-10', 'Departamento de Diseño', 'Chip M2, 16 GB RAM, SSD 512 GB'),
('ASUS', 'ExpertCenter D5', 'ASD5-0005', '2023-09-05', 'Sala de Reuniones', 'Intel Core i5, 16 GB RAM, SSD 512 GB'),
('Acer', 'Veriton X', 'ACVX-0006', '2022-07-18', 'Recepción', 'Intel Core i3, 8 GB RAM, SSD 256 GB')

INSERT INTO equipos (marca, modelo, numero_serie, fecha_adquisicion, ubicacion, caracteristicas)
VALUES
('MSI', 'PRO DP21', 'MSIDP21-0007', '2024-01-30', 'Laboratorio B', 'Intel Core i7, 32 GB RAM, SSD 1 TB'),
('Fujitsu', 'Esprimo D7012', 'FJD7012-0008', '2023-06-12', 'Administración', 'Intel Core i5, 16 GB RAM, SSD 512 GB'),
('Dell', 'Latitude 5540', 'DLLAT5540-0009', '2024-04-08', 'Dirección', 'Portátil, Intel Core i7, 16 GB RAM, SSD 512 GB'),
('HP', 'EliteBook 840 G10', 'HPEB840-0010', '2024-05-15', 'Departamento de RRHH', 'Portátil, Intel Core i5, 16 GB RAM, SSD 512 GB');

--EQUIPOS
INSERT INTO equipos (marca, modelo, numero_serie, fecha_adquisicion, ubicacion, caracteristicas)
VALUES
('Dell', 'OptiPlex 7010', 'DL7010-0001', '2023-01-15', 'Laboratorio A', 'Intel Core i5, 16 GB RAM, SSD 512 GB'),
('HP', 'ProDesk 400 G9', 'HP400G9-0002', '2023-03-22', 'Oficina 101', 'Intel Core i7, 32 GB RAM, SSD 1 TB'),
('Lenovo', 'ThinkCentre M70q', 'LNM70Q-0003', '2022-11-08', 'Biblioteca', 'Intel Core i5, 8 GB RAM, SSD 256 GB'),
('Apple', 'Mac mini M2', 'APMM2-0004', '2024-02-10', 'Departamento de Diseño', 'Chip M2, 16 GB RAM, SSD 512 GB'),
('ASUS', 'ExpertCenter D5', 'ASD5-0005', '2023-09-05', 'Sala de Reuniones', 'Intel Core i5, 16 GB RAM, SSD 512 GB'),
('Acer', 'Veriton X', 'ACVX-0006', '2022-07-18', 'Recepción', 'Intel Core i3, 8 GB RAM, SSD 256 GB'),
('MSI', 'PRO DP21', 'MSIDP21-0007', '2024-01-30', 'Laboratorio B', 'Intel Core i7, 32 GB RAM, SSD 1 TB'),
('Fujitsu', 'Esprimo D7012', 'FJD7012-0008', '2023-06-12', 'Administración', 'Intel Core i5, 16 GB RAM, SSD 512 GB'),
('Dell', 'Latitude 5540', 'DLLAT5540-0009', '2024-04-08', 'Dirección', 'Portátil, Intel Core i7, 16 GB RAM, SSD 512 GB'),
('HP', 'EliteBook 840 G10', 'HPEB840-0010', '2024-05-15', 'Departamento de RRHH', 'Portátil, Intel Core i5, 16 GB RAM, SSD 512 GB');

--TÉCNICOS
INSERT INTO tecnico (nombre, apellidos)
VALUES
('Carlos', 'García López'),
('María', 'Fernández Sánchez'),
('Javier', 'Rodríguez Pérez'),
('Lucía', 'Martín Gómez'),
('David', 'Hernández Ruiz'),
('Elena', 'Moreno Díaz'),
('Pablo', 'Jiménez Torres'),
('Sara', 'Navarro Castro'),
('Miguel', 'Romero Ortega'),
('Laura', 'Vázquez Molina');

--PROBLEMAS
INSERT INTO problemas (descripcion, solucion, fecha, tiempo_inactividad)
VALUES
('Pantalla azul constante al iniciar.', 'Se reinstaló el sistema operativo.', '2024-01-15', INTERVAL '5 hours'),
('El disco duro presenta fallos de lectura.', 'Se sustituyó por un SSD nuevo.', '2024-02-02', INTERVAL '1 day'),
('Sobrecalentamiento excesivo del equipo.', 'Se limpió el sistema de ventilación.', '2024-02-18', INTERVAL '3 hours'),
('No funciona la conexión a red.', 'Se reconfiguró la tarjeta de red.', '2024-03-05', INTERVAL '1 hour 30 minutes'),
('Teclado con teclas dañadas.', 'Se sustituyó el teclado completo.', '2024-03-12', INTERVAL '45 minutes'),
('Memoria RAM no reconocida.', 'Se reemplazó el módulo defectuoso.', '2024-03-20', INTERVAL '2 hours'),
('El sistema operativo no arranca.', 'Se reparó el boot y el gestor de arranque.', '2024-04-01', INTERVAL '4 hours'),
('Puerto USB no funciona.', 'Se reemplazó el controlador USB.', '2024-04-10', INTERVAL '1 hour'),
('Batería con autonomía muy baja.', 'Se cambió la batería del portátil.', '2024-04-22', INTERVAL '1 hour 15 minutes'),
('El equipo se reinicia solo.', 'Se detectó fallo en la RAM y se sustituyó.', '2024-05-01', INTERVAL '6 hours'),
('Ruido excesivo del ventilador.', 'Se limpió y lubricó el ventilador.', '2024-05-10', INTERVAL '2 hours'),
('Lentitud extrema del sistema.', 'Se optimizó el sistema y se amplió RAM.', '2024-05-18', INTERVAL '3 hours'),
('Fallos intermitentes de red.', 'Se cambió el cableado de red.', '2024-05-25', INTERVAL '1 hour 45 minutes'),
('El monitor no enciende.', 'Se sustituyó el monitor.', '2024-06-02', INTERVAL '2 hours');
