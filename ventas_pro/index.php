<?php include("data/ventas.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ventas Pro · Evolución Medic</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css">
</head>

<body>

<!-- SIDEBAR -->
<nav class="sidebar">

  <div class="logo">
    <div class="logo-icon">
      <i class="fa-solid fa-heart-pulse"></i>
    </div>
    <div>
      <span class="logo-name">Evolución</span>
      <span class="logo-sub">MEDIC</span>
    </div>
  </div>

  <ul class="menu">
    <li>
      <a href="#" class="menu-item active">
        <span class="menu-icon"><i class="fa-solid fa-chart-line"></i></span>
        <span>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="#" class="menu-item">
        <span class="menu-icon"><i class="fa-solid fa-cart-shopping"></i></span>
        <span>Ventas</span>
      </a>
    </li>
    <li>
      <a href="#" class="menu-item">
        <span class="menu-icon"><i class="fa-solid fa-file-invoice"></i></span>
        <span>Facturación</span>
      </a>
    </li>
    <li>
      <a href="#" class="menu-item">
        <span class="menu-icon"><i class="fa-solid fa-clock-rotate-left"></i></span>
        <span>Historial</span>
      </a>
    </li>
    <li>
      <a href="#" class="menu-item">
        <span class="menu-icon"><i class="fa-solid fa-chart-pie"></i></span>
        <span>Reportes</span>
      </a>
    </li>
  </ul>

  <div class="sidebar-footer">
    <div class="user-pill">
      <div class="user-avatar">A</div>
      <div class="user-info">
        <span class="user-name">Admin</span>
        <span class="user-role">Administrador</span>
      </div>
    </div>
  </div>

</nav>

<!-- MAIN -->
<main class="main">

  <!-- TOPBAR -->
  <div class="topbar">
    <div class="topbar-left">
      <h1 class="page-title">Módulo de Ventas</h1>
      <p class="page-sub">Gestiona y registra tus ventas diarias</p>
    </div>
    <button class="btn-nueva-venta" onclick="abrirFormulario()">
      <i class="fa-solid fa-plus"></i>
      Nueva Venta
    </button>
  </div>

  <!-- STATS CARDS -->
  <div class="stats-grid">

    <div class="stat-card stat-blue">
      <div class="stat-info">
        <p class="stat-label">Ventas Hoy</p>
        <h2 class="stat-value">Bs. 1,250</h2>
        <span class="stat-badge up"><i class="fa-solid fa-arrow-trend-up"></i> +12% vs ayer</span>
      </div>
      <div class="stat-icon">
        <i class="fa-solid fa-money-bill-wave"></i>
      </div>
    </div>

    <div class="stat-card stat-green">
      <div class="stat-info">
        <p class="stat-label">Facturas Emitidas</p>
        <h2 class="stat-value">15</h2>
        <span class="stat-badge up"><i class="fa-solid fa-arrow-trend-up"></i> +3 hoy</span>
      </div>
      <div class="stat-icon">
        <i class="fa-solid fa-file-invoice"></i>
      </div>
    </div>

    <div class="stat-card stat-purple">
      <div class="stat-info">
        <p class="stat-label">Clientes Atendidos</p>
        <h2 class="stat-value">8</h2>
        <span class="stat-badge neutral"><i class="fa-solid fa-users"></i> Este mes</span>
      </div>
      <div class="stat-icon">
        <i class="fa-solid fa-hospital-user"></i>
      </div>
    </div>

  </div>

  <!-- CONTENT ROW -->
  <div class="content-row">

    <!-- GRÁFICA -->
    <div class="chart-card">
      <div class="card-header-custom">
        <h3>Ventas Semanales</h3>
        <div class="chart-legend">
          <span class="legend-dot blue"></span>
          <span>Esta semana</span>
        </div>
      </div>
      <canvas id="ventasChart" height="100"></canvas>
    </div>

    <!-- FORMULARIO DE VENTA -->
    <div class="form-card" id="formCard">
      <div class="card-header-custom">
        <h3>Registrar Venta</h3>
        <span class="badge-nuevo">Nuevo</span>
      </div>

      <form id="formVenta">

        <div class="field-group">
          <label class="field-label">
            <i class="fa-solid fa-user-injured"></i> Cliente
          </label>
          <select class="field-input" id="cliente_id" name="cliente_id" required>
            <?php foreach($clientes as $c): ?>
            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="field-group">
          <label class="field-label">
            <i class="fa-solid fa-box-open"></i> Producto
          </label>
          <select class="field-input" id="producto_id" name="producto_id" onchange="calcularTotal()" required>
            <?php foreach($productos as $p): ?>
            <option value="<?= $p['id'] ?>" data-precio="<?= $p['precio'] ?>">
              <?= htmlspecialchars($p['nombre']) ?> — Bs. <?= $p['precio'] ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="field-group">
          <label class="field-label">
            <i class="fa-solid fa-hashtag"></i> Cantidad
          </label>
          <input type="number" class="field-input" id="cantidad" name="cantidad"
                 value="1" min="1" oninput="calcularTotal()" required>
        </div>

        <div class="total-display">
          <span class="total-label">Total a pagar</span>
          <span class="total-amount">Bs. <span id="totalMonto">45.00</span></span>
        </div>

        <button type="button" class="btn-registrar" onclick="registrarVenta()">
          <i class="fa-solid fa-floppy-disk"></i>
          Guardar Venta
        </button>

      </form>

    </div>

  </div>

  <!-- TABLA DE HISTORIAL -->
  <div class="table-card">
    <div class="card-header-custom">
      <h3>Historial de Ventas</h3>
      <div class="table-actions">
        <input type="text" class="search-input" placeholder="Buscar..." id="searchInput" oninput="filtrarTabla()">
      </div>
    </div>

    <div class="table-responsive">
      <table class="tabla-ventas" id="tablaVentas">
        <thead>
          <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($ventas as $venta): ?>
          <tr>
            <td><span class="id-pill"><?= $venta['id'] ?></span></td>
            <td><?= htmlspecialchars($venta['cliente']) ?></td>
            <td>
              <span class="product-tag"><?= htmlspecialchars($venta['producto']) ?></span>
            </td>
            <td><strong><?= $venta['cantidad'] ?></strong></td>
            <td><span class="amount">Bs. <?= number_format($venta['total'], 2) ?></span></td>
            <td><span class="date-text"><?= $venta['fecha'] ?? date('d/m/Y') ?></span></td>
            <td>
              <div class="action-btns">
                <a href="factura.php?id=<?= $venta['id'] ?>" target="_blank">
                  <button class="btn-action btn-pdf" title="Ver factura">
                    <i class="fa-solid fa-file-pdf"></i>
                  </button>
                </a>
                <button class="btn-action btn-view" title="Ver detalle"
                        onclick="verDetalle(<?= $venta['id'] ?>, '<?= htmlspecialchars($venta['cliente']) ?>', '<?= htmlspecialchars($venta['producto']) ?>', <?= $venta['cantidad'] ?>, <?= $venta['total'] ?>)">
                  <i class="fa-solid fa-eye"></i>
                </button>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

</main>

<script src="js/app.js"></script>
<script>
// CHART
const ctx = document.getElementById('ventasChart');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
    datasets: [{
      label: 'Ventas Bs.',
      data: [120, 190, 150, 250, 300, 280, 350],
      borderColor: '#2563eb',
      backgroundColor: 'rgba(37,99,235,0.08)',
      borderWidth: 3,
      tension: 0.4,
      fill: true,
      pointBackgroundColor: '#2563eb',
      pointRadius: 5,
      pointHoverRadius: 8
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: false }
    },
    scales: {
      y: {
        beginAtZero: true,
        grid: { color: 'rgba(0,0,0,0.05)' },
        ticks: { font: { family: 'DM Sans' } }
      },
      x: {
        grid: { display: false },
        ticks: { font: { family: 'DM Sans' } }
      }
    }
  }
});
</script>

</body>
</html>
