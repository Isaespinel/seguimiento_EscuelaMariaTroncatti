<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de calificaciones</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Ionicons -->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><img src="Img/main-logo.png" width="80%" alt="" srcset=""></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Inicio -->
            <li class="nav-item">
                <a class="nav-link" href="principal_calificaciones.php">
                    <i><ion-icon name="home" style="color: white; font-size: 18px;"></ion-icon></i>
                    <span style="font-size: 18px;">Inicio</span>
                </a>
            </li>
            <!-- Alumnos -->
            <li class="nav-item">
                <a class="nav-link" href="listadoalumnos.view.php">
                <i><ion-icon name="school" style="color: white; font-size: 18px;"></ion-icon></i>
                    <span style="font-size: 18px;">Alumnos</span>
                </a>
            </li>


            <!-- Cursos -->
            <li class="nav-item">
                <a class="nav-link" href="cursos.view.php
                ">
                <i><ion-icon name="easel" style="color: white; font-size: 18px;"></ion-icon></i>
                    <span style="font-size: 18px;">Cursos</span>
                </a>
            </li>


            <!-- Materias -->
            <li class="nav-item">
                <a class="nav-link" href="materias.view.php
                ">
                <i><ion-icon name="library" style="color: white; font-size: 18px;"></ion-icon></i>
                    <span style="font-size: 18px;">Materias</span>
                </a>
            </li>

            <!-- Calificaciones -->
            <li class="nav-item">
                <a class="nav-link" href="notas.view.php">
                <i><ion-icon name="pencil" style="color: white; font-size: 18px;"></ion-icon></i>
                    <span style="font-size: 18px;">Calificaciones</span>
                </a>
            </li>

            <!-- Comportamiento -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i><ion-icon name="checkmark-done" style="color: white; font-size: 18px;"></ion-icon></i>
                    <span style="font-size: 18px;">Comportamiento</span>
                </a>
            </li>

             <!-- Perfil -->
             <li class="nav-item">
                <a class="nav-link" href="#">
                <i><ion-icon name="person-circle" style="color: white; font-size: 18px;"></ion-icon></i>
                    <span style="font-size: 18px;">Perfil</span>
                </a>
            </li>











            <!-- Cerrar Sesion -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                <i><ion-icon name="exit" style="color: white; font-size: 18px;"></ion-icon></i>
                    <span style="font-size: 18px;">Cerrar Sesion</span>
                </a>
            </li>
            
        </ul>