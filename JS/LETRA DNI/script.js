let resultado = document.getElementById("resultado");

function verificar() {
    let dni = document.getElementById("dni").value;//123456789A (string)

    let numDni = dni.substring(0,8);
    let letraDni = dni.substring(8,9).toUpperCase();
        
    const LETRASDNI = "TRWAGMYFPDXBNJZSQVHLCKE";
    
    let moduloDni = numDni % 23;

    let letraComprobada = LETRASDNI[moduloDni];

    if(letraDni == letraComprobada){
          resultado.innerHTML = "DNI correcto";
    }
    else{
          resultado.innerHTML = "DNI incorrecto";
    }

}






