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
                // Obtener los valores de los campos
                $parcial1q1 = htmlentities($materia['parcial1q1'] ?? '0.0');
                $parcial2q1 = htmlentities($materia['parcial2q1'] ?? '0.0');
                $examenq1 = htmlentities($materia['examenq1'] ?? '0.0');
                $sum_examq1 = ($examenq1*0.20);
                $sum_parcialq1 = (($parcial1q1+$parcial2q1)/2);
                $sum_total_parcialq1=($sum_parcialq1*0.80);
                $finalq1 = $sum_examq1+$sum_total_parcialq1;

                $parcial1q2 = htmlentities($materia['parcial1q2'] ?? '0.0');
                $parcial2q2 = htmlentities($materia['parcial2q2'] ?? '0.0');
                $examenq2 = htmlentities($materia['examenq2'] ?? '0.0');
                $sum_examq2 = ($examenq2*0.20);
                $sum_parcialq2 = (($parcial1q2+$parcial2q2)/2);
                $sum_total_parcialq2=($sum_parcialq2*0.80);
                $finalq2 = $sum_examq2+$sum_total_parcialq2;


                $prom_total = (($finalq1+$finalq2)/2);

                // Aquí puedes calcular el promedio total y otras operaciones necesarias




                if (existeNota($alumno_id, $materia_id, $conn) == 0) {


                    $sql_insert = "INSERT INTO notas (parcial1_q1, parcial2_q1, examen_q1, final_q1, parcial1_q2, parcial2_q2, examen_q2, final_q2, promedio_total, observaciones, id_alumno, id_materia, id_curso) VALUES ('$parcial1q1', '$parcial2q1', '$examenq1', '$finalq1', '$parcial1q2', '$parcial2q2', '$examenq2', '$finalq2', '$prom_total', 'Ninguna', '$alumno_id', '$materia_id', $id_grado)";


                    $result = $conn->query($sql_insert);
                } elseif (existeNota($alumno_id, $materia_id, $conn) > 0) {
                    $sql_update = "UPDATE notas SET parcial1_q1 = '$parcial1q1', parcial2_q1 = '$parcial2q1', examen_q1 = '$examenq1', final_q1 = '$finalq1', parcial1_q2 = '$parcial1q2', parcial2_q2 = '$parcial2q2', examen_q2 = '$examenq2', final_q2 = '$finalq2', promedio_total = '$prom_total' WHERE id_alumno = '$alumno_id' AND id_materia = '$materia_id'";

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
