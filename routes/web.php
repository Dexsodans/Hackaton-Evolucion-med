<?php

require '../controllers/ProductoController.php';
require '../controllers/VentaController.php';

$url = $_SERVER['REQUEST_URI'];

if ($url == '/productos') {

    $controller = new ProductoController();
    $controller->index();

}

if ($url == '/ventas') {

    $controller = new VentaController();
    $controller->index();

}