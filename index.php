<?php
//arreglo con mensajes que puede recibir
$messages = [
  "1" => "Credenciales incorrectas",
  "2" => "No ha iniciado sesión"
];

if (isset($_GET['err']) && is_numeric($_GET['err']) && $_GET['err'] > 0 && $_GET['err'] < 3)
  echo '<span class="error">' . $messages[$_GET['err']] . '</span>';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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
      background-image: url('./Img/fondo-principal.jpg');
    }

    .form {
      background-color: #D9D9D9;
      height: 100vh;
      display: grid;
      place-items: center;
    }

    .form .card {
      width: 70%;
      height: 70%;
      
    }
   

    .form input{
      text-align: center;
      width: 80%;
      align-items: center;
      justify-content: center;
      margin: 5% 10%;
    }

    .form button{
      width: 80%;
    }
  </style>
</head>

<body>
  <!--  <div id="login-bg">
    <div class="login">
      <h1>Inicio de Sesión</h1>
      <form method="post" action="login_post.php">
        <div class="form-group">
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre de Usuario" name="username">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="password">
        </div>
        <button type="submit" class="btn">Ingresar</button>
      </form>
    </div>
  </div> -->


  <div class="container-fluid principal">
    <div class="row">
      <div class="col-lg-6 form">

        <div class="card">
          <div class="text-center content">
            <img src="Img/main-logo.png" width="40%">
            <br>
            <h1>Iniciar Sesion</h1>
            <br>
            <p>Ingresa tu informacion para acceder al panel</p>

            <form method="post" action="login_post.php">
           
            <input type="text" class="form-control" name="username" placeholder="Correo Electronico" aria-label="Correo Electronico" >
            <input type="password" class="form-control" name="password" placeholder="Contraseña" aria-label="Contraseña" >

            <p>Olvidaste tu contraseña? <a href="#">Click Aqui</a></p>
           
    

          
            
            <button type="submit" class="btn btn-warning">Ingresar</button>

            </form>



            
           
          </div>



        </div>

      </div>
      <div class="col-lg-6 image">


      </div>
    </div>
  </div>
</body>

</html>