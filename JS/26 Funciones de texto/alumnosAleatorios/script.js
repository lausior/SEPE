//Función que coge un valor aleatorio
function aleatorio(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

//Cogemos id de resultado
let resultado = document.getElementById("resultado");
//Seleccionamos el id del input
let input = document.getElementById("nombreAlumno");

function verificar() {
    //Cogemos el valor del input
    let nombreAlumnos = input.value;

    //Convertimos el string del input a array
    let nombreArray = nombreAlumnos.split(",");
    
    //LLamamos a la función 'aleatorio' 
    let nombreAleatorio = nombreArray[aleatorio(0, nombreArray.length - 1)];
    //Mostramos el resultado
    resultado.innerHTML = nombreAleatorio;
}


