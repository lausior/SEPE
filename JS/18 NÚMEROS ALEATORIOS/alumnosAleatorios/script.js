// let numAlumnos = parseInt(document.getElementById("num").value);
// let resultado = document.getElementById("resultado");


function aleatorio(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}



let resultado;
for (let i = 0; i < 5; i++) {
    resultado = aleatorio(0, 10);
    console.log(resultado);

}

