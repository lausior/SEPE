function verificar() {
    
    //Cogemos el valor de los inputs
    let numero1 = parseInt(document.getElementById('numero1').value);
    let numero2 = parseInt(document.getElementById('numero2').value);
    let resultado = document.getElementById('resultado');

    //resultado.innerText = numero1 + " / " + numero2;
    if (numero1 > numero2) {
        resultado.innerHTML = "El mayor es: " + numero1;

    } else {
        resultado.innerHTML = "El mayor es: " + numero2;
    }

}