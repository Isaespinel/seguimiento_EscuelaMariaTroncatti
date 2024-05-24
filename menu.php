<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú Lateral</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/styles_menu.css">
</head>
<body>
  <div class="navbar-nav bg-light sidebar">

    <div class="text-center">
    <img src="Img/main-logo.png" width="50%" alt="" srcset="">
    <br>
    <hr>

    </div>
    <div class="position-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="inicio.view.php">
            <i class="fa-solid fa-house"></i> Inicio
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alumnos.view.php">
            <i class="fa-solid fa-user-graduate"></i> Estudiantes
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="cursos.view.php">
            <i class="fa-solid fa-chalkboard-user"></i>Cursos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="materias.view.php">
            <i class="fa-solid fa-pen-ruler"></i> Materias
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notas.view.php">
            <i class="fa-solid fa-pencil"></i> Calificaciones
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="comportamiento.view.php">
            <i class="fa-solid fa-user-check"></i> Comportamiento
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="asistencia.view.php">
            <i class="fa-solid fa-circle-user"></i> Perfil
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="listadonotas.view.php">
            <i class="fa-solid fa-file-text"></i> Consulta de Notas
          </a>
        </li> -->
        
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fa-solid fa-sign-out"></i> Salir
          </a>
        </li> 
      </ul>
    </div>
  </div>
</body>
</html>