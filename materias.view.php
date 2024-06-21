<?php
require 'functions.php';

$permisos = ['Administrador', 'Profesor'];
permisos($permisos);
//consulta los materias
//$materias = $conn->prepare("select * from materias inner join grados on materias.id_grado = grados.id");
$materias = $conn->prepare("SELECT materias.Id, materias.Nombre, grados.nombre FROM materias INNER JOIN grados ON  materias.id_grado = grados.id where materias.estado=1 order by materias.id desc");
$materias->execute();
$materias = $materias->fetchAll();



?>
<!DOCTYPE html>
<html>

<head>
    <title>Listado de Materias</title>
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
                                <h1 class="ml-2">Materias</h1>
                            </div>
                        </div>


                        <div class="row my-2">
                            <div class="col-md-6">
                                <h4>Listado de Materias</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="materiasregister.view.php" class="btn btn-success">Ingresar</a>
                            </div>
                        </div>

                        <table class="table" cellspacing="0" cellpadding="0">
                            <tr>

                                <th>Materia</th>
                                
                                <th>Curso</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            <?php foreach ($materias as $materia) : ?>
                                <tr>

                                    <td><?php echo $materia['Nombre'] ?></td>
                                    
                                    <td><?php echo $materia['nombre'] ?></td>
                                    <td><a href="materiaedit.view.php?id=<?php echo $materia['Id'] ?>">Editar</a></td>
                                    <td><a href="materiadelete.php?id=<?php echo $materia['Id'] ?>">Eliminar</a> </td>

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





</body>

</html>