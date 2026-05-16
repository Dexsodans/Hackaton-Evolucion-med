<?php

$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$lote = $_POST['lote'];

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Producto</title>

<link rel="stylesheet"
href="css/estilos.css?v=10">

</head>

<body>

<h1>Producto Registrado</h1>

<h2>
<?php echo $nombre; ?>
</h2>

<p>
Categoría:
<?php echo $categoria; ?>
</p>

<p>
Lote:
<?php echo $lote; ?>
</p>

</body>

</html>