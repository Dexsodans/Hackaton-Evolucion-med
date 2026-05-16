<?php
// ================================================
// VENTAS PRO · data/ventas.php
// Datos de ejemplo – reemplazar con consultas BD
// ================================================

// Clientes (en producción: SELECT * FROM clientes)
$clientes = [
    ["id" => 1, "nombre" => "Clínica Prosalud",    "telefono" => "77712345"],
    ["id" => 2, "nombre" => "Hospital Central",     "telefono" => "66698765"],
    ["id" => 3, "nombre" => "Farmacia Vida",        "telefono" => "71100234"],
    ["id" => 4, "nombre" => "Centro Médico Sur",    "telefono" => "69988112"],
];

// Productos (en producción: SELECT * FROM productos)
$productos = [
    ["id" => 1, "nombre" => "Guantes Quirúrgicos",  "precio" => 45.00, "stock" => 100],
    ["id" => 2, "nombre" => "Mascarillas Médicas",   "precio" => 25.00, "stock" => 200],
    ["id" => 3, "nombre" => "Alcohol Antiséptico",   "precio" => 30.00, "stock" => 150],
    ["id" => 4, "nombre" => "Jeringas Desechables",  "precio" => 15.00, "stock" => 300],
    ["id" => 5, "nombre" => "Termómetro Digital",    "precio" => 85.00, "stock" => 50],
];

// Ventas historial (en producción: JOIN ventas + clientes + productos)
$ventas = [
    [
        "id"       => 1,
        "cliente"  => "Clínica Prosalud",
        "producto" => "Guantes Quirúrgicos",
        "cantidad" => 3,
        "total"    => 135.00,
        "fecha"    => date("d/m/Y", strtotime("-2 days"))
    ],
    [
        "id"       => 2,
        "cliente"  => "Hospital Central",
        "producto" => "Mascarillas Médicas",
        "cantidad" => 5,
        "total"    => 125.00,
        "fecha"    => date("d/m/Y", strtotime("-1 days"))
    ],
    [
        "id"       => 3,
        "cliente"  => "Farmacia Vida",
        "producto" => "Alcohol Antiséptico",
        "cantidad" => 2,
        "total"    => 60.00,
        "fecha"    => date("d/m/Y")
    ],
    [
        "id"       => 4,
        "cliente"  => "Centro Médico Sur",
        "producto" => "Jeringas Desechables",
        "cantidad" => 10,
        "total"    => 150.00,
        "fecha"    => date("d/m/Y")
    ],
];
?>
