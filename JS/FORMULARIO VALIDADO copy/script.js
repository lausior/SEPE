//FUNCIÓN VALIDAR TEXTO
function validarTexto(input) {
    //Epresión regular
    const regex = /^[A-Za-zÁÉÍÓÚÜÑáéíóúüñ\s]+$/;

    //Cogemos el valor del input y limpiamos los espacios
    let valor = input.value.trim();

    //Cogemos los elementos con el selector ".error-input-vacio" (<p>)
    let errorVacio = input.parentElement.querySelector(".error-input-vacio");

    //Cogemos los elementos con el selector ".error-formato-input" (<p>)
    let errorFormato = input.parentElement.querySelector(".error-formato-input");

    //COMPROBAMOS INPUT VACÍO
    if(valor == ""){
        //Añadimos el borde rojo
        input.classList.add("input-error");
        //Mostramos el mensaje de error
        errorVacio.classList.add("mensaje-error-visible");
        //Borramos el mensaje de formato incorrecto
        errorFormato.classList.remove("mensaje-error-visible");
        
        return false;
    }


    //COMPROBAMOS EL FORMATO
    if(!regex.test(valor)){
        //Añadimos el borde rojo
        input.classList.add("input-error");
        //Mostramos el mensaje de error
        errorFormato.classList.add("mensaje-error-visible");
        //Borramos el mensaje de input vacío
        errorVacio.classList.remove("mensaje-error-visible");

        return false;
    }

    //SI NO HAY ERRORES:
    //Borramos el borde rojo
    input.classList.remove("input-error");
    //Borramos los mensajes de error
    errorVacio.classList.remove("mensaje-error-visible");
    errorFormato.classList.remove("mensaje-error-visible");

    return true;
    
    
}

document.getElementById("formulario").addEventListener("submit", (e)=>{
    const nombre = document.getElementById("nombre");
    const apellidos = document.getElementById("apellidos");

     // Validaciones
    const nombreValido = validarTexto(nombre);
    const apellidosValidos = validarTexto(apellidos);


     // Mensaje general
    const errorFormulario = document.getElementById("error-formulario");
    const validoFormulario = document.getElementById("valido-formulario");

    // Si hay errores
    if (!nombreValido || !apellidosValidos) {

        e.preventDefault();//'e' es el objeto evento que me da el navegador, y con e.preventDefault() evito que el formulario se envíe

        errorFormulario.classList.add("mensaje-error-visible");
         // Ocultar mensaje válido
        validoFormulario.classList.remove("mensaje-valido-visible");


    } 
    else {
          // Ocultar mensaje error
        errorFormulario.classList.remove("mensaje-error-visible");

        validoFormulario.classList.add("mensaje-valido-visible");
    }
    
});