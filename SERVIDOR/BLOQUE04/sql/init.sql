-- ============================================================
-- INICIALIZACIÓN DE LA BASE DE DATOS tienda_db
-- Se ejecuta automáticamente al crear el contenedor PostgreSQL
-- ============================================================

-- Extensión para UUID (Identificadores Únicos Universales)
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

-- ============================================================
-- TABLA: categorias
-- ============================================================

CREATE TABLE IF NOT EXISTS categorias (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    creado_en TIMESTAMP WITH TIME ZONE DEFAULT NOW()
);

-- ============================================================
-- TABLA: productos
-- ============================================================

CREATE TABLE IF NOT EXISTS productos (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    descripcion TEXT,
    precio NUMERIC(10,2) NOT NULL CHECK (precio >= 0),
    stock INTEGER NOT NULL DEFAULT 0 CHECK (stock >= 0),
    categoria_id INTEGER REFERENCES categorias(id) ON DELETE SET NULL,
    activo BOOLEAN NOT NULL DEFAULT TRUE,
    creado_en TIMESTAMP WITH TIME ZONE DEFAULT NOW(),
    actualizado_en TIMESTAMP WITH TIME ZONE DEFAULT NOW()
);

-- ============================================================
-- ÍNDICES PARA MEJORAR EL RENDIMIENTO
-- ============================================================

CREATE INDEX IF NOT EXISTS idx_productos_categoria
    ON productos(categoria_id);

CREATE INDEX IF NOT EXISTS idx_productos_activo
    ON productos(activo);

CREATE INDEX IF NOT EXISTS idx_productos_nombre
    ON productos(nombre);

-- ============================================================
-- FUNCIÓN: ACTUALIZAR TIMESTAMP AUTOMÁTICAMENTE
-- ============================================================

CREATE OR REPLACE FUNCTION actualizar_timestamp()
RETURNS TRIGGER AS $$
BEGIN
    NEW.actualizado_en = NOW();
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- ============================================================
-- TRIGGER: EJECUTAR FUNCIÓN AL ACTUALIZAR UN PRODUCTO
-- ============================================================

CREATE TRIGGER trigger_actualizar_producto
BEFORE UPDATE ON productos
FOR EACH ROW
EXECUTE FUNCTION actualizar_timestamp();

-- ============================================================
-- DATOS DE EJEMPLO: CATEGORÍAS
-- ============================================================

INSERT INTO categorias (nombre, descripcion) VALUES
    ('Informática', 'Ordenadores, componentes y periféricos'),
    ('Accesorios', 'Ratones, teclados, auriculares y más'),
    ('Monitores', 'Pantallas y displays'),
    ('Almacenamiento', 'Discos duros, SSDs y memorias'),
    ('Audio', 'Auriculares, altavoces y micrófonos')
ON CONFLICT (nombre) DO NOTHING;

-- ============================================================
-- DATOS DE EJEMPLO: PRODUCTOS
-- ============================================================

INSERT INTO productos (
    nombre,
    descripcion,
    precio,
    stock,
    categoria_id
) VALUES
(
    'Portátil Pro 15',
    'Portátil de alto rendimiento con procesador Intel i7 y 16 GB de RAM',
    1299.99,
    15,
    (SELECT id FROM categorias WHERE nombre = 'Informática')
),
(
    'Ratón Inalámbrico Ergonómico',
    'Ratón inalámbrico con diseño ergonómico y batería de larga duración',
    39.99,
    50,
    (SELECT id FROM categorias WHERE nombre = 'Accesorios')
),
(
    'Monitor 4K 27"',
    'Monitor UHD 4K con panel IPS y tiempo de respuesta de 1 ms',
    449.99,
    8,
    (SELECT id FROM categorias WHERE nombre = 'Monitores')
),
(
    'SSD NVMe 1TB',
    'Disco de estado sólido NVMe con velocidades de lectura de 7000 MB/s',
    129.99,
    30,
    (SELECT id FROM categorias WHERE nombre = 'Almacenamiento')
),
(
    'Auriculares BT Pro',
    'Auriculares Bluetooth con cancelación activa de ruido y 30 horas de batería',
    199.99,
    20,
    (SELECT id FROM categorias WHERE nombre = 'Audio')
),
(
    'Teclado Mecánico RGB',
    'Teclado mecánico con switches Cherry MX Red e iluminación RGB',
    89.99,
    25,
    (SELECT id FROM categorias WHERE nombre = 'Accesorios')
),
(
    'Webcam HD 1080p',
    'Cámara web Full HD con micrófono integrado y corrección de luz',
    69.99,
    3,
    (SELECT id FROM categorias WHERE nombre = 'Accesorios')
)
ON CONFLICT DO NOTHING;

-- ============================================================
-- VISTA: PRODUCTOS CON NOMBRE DE CATEGORÍA
-- ============================================================

CREATE OR REPLACE VIEW vista_productos AS
SELECT
    p.id,
    p.nombre,
    p.descripcion,
    p.precio,
    p.stock,
    p.activo,
    p.creado_en,
    p.actualizado_en,
    c.nombre AS categoria_nombre,
    c.id AS categoria_id
FROM productos p
LEFT JOIN categorias c
    ON p.categoria_id = c.id
ORDER BY p.id;

-- ============================================================
-- VERIFICACIÓN
-- ============================================================

SELECT 'Tablas creadas correctamente' AS estado;

SELECT COUNT(*) AS total_categorias
FROM categorias;

SELECT COUNT(*) AS total_productos
FROM productos;