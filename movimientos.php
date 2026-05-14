<?php

// ============================
// CONEXIÓN A LA BASE DE DATOS
// ============================

$conexion = mysqli_connect("localhost", "root", "", "farmacia_db");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// ============================
// INSERTAR PRODUCTO
// ============================

if (isset($_POST['guardar'])) {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $stock = $_POST['stock'];
    $stock_minimo = $_POST['stock_minimo'];
    $codigo_barras = $_POST['codigo_barras'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $id_categoria = $_POST['id_categoria'];
    $id_proveedor = $_POST['id_proveedor'];

    $sql = "INSERT INTO productos(
        nombre,
        descripcion,
        precio_compra,
        precio_venta,
        stock,
        stock_minimo,
        codigo_barras,
        fecha_vencimiento,
        id_categoria,
        id_proveedor,
        estado
    )
    VALUES(
        '$nombre',
        '$descripcion',
        '$precio_compra',
        '$precio_venta',
        '$stock',
        '$stock_minimo',
        '$codigo_barras',
        '$fecha_vencimiento',
        '$id_categoria',
        '$id_proveedor',
        'ACTIVO'
    )";

    mysqli_query($conexion, $sql);

    header("Location: movimientos.php");
    exit();
}

// ============================
// DAR DE BAJA
// ============================

if (isset($_GET['baja'])) {

    $id = $_GET['baja'];

    $sql = "UPDATE productos 
            SET estado = 'INACTIVO'
            WHERE id_producto = '$id'";

    mysqli_query($conexion, $sql);

    header("Location: movimientos.php");
    exit();
}

// ============================
// DAR DE ALTA
// ============================

if (isset($_GET['alta'])) {

    $id = $_GET['alta'];

    $sql = "UPDATE productos 
            SET estado = 'ACTIVO'
            WHERE id_producto = '$id'";

    mysqli_query($conexion, $sql);

    header("Location: movimientos.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Movimientos Farmacia</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- FORMULARIO -->

    <div class="card shadow-lg p-4">

        <h2 class="text-center mb-4">
            CRUD DE PRODUCTOS
        </h2>

        <form method="POST">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text"
                           name="nombre"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Descripción
                    </label>

                    <input type="text"
                           name="descripcion"
                           class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        Precio Compra
                    </label>

                    <input type="number"
                           step="0.01"
                           name="precio_compra"
                           class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        Precio Venta
                    </label>

                    <input type="number"
                           step="0.01"
                           name="precio_venta"
                           class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        Stock
                    </label>

                    <input type="number"
                           name="stock"
                           class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        Stock Mínimo
                    </label>

                    <input type="number"
                           name="stock_minimo"
                           class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        Código de Barras
                    </label>

                    <input type="text"
                           name="codigo_barras"
                           class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        Fecha de Vencimiento
                    </label>

                    <input type="date"
                           name="fecha_vencimiento"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        ID Categoría
                    </label>

                    <input type="number"
                           name="id_categoria"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        ID Proveedor
                    </label>

                    <input type="number"
                           name="id_proveedor"
                           class="form-control">
                </div>

            </div>

            <button type="submit"
                    name="guardar"
                    class="btn btn-success">

                Guardar Producto

            </button>

        </form>

    </div>

    <!-- TABLA -->

    <div class="card shadow-lg p-4 mt-5">

        <h3 class="mb-4">
            Lista de Productos
        </h3>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio Venta</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

            <?php

            $sql = "SELECT * FROM productos";

            $resultado = mysqli_query($conexion, $sql);

            while ($fila = mysqli_fetch_assoc($resultado)) {

            ?>

                <tr>

                    <td>
                        <?php echo $fila['id_producto']; ?>
                    </td>

                    <td>
                        <?php echo $fila['nombre']; ?>
                    </td>

                    <td>
                        <?php echo $fila['precio_venta']; ?>
                    </td>

                    <td>
                        <?php echo $fila['stock']; ?>
                    </td>

                    <td>

                        <?php
                        if ($fila['estado'] == 'ACTIVO') {
                            echo "<span class='badge bg-success'>ACTIVO</span>";
                        } else {
                            echo "<span class='badge bg-danger'>INACTIVO</span>";
                        }
                        ?>

                    </td>

                    <td>

                        <?php if ($fila['estado'] == 'ACTIVO') { ?>

                            <a href="?baja=<?php echo $fila['id_producto']; ?>"
                               class="btn btn-danger btn-sm">

                                Dar de Baja

                            </a>

                        <?php } else { ?>

                            <a href="?alta=<?php echo $fila['id_producto']; ?>"
                               class="btn btn-success btn-sm">

                                Dar de Alta

                            </a>

                        <?php } ?>

                    </td>

                </tr>

            <?php
            }
            ?>

            </tbody>

        </table>

    </div>

</div>

</body>

</html>