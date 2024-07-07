<!DOCTYPE html>
<?php
require 'functions.php';
//arreglo de permisos
$permisos = ['Administrador', 'Profesor'];
permisos($permisos);



//consulta de grados
$grados = $conn->prepare("select * from grados where estado=1");
$grados->execute();
$grados = $grados->fetchAll();


?>
<html>

<head>
    <title>Notas | Registro de Notas</title>
    <meta name="description" content="Registro de Notas del Centro Escolar Profesor Lennin" />
    <link rel="stylesheet" href="css/style.css" />

</head>

<body>
    <?php include("./Cabecera_seguimiento.php"); ?>






    <div id="content-wrapper" class="d-flex flex-column" style="margin-left: 10%;">

        <!-- Main Content -->
        <div id="content">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card mt-5" style="border: none;">
                            <div class="contenido">
                                <h1 class="ml-2">Seguimiento</h1>
                            </div>
                        </div>

                        <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                        <?php
                        if (isset($_GET['err']))
                            echo '<span class="error">Error al almacenar el registro</span>';
                        if (isset($_GET['info']))
                            echo '<span class="success">Registro almacenado correctamente!</span>';
                        ?>





                        <?php
                        if (!isset($_GET['revisar'])) {
                        ?>

                            <div class="container">
                                <div class="row">

                                    <?php foreach ($grados as $grado) : ?>

                                        <div class="col-md-4 mt-4">
                                            <a href="seguimiento.view.php?grado=<?php echo $grado['id'];?>&revisar=1" style="text-decoration: none; color:black;">
                                                <div class="card" style="display:grid; place-items:center;">
                                                  <img src="Img/notebook.png" alt="" srcset="">
                                                  <h3 class="mb-4"><?php echo $grado['nombre'];?></h3>
                                                </div>
                                            </a>
                                        </div>

                                    <?php endforeach; ?>

                                </div>
                            </div>




                        <?php
                        }
                        ?>


                        <?php
                        if (isset($_GET['revisar'])) {

                            //$id_materia = $_GET['materia'];
                            $id_grado = $_GET['grado'];
                            //$id_seccion = $_GET['seccion'];


                            //Funcion para que traiga los valores de los estudiantes y de las notas
                            $consulta = $conn->prepare("SELECT alumnos.id as identificador, alumnos.nombres, alumnos.apellidos, grados.nombre as curso from alumnos inner join grados on grados.id=alumnos.id_grado WHERE alumnos.id_grado = $id_grado order by alumnos.apellidos");
                            $consulta->execute();
                            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

                        ?>
                            <br>
                            

                                    <a href="seguimiento.view.php"><ion-icon name="arrow-back-circle-outline" style="font-size: 35px;"></ion-icon></a>
                            <br>
                            <br>
                            

                                <table class="table" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Curso</th>
            
                                        <th>Acciones</th>
                                        <!-- <th>Eliminar</th> -->
                                    </tr>

                                    <?php foreach ($datos as $dato) : ?>
                                        
                                        
                                        <tr>
                                            <td><?php echo $dato['nombres'] ?></td>
                                            <td><?php echo $dato['apellidos'] ?></td>
                                            <td><?php echo $dato['curso'] ?></td>
                                            <td class="text-center"><a href="seguimiento_individual.php?alumno=<?php echo $dato['identificador'] ?>" type="button" class="btn btn-primary" style="border-radius: 50px; height:37px; width:37px;"><ion-icon style="font-size:18px" name="create"></ion-icon></a></td>
                                        </tr>

                                    <?php endforeach; ?>





                                    <tr></tr>
                                </table>
                                
                            


                        <?php }

                        ?>
                        

                        </form>
                       



                    </div>

                </div>

            </div>

        </div>


    </div>

</body>

</html>