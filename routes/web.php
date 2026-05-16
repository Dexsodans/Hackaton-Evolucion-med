<?php

require_once __DIR__ . '/../controllers/ProductoController.php';
require_once __DIR__ . '/../controllers/VentaController.php';
require_once __DIR__ . '/../controllers/CompraController.php';
require_once __DIR__ . '/../controllers/InventarioController.php';

$route = $_GET['route'] ?? '';

/*
|--------------------------------------------------------------------------
| PRODUCTOS
|--------------------------------------------------------------------------
*/

if ($route == 'productos') {

    $controller = new ProductoController();
    $controller->index();

    exit;
}

/*
|--------------------------------------------------------------------------
| VENTAS
|--------------------------------------------------------------------------
*/

if ($route == 'ventas') {

    $controller = new VentaController();
    $controller->index();

    exit;
}

/*
|--------------------------------------------------------------------------
| COMPRAS
|--------------------------------------------------------------------------
*/

if ($route == 'compras') {

    $controller = new CompraController();
    $controller->index();

    exit;
}


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
if ($route == 'inventario') {

    $controller = new InventarioController();
    $controller->index();

    exit;
}