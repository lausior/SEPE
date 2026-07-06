--CREAR LA VISTA
create or replace view contactos_convertidos as
	select * from contacto c
	join prospeccion p on c.id_contacto = p.id_prospeccion
	join cliente cli on c.id_contacto = cli.id_cliente;
--SELECCIONAR LA VISTA
select * from contactos_convertidos;


--CREAR LA VISTA
create or replace view contactos_breve as
	select nome, enderezo from contacto;
--SELECCIONAR LA VISTA
insert into contactos_breve;


--CREAR LA VISTA
create or replace view no_clientes as
	select * from contacto co 
	left join cliente cli on co.id_contacto = cli.id_cliente
	where cli.id_cliente is null;
--SELECCIONAR LA VISTA
select * from no_clientes;