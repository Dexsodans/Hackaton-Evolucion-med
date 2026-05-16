<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Sistema Farmacéutico Premium</title>

    <link rel="stylesheet" href="css/estilos.css?v=10">

</head>

<body>

<div class="contenedor">



    <!-- FORMULARIO -->

    <div class="formulario">

        <div class="titulo">

            <h2>Registro de Productos</h2>

            <p>
                Complete todos los campos
            </p>

        </div>
            <form id="formulario">

            <div class="grupo">

                <label>Nombre del Producto</label>

                <input type="text"
                name="nombre"
                placeholder="Ejemplo: Paracetamol"
                required>

            </div>

            <div class="fila">

                <div class="grupo">

                    <label>Categoría</label>

                    <select name="categoria" required>

                        <option value="">
                            Seleccione categoría
                        </option>

                        <option>Medicamentos</option>
                        <option>Jarabes</option>
                        <option>Vitaminas</option>
                        <option>Inyecciones</option>

                    </select>

                </div>

                <div class="grupo">

                    <label>Número de Lote</label>

                    <input type="text"
                    name="lote"
                    placeholder="LT-2026-001">

                </div>

            </div>

            <div class="fila">

                <div class="grupo">

                    <label>Fecha de Vencimiento</label>

                    <input type="date"
                    name="vencimiento"
                    required>

                </div>

                <div class="grupo">

                    <label>Código de Barras</label>

                    <input type="text"
                    id="codigo_barras"
                    name="codigo_barras"
                    placeholder="Código automático">

                </div>

            </div>

            <div class="grupo">

                <label>Descripción</label>

                <textarea
                name="descripcion"
                placeholder="Descripción del producto"></textarea>

            </div>

            <div class="fila">

                <div class="grupo">

                    <label>Proveedor</label>

                    <input type="text"
                    name="proveedor"
                    placeholder="Proveedor">

                </div>

                <div class="grupo">

                    <label>Precio</label>

                    <input type="number"
                    name="precio"
                    placeholder="0.00">

                </div>

            </div>

            <div class="botones">

                <button
                type="button"
                class="btn-generar"
                onclick="generarCodigo()">

                    Generar Código

                </button>

                <button
                type="submit"
                class="btn-guardar">

                    Guardar Producto

                </button>

            </div>

        </form>

    </div>

</div>

<script src="js/app.js"></script>

</body>
</html>