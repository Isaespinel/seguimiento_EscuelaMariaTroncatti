<?php
if (!$_POST) {
    header('location: comportamiento.view.php');
} else {
    //incluimos el archivo para hacer la conexion
    require 'functions.php';
    //Recuperamos los valores que vamos a llenar en la BD


    $id_grado = htmlentities($_POST['id_grado']);



    if (isset($_POST['insertar'])) {
        foreach ($_POST['alumnos'] as $alumno_id => $alumno) {
            

            $parcial1t1 = htmlentities($alumno['parcial1t1'] ?? '0');
            $parcial2t1 = htmlentities($alumno['parcial2t1'] ?? '0');
            $promfinalt1 = (($parcial1t1 + $parcial2t1)/2); 
            if($promfinalt1 > 8 && $promfinalt1 <= 9){
                $finalt1 = 9;
            }elseif($promfinalt1 > 7 && $promfinalt1 <= 8){
                $finalt1 = 8;
            }elseif($promfinalt1 > 6 && $promfinalt1 <= 7){
                $finalt1 = 7;
            }elseif($promfinalt1 > 5 && $promfinalt1 <= 6){
                $finalt1 = 6;
            }elseif($promfinalt1 <= 5){
                $finalt1 = 5;
            }else{
                $finalt1 = 0;
            }

            $parcial1t2 = htmlentities($alumno['parcial1t2'] ?? '0');
            $parcial2t2 = htmlentities($alumno['parcial2t2'] ?? '0');
            $promfinalt2 = (($parcial1t2 + $parcial2t2)/2); 
            if($promfinalt2 > 8 && $promfinalt2 <= 9){
                $finalt2 = 9;
            }elseif($promfinalt2 > 7 && $promfinalt2 <= 8){
                $finalt2 = 8;
            }elseif($promfinalt2 > 6 && $promfinalt2 <= 7){
                $finalt2 = 7;
            }elseif($promfinalt2 > 5 && $promfinalt2 <= 6){
                $finalt2 = 6;
            }elseif($promfinalt2 <= 5){
                $finalt2 = 5;
            }else{
                $finalt2 = 0;
            }

            $parcial1t3 = htmlentities($alumno['parcial1t3'] ?? '0');
            $parcial2t3 = htmlentities($alumno['parcial2t3'] ?? '0');
            $promfinalt3 = (($parcial1t3 + $parcial2t3)/2); 
            if($promfinalt3 > 8 && $promfinalt3 <= 9){
                $finalt3 = 9;
            }elseif($promfinalt3 > 7 && $promfinalt3 <= 8){
                $finalt3 = 8;
            }elseif($promfinalt3 > 6 && $promfinalt3 <= 7){
                $finalt3 = 7;
            }elseif($promfinalt3 > 5 && $promfinalt3 <= 6){
                $finalt3 = 6;
            }elseif($promfinalt3 <= 5){
                $finalt3 = 5;
            }else{
                $finalt3 = 0;
            }

            $finalcompt1 = floatval(htmlentities($alumno['finalt1'] ?? 0));
            $finalcompt2 = floatval(htmlentities($alumno['finalt2'] ?? 0));
            $finalcompt3 = floatval(htmlentities($alumno['finalt3'] ?? 0));
            
            $comportamientofinal = (($finalcompt1 + $finalcompt2 + $finalcompt3) / 3);

            if($comportamientofinal > 8 && $comportamientofinal <= 9){
                $prom_final = 9;
            }elseif($comportamientofinal > 7 && $comportamientofinal <= 8){
                $prom_final = 8;
            }elseif($comportamientofinal > 6 && $comportamientofinal <= 7){
                $prom_final = 7;
            }elseif($comportamientofinal > 5 && $comportamientofinal <= 6){
                $prom_final = 6;
            }elseif($comportamientofinal <= 5){
                $prom_final = 5;
            }else{
                $prom_final = 0;
            }
            

            if (existeComportamiento($alumno_id, $conn) == 0) {
                $sql_insert = "INSERT INTO comportamiento (parcial1_t1, parcial2_t1, final_t1, parcial1_t2, parcial2_t2, final_t2, parcial1_t3, parcial2_t3, final_t3, prom_final, id_alumno) VALUES ('$parcial1t1', '$parcial2t1', '$finalt1', '$parcial1t2', '$parcial2t2', '$finalt2', '$parcial1t3', '$parcial2t3', '$finalt3', '$prom_final', '$alumno_id')";
                $result = $conn->query($sql_insert);
            } elseif (existeComportamiento($alumno_id, $conn) > 0) {

                $sql_update = "UPDATE comportamiento SET parcial1_t1 = '$parcial1t1', parcial2_t1 = '$parcial2t1', final_t1 = '$finalt1', parcial1_t2 = '$parcial1t2', parcial2_t2 = '$parcial2t2', final_t2 = '$finalt2', parcial1_t3 = '$parcial1t3', parcial2_t3 = '$parcial2t3', final_t3 = '$finalt3', prom_final = '$prom_final' WHERE id_alumno = '$alumno_id'";
                // Ejecutar la consulta SQL de UPDATE
                if ($conn->query($sql_update) === TRUE) {
                    echo "Los datos se han actualizado correctamente.";
                } else {
                    echo "Error al actualizar los datos: " . $conn->error;
                }
            }

            if (isset($result)) {
                header('location:comportamiento.view.php?grado=' . $id_grado . '&revisar=1');
            } else {
                header('location:comportamiento.view.php?grado=' . $id_grado . '&revisar=1');
            }
        }
    }
}
