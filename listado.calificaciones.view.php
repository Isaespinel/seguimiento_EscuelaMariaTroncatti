<?php

if (isset($_GET['id'])) {
    $idAlumno = $_GET['id'];

    require 'conn/connection.php';


    $alumnosconsulta = $conn->prepare("select alumnos.nombres as NombresAlumno, alumnos.apellidos as ApellidoAlumno, grados.nombre as CursoAlumno from alumnos inner join grados on alumnos.id_grado = grados.id where alumnos.id = '" . $idAlumno . "'");
    $alumnosconsulta->execute();
    $alumno = $alumnosconsulta->fetch();




    $consulta = $conn->prepare("SELECT alumnos.Nombres, alumnos.Apellidos, notas.Promedio_total as prom_general, materias.nombre as nombre_materia FROM alumnos INNER JOIN materias INNER JOIN notas ON alumnos.id = notas.id_alumno AND materias.id = notas.id_materia WHERE notas.id_alumno = $idAlumno");
    $consulta->execute();
    $notas = $consulta->fetchAll(PDO::FETCH_ASSOC);



    $consultacomportamiento = $conn->prepare("SELECT comportamiento.prom_final as comportamiento_general FROM alumnos INNER JOIN comportamiento ON alumnos.id = comportamiento.id_alumno  WHERE comportamiento.id_alumno = $idAlumno ");
    $consultacomportamiento->execute();
    $comportamiento = $consultacomportamiento->fetch();



    $consultaseguimiento = $conn->prepare("SELECT seguimiento.final_autonomia as seguimiento_general FROM alumnos INNER JOIN seguimiento ON alumnos.id = seguimiento.id_alumno  WHERE seguimiento.id_alumno = $idAlumno ");
    $consultaseguimiento->execute();
    $seguimiento = $consultaseguimiento->fetch();
} else {
    echo "Parámetros faltantes en la URL.";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de notas</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./css/styles_login.css">
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .principal {
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100%;
            background-size: cover;
            font-family: 'Montserrat', sans-serif;
            background-image: url('./Img/gradient-bg.jpg');
        }


        .icon {
            width: 70px;
            height: 70px;
            border-radius: 50px;
            font-size: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
        }

        .main-content {
            width: 100%;
            overflow: auto;
        }

        .main-content .col-1 {
            float: left;
            width: 15%;
        }

        .main-content .col-2 {
            float: right;
            width: 85%;
        }

        .light-grey {
            background-color: #fff;
            width: 100%;
            height: 30px;
            border-radius: 20px;
        }

        .progress-bar {
            height: 30px;
            border-radius: 20px;
        }

        .nav-pills .nav-link.active {
            background-color: #d3005e;
            /* Color del fondo del tab activo */
            color: white;
        }

        .nav-pills .nav-link {
            background-color: #e6e6e6;
            /* Color del fondo de los tabs inactivos */
            color: black;
        }

        .texto-comp {
            font-size: x-large;
            color: white;
        }
    </style>
</head>

<body>


    <div class="principal">
        <div class="container pt-5 pb-3 text-center">
            <h3 class="font-xl"><?php echo ("Bienvenido/a " . $alumno['NombresAlumno'] . " " . $alumno['ApellidoAlumno'] . " - " . $alumno['CursoAlumno']); ?></h3>
        </div>
        <div class="container my-4">
            <!-- Nav Tabs -->
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item px-2" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Calificaciones</button>
                </li>
                <li class="nav-item px-2" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Comportamiento</button>
                </li>
                <li class="nav-item px-2" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Seguimiento</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <h3>Calificaciones</h3>
                    <div class="container mt-3">
                        <div class="row">
                            <?php foreach ($notas as $nota) : ?>
                                <div class="col-md-6 mt-5">
                                    <div class="main-content">
                                        <div class="col-1">
                                            <?php if ($nota['prom_general'] <= 4.99) { ?>
                                                <div class="icon">😿</div>
                                            <?php } elseif ($nota['prom_general'] >= 5.00 && $nota['prom_general'] <= 6.99) { ?>
                                                <div class="icon">😐</div>
                                            <?php } elseif ($nota['prom_general'] >= 7.00 && $nota['prom_general'] <= 8.99) { ?>
                                                <div class="icon">🧠</div>

                                            <?php } elseif ($nota['prom_general'] >= 9.00  && $nota['prom_general'] <= 10) { ?>
                                                <div class="icon">👑</div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-2">
                                            <h4><?php echo $nota['nombre_materia'] ?></h4>

                                            <div class="light-grey">
                                                <?php if ($nota['prom_general'] <= 4.99) { ?>
                                                    <div class="progress-bar" style="width:25%; background-color:red;"></div>
                                                <?php } elseif ($nota['prom_general'] >= 5.00 && $nota['prom_general'] <= 6.99) { ?>
                                                    <div class="progress-bar" style="width:38%; background-color:orange;"></div>
                                                <?php } elseif ($nota['prom_general'] >= 7.00 && $nota['prom_general'] <= 8.99) { ?>
                                                    <div class="progress-bar" style="width:60%; background-color:yellow;"></div>

                                                <?php } elseif ($nota['prom_general'] >= 9.00  && $nota['prom_general'] <= 10) { ?>
                                                    <div class="progress-bar" style="width:90%; background-color:green;"></div>
                                                <?php } ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <h3>Comportamiento</h3>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <?php if ($comportamiento['comportamiento_general'] == 5) {  ?>
                                    <img src="Img/sad-emoji.gif" width="300" alt="">
                                    <!-- <p class="texto-comp">Tranquilo, tu comportamiento aun puede ser mejor</p> -->
                                <?php } elseif ($comportamiento['comportamiento_general'] == 6) { ?>
                                    <img src="Img/bob-1.gif" width="300" alt="">
                                    <!-- <p class="texto-comp">Estas a un paso de que tu comportamiento </p> -->
                                <?php } elseif ($comportamiento['comportamiento_general'] == 7) { ?>
                                    <img src="Img/seven.gif" width="300" alt="">
                                <?php } elseif ($comportamiento['comportamiento_general'] == 8) { ?>
                                    <img src="Img/eight.gif" width="300" alt="">
                                <?php } elseif ($comportamiento['comportamiento_general'] == 9) { ?>
                                    <img src="Img/laugh-cute.gif" width="300" alt="">
                                <?php } elseif ($comportamiento['comportamiento_general'] == 10) { ?>
                                    <img src="Img/cheer.gif" width="300" alt="">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h3>Seguimiento</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <?php
                                if ($seguimiento === false) { ?>

                                    <img src="Img/stitch.gif" width="300" alt="">
                                    <p class="texto-comp">Aun no se ha registrado tu seguimiento 🥲</p>
                                    
                                    <?php
                                } else {
                                    if (isset($seguimiento['seguimiento_general'])) {
                                        if ($seguimiento['seguimiento_general'] == 'Asesorado') { ?>
                                            <img src="Img/sad-emoji.gif" width="300" alt="">
                                            <p class="texto-comp">Tu estado es Asesorado</p>
                                        <?php } elseif ($seguimiento['seguimiento_general'] == 'Autonomo') { ?>
                                            <img src="Img/bob-1.gif" width="300" alt="">
                                            <p class="texto-comp">Excelente, Tu estado es Autonomo</p>
                                        <?php } elseif ($seguimiento['seguimiento_general'] == 'Dirigido') { ?>
                                            <img src="Img/seven.gif" width="300" alt="">
                                            <p class="texto-comp">Tu estado es Dirigido</p>
                                        <?php } else { ?>
                                            <img src="Img/stitch.gif" width="300" alt="">
                                            <p class="texto-comp">Aun no se ha registrado tu seguimiento 🥲</p>
                                <?php }
                                    } else {
                                        // No existe la clave 'seguimiento_general' en el array
                                        echo "No se encontró la clave 'seguimiento_general'.";
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
    </div>
</body>

</html>