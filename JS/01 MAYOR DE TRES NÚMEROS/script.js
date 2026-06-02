let resultado = document.getElementById("resultado");

function verificar() {

    let numero1 = parseInt(document.getElementById("num1").value);
    let numero2 = parseInt(document.getElementById("num2").value);
    let numero3 = parseInt(document.getElementById("num3").value);
    let mayor;

    if (numero1 > numero2) {
        mayor = numero1;
    }
    else if (numero1 < numero2) {
        mayor = numero2;
    }
    else {
        resultado.innerHTML = `${numero1} y ${numero2} son iguales`;
    }

    if (mayor > numero3) {
        mayor = mayor;
    }
    else if (mayor < numero3) {
        mayor = numero3;
    }
    else {
        resultado.innerHTML = `${mayor} y ${numero2} son iguales`;
    }

    resultado.innerHTML = mayor;
}






