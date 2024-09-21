<?php
//iniciamos la sesion
session_start();
//esta pregunta la debe hacer en todos los archivos para validar que antes el usuario haya iniciado sesion
if ( isset($_COOKIE["activo_alumn"]) && isset($_SESSION['num_cedula'])) {
    setcookie("activo_alumn", 1, time() + 3600);
} else {
    http_response_code(403);
    header('location:notas.alumno.view.php');
}
//importamos el archivo que contiene la variable de conexion a la base de datos
require 'conn/connection.php';



?>