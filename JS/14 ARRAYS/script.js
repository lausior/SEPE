//Creación del array
let notas = [5,8,3,4];


console.log(notas[2]);//imprime la posición 2 (3)
notas[0] = 100;//modifica un índice
console.log(notas[0]);//100
console.log(notas);//imprime todo el array
console.log(notas[5]);//undefined (no existe el índice 5)


console.log("---------------");

//Recorre el array
for (let i = 0; i < notas.length; i++) {
    console.log(notas[i]);    
}

console.log("---------------");

//Creación de un array vacío
let alumnos = [];
//Añade elementos a los índices indicados (el resto se rellenan vacíos)
alumnos[3] = "Santiago";
alumnos[8] = "Lois";
console.log(alumnos);

//Añade un elemento al final (aumenta el índice)
alumnos[alumnos.length]="Laura";
console.log(alumnos);

//Añade un elemento al final (más recomendable)
alumnos.push("Albert");
console.log(alumnos);

//Saca un elemento del final
let dato = alumnos.pop();
console.log(alumnos);
console.log(dato);

//Añade un elemento al principio
alumnos.unshift("Gilbert");
console.log(alumnos);

//Quita un elemento al principio
dato = alumnos.shift();
console.log(alumnos);
console.log(dato);

//Devuelve el índice de un elemento
console.log(alumnos.indexOf("Santiago"));//3
console.log(alumnos.indexOf("Santi"));//-1 (no existe el elemento)

//Comprueba si existe un elemento
console.log(alumnos.includes("Santiago"));//true
