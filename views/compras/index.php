<?php ob_start(); ?>

<div style="margin-left:270px;">

<div class="row g-4">

    <div class="col-lg-7">

        <div class="card bg-dark text-white p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="text-info">
                    Instrumental Disponible
                </h2>

                <div class="input-group" style="max-width:420px;">

                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>

                    <input type="text"
                           id="searchInput"
                           class="form-control"
                           placeholder="Buscar producto...">

                </div>

            </div>

            <div class="table-responsive">

                <table class="table table-dark table-hover"
                       id="productosTable">

                    <thead>

                        <tr>

                            <th>Producto</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Cantidad</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php while($producto = mysqli_fetch_assoc($productos)) { ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($producto['nombre']) ?>
                            </td>

                            <td>
                                <?= (int)$producto['stock'] ?>
                            </td>

                            <td>
                                Bs.
                                <?= number_format($producto['precio_compra'], 2) ?>
                            </td>

                            <td>

                                <input type="number"
                                       class="form-control"
                                       value="0"
                                       min="0">

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-5">

        <div class="card bg-dark text-white p-4">

            <h3 class="text-info mb-4">
                Nueva Compra
            </h3>

            <form>

                <div class="mb-3">

                    <label class="form-label">
                        Fecha
                    </label>

                    <input type="date"
                           class="form-control"
                           value="<?= date('Y-m-d') ?>">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Proveedor
                    </label>

                    <select class="form-select">

                        <option>
                            Seleccione proveedor
                        </option>

                        <?php while($proveedor = mysqli_fetch_assoc($proveedores)) { ?>

                            <option>
                                <?= htmlspecialchars($proveedor['nombre_empresa']) ?>
                            </option>

                        <?php } ?>

                    </select>

                </div>

                <button class="btn btn-info w-100">

                    Guardar Compra

                </button>

            </form>

        </div>

    </div>

</div>

</div>

<script>

document.getElementById('searchInput')
.addEventListener('keyup', function() {

    const term = this.value.toLowerCase();

    document
    .querySelectorAll('#productosTable tbody tr')
    .forEach(row => {

        row.style.display =
        row.textContent.toLowerCase().includes(term)
        ? ''
        : 'none';

    });

});

</script>

<?php

$content = ob_get_clean();

include __DIR__ . '/../layouts/layout.php';

?>