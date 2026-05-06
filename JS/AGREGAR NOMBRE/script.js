function añadirNombre(){
<<<<<<< HEAD
    //Cogemos el nodo button
    const resultado = document.getElementById("resultado");
    //Cogemos el valor del input
    const input = document.getElementById("input").value;
    //Cogemos el nodo lista
    let lista = document.getElementById("lista");
    //Comprobamos si existe el elemento lista
    if (!lista) {
        lista = document.createElement("ul");//creamos el ul
        lista.setAttribute("id","lista");//le damos un id
        resultado.after(lista);//insertamos el ul después del input
    }

    //Creamos un elemento li
    const elementoLista = document.createElement("li");
    //Metemos el valor del input en el li
    elementoLista.innerText = input;
    
    //Colocamos el li después del ul
    lista.append(elementoLista);
}
=======
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
>>>>>>> bcdc7eff630be35402a633bf5c5e116d07c70168
