<?php
// Array de productos del inventario
// Cada producto tiene: id, nombre, precio, stock y categoría
$productos = [
    ['id' => 1, 'nombre' => 'Portátil Pro', 'precio' => 899.99, 'stock' => 15, 'categoria' => 'Informática'],
    ['id' => 2, 'nombre' => 'Ratón Inalámbrico', 'precio' => 29.99, 'stock' => 50, 'categoria' => 'Accesorios'],
    ['id' => 3, 'nombre' => 'Teclado Mecánico', 'precio' => 79.99, 'stock' => 30, 'categoria' => 'Accesorios'],
    ['id' => 4, 'nombre' => 'Monitor 4K', 'precio' => 349.99, 'stock' => 8, 'categoria' => 'Informática'],
    ['id' => 5, 'nombre' => 'Auriculares BT', 'precio' => 59.99, 'stock' => 3, 'categoria' => 'Audio'],
];

// Ordenamos los productos por precio de menor a mayor
// <=> es el operador “nave espacial” para comparar valores
usort($productos, fn($a, $b) => $a['precio'] <=> $b['precio']);

// Filtramos los productos que tienen stock bajo (menos de 10 unidades)
$stockBajo = array_filter($productos, fn($p) => $p['stock'] < 10);

// Calculamos el valor total del inventario
// Se multiplica precio * stock de cada producto y se acumula
$valorTotal = array_reduce(
    $productos,
    fn($acc, $p) => $acc + ($p['precio'] * $p['stock']), 0
);

// Extraemos solo los nombres de los productos en un nuevo array
$nombres = array_column($productos, 'nombre');

// Creamos un array agrupando productos por categoría
$porCategoria = [];

// Recorremos todos los productos
foreach ($productos as $p) {

    // Usamos la categoría como clave del array
    // Si no existe, PHP la crea automáticamente
    $porCategoria[$p['categoria']][] = $p;
}

?>