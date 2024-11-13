<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Dashboard.css">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0; /* Ajustar para que esté en la parte superior */
            left: 0;
            width: 200px;
            height: 96%; /* Altura completa */
            background-color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border-radius: 15px; /* Bordes redondeados */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Sombra para el contenedor */
            margin: 10px; /* Separación de las paredes */
        }

        .navbar img {
            width: 100%; /* Ajustar el logo al ancho del contenedor */
            margin-bottom: 20px; /* Espacio entre el logo y los enlaces */
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
            width: 100%;
            transition: background 0.3s;
            display: flex; /* Usar flex para alinear el icono y el texto */
            align-items: center; /* Centrar verticalmente */
        }

        .navbar a svg {
            margin-right: 10px; /* Espacio entre el icono y el texto */
            fill: #fff; /* Color del icono */
        }

        .navbar a:hover {
            background-color: #444; /* Cambiar el color al pasar el ratón */
        }

        /* Contenedor para el botón de cerrar sesión */
        .logout-container {
            margin-top: auto; /* Empujar el botón al final del contenedor */
            width: 100%; /* Asegurarse de que ocupe todo el ancho */
            text-align: center; /* Centrar el botón */
        }

        button {
            background-color: #6200ea;
            color: #fff;
            padding: 10px;
            border-radius: 20px;
            border: none; /* Sin borde */
            cursor: pointer; /* Cambiar cursor al pasar el ratón */
            display: flex; /* Usar flex para alinear el icono y el texto */
            align-items: center; /* Centrar verticalmente */
        }

        button svg {
            margin-right: 5px; /* Espacio entre el icono y el texto del botón */
            fill: #fff; /* Color del icono del botón */
        }

        /* Main Content Area */
        body > *:not(.navbar):not(footer) {
            margin-left: 220px; /* Offset para navbar */
            padding: 20px;
        }

        .navbar {
            background-color: #333;
            padding: 10px;
        }

        .navbar a {
            color: white; /* Color del texto */
            text-decoration: none; /* Quita el subrayado */
            padding: 8px 16px; /* Espaciado interno */
            display: inline-block; /* Para que el padding funcione correctamente */
        }

        .navbar a:hover {
            color: white; /* Mantiene el mismo color al pasar el mouse */
            background-color: transparent; /* Sin fondo al pasar el mouse */
            cursor: default; /* Cambia el cursor a un puntero normal */
        }

        .logout-container {
            float: right; /* Alinea el botón de cerrar sesión a la derecha */
        }

        .logout-container button {
            color: white; /* Color del texto del botón */
            border: none; /* Sin borde */
            padding: 10px 20px; /* Espaciado interno */
            cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
        }
    </style>
</head>

<body>
    <div class="navbar">
        <img src="../img/19197184.jpg" alt="logo">
        <a href="#home">Descuentos</a>
        <a href="#services">Servicios</a>
        <a href="#about">Acerca de</a>
        <a href="#contact">Contacto</a>
        <div class="logout-container">
            <a href="../../index.php">
                <button type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg> Cerrar Sesión</button>
            </a>
        </div>
    </div>
</body>

</html>