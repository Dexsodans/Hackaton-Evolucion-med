<?php

session_start();
require 'config/conexion.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();

$result = $stmt->get_result();
$datos = $result->fetch_assoc();

if ($datos && password_verify($password, $datos['contraseña'])) {

    $_SESSION['usuario'] = $datos['nombre'];

    header("Location: index.php");
    exit;

} else {
    echo "Usuario o contraseña incorrectos";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<link rel="stylesheet"
      href="/evolucion_medic/public/css/styles.css">

</head>

<body class="login-body">

<div class="login-container">

    <div class="login-card">

        <h1 class="logo-title">
            EVOLUCIONMEDIC
        </h1>

        <p class="subtitle">
            Sistema Inteligente Médico
        </p>

        <?php if(isset($error)) { ?>

            <div class="alert alert-danger">

                <?= $error ?>

            </div>

        <?php } ?>

        <form method="POST">

            <input type="text"
                   name="usuario"
                   class="form-control mb-3"
                   placeholder="Usuario"
                   required>

            <input type="password"
                   name="password"
                   class="form-control mb-4"
                   placeholder="Contraseña"
                   required>

            <button type="submit"
                    name="login"
                    class="btn btn-login w-100">

                Ingresar

            </button>

        </form>

    </div>

</div>

</body>

</html>
</html>