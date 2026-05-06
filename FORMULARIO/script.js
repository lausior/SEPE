function validarTexto() {
    let valor = document.getElementsByClassName("input-text");
    input.value;

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