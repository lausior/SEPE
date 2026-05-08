//FUNCIÓN VALIDAR TEXTO
function validarTexto(input){
    //Cogemos en valor del input y quitamos los espacios del principio y final
    let valor = input.value.trim();

    //Cogemos los <p> que contienen los mensajes de error
    let errorInput = document.parentElement.querySelector(".error-input-vacio");
    let errorFormato = document.parentElement.querySelector(".error-formato-input");

    //COMPROBAMOS SI EL INPUT ESTÁ VACÍO
    if(valor == ""){
        //Ponemos el borde rojo
        input.classList.add("input-error");//añadimos la clase al <input>
        //Hacemos visible el error de vacío
        errorInput.classList.add("mensaje-error-visible");//añadimos la clase al <p>
        //Borramos el mensaje de formato incorrecto en caso de que esté
        errorFormato.classList.remove("mensaje-error-visible");//borramos la clase al <p>

        return false;
    }

    //COMPROBAMOS EL FORMATO
    //Epresión regular
    const regex = /^[A-Za-zÁÉÍÓÚÜÑáéíóúüñ\s]+$/;

    if(!regex.test(valor)){
        //Ponemos el borde rojo
        input.classList.add("input-error");//añadimos la clase al <input>
        //Hacemos visible el error de formato incorrecto
        errorFormato.classList.add("mensaje-error-visible");//añadimos la clase al <p>
        //Borramos el mensaje de input vacío en casoo de que esté
        errorInput.classList.remove("mensaje-error-visible");//borramos la clase al <p>

        return false;
    }

    //SI NO HAY ERRORES
    //Quitamos el borde rojo
    input.classList.remove("input-error");
    //Borramos el mensaje de input vacío
    errorInput.classList.remove("mensaje-error-visible");
    //Borramos el mensaje de formato incorrecto
    errorFormato.classList.remove("mensaje-error-visible");

    return true;

}



document.getElementById("validar").addEventListener






















































// //FUNCIÓN VALIDAR TEXTO
// function validarTexto(input) {
//     //Epresión regular
//     const regex = /^[A-Za-zÁÉÍÓÚÜÑáéíóúüñ\s]+$/;

//     //Cogemos el valor del input y limpiamos los espacios
//     let valor = input.value.trim();

//     //Cogemos los <p> de error a través de su selector
//     let errorVacio = input.parentElement.querySelector(".error-input-vacio");
//     let errorFormato = input.parentElement.querySelector(".error-formato-input");

//     //COMPROBAMOS INPUT VACÍO
//     if(valor == ""){
//         //Añadimos el borde rojo
//         input.classList.add("input-error");
//         //Mostramos el mensaje de error
//         errorVacio.classList.add("mensaje-error-visible");
//         //Borramos el mensaje de formato incorrecto
//         errorFormato.classList.remove("mensaje-error-visible");
        
//         return false;
//     }

//     //COMPROBAMOS EL FORMATO
//     if(!regex.test(valor)){
//         //Añadimos el borde rojo
//         input.classList.add("input-error");
//         //Mostramos el mensaje de error
//         errorFormato.classList.add("mensaje-error-visible");
//         //Borramos el mensaje de input vacío
//         errorVacio.classList.remove("mensaje-error-visible");

//         return false;
//     }

//     //SI NO HAY ERRORES:
//     //Borramos el borde rojo
//     input.classList.remove("input-error");
//     //Borramos los mensajes de error
//     errorVacio.classList.remove("mensaje-error-visible");
//     errorFormato.classList.remove("mensaje-error-visible");

//     return true;
// }

// //FUNCIÓN FECHA NACIMIENTO
// function fechaNacimiento(){
//     //Cogemos la fecha del formulario
//     let fechaNacimiento = document.getElementById("fechaNacimiento").value;
//     //Convertimos el string fecha en un array
//     let fechaSeparada = fecha.split("/");
//     //Guardamos cada índice en una variable
//     let dia = parseInt(fechaSeparada[0]);
//     let mes = parseInt(fechaSeparada[1]);
//     let ano = parseInt(fechaSeparada[2]);

//     console.log(`${dia}/${mes}/${ano}`);

// }

// //FUNCIÓN VALIDAR DNI


// document.getElementById("formulario").addEventListener("click", ()=>{
//     //Cogemos los elementos del formulario
//     const nombre = document.getElementById("nombre");
//     const apellidos = document.getElementById("apellidos");

//     //Llamamos a las funciones
//     const nombreValido = validarTexto(nombre);
//     const apellidosValidos = validarTexto(apellidos);


//     //Cogemos los id de los mensajes de validación del formulario
//     const errorFormulario = document.getElementById("error-formulario");
//     const validoFormulario = document.getElementById("valido-formulario");

//     //Comprobar errores en -nombre, -apellidos
//     if (!nombreValido || !apellidosValidos) {
//         // //Si hay errores, el formulario no se envía
//         // e.preventDefault();//'e' es el objeto evento que me da el navegador, y con e.preventDefault() evito que el formulario se envíe

//         //Mostrar error 
//         errorFormulario.classList.add("mensaje-error-visible");
//         //Ocultar mensaje válido
//         validoFormulario.classList.remove("mensaje-valido-visible");
//     } 
//     else {
//         //Ocultar mensaje error (-Revise los errores del formulario)
//         errorFormulario.classList.remove("mensaje-error-visible");
//         //Mostrar mensaje (-Datos enviados correctamente)
//         validoFormulario.classList.add("mensaje-valido-visible");
//     }
    
// });