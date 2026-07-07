CREATE INDEX idx_fecha_pedido ON pedidos(fecha);
SELECT * FROM PEDIDOS WHERE FECHA = '2025-04-14';


CREATE INDEX idx_productos on productos(precio);
select * from productos where precio > 1;

CREATE INDEX idx_pedidos_id_cliente
ON pedidos(id_cliente);
SELECT * FROM CLIENTES C JOIN PEDIDOS P 
ON C.ID_CLIENTE = P.ID_CLIENTE;

SELECT CATEGORIA, COUNT(*) FROM CLIENTES
GROUP BY CATEGORIA;

SELECT PROVINCIA, COUNT(*) FROM CLIENTES
GROUP BY PROVINCIA;

CREATE INDEX idx_fecha_alta_cliente on clientes(fecha_alta);

CREATE INDEX idx_id_cliente_pedido on pedidos(id_cliente);

CREATE INDEX idx_nombre on productos(nombre);
CREATE INDEX idx_stock on productos(stock);

CREATE INDEX idx_pedido on lineas_pedido(id_pedido);
CREATE INDEX idx_producto on lineas_pedido(id_producto);

CREATE INDEX idx_producto_proveedor on producto_proveedor(id_producto);
CREATE INDEX idx_pedido_proveedor on producto_proveedor(id_proveedor);

select * from pg_indexes where schemaname = 'public';










