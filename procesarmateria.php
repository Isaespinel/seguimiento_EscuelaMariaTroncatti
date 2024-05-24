<?php
if(!$_POST){
    header('location: materiasregister.view.php');
}
else {
    //incluimos el archivo funciones que tiene la conexion
    require 'functions.php';
    //Recuperamos los valores que vamos a llenar en la BD
    $nombre_mat = htmlentities($_POST ['nombre_mat']);
    $curso_mat = htmlentities($_POST ['curso_mat']);
    

    //insertar es el nombre del boton guardar que esta en el archivo alumnos.view.php
    if (isset($_POST['insertar'])){

        $result = $conn->query("insert into materias (nombre, id_grado) values ('$nombre_mat', '$curso_mat')");
        if (isset($result)) {
            header('location:materias.view.php');
        } else {
            header('location:materiasregister.view.php?err=1');
        }// validación de registro

    //sino boton modificar que esta en el archivo alumnoedit.view.php
    }else if (isset($_POST['modificar'])) {
        
            $id_materia = htmlentities($_POST['id']);
            $result = $conn->query("update materias set nombre = '$nombre_mat', id_grado = '$curso_mat' where id = " . $id_materia);
            if (isset($result)) {
                header('location:materias.view.php');
            } else {
                header('location:materiasedit.view.php?id=' . $id_curso . '&err=1');
            }// validación de registro
    }

}

