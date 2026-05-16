<?php

require_once __DIR__ . '/../config/conexion.php';

class InventarioController {

    public function index() {

        global $conn;

        $query = "
            SELECT 
                p.*,
                pr.nombre_empresa 
            FROM productos p
            LEFT JOIN proveedores pr 
            ON p.id_proveedor = pr.id_proveedor
            ORDER BY p.stock ASC
        ";

        $inventario = mysqli_query($conn, $query);

        require __DIR__ . '/../views/inventario/index.php';
    }
}