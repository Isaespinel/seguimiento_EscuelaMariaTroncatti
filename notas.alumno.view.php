<?php
//arreglo con mensajes que puede recibir
$messages = [
  "1" => "Estudiante no encontrado",
];

if (isset($_GET['err']) && is_numeric($_GET['err']) && $_GET['err'] > 0 && $_GET['err'] < 3)
  echo '<span class="error">' . $messages[$_GET['err']] . '</span>';
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
      background-image: url('./Img/fondo-alumnos.png');
    }

    .form {
      display: grid;
      place-items: center;
      
    }

    .card {
      width: 30%;
      height: 30%;
      background: transparent;
      border: none;
    }

    .content{
        background-color: white;
        opacity: 90%;
    }
   

    .form input{
      text-align: left;
      width: 80%;
      background-color: #ffff;
      justify-content: center;
      margin: 5% 10%;

    }

    .form button{
      width: 80%;
    }
  </style>
</head>

<body>
  

  <div class="container-fluid principal">
    <div class="row">
      <div class="col-lg-12 form">
        <div class="card">
          <div class="content">
          <div class="text-center my-5">
            <img src="Img/main-logo.png" width="30%">
            <br>
            <h3 class="mt-4 mb-1">Consulta de calificaciones</h3>
            <br>
            <p class="mb-2" style="font-size: 15px;">Ingresa tu numero de cedula para acceder al panel</p>
            <form method="post" action="notas_alumno_post.php"> 
            <input type="text" class="form-control" name="cedula_ciu" placeholder="Numero de cedula" aria-label="Numero de cedula">
            <button type="submit" class="btn btn-warning">Ingresar</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>