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
        //Ocultamos el mensaje de formato por si acaso
        errorFormato.classList.remove("mensaje-error-visible");
        
        return false;
    }


    //COMPROBAMOS EL FORMATO
    if(!regex.test(valor)){
        //Añadimos el borde rojo
        input.classList.add("input-error");
        //Mostramos el mensaje de error
        errorFormato.classList.add("mensaje-error-visible");
        //Ocultamos el mensaje de vacío por si acaso
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

// document.getElementById("formulario").addEventListener("submit", (e)=>{
//     validarTexto(input);
//     //Evita el envío del formulario
//    e.preventDefault(); //'e' es el objeto evento que me da el navegador, y con e.preventDefault() evito que el formulario se envíe
// });