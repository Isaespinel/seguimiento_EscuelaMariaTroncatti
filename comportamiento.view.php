<!DOCTYPE html>
<?php
require 'functions.php';
//arreglo de permisos
$permisos = ['Administrador', 'Profesor'];
permisos($permisos);



$username_main = getUserId($conn);


//consulta las materias
$materias = $conn->prepare("select * from materias where estado=1");
$materias->execute();
$materias = $materias->fetchAll();


//consulta de grados
$grados = $conn->prepare("select grados.id, grados.nombre from grados inner join permiso_usuarios on grados.id=permiso_usuarios.id_grado where permiso_usuarios.id_user='$username_main' and grados.estado=1");
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
                            <input type="hidden" value="<?php if($dato['Final_t1']!='0'){echo $dato['Final_t1'];}else{echo '0';} ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][finalt1]">
                            <input type="hidden" value="<?php if($dato['Final_t2']!='0'){echo $dato['Final_t2'];}else{echo '0';} ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][finalt2]">
                            <input type="hidden" value="<?php if($dato['Final_t3']!='0'){echo $dato['Final_t3'];}else{echo '0';} ?>" name="alumnos[<?php echo $dato['id_alumno'] ?>][finalt3]">
                            <input type="hidden" value="<?php echo $id_grado ?>" name="id_grado">
                            <tr>
                                <td align="center"><?php echo $dato['Nombres'] ?></td>
                                <td><?php echo $dato['Apellidos'] ?></td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial1t1]">
                                        <option <?php if (isset($dato['Parcial1_t1'])) {
                                                    echo 'selected';
                                                } ?> value="0" >-</option>
                                        <option <?php if (($dato['Parcial1_t1']) == '9') {
                                                    echo 'selected';
                                                } ?> value="9">A</option>
                                        <option <?php if (($dato['Parcial1_t1']) == '8') {
                                                    echo 'selected';
                                                } ?> value="8">B</option>
                                        <option <?php if (($dato['Parcial1_t1']) == '7') {
                                                    echo 'selected';
                                                } ?> value="7">C</option>
                                        <option <?php if (($dato['Parcial1_t1']) == '6') {
                                                    echo 'selected';
                                                } ?> value="6">D</option>
                                        <option <?php if (($dato['Parcial1_t1']) == '5') {
                                                    echo 'selected';
                                                } ?> value="5">E</option>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial2t1]">
                                        <option <?php if (isset($dato['Parcial2_t1'])) {
                                                    echo 'selected';
                                                } ?> value="0" >-</option>
                                        <option <?php if (($dato['Parcial2_t1']) == '9') {
                                                    echo 'selected';
                                                } ?> value="9">A</option>
                                        <option <?php if (($dato['Parcial2_t1']) == '8') {
                                                    echo 'selected';
                                                } ?> value="8">B</option>
                                        <option <?php if (($dato['Parcial2_t1']) == '7') {
                                                    echo 'selected';
                                                } ?> value="7">C</option>
                                        <option <?php if (($dato['Parcial2_t1']) == '6') {
                                                    echo 'selected';
                                                } ?> value="6">D</option>
                                        <option <?php if (($dato['Parcial2_t1']) == '5') {
                                                    echo 'selected';
                                                } ?> value="5">E</option>
                                    </select>
                                </td>


                                <td class="text-center">
                                    <?php if($dato['Final_t1'] == 9){
                                       echo 'A';
                                    }elseif($dato['Final_t1'] == 8){
                                       echo 'B';
                                    }elseif($dato['Final_t1'] == 7){
                                        echo 'C';
                                    }elseif($dato['Final_t1'] == 6){
                                        echo 'D';
                                    }elseif($dato['Final_t1'] == 5){
                                        echo 'E';
                                    }elseif($dato['Final_t1'] == 0){
                                        echo '-';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial1t2]">
                                        <option <?php if (isset($dato['Parcial1_t2'])) {
                                                    echo 'selected';
                                                } ?> value="0" >-</option>
                                        <option <?php if (($dato['Parcial1_t2']) == '9') {
                                                    echo 'selected';
                                                } ?> value="9">A</option>
                                        <option <?php if (($dato['Parcial1_t2']) == '8') {
                                                    echo 'selected';
                                                } ?> value="8">B</option>
                                        <option <?php if (($dato['Parcial1_t2']) == '7') {
                                                    echo 'selected';
                                                } ?> value="7">C</option>
                                        <option <?php if (($dato['Parcial1_t2']) == '6') {
                                                    echo 'selected';
                                                } ?> value="6">D</option>
                                        <option <?php if (($dato['Parcial1_t2']) == '5') {
                                                    echo 'selected';
                                                } ?> value="5">E</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial2t2]">
                                        <option <?php if (isset($dato['Parcial2_t2'])) {
                                                    echo 'selected';
                                                } ?> value="0" >-</option>
                                        <option <?php if (($dato['Parcial2_t2']) == '9') {
                                                    echo 'selected';
                                                } ?> value="9">A</option>
                                        <option <?php if (($dato['Parcial2_t2']) == '8') {
                                                    echo 'selected';
                                                } ?> value="8">B</option>
                                        <option <?php if (($dato['Parcial2_t2']) == '7') {
                                                    echo 'selected';
                                                } ?> value="7">C</option>
                                        <option <?php if (($dato['Parcial2_t2']) == '6') {
                                                    echo 'selected';
                                                } ?> value="6">D</option>
                                        <option <?php if (($dato['Parcial2_t2']) == '5') {
                                                    echo 'selected';
                                                } ?> value="5">E</option>
                                    </select>
                                </td>


                                <td class="text-center">
                                <?php if($dato['Final_t2'] == 9){
                                       echo 'A';
                                    }elseif($dato['Final_t2'] == 8){
                                       echo 'B';
                                    }elseif($dato['Final_t2'] == 7){
                                        echo 'C';
                                    }elseif($dato['Final_t2'] == 6){
                                        echo 'D';
                                    }elseif($dato['Final_t2'] == 5){
                                        echo 'E';
                                    }elseif($dato['Final_t2'] == 0){
                                        echo '-';
                                    }
                                    ?>
                                </td>

                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial1t3]">
                                        <option <?php if (isset($dato['Parcial1_t3'])) {
                                                    echo 'selected';
                                                } ?> value="0" >-</option>
                                        <option <?php if (($dato['Parcial1_t3']) == '9') {
                                                    echo 'selected';
                                                } ?> value="9">A</option>
                                        <option <?php if (($dato['Parcial1_t3']) == '8') {
                                                    echo 'selected';
                                                } ?> value="8">B</option>
                                        <option <?php if (($dato['Parcial1_t3']) == '7') {
                                                    echo 'selected';
                                                } ?> value="7">C</option>
                                        <option <?php if (($dato['Parcial1_t3']) == '6') {
                                                    echo 'selected';
                                                } ?> value="6">D</option>
                                        <option <?php if (($dato['Parcial1_t3']) == '5') {
                                                    echo 'selected';
                                                } ?> value="5">E</option>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-select" aria-label="Default select example" name="alumnos[<?php echo $dato['id_alumno'] ?>][parcial2t3]">
                                        <option <?php if (isset($dato['Parcial2_t3'])) {
                                                    echo 'selected';
                                                } ?> value="0">-</option>
                                        <option <?php if (($dato['Parcial2_t3']) == '9') {
                                                    echo 'selected';
                                                } ?> value="9">A</option>
                                        <option <?php if (($dato['Parcial2_t3']) == '8') {
                                                    echo 'selected';
                                                } ?> value="8">B</option>
                                        <option <?php if (($dato['Parcial2_t3']) == '7') {
                                                    echo 'selected';
                                                } ?> value="7">C</option>
                                        <option <?php if (($dato['Parcial2_t3']) == '6') {
                                                    echo 'selected';
                                                } ?> value="6">D</option>
                                        <option <?php if (($dato['Parcial2_t3']) == '5') {
                                                    echo 'selected';
                                                } ?> value="5">E</option>
                                    </select>
                                </td>


                                <td class="text-center">
                                <?php if($dato['Final_t3'] == 9){
                                       echo 'A';
                                    }elseif($dato['Final_t3'] == 8){
                                       echo 'B';
                                    }elseif($dato['Final_t3'] == 7){
                                        echo 'C';
                                    }elseif($dato['Final_t3'] == 6){
                                        echo 'D';
                                    }elseif($dato['Final_t3'] == 5){
                                        echo 'E';
                                    }
                                    ?>
                                </td>

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