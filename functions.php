<?php
//iniciamos la sesion
session_start();
//esta pregunta la debe hacer en todos los archivos para validar que antes el usuario haya iniciado sesion
if ( isset($_COOKIE["activo"]) && isset($_SESSION['username'])) {
    setcookie("activo", 1, time() + 3600);
} else {
    http_response_code(403);
    header('location:index.php?err=2');
}
//importamos el archivo que contiene la variable de conexion a la base de datos
require 'conn/connection.php';

//para verificar que tiene acceso a un archivo
function permisos($permisos){
    if (!in_array($_SESSION['rol'], $permisos)) {
        http_response_code(403);
        header('location:inicio.view.php?err=1');
    }
}

function getRol(){
    $rolprincipal = $_SESSION['rol'];
    return $rolprincipal;
}

function getUserId($conn) {
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? $user['id'] : null;
    }
    return null;
}

function existeNota($id_alumno, $id_materia, $conn){
    $nota = $conn->prepare("select * from notas where id_materia = '$id_materia' and id_alumno = '$id_alumno'");
    $nota->execute();
    //si devuelve una fila significa que la nota ya es
    $nota = $nota->rowCount();
    return $nota;
}


function existeComportamiento($id_alumno, $conn){
    $comportamiento = $conn->prepare("select * from comportamiento where id_alumno = '$id_alumno'");
    $comportamiento->execute();
    //si devuelve una fila significa que la nota ya es
    $comportamiento = $comportamiento->rowCount();
    return $comportamiento;
}


function existeSeguimiento($id_alumno, $conn){
    $seguimiento = $conn->prepare("select * from seguimiento where id_alumno = '$id_alumno'");
    $seguimiento->execute();
    //si devuelve una fila significa que la nota ya es
    $seguimiento = $seguimiento->rowCount();
    return $seguimiento;
    
}

?>