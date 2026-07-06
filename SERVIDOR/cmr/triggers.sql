--CREAR LA FUNCIÓN PARA CREAR CLIENTE
CREATE OR REPLACE FUNCTION crear_cliente()
	RETURNS TRIGGER -- La función será utilizada por un trigger.
	LANGUAGE plpgsql-- Lenguaje de programación de PostgreSQL.
	AS $$-- Se pone para delimitar el bloque de código para no ejecutar solo hasta el ;.
	
	BEGIN-- Inicio del bloque de instrucciones
	    INSERT INTO cliente(id_cliente)-- Inserta en la tabla cliente el id_cliente de la fila actualizada.
	    VALUES (NEW.id_cliente);-- NEW representa los valores nuevos de la fila después del UPDATE.
	    RETURN NEW;-- Devuelve la nueva fila para que el trigger termine correctamente.
	END;-- Fin del bloque de instrucciones
	
	$$;-- Fin del cuerpo de la función.
	
-- CREAR EL TRIGGER.
CREATE TRIGGER crear_cliente_auto
	AFTER UPDATE ON prospeccion -- El trigger se ejecuta después de una actualización en la tabla 'prospeccion'.
	FOR EACH ROW-- Se ejecuta una vez por cada fila actualizada.
	WHEN (OLD.aceptado IS NULL AND NEW.aceptado IS NOT NULL)-- Solo se ejecuta cuando el campo aceptado cambia de NULL (sin aceptar) a un valor (aceptado).
	
	EXECUTE FUNCTION crear_cliente();-- Llama a la función crear_cliente().



--CREAR FUNCIÓN PARA CREAR PROSPECCIÓN
create or replace function crear_prospeccion()
	returns trigger
	language plpgsql
	as $$
	begin 
		insert into prospeccion(id_prospeccion, captacion)
		values (new.id_contacto, current_date);
		return new;
	end
	$$;

--CREAR TRIGGER
create trigger crear_prospeccion_auto
	after insert on contacto
	for each row
	execute function crear_prospeccion();
	
--Probar el trigger
insert into contacto(nome, enderezo, telefono, email, notas) values
('Laura Díaz', 'Rúa de Basquiños 42, Santiago', '600111009', 'laura.diaz@gmail.com', '
Pidió información sobre promociones');
insert into contacto(nome, enderezo, telefono, email, notas) values
('Carlos Fernández', 'Avenida de Lugo 15, Santiago', '600111010', 'carlos.fernandez@gmail.com', 'Solicitó un presupuesto para una reforma integral');
	
	
	
	
	
	