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
    <title>Notas | Registro de Comportamiento</title>
    <meta name="description" content="Registro de Notas del Centro Escolar Profesor Lennin" />
    <link rel="stylesheet" href="css/style.css" />

</head>

<body>
    <?php include("./Cabecera.php"); ?>

    <div id="content-wrapper" class="d-flex flex-column" style="margin-left: 10%;">


        <div id="content">
            <div class="container">
                <div class="row">
                <div class="col-md-12">

                <div class="card mt-5" style="border: none;">
                            <div class="contenido">
                                <h1 class="ml-2">Comportamiento</h1>
                            </div>
                </div>
            <?php
            if (!isset($_GET['revisar'])) {
            ?>

            <div class="container">
                <div class="row">

              

<?php foreach ($grados as $grado) : ?>



<div class="col-md-4 mt-4">
    <a href="comportamiento.view.php?grado=<?php echo $grado['id'];?>&revisar=1" style="text-decoration: none; color:black;">
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
            <hr>

            <?php
            if (isset($_GET['revisar'])) {
                //$id_materia = $_GET['materia'];
                $id_grado = $_GET['grado'];
                //$id_seccion = $_GET['seccion'];


                //Funcion para que traiga los valores de los estudiantes y de las notas
                $consulta = $conn->prepare("SELECT alumnos.id AS id_alumno, alumnos.Nombres, alumnos.Apellidos, comportamiento.Parcial1_t1, comportamiento.Parcial2_t1, comportamiento.Final_t1, comportamiento.Parcial1_t2, comportamiento.Parcial2_t2, comportamiento.Final_t2, comportamiento.Parcial1_t3, comportamiento.Parcial2_t3, comportamiento.Final_t3, comportamiento.Prom_final FROM alumnos LEFT JOIN comportamiento ON alumnos.id = comportamiento.id_alumno WHERE alumnos.id_grado = $id_grado and alumnos.estado = 1 ORDER BY alumnos.Nombres, alumnos.Apellidos");
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

              

            ?>
                <br>
                <a href="comportamiento.view.php"><ion-icon name="arrow-back-circle-outline" style="font-size: 35px;"></ion-icon></a>
                <br>
                <br>
                <form action="procesarcomportamiento.php" method="post">
                    <table class="table" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Parcial 1 T1</th>
                            <th>Parcial 2 T1</th>
                            <th>Final T1</th>
                            <th>Parcial 1 T2</th>
                            <th>Parcial 2 T2</th>
                            <th>Final T2</th>
                            <th>Parcial 1 T3</th>
                            <th>Parcial 2 T3</th>
                            <th>Final T3</th>
                            <th>Promedio Final</th>
                        </tr>
                        <?php foreach ($datos as $dato) : ?>
                            <input type="hidden" value="<?php echo $dato['id_alumno'] ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][id]">
                            <input type="hidden" value="<?php if($dato['Final_t1']!=''){echo $dato['Final_t1'];}else{echo '0';} ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][finalt1]">
                            <input type="hidden" value="<?php if($dato['Final_t2']!=''){echo $dato['Final_t2'];}else{echo '0';} ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][finalt2]">
                            <input type="hidden" value="<?php if($dato['Final_t3']!=''){echo $dato['Final_t3'];}else{echo '0';} ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][finalt3]">
                            <input type="hidden" value="<?php echo $id_grado ?>" name="id_grado">
                            <tr>
                                <td align="center"><?php echo $dato['Nombres'] ?></td>
                                <td><?php echo $dato['Apellidos'] ?></td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial1t1]">
                                        <option <?php if (isset($dato['Parcial1_t1'])) {
                                                    echo 'selected';
                                                } ?>>-</option>
                                        <option <?php if (($dato['Parcial1_t1']) == 'A') {
                                                    echo 'selected';
                                                } ?> value="A">A</option>
                                        <option <?php if (($dato['Parcial1_t1']) == 'B') {
                                                    echo 'selected';
                                                } ?> value="B">B</option>
                                        <option <?php if (($dato['Parcial1_t1']) == 'C') {
                                                    echo 'selected';
                                                } ?> value="C">C</option>
                                        <option <?php if (($dato['Parcial1_t1']) == 'D') {
                                                    echo 'selected';
                                                } ?> value="D">D</option>
                                        <option <?php if (($dato['Parcial1_t1']) == 'E') {
                                                    echo 'selected';
                                                } ?> value="E">E</option>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial2t1]">
                                        <option <?php if (isset($dato['Parcial2_t1'])) {
                                                    echo 'selected';
                                                } ?>>-</option>
                                        <option <?php if (($dato['Parcial2_t1']) == 'A') {
                                                    echo 'selected';
                                                } ?> value="A">A</option>
                                        <option <?php if (($dato['Parcial2_t1']) == 'B') {
                                                    echo 'selected';
                                                } ?> value="B">B</option>
                                        <option <?php if (($dato['Parcial2_t1']) == 'C') {
                                                    echo 'selected';
                                                } ?> value="C">C</option>
                                        <option <?php if (($dato['Parcial2_t1']) == 'D') {
                                                    echo 'selected';
                                                } ?> value="D">D</option>
                                        <option <?php if (($dato['Parcial2_t1']) == 'E') {
                                                    echo 'selected';
                                                } ?> value="E">E</option>
                                    </select>
                                </td>


                                <td class="text-center">
                                    <?php echo $dato['Final_t1']?>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial1t2]">
                                        <option <?php if (isset($dato['Parcial1_t2'])) {
                                                    echo 'selected';
                                                } ?>>-</option>
                                        <option <?php if (($dato['Parcial1_t2']) == 'A') {
                                                    echo 'selected';
                                                } ?> value="A">A</option>
                                        <option <?php if (($dato['Parcial1_t2']) == 'B') {
                                                    echo 'selected';
                                                } ?> value="B">B</option>
                                        <option <?php if (($dato['Parcial1_t2']) == 'C') {
                                                    echo 'selected';
                                                } ?> value="C">C</option>
                                        <option <?php if (($dato['Parcial1_t2']) == 'D') {
                                                    echo 'selected';
                                                } ?> value="D">D</option>
                                        <option <?php if (($dato['Parcial1_t2']) == 'E') {
                                                    echo 'selected';
                                                } ?> value="E">E</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial2t2]">
                                        <option <?php if (isset($dato['Parcial2_t2'])) {
                                                    echo 'selected';
                                                } ?>>-</option>
                                        <option <?php if (($dato['Parcial2_t2']) == 'A') {
                                                    echo 'selected';
                                                } ?> value="A">A</option>
                                        <option <?php if (($dato['Parcial2_t2']) == 'B') {
                                                    echo 'selected';
                                                } ?> value="B">B</option>
                                        <option <?php if (($dato['Parcial2_t2']) == 'C') {
                                                    echo 'selected';
                                                } ?> value="C">C</option>
                                        <option <?php if (($dato['Parcial2_t2']) == 'D') {
                                                    echo 'selected';
                                                } ?> value="D">D</option>
                                        <option <?php if (($dato['Parcial2_t2']) == 'E') {
                                                    echo 'selected';
                                                } ?> value="E">E</option>
                                    </select>
                                </td>


                                <td class="text-center"><?php echo $dato['Final_t2'] ?></td>

                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial1t3]">
                                        <option <?php if (isset($dato['Parcial1_t3'])) {
                                                    echo 'selected';
                                                } ?>>-</option>
                                        <option <?php if (($dato['Parcial1_t3']) == 'A') {
                                                    echo 'selected';
                                                } ?> value="A">A</option>
                                        <option <?php if (($dato['Parcial1_t3']) == 'B') {
                                                    echo 'selected';
                                                } ?> value="B">B</option>
                                        <option <?php if (($dato['Parcial1_t3']) == 'C') {
                                                    echo 'selected';
                                                } ?> value="C">C</option>
                                        <option <?php if (($dato['Parcial1_t3']) == 'D') {
                                                    echo 'selected';
                                                } ?> value="D">D</option>
                                        <option <?php if (($dato['Parcial1_t3']) == 'E') {
                                                    echo 'selected';
                                                } ?> value="E">E</option>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial2t3]">
                                        <option <?php if (isset($dato['Parcial2_t3'])) {
                                                    echo 'selected';
                                                } ?>>-</option>
                                        <option <?php if (($dato['Parcial2_t3']) == 'A') {
                                                    echo 'selected';
                                                } ?> value="A">A</option>
                                        <option <?php if (($dato['Parcial2_t3']) == 'B') {
                                                    echo 'selected';
                                                } ?> value="B">B</option>
                                        <option <?php if (($dato['Parcial2_t3']) == 'C') {
                                                    echo 'selected';
                                                } ?> value="C">C</option>
                                        <option <?php if (($dato['Parcial2_t3']) == 'D') {
                                                    echo 'selected';
                                                } ?> value="D">D</option>
                                        <option <?php if (($dato['Parcial2_t3']) == 'E') {
                                                    echo 'selected';
                                                } ?> value="E">E</option>
                                    </select>
                                </td>


                                <td class="text-center"><?php echo $dato['Final_t3'] ?></td>

                                <td class="text-center"><?php echo $dato['Prom_final'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr></tr>
                    </table>
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