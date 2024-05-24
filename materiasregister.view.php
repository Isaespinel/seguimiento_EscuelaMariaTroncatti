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
    <a href="materias.view.php"><ion-icon name="arrow-back-circle-outline" style="font-size: 35px;"></ion-icon></a>
            <h4>Registro de Materias</h4>
            <form method="post" class="form" action="procesarmateria.php">
                <label>Nombre de la Materia</label><br>
                <input type="text" required name="nombre_mat" maxlength="45">
                <br>
               
                
                <label>Seleccione el curso</label><br>
                <select name="curso_mat" required>

                    <?php foreach($grados as $grado): ?>    
                    <option value="<?php echo $grado['id'];?>"><?php print $grado['nombre'];?></option>
                    <?php endforeach; ?>
                </select>
                

                <br><br>
                <button class="btn btn-success" type="submit" name="insertar">Guardar</button> 
                <br><br>
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                <?php
                if(isset($_GET['err']))
                    echo '<span class="error">Error al almacenar el registro</span>';
                if(isset($_GET['info']))
                    header("Location: materias.view.php");
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