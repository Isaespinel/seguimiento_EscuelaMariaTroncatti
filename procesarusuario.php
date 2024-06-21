<?php
if(!$_POST){
    header('location: alumnos.view.php');
}
else {
   
    require 'functions.php';
    
    $nombreus = htmlentities($_POST ['nombre']);
    $usuario = htmlentities($_POST ['usuario']);
    $pass = htmlentities($_POST['pass']);
    $rol = htmlentities($_POST['rol']);
 

    if (isset($_POST['insertar'])){

        $result = $conn->query("insert into users(username, password, nombre, rol, status_at) values ('$usuario', '$pass', '$nombreus', '$rol', 1)");
        if (isset($result)) {
            header('location:usuarios.view.php?info=1');
        } else {
            header('location:registrousers.view.php?err=1');
        }

    }else if (isset($_POST['modificar'])) {
            $id_usuario = htmlentities($_POST['id']);
            $result = $conn->query("update users set username = '$usuario', password = '$pass', nombre = '$nombreus',rol = '$rol' where id = " . $id_usuario);
            if (isset($result)) {
                header('location:usuarios.view.php');
            } else {
                header('location:registrousers.view.php?id=' . $id_usuario . '&err=1');
            }
    }

}

