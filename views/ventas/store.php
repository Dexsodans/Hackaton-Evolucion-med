<?php
// ================================================
// VENTAS PRO · store.php
// Recibe venta via fetch/JSON y la guarda en BD
// ================================================

header("Content-Type: application/json");

include("config/db.php");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["success" => false, "message" => "Datos inválidos"]);
    exit;
}

$cliente_id  = intval($data["cliente_id"]  ?? 0);
$producto_id = intval($data["producto_id"] ?? 0);
$cantidad    = intval($data["cantidad"]    ?? 1);
$total       = floatval($data["total"]     ?? 0);

if (!$cliente_id || !$producto_id || $cantidad < 1) {
    echo json_encode(["success" => false, "message" => "Campos obligatorios faltantes"]);
    exit;
}

// Prepared statement para seguridad
$stmt = $conn->prepare(
    "INSERT INTO ventas (cliente_id, producto_id, cantidad, total) VALUES (?, ?, ?, ?)"
);
$stmt->bind_param("iiid", $cliente_id, $producto_id, $cantidad, $total);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "id" => $conn->insert_id]);
} else {
    echo json_encode(["success" => false, "message" => "Error al guardar en BD"]);
}

$stmt->close();
$conn->close();
?>
