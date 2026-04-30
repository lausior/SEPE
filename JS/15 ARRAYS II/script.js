let tuttiFruti = [8,"Marta", false, 57.23];
let huecos = [8,, false, 57.23];

for (const dato of tuttiFruti) {
    console.log(dato); //8, Marta, false, 57.23
}


console.log("----------------------");


for (const dato of huecos) {
    console.log(dato); //8, undefined, false, 57.23 //imprime el hueco vacío como 'undefined'
}


console.log("----------------------");


huecos.forEach(dato=>{
    console.log(dato); //8, false, 57.23 (no imprime el hueco vacío)
});


console.log("----------------------");


let a = new Array(10); //array de 10 elementos

for (const dato of a) {
    console.log(dato); //undefined
}


console.log("----------------------");


function Saludar(){
    console.log("Hola"); //Hola
    return 4;
}

function Despedirte(){
    console.log("Adios"); //Adios
}

let b = [Saludar(), Despedirte()];
console.log(b); //[4, undefined]

console.log("----------------------");

let c = [Saludar, Despedirte];
c[0]();
c[1]();
console.log(c); //[ƒ, ƒ]