function validarTexto(input) {
    let valor = input.value;
    let error = input.nextElementSibling;
    let regex = /^[A-Za-zÁÉÍÓÚÜÑáéíóúüñ\s]+$/;

    if (!regex.test(valor)) {
        input.classList.add("input-error");
        error.classList.add("error-visible");
    } else {
        input.classList.remove("input-error");
        error.classList.remove("error-visible");
    }
}

function validarDni(){
    let valor = document.getElementById("dni");
    let regex = /^\d{8}[A-Za-z]$/;

    if (!regex.test(valor)) {
        input.classList.add("input-error");
        error.classList.add("error-visible");
    } else {
        input.classList.remove("input-error");
        error.classList.remove("error-visible");
    }
}