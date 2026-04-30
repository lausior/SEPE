function calcularEdad() {
    
    //Cogemos el valor de los inputs
    let ano = 1991;
    let mes = 9;
    let dia = 7;

    //Convertimos las variables de fecha en un objeto Date() (mes-1 porque el índice de los meses comienzan en 0)
    let fechaNacimiento = new Date(ano, mes - 1, dia);

    //Saber la fecha actual
    let fechaActual = new Date();
    
    //Restamos la fecha de nacimiento a la fecha actual
    let resultadoMS = fechaActual - fechaNacimiento;

    //Convertomos el resultado(milisegundos) a días
    let dias = resultadoMS / (1000 * 60 * 60 * 24);

    //Convertimos los días a años
    let años = Math.round(dias / 365);

    console.log("Edad:" + años);

    
}

calcularEdad();






