//Array meses
let meses1 = ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];

//Meses de enero - diciembre
console.log(`Array original: ${meses1}`);

//Meses de diciembre - enero
let mesesReverse = meses1.reverse();
console.log(`Meses al revés (1): ${mesesReverse}`);


//Array meses
let meses2 = ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
//Array en el que guardaremos los meses
let mesesReves = [];
//Recorremos el bucle al revés 
for (let i = meses2.length - 1; i >= 0; i--) {
  mesesReves.push(meses2[i]);
}
console.log(`Meses al revés (2): ${mesesReves}`);
