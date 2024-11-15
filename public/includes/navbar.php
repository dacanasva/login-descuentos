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
            color: #000;
            padding: 3px;
            border-radius: 2px;
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
            left: 0;
            width: 200px;
            height: 96%;
            background-color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin: 10px;
        }

        .navbar img {
            width: 100%;
            margin-bottom: 20px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
            width: 100%;
            transition: background 0.3s;
            display: flex;
            align-items: center;
        }

        .navbar a svg {
            margin-right: 10px;
            fill: #fff;
        }

        .navbar a:hover {
            background-color: #444;
        }

        .logout-container {
            margin-top: auto;
            width: 100%;
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

        body>*:not(.navbar):not(footer) {
            margin-left: 220px;
            padding: 20px;
        }

        .navbar {
            background-color: #333;
            padding: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            display: inline-block;
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
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .sub-menu {
            display: none;
            /* Ocultamos el submenú por defecto */
            margin-left: 20px;
            /* Margen para los subenlaces */
            background-color: white;
            /* Fondo blanco */
            padding: 10px;
            /* Espaciado interno */
            border: 1px solid #ccc;
            /* Borde opcional */
        }

        /* Estilo para los enlaces dentro del submenú */
        .sub-menu a {
            color: black;
            /* Cambiar el color del texto a negro para que sea visible */
            text-decoration: none;
            /* Quitar subrayado */
        }

        .sub-menu a:hover {
            text-decoration: underline;
            /* Subrayar al pasar el mouse */
        }

        .config {
            background-color: #000;
            border-radius: 50px;
        }

        .cofig-logut {
            display: flex;
            margin-top: auto;
            margin-right: auto;
        }

        .logo-lineaestetica {
            background-color: #fff;
            width: 180px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo-lineaestetica">
            <img src="/public/img/logoCalifacto.png" alt="logo">
            <img src="/public/img/Califacto.png" alt="logo">
        </div>
        <a href="#home">Dashboard</a>
        <a href="#" onclick="toggleSubMenu(); return false;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
                <path d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0M4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5m7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
            </svg>
            Descuentos</a>
        <div id="sub-menu" class="sub-menu">
            <a href="#">Por categoria</a><br>
            <a href="#">Por CSV</a>
        </div>
        <div class="cofig-logut">
            <div class="logout-container">
                <button type="button" class="btn btn-primary" onclick="logout()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                    Cerrar Sesión
                </button>
            </div>
            <div class="config">
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                    </svg></a>
            </div>
        </div>
    </div>
    <script>
        function toggleSubMenu() {
            var subMenu = document.getElementById("sub-menu");
            if (subMenu.style.display === "none" || subMenu.style.display === "") {
                subMenu.style.display = "block"; // Mostrar el submenú
            } else {
                subMenu.style.display = "none"; // Ocultar el submenú
            }
        }
    </script>
</body>

</html>