--BORRAR EMPLEADO CON ID 8
DELETE FROM empleados WHERE id = 8;


--BORRAR EMPLEADO JEFE CON ID 2 Y TODOS SUS SUBORDINADOS
-- Verificar quiénes son los subordinados
SELECT * FROM empleados WHERE id_empleado_jefe = 2;
-- Borrar subordinados
DELETE FROM empleados WHERE id_empleado_jefe = 2;
-- Borrar al jefe
DELETE FROM empleados WHERE id = 2;
-- Verificar el resultado
SELECT * FROM empleados WHERE id = 2 OR id_empleado_jefe = 2;
SELECT * FROM EMPLEADOS;




