function listaCompra() {

    const resultado = document.getElementById("listaCompra");

    borrarListaExistente(resultado);

    const lista = document.createElement("ol");
    lista.classList.add("lista", "marca");

    const elementoLista1 = document.createElement("li");
    elementoLista1.textContent = "Leche";
    lista.appendChild(elementoLista1);

    const elementoLista2 = document.createElement("li");
    elementoLista2.textContent = "Pasta";
    lista.appendChild(elementoLista2);

    const elementoLista3 = document.createElement("li");
    elementoLista3.textContent = "Fruta";
    lista.appendChild(elementoLista3);

    resultado.appendChild(lista); // 👈 AQUÍ ESTÁ LA CLAVE
}


function listaTareas() {

    const resultado = document.getElementById("listaTareas");

    borrarListaExistente(resultado);

    const lista = document.createElement("ol");
    lista.classList.add("lista", "marca");

    const elementoLista1 = document.createElement("li");
    elementoLista1.textContent = "Lavar el coche";
    lista.appendChild(elementoLista1);

    const elementoLista2 = document.createElement("li");
    elementoLista2.textContent = "Reservar el restaurante";
    lista.appendChild(elementoLista2);

    const elementoLista3 = document.createElement("li");
    elementoLista3.textContent = "Llamar a Fulanito";
    lista.appendChild(elementoLista3);

    resultado.appendChild(lista); // 👈 AQUÍ TAMBIÉN
}


function borrarListaExistente(contenedor) {
    const listaExistente = contenedor.querySelector(".marca");

    if (listaExistente) {
        listaExistente.remove();
    }
}