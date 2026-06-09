<?php

//ARRAY DE TARE[AS
$tareas = [
    [
        'id' => 1,
        'descripcion' => 'Rellenar cuadrante de vacaciones',
        'estado' => 'Completada'
    ],
    [
        'id' => 2,
        'descripcion' => 'Hacer planning del viaje',
        'estado' => 'En proceso',
    ],
    [
        'id' => 3,
        'descripcion' => 'Comprar billetes de avión',
        'estado' => 'Pendiente'
    ]
];


//MOSTRAR TAREAS
function mostrarTareas(){
    global $tareas;
    return $tareas;
}

//FILTRAR INFO INTRODUCIDA
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function inputValido($data){
    $data = test_input($data);//guardamos la función anterior en una variable;

    //Comprobamos si el input está vacío
    if(!inputValido($data)){
        echo "Rellena los campos requeridos";
        return false;
    }
    else{
        return true;
    }
};



//GUARDAR TAREA
function guardarTarea($id, $descripcion, $estado){
    //Verificamos que los datos introducidos son válidos con la función 'inputValido'
    if(!inputValido($id) || !inputValido($descripcion) || !inputValido($estado)){
        echo "Error al validar los datos";
        return false;
    }

    //Creamos un nuevo array en el que guardaremos las nuevas tareas
    $nuevaTarea = [
        [
            'id' => $id,//recogemos las variables introducidas como parámetros
            'descripcion' => $descripcion,
            'estado' => $estado
        ]
    ];
    echo "Tarea guardada";

    //Unimos los array
    global $tareas;
    array_push($tareas, $nuevaTarea);

    return true;
};


    
   

    
   
    
    
    

    
   

    
    



        











?>