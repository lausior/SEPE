
-- AUTORES
INSERT INTO autores(nombre, apellidos, nacionalidad) VALUES
('Gabriel', 'García Márquez', 'Colombiano'),
('Isabel', 'Allende Llona', 'Chilena'),
('Emilia', 'Pardo Bazán', 'Española');


-- LIBROS
INSERT INTO libros(isbn, titulo, ano_publicacion, editorial) VALUES
('1234567892871', 'Cien años de soledad', 1967, 'Editorial Sudamericana'),
('6598712036581', 'Las edades de Lulú', 1989, 'Tusquets Editores'),
('2546987014716', 'Los Pazos de Ulloa', 1886, 'Daniel Cortezo y Cía');

--AUTORES-LIBROS
INSERT INTO autoria(id_autor, id_libro) VALUES
(1,1),
(2,3),
(3,2);

-- SOCIOS
INSERT INTO socios(nombre, apellidos, direccion, telefono, email) VALUES
('Laura', 'Sierra Ortiz', 'Fulanito Lopez 10', 654789123, 'laura@gmail.com'),
('Sandra', 'Sierra Rodrigo', 'Pepita Perez 5 2A', 612987536, 'sandra@gmail.com'),
('Natacha', 'Sierra Ortiz', 'Calle 13', 639845789, 'natacha@gmail.com');

--PRÉSTAMOS
INSERT INTO prestamo(fecha_prestamo, fecha_prevista_devol, fecha_real_devol) VALUES
('25-04-2025', '04-05-2025', '03-05-2025'),
('22-04-2025', '02-05-2025', '12-05-2025'),
('24-05-2025', '08-05-2025', '03-05-2025');

TRUNCATE TABLE autores RESTART IDENTITY CASCADE;
TRUNCATE TABLE libros RESTART IDENTITY CASCADE;
TRUNCATE TABLE autoria RESTART IDENTITY CASCADE;
TRUNCATE TABLE socios RESTART IDENTITY CASCADE;
TRUNCATE TABLE prestamo RESTART IDENTITY CASCADE;

