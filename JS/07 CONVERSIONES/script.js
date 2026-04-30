/* CONVERSIONES - Muy propio después de Semana Santa */

let numero = 5;
let texto = String(numero);

console.log(typeof numero);//number
console.log(typeof texto);//string
console.log(typeof numero.toString());//string

let numeroTexto = "10.5";
let numeroTextoConvertido = Number(numeroTexto);//10.5
console.log(numeroTextoConvertido);

let numeroTexto2 = "10a";
let numeroTextoConvertido2 = Number(numeroTexto2);
console.log(numeroTextoConvertido2);//NaN(no coge los números)
console.log(parseInt(numeroTexto));//10(devuelve la parte numérica)

let numeroDecimalTexto = "10.7";
console.log(parseFloat(numeroDecimalTexto));//10.7
console.log(parseInt(numeroDecimalTexto));//10

let a=5;
let b=2;
let c=a/b; 
let j=0,h=99,w;

console.log(parseInt(c));//2(devuelve el cociente)
console.log(parseInt(c.toString()));//2(devuelve el cociente)

//Conversiones implícitas

console.log("6"/"2");//2
console.log("10" + 5);//105
console.log(5 + "10");//510
console.log("10" - 5);//5
console.log((5 + 10).toString());//10

//Algo más sobre Parse
console.log(parseInt("10km")); //10
console.log(parseInt("10km2")); //10