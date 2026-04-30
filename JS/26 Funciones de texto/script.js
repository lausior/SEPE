const cadena = "Hola. Cómo estamos???   ";

console.log(cadena.length);
console.log(cadena.charAt(3));
console.log(cadena[3]);
console.log(cadena.slice(2,7));
console.log(cadena.slice(-8));
console.log(cadena.substring(0,4));
console.log(cadena.indexOf("ó")); 
console.log(cadena.lastIndexOf("o")); 
console.log(cadena.startsWith("H")); 
console.log(cadena.endsWith("o")); 
console.log(cadena.toLowerCase());
console.log(cadena.toUpperCase());
console.log(cadena);
console.log((cadena.trim()).length); //trimStart //trimEnd
console.log(cadena.trim());
console.log(cadena.repeat(2));
console.log(cadena.replace("Hola","Adios"));
console.log(cadena.replaceAll("a","xxx"));

let arraySeparado = "Marta-Sebas-Guille".split("-");
console.log(arraySeparado);
//20-10-2026

let unido = arraySeparado.join("*");
console.log(unido);