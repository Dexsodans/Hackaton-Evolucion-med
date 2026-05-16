<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Sistema Médico</title>

    <link rel="stylesheet"
          href="/evolucion_medic/public/css/styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-black text-white">

    <?php include __DIR__ . '/sidebar.php'; ?>

    <main class="container-fluid p-4">

        <?= $content ?>

    </main>

</body>

</html>