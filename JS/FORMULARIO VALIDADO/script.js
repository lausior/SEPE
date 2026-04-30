function validacionNombreApellidos() {
    // Valor input nombre
    let nombre = document.getElementById("nombre").value;
    // Elemento donde pondremos el error
    let error = document.getElementById("errorNombre");
    // Expresión regular
    let regex = /^[A-Za-zÁÉÍÓÚÜÑáéíóúüñ\s]+$/;
    
    // Validar que no esté vacío
    if (nombre.trim() === "") {
        error.innerHTML = "El nombre es obligatorio";
        error.style.display = "block";
        return false;
    }
    
    // Validar formato
    if (!regex.test(nombre)) {
        error.innerHTML = "Formato incorrecto (solo letras y espacios)";
        error.style.display = "block";
        return false;
    }
    
    // Si todo está bien, ocultar error y devolver true
    error.style.display = "none";
    return true;
}

// function email() {
//     let email = document.getElementById("nombre").value;
//     let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
// }

// function fechaNacimiento() {
//     let email = document.getElementById("fechaNac").value;
//     let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
// }

// function validacionDNI() {
//     let dni = document.getElementById("dni").value;
//     let regex = /^[0-9]{8}[A-Z]$/;
// }

// function validarDireccion() {
//     let dni = document.getElementById("direccion").value;
//     let regex = /^[A-Za-z0-9\s,.#\-/ñÑáéíóúüÁÉÍÓÚÜºª]+$/;
// }

// function validarTelefono() {
//     let dni = document.getElementById("telefono").value;
//     let regex = /^[6789][0-9]{8}$/;
// }



function verificar() {
    let formularioValido = true;
    
    // IMPORTANTE: Asignar el resultado de la función
    if (!validacionNombreApellidos()) {
        formularioValido = false;
    }
    
    // Puedes seguir añadiendo más validaciones aquí
    // if (!validacionEmail()) formularioValido = false;
    // if (!validacionTelefono()) formularioValido = false;
    
    // Mostrar resultado final
    if (formularioValido) {
        alert("✅ Formulario válido");
    } else {
        alert("❌ Hay errores en el formulario");
    }
    
    return formularioValido;
}