
function miTrim(frase) {
    let cadena = frase.toLowerCase().replaceAll(" ", "");
    return cadena;
}

function palindromo(cadena) {

    let cadenaSinEspacios = miTrim(cadena);
    let cadenaReverse = cadenaSinEspacios.split("").reverse().join("");

    if (cadenaSinEspacios == cadenaReverse) {
        console.log(`${cadena} es palíndromo`);
    }
    else {
        console.log(`${cadena} no es palíndromo`);
    }
}






palindromo("Anita lava la tina");
palindromo("Hola que tal");

