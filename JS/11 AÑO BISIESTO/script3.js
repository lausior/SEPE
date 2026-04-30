console.log("Empecé");
console.log(esAnhoBisiesto(100));
console.log(esAnhoBisiesto(400));
console.log(esAnhoBisiesto(1992));
console.log("Acabé");



function esAnhoBisiesto(anho){

    let esBisiesto = false;

    if (anho % 4 == 0) { esBisiesto = true; }
    if (anho % 100 == 0) { esBisiesto = false; }
    if (anho % 400 == 0) { esBisiesto = true; }

    // if (esBisiesto) {
    //     return true;
    // } else {
    //     return false;
    // }

    return esBisiesto;

}