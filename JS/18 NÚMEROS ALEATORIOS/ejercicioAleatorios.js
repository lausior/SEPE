//Función para crear números aleatorios
function aleatorios(min, max){
    return Math.floor(Math.random() * (max - min + 1) + min);
}

//Creación del array de 1000 elementos
let numeros = new Array(1000);


//Bucle que genera números aleatorios entre 0 y 1000000
for(let i=0; i<numeros.length; i++){
    numeros[i] = aleatorios(0, 1000000);
    }
    console.log(numeros);

    let contador = 0;
    let suma = 0;

    while(numeros[contador] > 100){
        suma += numeros[contador];
        contador++; 
    }
    console.log("Suma: " + suma);
    console.log("Número < 100: " + numeros[contador] + " (posición:" + contador + ")");


    



// if(numeros[i] < 100){
//         console.log("Número < 0: " + numeros[i])
//     }
//     else{
//         suma += numeros[i];