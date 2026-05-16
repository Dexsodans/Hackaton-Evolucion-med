<?php
// ================================================
// VENTAS PRO · config/db.php
// ================================================

$host = "localhost";
$user = "root";
$pass = "";
$db   = "ventas_pro";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    // En store.php se captura con JSON; en index.php usa datos estáticos
    // die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
