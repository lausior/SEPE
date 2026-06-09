<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 2</title>
</head>
<body>
    <?php
    /*
    Almacena la siguiente información en un array multidimensional e imprímela usando bucles.

    John
        email: john@demo.com
        website: www.john.com
        age: 22
        password: pass
    Anna
        email: anna@demo.com
        website: www.anna.com
        age: 24
        password: pass
    Peter
        email: peter@mail.com
        website: www.peter.com
        age: 42
        password: pass
    Max
        email: max@mail.com
        website: www.max.com
        age: 33
        password: pass
    */

    //Array clave-valor
    echo('DATOS: </br>');

    $array = [
        ['nombre' => 'john',
        'datos' => [
            'email' => 'john.demo.com',
            'website' => 'www.john.com',
            'age' => 22,
            'password' => 'pass'
            ]
        ],
        ['nombre' => 'anna',
        'datos' => [
            'email' => 'anna@demo.com',
            'website' => 'www.anna.com',
            'age' => 24,
            'password' => 'pass'
            ]
        ],
        ['nombre' => 'Peter',
        'datos' => [
            'email' => 'peter@mail.com',
            'website' => 'www.peter.com',
            'age' => 42,
            'password' => 'pass'
            ]
        ],
        ['nombre' => 'Max',
        'datos' => [
            'email' => 'mazx@mail.com',
            'website' => 'www.max.com',
            'age' => 33,
            'password' => 'pass'
            ]   
        ]
    ];

    foreach($array as $usuario){
        echo('Nombre - ' . $usuario['nombre'] . '</br>');
        echo('Email - ' . $usuario['datos']['email'] . '</br>');
        echo('Website - ' . $usuario['datos']['website'] . '</br>');
        echo('Age - ' . $usuario['datos']['age'] . '</br>');
        echo('Password - ' . $usuario['datos']['password'] . '</br></br>');
    }

    /*OPCIÓN 2:
    for($i=0; $i<count($array); $i++){
        echo('Nombre - ' . $array[$i]['nombre'] . '</br>');
        echo('Email - ' . $array[$i]['datos']['email'] . '</br>');
        echo('Website - ' . $array[$i]['datos']['website'] . '</br>');
        echo('Age - ' . $array[$i]['datos']['age'] . '</br>');
        echo('Password - ' . $array[$i]['datos']['password'] . '</br></br>');
    }
    */
    ?>
</body>
</html>