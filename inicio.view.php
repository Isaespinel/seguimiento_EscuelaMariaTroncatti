<!DOCTYPE html>
<?php
require 'functions.php';
$permisos = ['Administrador', 'Profesor', 'Padre'];
permisos($permisos);

?>
<html>

<head>
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <style>
        body {
            background-color: #D9D9D9;
        }

        .container .row a{
            display: grid;
            place-items: center;
            height: 70vh;
            text-decoration: none;
            color: black;
        }

        .container .row a .card{
            height: 70%;
            width: 70%;
            display: grid;
            place-items: center;
            
        }
    </style>
</head>



<body>

    <div class="container">
        <div class="text-center mt-4">
            <img src="Img/main-logo.png" width="10%" alt="" srcset="">
        </div>
        <div class="row">
            <div class="col-md-6 cont">
                <a href="principal_calificaciones.php">
                <div class="card">
                    <img src="Img/pencil-main.png" width="40%" alt="" srcset="">
                    <h3>Registro de calificaciones</h3>
                </div>
                </a>
            </div>
            <div class="col-md-6 cont">
              <a href="panel_seguimiento.php">
                <div class="card">
                   <img src="Img/puzzle-main.png" width="40%" alt="" srcset="">
                    <h3>Registro de seguimiento</h3>
                </div>
              </a>
            </div>
        </div>
    </div>




</body>


</html>