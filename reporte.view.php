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
    <title>Notas | Registro de Notas</title>
    <meta name="description" content="Registro de Notas Maria Troncatti" />
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
                                <h1 class="ml-2">Selecciona un curso para generar un reporte</h1>
                            </div>
                        </div>



                            <div class="container" >
                                <div class="row">

                                    <?php foreach ($grados as $grado) : ?>

                                        <div class="col-md-4 mt-4">
                                            <a href="reportenota.php?id=<?php echo $grado['id'] ?>" style="text-decoration: none; color:black;">
                                                <div class="card" style="display:grid; place-items:center;">
                                                  <img src="Img/notebook.png" alt="" srcset="">
                                                  <h3 class="mb-4"><?php echo $grado['nombre'];?></h3>
                                                </div>
                                            </a>
                                        </div>

                                    <?php endforeach; ?>

                                </div>
                            </div>




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