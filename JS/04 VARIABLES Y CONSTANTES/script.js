let variable = "mi dato";
var variable2 = "otra cosa";

//let variable3;
//variable3 = "otro dato más";
let variable3 = "otro dato más";

console.log(variable);
console.log("variable");

//let variable = "patata frita"; //No pueedo volver a declararla porque ya existe en la línea 1
variable = "patata frita";
console.log(variable);

const PI = 3.141592354;
console.log(PI);

//Esto no se debe hacer... traga pero muestra error
//PI = 3.14;

function muestraResultado() {
    const salidaDatos = document.getElementById("salida");
    salidaDatos.innerText = variable;
}