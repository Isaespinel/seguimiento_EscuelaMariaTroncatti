<?php
if(!$_POST){
    header('location: alumnos.view.php');
}
else {
    //incluimos el archivo funciones que tiene la conexion
    require 'functions.php';
    //Recuperamos los valores que vamos a llenar en la BD
    $nombres = htmlentities($_POST ['nombres']);
    $apellidos = htmlentities($_POST ['apellidos']);
    $cedula = htmlentities($_POST ['cedula']);
    $genero = htmlentities($_POST['genero']);
    $numlista = htmlentities($_POST['numlista']);
    $idgrado = htmlentities($_POST['grado']);
    

    //insertar es el nombre del boton guardar que esta en el archivo alumnos.view.php
    if (isset($_POST['insertar'])){

        $result = $conn->query("insert into alumnos (nombres, apellidos, genero, num_cedula, estado, id_grado, id_seccion) values ('$nombres', '$apellidos', '$genero', '$cedula', 1, '$idgrado', 1)");
        if (isset($result)) {
            header('location:listadoalumnos.view.php');
        } else {
            header('location:alumnos.view.php?err=1');
        }// validación de registro

    //sino boton modificar que esta en el archivo alumnoedit.view.php
    }else if (isset($_POST['modificar'])) {
        //capturamos el id alumnos a modificar
            $id_alumno = htmlentities($_POST['id']);
            $result = $conn->query("update alumnos set nombres = '$nombres', apellidos = '$apellidos', genero = '$genero', num_cedula = '$cedula', estado=1 ,id_grado = '$idgrado'  where id = " . $id_alumno);
            if (isset($result)) {
                header('location:listadoalumnos.view.php');
            } else {
                header('location:alumnoedit.view.php?id=' . $id_alumno . '&err=1');
            }// validación de registro
    }

}

