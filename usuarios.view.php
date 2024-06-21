<?php
require 'functions.php';

$permisos = ['Administrador', 'Profesor'];
permisos($permisos);
//consulta los alumnos para el listaddo de alumnos
$usuarios = $conn->prepare("select * from users where status_at=1");
$usuarios->execute();
$usuarios = $usuarios->fetchAll();
?>

<?php include("./Cabecera.php"); ?>




<div id="content-wrapper" class="d-flex flex-column" style="margin-left: 10%;">

    <!-- Main Content -->
    <div id="content">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="card mt-5" style="border: none;">
                        <div class="contenido">
                            <h1 class="ml-2">Usuarios</h1>
                        </div>
                    </div>


                    <div class="row my-2">
                        <div class="col-md-6">
                            <h4>Listado de Usuarios</h4>
                        </div>
                        <div class="col-md-6 text-right">
                        <a href="usuarioregister.view.php" class="btn btn-success">Ingresar</a>
                        </div>
                    </div>
                    <table class="table" cellspacing="0" cellpadding="0">
                        <tr>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Seguridad</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php foreach ($usuarios as $usuario) : ?>
                            <tr>
                                <td><?php echo $usuario['nombre'] ?></td>
                                <td><?php echo $usuario['rol'] ?></td>
                                <td><a href="userrol.php?id=<?php echo $usuario['id'] ?>">Acceso al curso</a> </td>
                                <td><a href="useredit.php?id=<?php echo $usuario['id'] ?>">Editar</a> </td>
                                <td><a href="userdelete.php?id=<?php echo $usuario['id'] ?>">Eliminar</a> </td>

                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <br><br>

                    
                    <br><br>
                    <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                    <?php
                    if (isset($_GET['err']))
                        echo '<span class="error">Error al almacenar el registro</span>';
                    if (isset($_GET['info']))
                        echo '<span class="success">Registro almacenado correctamente!</span>';
                        if (isset($_GET['rolinfo']))
                        echo '<span class="success">Rol asignado correctamente!</span>';
                    ?>




                </div>
            </div>
        </div>



    </div>
    <!-- End of Main Content -->


</div>





<?php include("./Footer.php"); ?>