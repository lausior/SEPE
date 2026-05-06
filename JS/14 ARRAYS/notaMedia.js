function notaMedia() {
    let notas = [8, 3, 7, 2];
    let suma = 0;
    

    for (let i = 0; i < notas.length; i++) {
        suma += notas[i];
    }
    console.log(suma/notas.length);
}

notaMedia();

