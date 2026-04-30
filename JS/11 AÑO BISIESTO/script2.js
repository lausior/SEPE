let anho = 2020;
let esBisiesto = false;

if (anho%4==0){ esBisiesto = true; } 
if (anho%100==0){ esBisiesto = false; } 
if (anho%400==0){ esBisiesto = true; } 

// if (esBisiesto == true){
//     console.log("Sí");
// }else{
//     console.log("No no no");
// }

if (esBisiesto){
    console.log("Sí");
}else{
    console.log("No no no");
}