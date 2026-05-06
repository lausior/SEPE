//CLASS USUARIO
class Usuario {
    //Atributos
    #nombre;//private

    //Constructor
    constructor(nombre) {
        this.#nombre = nombre;
    }

    //Métodos
    mostrar() {
        console.log(`Nombre: ${this.#nombre}`);
    }
}

//CLASS ALUMNO
class Alumno extends Usuario {
    #notas;

    //Constructor
    constructor(nombre, notas) {
        super(nombre);
        this.#notas = notas;
    }

    //Método Nota Media
    calcularMedia() {
        let suma = 0;
        let media;
        for (let i = 0; i < this.#notas.length; i++) {
            suma += this.#notas[i];
        }
        media = suma / this.#notas.length;
                                                                                                                                                                                                                                   
        if (media >= 5) {
            return (media + "\nAPROBADO");
        }
        else {
            return (media + "\nSUSPENSO");
        }
    }


    //Mostrar Alumno - Notas
    mostrar() {
        super.mostrar();
        console.log(`Notas: ${this.#notas}`);
        console.log(`Nota media: ${this.calcularMedia()}`);

        console.log("--------------------");
    }
}

//CREACIÓN DE OBJETOS
//Objeto Alumno 1
let user1Alumno = new Alumno("Laura", [6, 9, 7, 8, 5, 10]);
user1Alumno.mostrar();

//Objeto Alumno 2
let user2Alumno = new Alumno("Ramón", [2, 4, 5, 3, 5, 1]);
user2Alumno.mostrar();

