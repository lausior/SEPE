//Función anoBisiesto (devuelve true)
function anoBisiesto(ano) {
    return (ano % 4 == 0 && ano % 100 !== 0) || ano % 400 == 0;
}

//Función validarFecha
function validarFecha(fecha) {
    //Convertimos el string fecha en un array
    let fechaSeparada = fecha.split("/");
    //Guardamos cada índice en una variable
    let dia = parseInt(fechaSeparada[0]);
    let mes = parseInt(fechaSeparada[1]);
    let ano = parseInt(fechaSeparada[2]);

    console.log(`${dia}/${mes}/${ano}`);

    // Validar mes primero
    if (mes < 1 || mes > 12) {
        console.log("Mes incorrecto");
        return false;//detiene la función
    }

    let diasMes;
    switch (mes) {
        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
            diasMes = 31;
            break;
        case 4: case 6: case 9: case 11:
            diasMes = 30;
            break;
        case 2:
            diasMes = anoBisiesto(ano) ? 29 : 28;
            break;
    }

    // Validar día
    if (dia >= 1 && dia <= diasMes) {
        console.log(`Fecha correcta: ${dia}/${mes}/${ano}`);
    } else {
        console.log(`Día incorrecto. ${mes} solo tiene ${diasMes } días`);
    }
}


validarFecha("31/02/2026");
validarFecha("31/02/2026");
validarFecha("31/03/2026");
validarFecha("32/08/2026");
validarFecha("28/02/2026");
validarFecha("29/02/2026");