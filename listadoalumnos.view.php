<?php
require 'functions.php';

$permisos = ['Administrador', 'Profesor'];
permisos($permisos);
//consulta los alumnos para el listaddo de alumnos
$alumnos = $conn->prepare("select a.id, a.num_lista, a.nombres, a.apellidos, a.num_cedula, a.genero, b.nombre as grado from alumnos as a inner join grados as b on a.id_grado = b.id where a.estado=1 order by a.apellidos");
$alumnos->execute();
$alumnos = $alumnos->fetchAll();
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
                            <h1 class="ml-2">Alumnos</h1>
                        </div>
                    </div>


                    <div class="row my-2">
                        <div class="col-md-6">
                            <h4>Listado de Alumnos</h4>
                        </div>
                        <div class="col-md-6 text-right">
                        <a href="alumnos.view.php" class="btn btn-success">Ingresar</a>
                        </div>
                    </div>
                    <table class="table" cellspacing="0" cellpadding="0">
                        <tr>
                            <th>Cedula</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th class="text-center">Genero</th>
                            <th class="text-center">Grado</th>

                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php foreach ($alumnos as $alumno) : ?>
                            <tr>
                                <td><?php echo $alumno['num_cedula'] ?></td>
                                <td><?php echo $alumno['apellidos'] ?></td>
                                <td><?php echo $alumno['nombres'] ?></td>
                                <td align="center"><?php echo $alumno['genero'] ?></td>
                                <td align="center"><?php echo $alumno['grado'] ?></td>

                                <td><a href="alumnoedit.view.php?id=<?php echo $alumno['id'] ?>">Editar</a> </td>
                                <td><a href="alumnodelete.php?id=<?php echo $alumno['id'] ?>">Eliminar</a> </td>

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
                    ?>




                </div>
            </div>
        </div>



    </div>
    <!-- End of Main Content -->


</div>





<?php include("./Footer.php"); ?>