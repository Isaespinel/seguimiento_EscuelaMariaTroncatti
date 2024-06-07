<?php
require 'functions.php';

$permisos = ['Administrador', 'Profesor'];
permisos($permisos);
//consulta los cursos
$cursos = $conn->prepare("select * from grados where estado=1 order by id desc");
$cursos->execute();
$cursos = $cursos->fetchAll();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Listado de Cursos</title>
    <meta name="description" content="Registro de Notas del Centro Escolar Profesor Lennin" />
    <link rel="stylesheet" href="css/style.css" />

</head>

<body>
    <?php include("./Cabecera.php"); ?>

    <br>
    <br>




    <div id="content-wrapper" class="d-flex flex-column" style="margin-left: 10%;">

        <!-- Main Content -->
        <div id="content">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card mt-5" style="border: none;">
                            <div class="contenido">
                                <h1 class="ml-2">Cursos</h1>
                            </div>
                        </div>


                        <div class="row my-2">
                            <div class="col-md-6">
                                <h4>Listado de Cursos</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="cursosregister.view.php" class="btn btn-success">Ingresar</a>
                            </div>
                        </div>

                            <table class="table" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Período</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                                <?php foreach ($cursos as $curso) : ?>
                                    <tr>

                                        <td><?php echo $curso['nombre'] ?></td>
                                        <td><?php echo $curso['periodo'] ?></td>
                                        <td><a href="cursoedit.view.php?id=<?php echo $curso['id'] ?>">Editar</a></td>
                                        <td><a href="cursodelete.php?id=<?php echo $curso['id'] ?>">Eliminar</a> </td>

                                    </tr>
                                <?php endforeach; ?>
                            </table>




                       
                       

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

</body>

</html>