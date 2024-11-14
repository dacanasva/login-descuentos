<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function logout() {
            //llama la funcion que se encunetra en la ruta
            const logoutUrl = "../../controller/logout.php";

            // Realizar la solicitud a l variable
            $.post(logoutUrl, function(data) {
                if (data == 0) {
                    // Eliminar el estado de sesión
                    sessionStorage.removeItem('isLoggedIn');
                    window.location.href = '../../index.php'; //ruta a la que debera ir
                    history.pushState(null, '', window.location.href);
                    window.onpopstate = function() {
                        history.pushState(null, '', window.location.href);
                        console.log("la sesión se a cerrado exitosamente");
                    };
                } else {
                    alert("Error al cerrar sesión. Inténtalo de nuevo.");
                }
            }).fail(function() {
                alert("Error en la conexión. Inténtalo de nuevo.");
            });
        }
    </script>
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

        .navbar {
            position: fixed;
            top: 0;
            /* Ajustar para que esté en la parte superior */
            left: 0;
            width: 200px;
            height: 96%;
            /* Altura completa */
            background-color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border-radius: 15px;
            /* Bordes redondeados */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            /* Sombra para el contenedor */
            margin: 10px;
            /* Separación de las paredes */
        }

        .navbar img {
            width: 100%;
            /* Ajustar el logo al ancho del contenedor */
            margin-bottom: 20px;
            /* Espacio entre el logo y los enlaces */
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
            width: 100%;
            transition: background 0.3s;
            display: flex;
            /* Usar flex para alinear el icono y el texto */
            align-items: center;
            /* Centrar verticalmente */
        }

        .navbar a svg {
            margin-right: 10px;
            /* Espacio entre el icono y el texto */
            fill: #fff;
            /* Color del icono */
        }

        .navbar a:hover {
            background-color: #444;
            /* Cambiar el color al pasar el ratón */
        }

        /* Contenedor para el botón de cerrar sesión */
        .logout-container {
            margin-top: auto;
            /* Empujar el botón al final del contenedor */
            width: 100%;
            /* Asegurarse de que ocupe todo el ancho */
            text-align: center;
        }

        button {
            background-color: #6200ea;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            width: 100%;
        }

        button svg {
            margin-right: 20px;
            fill: #fff;
        }

        /* Main Content Area */
        body>*:not(.navbar):not(footer) {
            margin-left: 220px;
            /* Offset para navbar */
            padding: 20px;
        }

        .navbar {
            background-color: #333;
            padding: 10px;
        }

        .navbar a {
            color: white;
            /* Color del texto */
            text-decoration: none;
            /* Quita el subrayado */
            padding: 8px 16px;
            /* Espaciado interno */
            display: inline-block;
            /* Para que el padding funcione correctamente */
        }

        .navbar a:hover {
            color: white;
            background-color: transparent;
            cursor: default;
        }

        .logout-container {
            float: right;
        }

        .logout-container button {
            color: white;
            /* Color del texto del botón */
            border: none;
            /* Sin borde */
            padding: 10px 20px;
            /* Espaciado interno */
            cursor: pointer;
            /* Cambia el cursor al pasar sobre el botón */
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#home"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
                <path d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0M4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5m7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
            </svg>Descuentos</a>
        <div class="logout-container">
            <button type="button" class="btn btn-primary" onclick="logout()">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                </svg>
                Cerrar Sesión
            </button>
        </div>
    </div>
</body>

</html>