<!DOCTYPE html>
<?php
require 'functions.php';
//arreglo de permisos
$permisos = ['Administrador', 'Profesor'];
permisos($permisos);

//consulta las materias
$materias = $conn->prepare("select * from materias where estado=1");
$materias->execute();
$materias = $materias->fetchAll();


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
    <?php include("./Cabecera.php"); ?>






    <div id="content-wrapper" class="d-flex flex-column" style="margin-left: 10%;">

        <!-- Main Content -->
        <div id="content">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card mt-5" style="border: none;">
                            <div class="contenido">
                                <h1 class="ml-2">Calificaciones</h1>
                            </div>
                        </div>





                        <?php
                        if (!isset($_GET['revisar'])) {
                        ?>

                            <div class="container" >
                                <div class="row">

                                    <?php foreach ($grados as $grado) : ?>



                                        


                                        <div class="col-md-4 mt-4">
                                            <a href="notas.view.php?grado=<?php echo $grado['id'];?>&revisar=1" style="text-decoration: none; color:black;">
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
                            $consulta = $conn->prepare("SELECT alumnos.id AS id_alumno, alumnos.Nombres, alumnos.Apellidos, materias.id AS id_materia, materias.nombre AS nombre_materia, notas.Id AS notaid, notas.Parcial1_t1, notas.Parcial2_t1, notas.Examen_t1, notas.Proyecto_t1,notas.Final_t1, notas.Parcial1_t2, notas.Parcial2_t2, notas.Examen_t2, notas.Proyecto_t2,notas.Final_t2, notas.Parcial1_t3, notas.Parcial2_t3, notas.Examen_t3, notas.Proyecto_t3, notas.Final_t3, notas.Promedio_total FROM alumnos CROSS JOIN materias LEFT JOIN notas ON alumnos.id = notas.id_alumno AND materias.id = notas.id_materia WHERE alumnos.id_grado = $id_grado and materias.id_grado = $id_grado and materias.estado=1 and alumnos.estado=1 ORDER BY materias.nombre, alumnos.Nombres, alumnos.Apellidos");
                            $consulta->execute();
                            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);


                        ?>
                            <br>
                            

                                    <a href="notas.view.php"><ion-icon name="arrow-back-circle-outline" style="font-size: 35px;"></ion-icon></a>
                            <br>
                            <br>
                            <form action="procesarnota.php" method="post">
                                <div class="scroll-container" style="width: 100%; overflow-x: auto;">

                                <table class="table" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        
                                        <th>Parcial 1 T1</th>
                                        <th>Parcial 2 T1</th>
                                        <th>Examen T1</th>
                                        <th>Proyecto T1</th>
                                        <th>Nota Final T1</th>

                                        <th>Parcial 1 T2</th>
                                        <th>Parcial 2 T2</th>
                                        <th>Examen T2</th>
                                        <th>Proyecto T2</th>
                                        <th>Nota Final T2</th>


                                        <th>Parcial 1 T3</th>
                                        <th>Parcial 2 T3</th>
                                        <th>Examen T3</th>
                                        <th>Proyecto T3</th>
                                        <th>Nota Final T3</th>

                                       
                                        <th>Promedio Total</th>
                                        <th>Materia</th>
                                       
                                    </tr>

                                    <?php foreach ($datos as $dato) : ?>
                                        <input type="hidden" value="<?php echo $dato['id_alumno'] ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][id]">
                                        <input type="hidden" value="<?php echo $dato['id_materia'] ?>" name="materias[<?php echo $dato['id_materia'] ?>][id]">
                                        <input type="hidden" value="<?php echo $id_grado ?>" name="id_grado">
                                        <tr>
                                            <td align="center"><?php echo $dato['Nombres'] ?></td>
                                            <td><?php echo $dato['Apellidos'] ?></td>
                                            <td><input type="text" maxlength="4" value="<?php if (isset($dato['Parcial1_t1'])) {
                                                                                            echo $dato['Parcial1_t1'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        } ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][parcial1t1]" class="txtnota"></td>
                                            <td><input type="text" maxlength="4" value="<?php if (isset($dato['Parcial2_t1'])) {
                                                                                            echo $dato['Parcial2_t1'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        }  ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][parcial2t1]" class="txtnota"></td>
                                           
                                            
                                            <td><input type="text" maxlength="4" value="<?php if (isset($dato['Examen_t1'])) {
                                                                                            echo $dato['Examen_t1'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        }  ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][exament1]" class="txtnota"></td>
                                            <td><input type="text" maxlength="4" value="<?php if (isset($dato['Proyecto_t1'])) {
                                                                                            echo $dato['Proyecto_t1'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        }  ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][proyectot1]" class="txtnota"></td>

                                            <td><?php echo $dato['Final_t1'] ?></td>
                                            <td><input type="text" maxlength="4" value="<?php if (isset($dato['Parcial1_t2'])) {
                                                                                            echo $dato['Parcial1_t2'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        } ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][parcial1t2]" class="txtnota"></td>
                                            <td><input type="text" maxlength="4" value="<?php if (isset($dato['Parcial2_t2'])) {
                                                                                            echo $dato['Parcial2_t2'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        } ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][parcial2t2]" class="txtnota"></td>
                                            <td><input type="text" maxlength="4" value="<?php if (isset($dato['Examen_t2'])) {
                                                                                            echo $dato['Examen_t2'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        } ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][exament2]" class="txtnota"></td>
                                             <td><input type="text" maxlength="4" value="<?php if (isset($dato['Proyecto_t2'])) {
                                                                                            echo $dato['Proyecto_t2'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        } ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][proyectot2]" class="txtnota"></td>
                                            <td><?php echo $dato['Final_t2'] ?></td>

                                            <!-- Parcial 3 -->

                                            <td><input type="text" maxlength="4" value="<?php if (isset($dato['Parcial1_t3'])) {
                                                                                            echo $dato['Parcial1_t3'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        } ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][parcial1t3]" class="txtnota"></td>
                                            <td><input type="text" maxlength="4" value="<?php if (isset($dato['Parcial2_t3'])) {
                                                                                            echo $dato['Parcial2_t3'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        } ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][parcial2t3]" class="txtnota"></td>
                                            <td><input type="text" maxlength="4" value="<?php if (isset($dato['Examen_t3'])) {
                                                                                            echo $dato['Examen_t3'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        } ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][exament3]" class="txtnota"></td>
                                             <td><input type="text" maxlength="4" value="<?php if (isset($dato['Proyecto_t3'])) {
                                                                                            echo $dato['Proyecto_t3'];
                                                                                        } else {
                                                                                            echo 0.0;
                                                                                        } ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][materias][<?php echo $dato['id_materia'] ?>][proyectot3]" class="txtnota"></td>
                                            <td><?php echo $dato['Final_t3'] ?></td>


                                            <td><?php echo $dato['Promedio_total'] ?></td>
                                            <td><?php echo $dato['nombre_materia'] ?></td>
                                            
                                        </tr>
                                    <?php endforeach; ?>





                                    <tr></tr>
                                </table>
                                </div>
                                <br>
                                <button class="btn btn-success" type="submit" name="insertar">Guardar</button>
                                <br>
                            </form>


                        <?php }

                        ?>
                        <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                        <?php
                        if (isset($_GET['err']))
                            echo '<span class="error">Error al almacenar el registro</span>';
                        if (isset($_GET['info']))
                            echo '<span class="success">Registro almacenado correctamente!</span>';
                        ?>

                        </form>
                        <?php
                        if (isset($_GET['err']))
                            echo '<span class="error">Error al guardar</span>';
                        ?>



                    </div>

                </div>

            </div>

        </div>


    </div>

</body>

</html>