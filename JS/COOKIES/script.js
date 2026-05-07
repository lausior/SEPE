//Cogemos los selectores del html
let titulo = document.querySelector("h1");
let body = document.querySelector("body");

//EVENTO BOTÓN CLARO
function modoClaro() {
    //Añadimos los estilos para el modo claro
    titulo.classList.add("h1-modo-claro");
    body.classList.add("body-modo-claro");

    //Borramos los estilos para el modo oscuro
    titulo.classList.remove("h1-modo-oscuro");
    body.classList.remove("body-modo-oscuro");

    //Creación de la cookie
    document.cookie = "modo=claro; max-age=5";
    console.log(document.cookie);

};


function modoOscuro() {
    //Añadimos los estilos para el modo claro
    titulo.classList.add("h1-modo-oscuro");
    body.classList.add("body-modo-oscuro");

    //Borramos los estilos para el modo oscuro
    titulo.classList.remove("h1-modo-claro");
    body.classList.remove("body-modo-claro");

    //Creación de la cookie
    document.cookie = "modo=oscuro; max-age=5";
    console.log(document.cookie);
};



//COOKIES
document.getElementById("botonClaro").addEventListener("click", modoClaro);

document.getElementById("botonOscuro").addEventListener("click", modoOscuro);

window.onload = () => {
    if (document.cookie.includes("modo=oscuro")) {
        modoOscuro();
    } 
    else if(document.cookie.includes("modo=claro")){
        modoClaro(); 
    }
}

let cookie
//Separar la cadena de las cookies e cada una de las cookies individuales
//Buscar si hay la de modo
//Si existe... poner ese modo !




