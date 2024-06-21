<!DOCTYPE html>
<?php
require 'functions.php';
$permisos = ['Administrador','Profesor'];
permisos($permisos);
if(isset($_GET['id'])) {

    $id_usuario = $_GET['id'];

    $usuario = $conn->prepare("select * from users where id = ".$id_usuario);
    $usuario->execute();
    $usuario = $usuario->fetch();


}else{
    Die('Ha ocurrido un error');
}
?>
<html>
<head>
<title>Inicio | Registro de usuarios</title>

    <meta name="description" content="Registro de usuarios" />
    <link rel="stylesheet" href="css/style.css" />
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <meta name="description" content="Registro de usuarios" />

    

</head>
<body>
    
    
<?php include("./Cabecera.php"); ?><br>
<div class="body">
    <div class="panel" style="border: none;">
    <a href="usuarios.view.php"><ion-icon name="arrow-back-circle-outline" style="font-size: 35px;"></ion-icon></a>
            <h4>Edición de Usuarios</h4>
            <form method="post" class="form" action="procesarusuario.php">
                <!--colocamos un campo oculto que tiene el id del alumno-->
                <input type="hidden" value="<?php echo $usuario['id']?>" name="id">
                <label>Nombre</label><br>
                <input type="text" value="<?php echo $usuario['nombre']?>" required placeholder="Juan Andres" name="nombre" maxlength="45">
                <br>
                <label>Nombre de usuario</label><br>
                <input type="text" value="<?php echo $usuario['username']?>" placeholder="juanandres10" required name="usuario" maxlength="45">
                <br><br>
                <label>Contraseña</label><br>
                <input type="password" value="<?php echo $usuario['password']?>" placeholder="Contraseña" required name="pass" maxlength="45">
                <br><br>
                <label>Rol</label><br>
                <select name="rol" required>
                    <option <?php if($usuario['rol'] == 'Administrador'){ echo ('selected');} ?> value="Administrador">Administrador</option>
                    <option <?php if($usuario['rol'] == 'Profesor'){ echo ('selected');} ?> value="Profesor">Profesor</option>
                </select>

                <br><br>

                <button type="submit" class="btn btn-success" name="modificar">Guardar</button>
                <br><br>
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
               
               <?php
                if (isset($_GET['err']))
                    echo '<span class="error">Error al almacenar el registro</span>';
                if (isset($_GET['info']))
                    echo '<span class="success">Registro almacenado correctamente!</span>';
                ?>

            </form>
        </div>
</div>



</body>

</html>
