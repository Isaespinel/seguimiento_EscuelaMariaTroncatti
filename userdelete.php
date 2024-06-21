<?php
require 'functions.php';
if($_SESSION['rol'] =='Administrador') {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        try {
            $id_usuario = $_GET['id'];
            $usuario = $conn->prepare("update users set status_at=0 where id=".$id_usuario);
            $usuario->execute();
            header('location:usuarios.view.php');
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