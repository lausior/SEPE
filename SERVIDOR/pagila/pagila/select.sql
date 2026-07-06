-- 1.Actores que teñen de primeiro nome "Scarlett".
select * from actor where first_name = 'SCARLETT'; --NOMBRE EXACTAMENTE 'SCARLETT'
select * from actor where first_name ilike 'scarlett'; --NOMBRE NO DIFERENCIA MAYUSCULAS

-- 2.Actores que teñen de apelido "Lollobrigida".
select * from actor where last_name = 'LOLLOBRIGIDA';
select * from actor where last_name ilike 'lollobrigida';

-- 3.Actores que conteñan polo menos unha 'o' no seu nome.
select * from actor where first_name like '%O%';

-- 4.Actores que conteñan polo menos unha 'o' no seu nome e unha 'a' no seu apelido.
select * from actor where first_name like '%O%' and last_name like '%A%';

-- 5.Cidades que comezan por A.
select * from city where city like 'A%';

-- 6.Cidades que rematan en S.
select * from city where city like '%s';

-- 7.Cidades que pertencen ó país Mexico.
select * from city where country_id = (
select country_id from country where country ='Mexico');

-- 8.Clientes que residen na cidade de Bratislava.
select * from customer where address_id = (
select address_id from address where city_id = (
select city_id from city where city ='Bratislava'));

-- 9.Título, descrición e ano das películas que pertencen á categoría 'Sci-Fi'.
select title, description, release_year from film where film_id in (
select film_id from film_category where category_id = (
select category_id from category where name ='Sci-Fi'));
      --usando JOIN
SELECT f.title, f.description, f.release_year
FROM film f
JOIN film_category fc
    ON f.film_id = fc.film_id
JOIN category c
    ON fc.category_id = c.category_id
WHERE c.name = 'Sci-Fi';

-- 10.Título das películas nas que participa o actor de nome 'Bob' e apelido 'Fawcett'.
select title from film where film_id in (
select film_id from film_actor where actor_id = (
select actor_id from actor where first_name ilike 'bob' and last_name ilike 'fawcett'));
     --usando JOIN
select title 
from film f
join film_actor fa
	on f.film_id = fa.film_id
join actor a
	on fa.actor_id = a.actor_id
where first_name ilike 'bob' and last_name ilike 'fawcett';

-- 	11.Dirección, distrito e cidade das tendas.
select a.address, a.district, c.city from store s
INNER JOIN address a ON s.address_id = a.address_id
INNER JOIN city c ON a.city_id = c.city_id;

-- 	12.Títulos das películas da categoría 'Horror' que están dispoñibles na tenda de 'Lethbridge'.
select distinct f.title from film f
inner join film_category fc on f.film_id = fc.film_id
inner join category ca on fc.category_id = ca.category_id 
inner join inventory i on f.film_id = i.film_id
inner join store s on i.store_id = s.store_id
inner join address a on s.address_id = a.address_id
inner join city ci on a.city_id = ci.city_id
WHERE ca.name = 'Horror' AND ci.city = 'Lethbridge';

-- 	13.Número de exemplares existentes da película titulada 'Academy Dinosaur'.
select count(*) as num_ejemplares
from film f
inner join inventory i on f.film_id = i.film_id
where f.title= 'ACADEMY DINOSAUR';

-- 	14.Número de exemplares existentes da película titulada 'Academy Dinosaur' que hai en cada unha das tendas, indicando tamén dirección e cidade da tenda.
-- 	15.Listado de categorías e número de películas existentes de cada categoría, ordenadas de máis a menos.
-- 	16.Título e suma dos importes dos alugueres das 10 películas máis rentables.
-- 	17.Nomes das categorías das que hai máis de 300 exemplares de películas.
-- 	18.Listado de categorías cun promedio de duración de película superior á media de duración global.

