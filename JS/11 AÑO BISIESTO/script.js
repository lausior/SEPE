let anho = 2000;


if ( (anho % 4 == 0 && anho % 100 !== 0) || anho % 400 == 0){
    console.log("Es bisiesto");
}else{
    console.log("No no no");
}