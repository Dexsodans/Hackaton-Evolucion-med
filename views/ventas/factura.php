<?php
$cliente  = htmlspecialchars($_POST["cliente"]  ?? $_GET["cliente"]  ?? "Cliente Ejemplo");
$producto = htmlspecialchars($_POST["producto"] ?? $_GET["producto"] ?? "Producto Ejemplo");
$cantidad = intval($_POST["cantidad"] ?? $_GET["cantidad"] ?? 1);
$total    = floatval($_POST["total"]  ?? $_GET["total"]   ?? 0);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Factura – Evolución Medic</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;600;700&family=Space+Mono&display=swap" rel="stylesheet">
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: #f0f4ff;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
  }

  .factura {
    background: white;
    width: 600px;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(37,99,235,0.15);
  }

  .factura-header {
    background: linear-gradient(135deg, #0c1535, #1d4ed8);
    color: white;
    padding: 32px 36px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
  }

  .empresa-nombre {
    font-size: 20px;
    font-weight: 700;
    letter-spacing: 0.5px;
  }

  .empresa-sub {
    font-size: 12px;
    opacity: 0.6;
    margin-top: 3px;
  }

  .factura-num {
    text-align: right;
  }

  .factura-num span {
    display: block;
    font-size: 11px;
    opacity: 0.6;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .factura-num strong {
    font-family: 'Space Mono', monospace;
    font-size: 22px;
  }

  .factura-body {
    padding: 32px 36px;
  }

  .info-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 28px;
  }

  .info-block p {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #94a3b8;
    margin-bottom: 5px;
  }

  .info-block strong {
    font-size: 15px;
    color: #1e293b;
  }

  .detalle-tabla {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 24px;
  }

  .detalle-tabla thead tr {
    background: #f8faff;
    border-bottom: 2px solid #e0e7ff;
  }

  .detalle-tabla th {
    padding: 10px 14px;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #64748b;
    font-weight: 700;
    text-align: left;
  }

  .detalle-tabla td {
    padding: 14px;
    font-size: 14px;
    color: #1e293b;
    border-bottom: 1px solid #f1f5f9;
  }

  .total-block {
    background: #f0f4ff;
    border-radius: 12px;
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 28px;
  }

  .total-block span {
    font-weight: 600;
    color: #64748b;
  }

  .total-block strong {
    font-size: 24px;
    font-weight: 700;
    color: #2563eb;
    font-family: 'Space Mono', monospace;
  }

  .factura-footer {
    border-top: 1px solid #e2e8f0;
    padding: 20px 36px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .thanks { font-size: 13px; color: #64748b; }
  .thanks strong { display: block; color: #1e293b; font-size: 14px; }

  .btn-print {
    display: flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    color: white;
    border: none;
    padding: 11px 22px;
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
  }

  .btn-print:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(37,99,235,0.35); }

  @media print {
    body { background: white; padding: 0; }
    .factura { box-shadow: none; border-radius: 0; width: 100%; }
    .btn-print { display: none; }
  }
</style>
</head>
<body>

<div class="factura">

  <div class="factura-header">
    <div>
      <div class="empresa-nombre">Evolución Medic</div>
      <div class="empresa-sub">Productos Médicos de Calidad</div>
    </div>
    <div class="factura-num">
      <span>Factura N°</span>
      <strong>#<?= str_pad(rand(1,999), 4, "0", STR_PAD_LEFT) ?></strong>
    </div>
  </div>

  <div class="factura-body">

    <div class="info-row">
      <div class="info-block">
        <p>Cliente</p>
        <strong><?= $cliente ?></strong>
      </div>
      <div class="info-block">
        <p>Fecha</p>
        <strong><?= date("d/m/Y") ?></strong>
      </div>
    </div>

    <table class="detalle-tabla">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio Unit.</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $producto ?></td>
          <td><?= $cantidad ?></td>
          <td>Bs. <?= $cantidad > 0 && $total > 0 ? number_format($total / $cantidad, 2) : "—" ?></td>
          <td><strong>Bs. <?= number_format($total, 2) ?></strong></td>
        </tr>
      </tbody>
    </table>

    <div class="total-block">
      <span>Total a Pagar</span>
      <strong>Bs. <?= number_format($total, 2) ?></strong>
    </div>

  </div>

  <div class="factura-footer">
    <div class="thanks">
      <strong>¡Gracias por su compra!</strong>
      Evolución Medic — La Paz, Bolivia
    </div>
    <button class="btn-print" onclick="window.print()">
      🖨 Imprimir
    </button>
  </div>

</div>

</body>
</html>
