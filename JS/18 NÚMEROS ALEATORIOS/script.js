for (let index = 0; index < 10; index++) {
   let numero = Math.random(); //0 y 1 Excluido
   console.log(numero);
}

console.log("-------------------");

for (let index = 0; index < 10; index++) {
   let numero = Math.floor(Math.random()*10);
   console.log(numero);
}

console.log("-------------------");

function aleatorios(min, max){
    //return Math.floor(Math.random() * (5 - 0 + 1)) + 0; //0-5
    //return Math.floor(Math.random() * (10 - 5 + 1)) + 5; //5-10
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

for (let index = 0; index < 10; index++) {
   let numero = aleatorios(0,5)
   console.log(numero);
}