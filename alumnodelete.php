<?php
require 'functions.php';
if($_SESSION['rol'] =='Administrador') {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        try {
            $id_alumno = $_GET['id'];
            $alumno = $conn->prepare("update alumnos set estado=0 where id = " . $id_alumno);
            $alumno->execute();
            header('location:listadoalumnos.view.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        die('Ha ocurrido un error');
    }
}else{
    header('location:inicio.view.php?err=1');
}
?>