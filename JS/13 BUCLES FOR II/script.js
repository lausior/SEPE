//ARRAY DE DATOS CON EL QUE VOY A TRABAJAR
let notas = [8,3,7,2,1];


//Bucle For clásico
let total = 0;
for (let index = 0; index < notas.length; index++) {
    total+= notas[index];    
}
console.log("Media: " + total/notas.length); //4.2


//Bucle For OF - recorre los valores
total = 0;
for (const notaActual of notas) {
    total +=notaActual;
}
console.log("Media: " + total/notas.length); //4.2


//For in - recorre por índices y no por valores
console.log("------FOR IN------");
for (const indice in notas) {
    console.log(indice); // 0 1 2 3 4 
}
console.log("-------------------");


//BREAK
total = 0;
for (let index = 0; index < notas.length; index++) {
    if (notas[index]<5){
        console.log("Has suspendido");
        break; //si index < 5 sale del bucle
    }
    total+= notas[index];    
}
console.log(total);


//CONTINUE
total = 0;
for (let index = 0; index < notas.length; index++) {
    if (notas[index]<5){
        console.log("Has suspendido");
        continue;//si index < 5 no cuenta ese elemento y sigue el bucle
    }
    total+= notas[index];    
}
console.log(total);//8


console.log("-------------------");


//FOREACH que devuelve el elemento
notas.forEach((nota)=>{
    console.log(nota);  //8 3 7 2 1 
});


console.log("-------------------");


//FOREACH que devuelve el elemento y el índice
notas.forEach((nota,indice)=>{
    console.log(nota + " - " + indice);// 8-0  3-1  7-2  2-3  1-4
});


console.log("-------------------");


//FOREACH con función anónima
notas.forEach(function(dato, indice){
    console.log(dato +  ": " + indice);// 8:0  3:1  7:2  2:3  1:4
});