
function verificar() {
    
    let numero1 = parseInt(document.getElementById('numero1').value);
    let numero2 = parseInt(document.getElementById('numero2').value);
    let numero3 = parseInt(document.getElementById('numero3').value);
    let resultado = document.getElementById('resultado');

    //resultado.innerText = numero1 + " " + numero2 + " " + numero3;

   
    if (numero1 > numero2) {
        
        if (numero1>numero3){
            resultado.innerHTML = "El mayor es: " + numero1;
            console.log(numero1);
        }else{
            resultado.innerHTML = "El mayor es: " + numero3;
            console.log(numero3);
        }

    } else {
        
        if (numero2>numero3){
            resultado.innerHTML = "El mayor es: " + numero2;
            console.log(numero2);
        }else{
            resultado.innerHTML = "El mayor es: " + numero3;
            console.log(numero3);
        }

    }
    
    // Otra opción
/*
    if (numero1>=numero2 && numero1>=numero3){
        resultado.innerHTML = "El mayor es: " + numero1;
    }else{
        if (numero2>=numero1 && numero2>=numero3){
            resultado.innerHTML = "El mayor es: " + numero2;
        }else{
            resultado.innerHTML = "El mayor es: " + numero3;
        }
    }
*/
    

}