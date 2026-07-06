--MODIFICAR SUELDO
UPDATE empleados 
SET salario = 100000 
WHERE id = 5;


--INCREMENTAR COMISIONES DE EMPLEADOS DEL DEPARTAMENTO 3
-- Para incrementar la comisión en 1000 (no el salario)
-- Convertir comision a numeric primero, luego usar COALESCE
UPDATE empleados 
SET comision = (COALESCE(comision::numeric, 0) + 1000)::money 
WHERE id_departamento = 3;