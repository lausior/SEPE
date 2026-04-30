function verificar() {
    let resultado = document.getElementById("resultado");
    // //Cogemos los valores de los inputs
    let numeroCuenta1 = document.getElementById("numeroCuenta1").value;
    let numeroCuenta2 = document.getElementById("numeroCuenta2").value;
    let numeroCuenta3 = document.getElementById("numeroCuenta3").value;
    let numeroCuenta4 = document.getElementById("numeroCuenta4").value;
    let numeroCuenta5 = document.getElementById("numeroCuenta5").value;
    let numeroCuenta6 = document.getElementById("numeroCuenta6").value;
    //Unimos los valores de los inputs
    let numeroCuenta = numeroCuenta1 + numeroCuenta2 + numeroCuenta3 + numeroCuenta4 + numeroCuenta5 + numeroCuenta6;

    //Cogemos los dígitos de la primera verificación
    let entidadSucursal = numeroCuenta.substring(4,12);
    
    //Cogemos los dígitos de la segunda verificación
    let cuenta = numeroCuenta.substring(14,24);

    //Pesos
    const pesos8 = [4, 8, 5, 10, 9, 7, 3, 6];
    const pesos10 = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];

    //NÚMERO DE CONTROL 1
    //Multiplicación de los números de entidad
    let multiplicacionEntidad = [];
    for (let i = 0; i < entidadSucursal.length; i++) {
        multiplicacionEntidad[i] = parseInt((pesos8[i] * entidadSucursal[i]));
    }

    //Suma de los números de entidad
    let sumaEntidad = 0;
    for (let i = 0; i < multiplicacionEntidad.length; i++) {
        sumaEntidad += multiplicacionEntidad[i];
    }

    //Dígito de control 1
    let digitoControl1 = 11 - (sumaEntidad % 11);

    //NÚMERO DE CONTROL 2
    //Multiplicación de los números de cuenta
    let multiplicacionCuenta = [];
    for (let i = 0; i < cuenta.length; i++) {
        multiplicacionCuenta[i] = parseInt(pesos10[i] *cuenta[i]);
    }

    //Suma de los dígitos de cuenta
    let sumaCuenta = 0;
    for (let i = 0; i < multiplicacionCuenta.length; i++) {
        sumaCuenta += multiplicacionCuenta[i];
    }

    //Módulo cuenta
    let digitoControl2 = 11 - (sumaCuenta % 11);

    //Condición si el resultado es 10 u 11
    if(digitoControl1 == 10){
        digitoControl1 = 1;
    }
    else if(digitoControl1 == 11){
        digitoControl1 = 0;
    }

    if(digitoControl2 == 10){
        digitoControl2 = 1;
    }
    else if(digitoControl2 == 11){
        digitoControl2 = 0;
    }
    
    //Comprobamos que los dígitos son correctos
    let digitoControlCalculado = "" + digitoControl1 + digitoControl2;
    let digitoControl = numeroCuenta.substring(12,14);

    if(digitoControl == digitoControlCalculado){
        resultado.innerHTML = "El número de cuenta introducido es correcto";
    }
    else{
        resultado.innerHTML = "El número de cuenta introducido es incorrecto";
    }
}


