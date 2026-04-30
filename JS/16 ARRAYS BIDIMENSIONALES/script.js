// let notasAlumnos = ["Iris",2,8,4,"Monica",3,10,9,"Laura",4,6,7];
// let total=0, media, contadorNotas;

// for (let i = 0; i < notasAlumnos.length; i++) {
    
//     if (i%4==0){
//         console.log("El alumno se llama: " + notasAlumnos[i])
//         contadorNotas = 0;
//     }
//     else if (contadorNotas==2){
            
//         total+=notasAlumnos[i];
//         media = total / 3;
//         console.log(media);  

//         total=0;

//     }else{
//         total+=notasAlumnos[i];
//         contadorNotas +=1;
//     }
  
// }

console.log("-----------------------");

let nombreAlumnos = ["Iris","Monica","Laura"];
let notasAlumnos2 = [[2,8,4,1],[9,9,9,9,9,9,9,9,9],[4,6,7,6]];
let total = 0;

//Este bulce avanza por las filas
for (let nombre = 0; nombre < nombreAlumnos.length; nombre++) {
    
    //saca nombre de esa posición
    console.log(nombreAlumnos[nombre]);
    
    //este bucle avanza por las nota
    //recorre las notas del alumno de esa posicion y calcula su media, mostrándola
    for (let nota = 0; nota < notasAlumnos2[nombre].length; nota++) {
        total +=notasAlumnos2[nombre][nota];
    }
        
    media = total / notasAlumnos2[nombre].length;
    console.log(media);
    total = 0;
    
}