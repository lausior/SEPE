function multiplicar() {

    //Cogemos el contenido de los input
    let num1 = parseInt(document.getElementById("num1").value);
    let num2 = parseInt(document.getElementById("num2").value);
    let resultado = document.getElementById("resultado");

    let suma = num1;

    for (let i = 1; i < num2; i++) {
        suma += num1;
    }
    resultado.innerHTML = suma;
}


//FORMA 2
//Cogemos el contenido de los input
//     let num1 = parseInt(document.getElementById("num1").value);
//     let num2 = parseInt(document.getElementById("num2").value);
//     let resultado = document.getElementById("resultado");

//     let suma = 0;

//     for (let i=1; i <=num2; i++) {
//         suma = suma + num1;
//     }
//     resultado.innerHTML = suma;
// }










