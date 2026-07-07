DROP TABLE IF EXISTS lineas_pedido CASCADE;
DROP TABLE IF EXISTS pedidos CASCADE;
DROP TABLE IF EXISTS producto_proveedor CASCADE;
DROP TABLE IF EXISTS productos CASCADE;
DROP TABLE IF EXISTS proveedores CASCADE;
DROP TABLE IF EXISTS clientes CASCADE;

------------------------------------------------------------
-- CLIENTES
------------------------------------------------------------

CREATE TABLE clientes
(
    id_cliente      BIGINT GENERATED ALWAYS AS IDENTITY,
    nombre          VARCHAR(120) NOT NULL,
    provincia       VARCHAR(80) NOT NULL,
    fecha_alta      DATE NOT NULL,
    categoria       VARCHAR(30) NOT NULL,

    CONSTRAINT pk_clientes
        PRIMARY KEY (id_cliente)
);

------------------------------------------------------------
-- PRODUCTOS
------------------------------------------------------------

CREATE TABLE productos
(
    id_producto     BIGINT GENERATED ALWAYS AS IDENTITY,
    nombre          VARCHAR(150) NOT NULL,
    categoria       VARCHAR(60) NOT NULL,
    precio          NUMERIC(10,2) NOT NULL,
    stock           INTEGER NOT NULL,

    CONSTRAINT pk_productos
        PRIMARY KEY (id_producto),

    CONSTRAINT chk_producto_precio
        CHECK (precio > 0),

    CONSTRAINT chk_producto_stock
        CHECK (stock >= 0)
);

------------------------------------------------------------
-- PROVEEDORES
------------------------------------------------------------

CREATE TABLE proveedores
(
    id_proveedor    BIGINT GENERATED ALWAYS AS IDENTITY,
    nombre          VARCHAR(120) NOT NULL,
    pais            VARCHAR(80) NOT NULL,

    CONSTRAINT pk_proveedores
        PRIMARY KEY (id_proveedor)
);

------------------------------------------------------------
-- PRODUCTO_PROVEEDOR
------------------------------------------------------------

CREATE TABLE producto_proveedor
(
    id_producto     BIGINT NOT NULL,
    id_proveedor    BIGINT NOT NULL,
    precio_compra   NUMERIC(10,2) NOT NULL,

    CONSTRAINT pk_producto_proveedor
        PRIMARY KEY
        (
            id_producto,
            id_proveedor
        ),

    CONSTRAINT fk_pp_producto
        FOREIGN KEY (id_producto)
        REFERENCES productos(id_producto),

    CONSTRAINT fk_pp_proveedor
        FOREIGN KEY (id_proveedor)
        REFERENCES proveedores(id_proveedor),

    CONSTRAINT chk_precio_compra
        CHECK (precio_compra > 0)
);

------------------------------------------------------------
-- PEDIDOS
------------------------------------------------------------

CREATE TABLE pedidos
(
    id_pedido       BIGINT GENERATED ALWAYS AS IDENTITY,
    id_cliente      BIGINT NOT NULL,
    fecha           TIMESTAMP NOT NULL,
    estado          VARCHAR(20) NOT NULL,
    importe_total   NUMERIC(12,2) NOT NULL,

    CONSTRAINT pk_pedidos
        PRIMARY KEY (id_pedido),

    CONSTRAINT fk_pedidos_cliente
        FOREIGN KEY (id_cliente)
        REFERENCES clientes(id_cliente),

    CONSTRAINT chk_importe_total
        CHECK (importe_total >= 0),

    CONSTRAINT chk_estado
        CHECK
        (
            estado IN
            (
                'Pendiente',
                'Enviado',
                'Cancelado',
                'Devuelto'
            )
        )
);

------------------------------------------------------------
-- LINEAS_PEDIDO
------------------------------------------------------------

CREATE TABLE lineas_pedido
(
    id_linea            BIGINT GENERATED ALWAYS AS IDENTITY,
    id_pedido           BIGINT NOT NULL,
    id_producto         BIGINT NOT NULL,
    cantidad            INTEGER NOT NULL,
    precio_unitario     NUMERIC(10,2) NOT NULL,

    CONSTRAINT pk_lineas
        PRIMARY KEY (id_linea),

    CONSTRAINT fk_linea_pedido
        FOREIGN KEY (id_pedido)
        REFERENCES pedidos(id_pedido),

    CONSTRAINT fk_linea_producto
        FOREIGN KEY (id_producto)
        REFERENCES productos(id_producto),

    CONSTRAINT chk_cantidad
        CHECK (cantidad > 0),

    CONSTRAINT chk_precio_unitario
        CHECK (precio_unitario >= 0)
);
