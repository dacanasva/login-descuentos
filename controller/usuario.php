<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
session_start(); // Iniciar la sesión

$usuario = new Usuario();

switch ($_GET["op"]) {
    case "acceso":
        $datos = $usuario->get_login($_POST["usu_correo"], $_POST["usu_pass"]);
        if (is_array($datos) && count($datos) > 0) {
            // Establecer la sesión
            $_SESSION['usu_correo'] = $datos[0]['usu_correo']; 
            echo "1"; 
        } else {
            echo "0"; 
        }
        break;
}
?>