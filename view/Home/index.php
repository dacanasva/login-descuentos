<?php
session_start();

if (!isset($_SESSION['usu_correo'])) {
    header("Location: ../../index.php"); // Redirige al inicio de sesión si no está autenticado
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo-linea estetica.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/Dashboard.css">
    <link rel="shortcut icon" href="../../public/img/logo-linea estetica.png" type="image/x-icon">
    <title>Dashboard</title>
</head>
<body>
    <?php
    include('../../public/includes/navbar.php')
    ?>
    <div class="content">
       
    </div>
</body>

</html>