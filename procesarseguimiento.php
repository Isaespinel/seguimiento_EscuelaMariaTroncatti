<?php
if(!$_POST){
    header('location: seguimiento.view.php');
}
else {
    //incluimos el archivo funciones que tiene la conexion

    require 'functions.php';

    /* Gestion Funcional */
    $planeacion = htmlentities($_POST['planeacion']);
    $seguimiento = htmlentities($_POST['seguimiento']);
    $resul_plan = 2;
    $nivel_plan = 'Autonomo';
    $proyeccion_metas = htmlentities($_POST['proyeccion_metas']);
    $seguimiento_metas = htmlentities($_POST['seguimiento_metas']);
    $resul_meta = 2;
    $nivel_meta = 'Dirigido';
    $global_fun = 2;
    $auto_fun = 'Autonomo';

    /* Gestion Emocional */
    $reconoce_emociones = htmlentities($_POST['reconoce_emociones']);
    $resul_emoc1 = 1;
    $tolerancia = htmlentities($_POST['tolerancia']);
    $resul_emoc2 = 3;
    $nivel_emoc1 = 'Autonomo';
    $capacidad = htmlentities($_POST['capacidad']);
    $resul_emoc3 = 2;
    $soluciones = htmlentities($_POST['soluciones']);
    $resul_emoc4 = 1;
    $nivel_emoc2 = 'Dirigido';
    $global_emoc = 2;
    $auto_emoc = 'Asesorado';

    /* Gestion Academica */

    $autoevaluacion = htmlentities($_POST['autoevaluacion']);
    $resul_aca1 = 3;
    $diario = htmlentities($_POST['diario']);
    $resul_aca2 = 1;
    $nivel_aca = 'Dirigido';
    $global_aca = 3;
    $auto_aca = 'Autonomo';

    /* Gestion Conductual */


    $conocimiento_valores = htmlentities($_POST['conocimiento_valores']);
    $resul_cond1 = 2;
    $tomar_decision = htmlentities($_POST['tomar_decision']);
    $resul_cond2 = 3;
    $global_cond = 1;
    $auto_cond = 'Asesorado';

    /* Id Alumno */

    $id_alumno = htmlentities($_POST ['id_alumno']);


    //insertar es el nombre del boton guardar que esta en el archivo alumnos.view.php
    if (isset($_POST['insertar'])){

        $result = $conn->query("insert into seguimiento(fun_1, fun_2, resul_plan, nivel_plan, fun_3, fun_4, resul_meta, nivel_meta, global_fun, auto_fun, emoc_1, res_emoc_1, emoc_2, res_emoc_2, nivel_emoc_1, emoc_3, res_emoc_3, emoc_4, res_emoc_4, nivel_emoc_2, global_emoc, auto_emoc, aca_1, res_aca_1, aca_2, res_aca_2, nivel_aca, global_aca, auto_aca, cond_1, res_cond_1, cond_2, res_cond_2, global_cond, auto_cond, id_alumno) values ('$planeacion', '$seguimiento', '$resul_plan', '$nivel_plan', '$proyeccion_metas', '$seguimiento_metas', '$resul_meta', '$nivel_meta', '$global_fun', '$auto_fun', '$reconoce_emociones', '$resul_emoc1', '$tolerancia', '$resul_emoc2', '$nivel_emoc1', '$capacidad', '$resul_emoc3', '$soluciones', '$resul_emoc4', '$nivel_emoc2', '$global_emoc', '$auto_emoc', '$autoevaluacion', '$resul_aca1', '$diario', '$resul_aca2', '$nivel_aca', '$global_aca', '$auto_aca', '$conocimiento_valores', '$resul_cond1', '$tomar_decision', '$resul_cond2', '$global_cond', '$auto_cond', '$id_alumno')");
        echo($result);
        if (isset($result)) {
            echo($result);
            //header('location:seguimiento.view.php');
        } else {
            header('location:materiasregister.view.php?err=1');
        }// validación de registro

    //sino boton modificar que esta en el archivo alumnoedit.view.php
    }else if (isset($_POST['modificar'])) {
            $id_materia = htmlentities($_POST['id']);
            $result = $conn->query("update materias set nombre = '$nombre_mat', id_grado = '$curso_mat' where id = " . $id_materia);
            if (isset($result)) {
                header('location:materias.view.php');
            } else {
                header('location:materiasedit.view.php?id=' . $id_curso . '&err=1');
            }
    }

}

