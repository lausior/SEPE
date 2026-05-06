function validarFecha2(fechaEnTexto){

    //Año: 1900-2099 (siglos 19 y 20)
    const regex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/;
    if (regex.test(fechaEnTexto)==false){ return false;}

    let fechaDivida = fechaEnTexto.split("/");
    let dia = fechaDivida[0];
    let mes = fechaDivida[1];
    let anho = fechaDivida[2];

    let fecha = new Date(anho + "/" + mes + "/" + dia);
    if (isNaN(fecha.getTime())){return false;}

    return true;
}

function validarFecha(fechaEnTexto){

    //Año: 1900-2099 (siglos 19 y 20)
    const regex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/;
    if (regex.test(fechaEnTexto)==false){ return false;}

    let fechaDivida = fechaEnTexto.split("/");
    let dia = fechaDivida[0];
    let mes = fechaDivida[1];
    let anho = fechaDivida[2];

    if (dia>30 && (mes==2 || mes==4 || mes==6 || mes==9 || mes==11 )) {return false};
    if (mes==2 && dia>29) {return false};
    if (mes==2 && dia>28 && !esAnhoBisiesto(anho)) {return false};

    return true;
}

function esAnhoBisiesto(anho){

    let esBisiesto = false;

    if (anho % 4 == 0) { esBisiesto = true; }
    if (anho % 100 == 0) { esBisiesto = false; }
    if (anho % 400 == 0) { esBisiesto = true; }

    return esBisiesto;

}

console.log(validarFecha("01/01/2026")); //true
console.log(validarFecha("00/01/2026"));
console.log(validarFecha("01/13/2026"));
console.log(validarFecha("01/01/1800"));
console.log(validarFecha("1/1/1800"));
console.log(validarFecha("01/01/26"));
console.log(validarFecha("30/02/2026"));
console.log(validarFecha("31/04/2026"));
console.log(validarFecha("29/02/2026"));
console.log(validarFecha("31/01/2026")); //true
console.log(validarFecha("29/02/2020")); //true