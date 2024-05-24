<!DOCTYPE html>
<?php
require 'functions.php';
//Define queienes tienen permiso en este archivo
$permisos = ['Administrador','Profesor'];
permisos($permisos);

//consulta de grados
$grados = $conn->prepare("select * from grados");
$grados->execute();
$grados = $grados->fetchAll();
?>
<html>
<head>
<title>Inicio | Registro de Cursos</title>
    <meta name="description" content="Registro de Notas del Centro Escolar" />
    <link rel="stylesheet" href="css/style.css" />
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <meta name="description" content="Registro de Notas del Centro Escolar" />

</head>
<body>
    <?php include("./Cabecera.php"); ?><br>
    


<div class="body">
    <div class="panel" style="border: none;">
            <h4>Registro de Cursos</h4>
            <form method="post" class="form" action="procesarcurso.php">
                <label>Nombre del Curso</label><br>
                <input type="text" required name="nombre_cur" maxlength="45">
                <br>
                
                <label>Período</label><br>
                <select name="periodo_cur" required>
                    
                    <option value="2023-2024">2023-2024</option>
                    <option value="2024-2025">2024-2025</option>
                    <option value="2025-2026">2025-2026</option>
                    <option value="2026-2027">2026-2027</option>
                    <option value="2027-2028">2027-2028</option>
                    <option value="2028-2029">2028-2029</option>
                    <option value="2029-2030">2029-2030</option>
                    <option value="2030-2031">2030-2031</option>
                    <option value="2031-2032">2031-2032</option>
                    <option value="2032-2033">2032-2033</option>
                    <option value="2033-2034">2033-2034</option>
                    <option value="2034-2035">2034-2035</option>
                   
                </select>
                

                <br><br>
                <div class="text-right">
                  <button class="btn btn-success" type="submit" name="insertar">Guardar</button> 
                </div>
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                <?php
                if(isset($_GET['err']))
                    echo '<span class="error">Error al almacenar el registro</span>';
                if(isset($_GET['info']))
                    echo '<span class="success">Registro almacenado correctamente!</span>';
                ?>

            </form>
        <?php
        if(isset($_GET['err']))
            echo '<span class="error">Error al guardar</span>';
        ?>
        </div>
</div>

</body>

</html>