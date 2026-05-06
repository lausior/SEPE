let posicionBuscada = 6;
let pos1 = 0
let pos2 = 1;
let resultado;


if (posicionBuscada == 1) {
    console.log("0");
}
else if (posicionBuscada == 2) {
    console.log("1");
}
else {
    for (let i = 1; i < posicionBuscada-1; i++) {
        resultado = pos1 + pos2;
        pos1 = pos2
        pos2 = resultado;
        resultado = pos2;
 
    }
    console.log(resultado);

}

