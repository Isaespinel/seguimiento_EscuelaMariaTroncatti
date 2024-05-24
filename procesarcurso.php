<?php
if(!$_POST){
    header('location: cursosregister.view.php');
}
else {
    //incluimos el archivo funciones que tiene la conexion
    require 'functions.php';
    //Recuperamos los valores que vamos a llenar en la BD
    $nombre_cur = htmlentities($_POST ['nombre_cur']);
    $periodo_cur = htmlentities($_POST ['periodo_cur']);
    
    //insertar es el nombre del boton guardar que esta en el archivo alumnos.view.php

    if (isset($_POST['insertar'])){
        $result = $conn->query("insert into grados (nombre, periodo) values ('$nombre_cur', '$periodo_cur')");
        if (isset($result)) {
            header('location:cursos.view.php');
        } else {
            header('location:cursosregister.view.php?err=1');
        }// validación de registro
    //sino boton modificar que esta en el archivo alumnoedit.view.php
    }else if (isset($_POST['modificar'])) {
        
            $id_curso = htmlentities($_POST['id']);
            $result = $conn->query("update grados set nombre = '$nombre_cur', periodo = '$periodo_cur' where id = " . $id_curso);
            if (isset($result)) {
                header('location:cursos.view.php');
            } else {
                header('location:cursoedit.view.php?id=' . $id_curso . '&err=1');
            }// validación de registro
    }

}
