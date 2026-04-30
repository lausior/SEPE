function añadirNombre(){
    //Cogemos el nodo resultado
    const resultado = document.getElementById("resultado");
    //Cogemos el valor del input
    const input = document.getElementById("input").value;

    //Creamos la lista
    const lista = document.createElement("ul");
    //Creamos un elemento li
    const elementoLista = document.createElement("li");
    //Añadimos al li el valor del input
    elementoLista.innerText = input;
    
    lista.append(elementoLista);
    resultado.after(lista);

}  