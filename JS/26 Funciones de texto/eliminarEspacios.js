function miTrim(nombres, separador) {
    
    let nombresArray = nombres.split(",");
    let nombresSinEspacios = [];

    for (let i = 0; i < nombresArray.length; i++) {

        nombresSinEspacios[i] = nombresArray[i].trim();
    }

    let arrayConvertido = nombresSinEspacios.join("-");

    console.log(nombresArray);
    console.log(nombresSinEspacios);
    console.log(arrayConvertido);

}

miTrim(" Ramón, Juan Luis, Pedro ",",");