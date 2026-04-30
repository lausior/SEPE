let resultado = document.getElementById("resultado");


function verificar() {
      let numeroCuenta1 = document.getElementById("numeroCuenta1").value;
      let numeroCuenta2 = document.getElementById("numeroCuenta2").value;
      let numeroCuenta3 = document.getElementById("numeroCuenta3").value;
      let numeroCuenta4 = document.getElementById("numeroCuenta4").value;
      let numeroCuenta5 = document.getElementById("numeroCuenta5").value;
      let numeroCuenta6 = document.getElementById("numeroCuenta6").value;
      //Unimos los dígitos
      let numeroCuenta = numeroCuenta1.value + numeroCuenta2.value + numeroCuenta3.value + numeroCuenta4 + numeroCuenta5 + numeroCuenta6
      

      //Reemplazamos la "E" por 14
      let digito1 = numeroCuenta.replace("E", 14);
      //Reemplazamos la "S" por 28
      let digito2 = digito1.replace("S", 28);
      //Cogemos los dígitos del IBAN
      let fragmentoIban = digito2.substring(0,6);
      //Dejamos el resto de números
      let fragmentoNumeros = digito2.substring(6,28);
      //Concatenamos el IBAN al final
      let numero = fragmentoNumeros + fragmentoIban;
      //Cogemos el módulo
      let modulo = BigInt(numero)% 97n;

      //Comprobamos si el número es correcto
      if(modulo == 1){
            resultado.innerHTML = "Número de cuenta correcto";
      }
      else{
            resultado.innerHTML = "Número de cuenta incorrecto";
      }
}


