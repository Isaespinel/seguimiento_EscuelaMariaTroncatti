<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require 'conn/connection.php';

    $num_cedula = htmlspecialchars($_POST['cedula_ciu']);
   

    $alumnos = $conn->prepare("select id as idAlumno, nombres, apellidos, num_cedula from alumnos where num_cedula = '" . $num_cedula . "'");
    $alumnos->execute();
    if ($alumnos->rowCount() > 0) {
        $alumno = $alumnos->fetch();
        if ($alumno['num_cedula'] == $num_cedula) {
            
            
            header("Location: listado.calificaciones.view.php?id=" . $alumno['idAlumno']);
            exit();
        } else {
            http_response_code(401);
            //echo "Credenciales incorrectas";
            header('location:notas.alumno.view.php?err=1');
            exit();
        }
    } else {
        http_response_code(401);
        header('location:notas.alumno.view.php?err=1');
        exit();
    }
} else {
    http_response_code(405);
    echo "SOLO SE PUEDE POST";

    // POST_GET
}
