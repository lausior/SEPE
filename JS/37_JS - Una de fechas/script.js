function manejar() {
 
   const fecha = document.getElementById("fecha");
   const fecha2 = document.getElementById("fecha2");
   const nodoResultado = document.getElementById("resultado");
   const nodoResultado2 = document.getElementById("resultado2");

   nodoResultado.innerHTML = fecha.value;
   nodoResultado2.innerHTML = fecha2.value;
}