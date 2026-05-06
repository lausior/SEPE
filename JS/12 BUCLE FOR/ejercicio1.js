let contador = 0;

for (ano = 2000; ano <= 3000; ano++) {

    if ((ano % 4 == 0 && ano % 100 != 0) || ano % 400 == 0) {
        console.log(`El año ${ano} es bisiesto`);
        contador++;
    }
}
console.log(`Número de años bisiestos entre el 2000 y el 3000 = ${contador}`);

