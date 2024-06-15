<?php
if (!$_POST) {
    header('location: aulas.view.php');
} else {
    //incluimos el archivo para hacer la conexion
    require 'functions.php';
    //Recuperamos los valores que vamos a llenar en la BD


    $id_grado = htmlentities($_POST['id_grado']);



    if (isset($_POST['insertar'])) {
        foreach ($_POST['alumnos'] as $alumno_id => $alumno) {
            foreach ($alumno['materias'] as $materia_id => $materia) {
                
                // Trimestre 1
                $parcial1t1 = htmlentities($materia['parcial1t1'] ?? '0.0');
                $parcial2t1 = htmlentities($materia['parcial2t1'] ?? '0.0');
                $exament1 = htmlentities($materia['exament1'] ?? '0.0');
                $proyectot1 = htmlentities($materia['proyectot1'] ?? '0.0');
                
            
                //Suma 2 Parciales T1
                $sum_notas_t1 = (($parcial1t1+$parcial2t1)/2);
                $sum_total_parciales_t1=($sum_notas_t1*0.90);
                //Calculo Examen
                $cal_examen_t1 = ($exament1 * 0.05);
                //Calculo Proyecto
                $cal_proyecto_t1 = ($proyectot1 * 0.05);
                //Calificacion Final
                $finalt1 = $sum_total_parciales_t1+$cal_examen_t1+$cal_proyecto_t1;


                /* ------------------------------------ */

                // Trimestre 2
                $parcial1t2 = htmlentities($materia['parcial1t2'] ?? '0.0');
                $parcial2t2 = htmlentities($materia['parcial2t2'] ?? '0.0');
                $exament2 = htmlentities($materia['exament2'] ?? '0.0');
                $proyectot2 = htmlentities($materia['proyectot2'] ?? '0.0');
                
            
                //Suma 2 Parciales T2
                $sum_notas_t2 = (($parcial1t2+$parcial2t2)/2);
                $sum_total_parciales_t2=($sum_notas_t2*0.90);
                //Calculo Examen
                $cal_examen_t2 = ($exament2 * 0.05);
                //Calculo Proyecto
                $cal_proyecto_t2 = ($proyectot2 * 0.05);
                //Calificacion Final
                $finalt2 = $sum_total_parciales_t2+$cal_examen_t2+$cal_proyecto_t2;


                /* ------------------------------------ */

                // Trimestre 3
                $parcial1t3 = htmlentities($materia['parcial1t3'] ?? '0.0');
                $parcial2t3 = htmlentities($materia['parcial2t3'] ?? '0.0');
                $exament3 = htmlentities($materia['exament3'] ?? '0.0');
                $proyectot3 = htmlentities($materia['proyectot3'] ?? '0.0');
                
            
                //Suma 2 Parciales T3
                $sum_notas_t3 = (($parcial1t3+$parcial2t3)/2);
                $sum_total_parciales_t3=($sum_notas_t3*0.90);
                //Calculo Examen
                $cal_examen_t3 = ($exament3 * 0.05);
                //Calculo Proyecto
                $cal_proyecto_t3 = ($proyectot3 * 0.05);
                //Calificacion Final
                $finalt3 = $sum_total_parciales_t3+$cal_examen_t2+$cal_proyecto_t2;



                
                $prom_total = (($finalt1+$finalt2+$finalt3)/3);




                if (existeNota($alumno_id, $materia_id, $conn) == 0) {


                    $sql_insert = "INSERT INTO notas (parcial1_t1, parcial2_t1, examen_t1, proyecto_t1, final_t1, parcial1_t2, parcial2_t2, examen_t2, proyecto_t2, final_t2, parcial1_t3, parcial2_t3, examen_t3, proyecto_t3, final_t3, promedio_total, id_alumno, id_materia, id_curso) VALUES ('$parcial1t1', '$parcial2t1', '$exament1', '$proyectot1', '$finalt1', '$parcial1t2', '$parcial2t2', '$exament2', '$proyectot2', '$finalt2', '$parcial1t3', '$parcial2t3', '$exament3', '$proyectot3', '$finalt3', '$prom_total', '$alumno_id', '$materia_id', $id_grado)";


                    $result = $conn->query($sql_insert);
                } elseif (existeNota($alumno_id, $materia_id, $conn) > 0) {
                    $sql_update = "UPDATE notas SET parcial1_t1 = '$parcial1t1', parcial2_t1 = '$parcial2t1', examen_t1 = '$exament1', proyecto_t1 = '$proyectot1', final_t1 = '$finalt1', parcial1_t2 = '$parcial1t2', parcial2_t2 = '$parcial2t2', examen_t2 = '$exament2', proyecto_t2 = '$proyectot2', final_t2 = '$finalt2', parcial1_t3 = '$parcial1t3', parcial2_t3 = '$parcial2t3', examen_t3 = '$exament3', proyecto_t3 = '$proyectot3', final_t3 = '$finalt3', promedio_total = '$prom_total' WHERE id_alumno = '$alumno_id' AND id_materia = '$materia_id'";

                    // Ejecutar la consulta SQL de UPDATE
                    if ($conn->query($sql_update) === TRUE) {
                        echo "Los datos se han actualizado correctamente.";
                    } else {
                        echo "Error al actualizar los datos: " . $conn->error;
                    }
                }

                if (isset($result)) {
                    header('location:notas.view.php?grado=' . $id_grado . '&revisar=1');
                } else {
                    header('location:notas.view.php?grado=' . $id_grado . '&revisar=1');
                }
            }
        }
    }




}
