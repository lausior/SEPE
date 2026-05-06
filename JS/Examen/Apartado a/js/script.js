//Creamos un evento que llame a la función al pulsar button
document.getElementById("calcular").addEventListener("click", calcularEdad);

function calcularEdad() {
    //Cogemos el nodo 'resultado'
    let nombre = document.getElementById("resultado");

    //Cogemos el valor de los inputs
    let ano = document.getElementById("ano").value.trim();
    let mes = document.getElementById("mes").value.trim();
    let dia = document.getElementById("dia").value.trim();

    //Convertimos las variables de fecha en un objeto Date() (mes-1 porque el índice de los meses comienza en 0)
    let fechaNacimiento = new Date(ano, mes - 1, dia);

    //Saber la fecha actual
    let fechaActual = new Date();

    //Restamos la fecha de nacimiento a la fecha actual
    let resultadoMS = fechaActual - fechaNacimiento;

    //Mostrar error si el input está vacío
    if (!ano || !mes || !dia) {
        avisos.textContent = "Error! Introduce tu fecha de nacimiento.";
        return;
    }

    //Mostrar error si la fecha de naciemiento es posterior a la fecha actual
    if(fechaNacimiento > fechaActual){
        avisos.textContent = "Error! La fecha de nacimiento tiene que ser anterior a la fecha actual."
    }

    //Convertimos el resultado(milisegundos) a días
    let dias = resultadoMS / (1000 * 60 * 60 * 24);

    //Convertimos los días a años
    let años = Math.floor(dias / 365);

    //Metemos el resultado en el p de resultado
    document.getElementById("resultado").textContent = `Tienes ${años} años`;
}








