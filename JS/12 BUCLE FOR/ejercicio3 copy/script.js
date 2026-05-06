function multiplicar() {

    //Cogemos el contenido de los input
    let num1 = parseInt(document.getElementById("num1").value);
    let num2 = parseInt(document.getElementById("num2").value);
    let num3 = parseInt(document.getElementById("num3").value);
    let resultado = document.getElementById("resultado");

    let multiplicacion1 = 0;
    let multiplicacion2 = 0;

    for (let i = 0; i <num2; i++) {
        multiplicacion1 += num1;
    }

    for (let i = 0; i <num3; i++) {
        multiplicacion2 += multiplicacion1;
    }
    resultado.innerHTML = multiplicacion2;
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










