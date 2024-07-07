<!DOCTYPE html>
<?php
require 'functions.php';
$permisos = ['Administrador','Profesor'];
permisos($permisos);
if(isset($_GET['id'])) {

    $id_usuario = $_GET['id'];


    $users = $conn->prepare("SELECT nombre FROM users where id=$id_usuario");
    $users->execute();
    $users = $users->fetchAll();


    //consulta de grados
    $grados = $conn->prepare("SELECT * FROM grados WHERE estado=1");
    $grados->execute();
    $grados = $grados->fetchAll();

}else{
    Die('Ha ocurrido un error');
}
?>
<html>
<head>
<title>Inicio | Registro de roles de usuario</title>

    <meta name="description" content="Registro de roles de usuario" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <meta name="description" content="Registro de roles de usuario" />


</head>
<body>
    
    
<?php include("./Cabecera.php"); ?><br>
<div class="body">
    <div class="panel" style="border: none;">
    <a href="usuarios.view.php"><ion-icon name="arrow-back-circle-outline" style="font-size: 35px;"></ion-icon></a>
           <h4>Edición del rol del usuario <?php foreach ($users as $user) :  print($user['nombre']);?>     <?php endforeach; ?> </h4>
            <form method="post" class="form" action="rolusuario.php">
                <!--colocamos un campo oculto que tiene el id del alumno-->
                <input type="hidden" value="<?php echo $id_usuario ?>" name="id_usuario">

                <label for="">Selecciona el acceso a los cursos</label>
                
                <div class="container">
                    <div class="row">
                        <?php foreach ($grados as $grado) : ?>
                            <div class="col-md-4 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo $grado['id'] ?>" name="cursos[<?php echo $grado['id'] ?>]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?php echo $grado['nombre'] ?> - <?php echo $grado['periodo'] ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <br>

                <button class="btn btn-success" type="submit" name="insertar">Guardar</button>
               
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
