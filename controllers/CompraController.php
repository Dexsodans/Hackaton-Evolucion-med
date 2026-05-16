<?php

require_once __DIR__ . '/../config/conexion.php';

class CompraController {

    public function index() {

        global $conn;

        $productos = mysqli_query(
            $conn,
            "SELECT * FROM productos ORDER BY nombre ASC"
        );

        $proveedores = mysqli_query(
            $conn,
            "SELECT * FROM proveedores ORDER BY nombre_empresa ASC"
        );

        require __DIR__ . '/../views/compras/index.php';
    }

}