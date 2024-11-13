<!DOCTYPE html>
<html lang="es">

<head>
  <title>Login linea estetica</title>
  <link rel="shortcut icon" href="./public/img/logo-linea estetica.png" type="image/x-icon">
  <link href="public/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="public/lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="public/css/bracket.css" rel="stylesheet">
  <link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
  <main class="login">

    <div class="login-container">
      <h1 class="titulo-login">Login</h1>
      <hr>
      <div class="form-group">
      <label for="">Correo electronico:</label>
        <input type="email" id="txtcorreo" name="txtcorreo" class="form-control" placeholder="Ingrese Correo Electronico" require>
      </div>
      <div class="form-group">
        <label for="">Contraseña:</label>
        <input type="password" id="txtpass" name="txtpass" class="form-control" placeholder="Ingrese Contraseña" require>
      </div>
      <button type="button" class="btn btn-info btn-block" id="btnlogin">Iniciar Sesion</button>
      <br>
    </div>
    <div class="market-container">
      <img class="logo-grande-linea-estetica" src="./public/img/Logo-Linena-Estetica-2023.webp" alt="" style="width: 550px;">
      <div class="text-box">
        TU MARKET DE BIENESTAR
      </div>
    </div>
  </main>

  <script src="public/lib/jquery/jquery.js"></script>
  <script src="public/lib/popperjs/popper.js"></script>
  <script src="public/lib/bootstrap/bootstrap.js"></script>
  <script src="index.js"></script>
</body>

</html>