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
            // Obtener los valores de los campos
            $parcial1t1 = htmlentities($alumno['parcial1t1'] ?? '-');
            $parcial2t1 = htmlentities($alumno['parcial2t1'] ?? '-');

            //A
            if ($alumno['parcial1t1'] == 'A' && $alumno['parcial2t1'] == 'A') {
                $finalt1 ='A';
            } elseif ($alumno['parcial1t1'] == 'A' && $alumno['parcial2t1'] == 'B') {
                $finalt1 ='B';
            } elseif ($alumno['parcial1t1'] == 'A' && $alumno['parcial2t1'] == 'B') {
                $finalt1 ='B';
            } elseif ($alumno['parcial1t1'] == 'B' && $alumno['parcial2t1'] == 'A') {
                $finalt1 ='B';
            } elseif ($alumno['parcial1t1'] == 'A' && $alumno['parcial2t1'] == 'C') {
                $finalt1 ='B';
            } elseif ($alumno['parcial1t1'] == 'C' && $alumno['parcial2t1'] == 'A') {
                $finalt1 ='B';
            } elseif ($alumno['parcial1t1'] == 'A' && $alumno['parcial2t1'] == 'D') {
                $finalt1 ='C';
            } elseif ($alumno['parcial1t1'] == 'D' && $alumno['parcial2t1'] == 'A') {
                $finalt1 ='C';
            } elseif ($alumno['parcial1t1'] == 'A' && $alumno['parcial2t1'] == 'E') {
                $finalt1 ='D';
            } elseif ($alumno['parcial1t1'] == 'E' && $alumno['parcial2t1'] == 'A') {
                $finalt1 ='D';
            }
            //B
            elseif ($alumno['parcial1t1'] == 'B' && $alumno['parcial2t1'] == 'B') {
                $finalt1 ='B';
            } elseif ($alumno['parcial1t1'] == 'B' && $alumno['parcial2t1'] == 'C') {
                $finalt1 ='C';
            } elseif ($alumno['parcial1t1'] == 'C' && $alumno['parcial2t1'] == 'B') {
                $finalt1 ='C';
            } elseif ($alumno['parcial1t1'] == 'B' && $alumno['parcial2t1'] == 'D') {
                $finalt1 ='C';
            } elseif ($alumno['parcial1t1'] == 'D' && $alumno['parcial2t1'] == 'B') {
                $finalt1 ='C';
            } elseif ($alumno['parcial1t1'] == 'B' && $alumno['parcial2t1'] == 'E') {
                $finalt1 ='D';
            } elseif ($alumno['parcial1t1'] == 'E' && $alumno['parcial2t1'] == 'B') {
                $finalt1 ='D';
            }
            //C
            elseif ($alumno['parcial1t1'] == 'C' && $alumno['parcial2t1'] == 'C') {
                $finalt1 ='C';
            } elseif ($alumno['parcial1t1'] == 'D' && $alumno['parcial2t1'] == 'C') {
                $finalt1 ='D';
            } elseif ($alumno['parcial1t1'] == 'C' && $alumno['parcial2t1'] == 'D') {
                $finalt1 ='D';
            } elseif ($alumno['parcial1t1'] == 'C' && $alumno['parcial2t1'] == 'E') {
                $finalt1 ='D';
            } elseif ($alumno['parcial1t1'] == 'E' && $alumno['parcial2t1'] == 'C') {
                $finalt1 ='D';
            }
            //D
            elseif ($alumno['parcial1t1'] == 'D' && $alumno['parcial2t1'] == 'D') {
                $finalt1 ='D';
            } elseif ($alumno['parcial1t1'] == 'D' && $alumno['parcial2t1'] == 'E') {
                $finalt1 ='E';
            } elseif ($alumno['parcial1t1'] == 'E' && $alumno['parcial2t1'] == 'D') {
                $finalt1 ='E';
            }
            //E
            elseif ($alumno['parcial1t1'] == 'E' && $alumno['parcial2t1'] == 'E') {
                $finalt1 ='E';
            }
            

            $parcial1t2 = htmlentities($alumno['parcial1t2'] ?? '-');
            $parcial2t2 = htmlentities($alumno['parcial2t2'] ?? '-');

             //A
            if ($alumno['parcial1t2'] == 'A' && $alumno['parcial2t2'] == 'A') {
                $finalt2 ='A';
            } elseif ($alumno['parcial1t2'] == 'A' && $alumno['parcial2t2'] == 'B') {
                $finalt2 ='B';
            } elseif ($alumno['parcial1t2'] == 'A' && $alumno['parcial2t2'] == 'B') {
                $finalt2 ='B';
            } elseif ($alumno['parcial1t2'] == 'B' && $alumno['parcial2t2'] == 'A') {
                $finalt2 ='B';
            } elseif ($alumno['parcial1t2'] == 'A' && $alumno['parcial2t2'] == 'C') {
                $finalt2 ='B';
            } elseif ($alumno['parcial1t2'] == 'C' && $alumno['parcial2t2'] == 'A') {
                $finalt2 ='B';
            } elseif ($alumno['parcial1t2'] == 'A' && $alumno['parcial2t2'] == 'D') {
                $finalt2 ='C';
            } elseif ($alumno['parcial1t2'] == 'D' && $alumno['parcial2t2'] == 'A') {
                $finalt2 ='C';
            } elseif ($alumno['parcial1t2'] == 'A' && $alumno['parcial2t2'] == 'E') {
                $finalt2 ='D';
            } elseif ($alumno['parcial1t2'] == 'E' && $alumno['parcial2t2'] == 'A') {
                $finalt2 ='D';
            }

            //B

            elseif ($alumno['parcial1t2'] == 'B' && $alumno['parcial2t2'] == 'B') {
                $finalt2 ='B';
            } elseif ($alumno['parcial1t2'] == 'B' && $alumno['parcial2t2'] == 'C') {
                $finalt2 ='C';
            } elseif ($alumno['parcial1t2'] == 'C' && $alumno['parcial2t2'] == 'B') {
                $finalt2 ='C';
            } elseif ($alumno['parcial1t2'] == 'B' && $alumno['parcial2t2'] == 'D') {
                $finalt2 ='C';
            } elseif ($alumno['parcial1t2'] == 'D' && $alumno['parcial2t2'] == 'B') {
                $finalt2 ='C';
            } elseif ($alumno['parcial1t2'] == 'B' && $alumno['parcial2t2'] == 'E') {
                $finalt2 ='D';
            } elseif ($alumno['parcial1t2'] == 'E' && $alumno['parcial2t2'] == 'B') {
                $finalt2 ='D';
            }
            
            //C
            elseif ($alumno['parcial1t2'] == 'C' && $alumno['parcial2t2'] == 'C') {
                $finalt2 ='C';
            } elseif ($alumno['parcial1t2'] == 'D' && $alumno['parcial2t2'] == 'C') {
                $finalt2 ='D';
            } elseif ($alumno['parcial1t2'] == 'C' && $alumno['parcial2t2'] == 'D') {
                $finalt2 ='D';
            } elseif ($alumno['parcial1t2'] == 'C' && $alumno['parcial2t2'] == 'E') {
                $finalt2 ='D';
            } elseif ($alumno['parcial1t2'] == 'E' && $alumno['parcial2t2'] == 'C') {
                $finalt2 ='D';
            }
            //D
            elseif ($alumno['parcial1t2'] == 'D' && $alumno['parcial2t2'] == 'D') {
                $finalt2 ='D';
            } elseif ($alumno['parcial1t2'] == 'D' && $alumno['parcial2t2'] == 'E') {
                $finalt2 ='E';
            } elseif ($alumno['parcial1t2'] == 'E' && $alumno['parcial2t2'] == 'D') {
                $finalt2 ='E';
            }
            //E
            elseif ($alumno['parcial1t2'] == 'E' && $alumno['parcial2t2'] == 'E') {
                $finalt2 ='E';
            }







            /* Trimestre 3 */


            $parcial1t3 = htmlentities($alumno['parcial1t3'] ?? '-');
            $parcial2t3 = htmlentities($alumno['parcial2t3'] ?? '-');

             //A
            if ($alumno['parcial1t3'] == 'A' && $alumno['parcial2t3'] == 'A') {
                $finalt3 ='A';
            } elseif ($alumno['parcial1t3'] == 'A' && $alumno['parcial2t3'] == 'B') {
                $finalt3 ='B';
            } elseif ($alumno['parcial1t3'] == 'A' && $alumno['parcial2t3'] == 'B') {
                $finalt3 ='B';
            } elseif ($alumno['parcial1t3'] == 'B' && $alumno['parcial2t3'] == 'A') {
                $finalt3 ='B';
            } elseif ($alumno['parcial1t3'] == 'A' && $alumno['parcial2t3'] == 'C') {
                $finalt3 ='B';
            } elseif ($alumno['parcial1t3'] == 'C' && $alumno['parcial2t3'] == 'A') {
                $finalt3 ='B';
            } elseif ($alumno['parcial1t3'] == 'A' && $alumno['parcial2t3'] == 'D') {
                $finalt3 ='C';
            } elseif ($alumno['parcial1t3'] == 'D' && $alumno['parcial2t3'] == 'A') {
                $finalt3 ='C';
            } elseif ($alumno['parcial1t3'] == 'A' && $alumno['parcial2t3'] == 'E') {
                $finalt3 ='D';
            } elseif ($alumno['parcial1t3'] == 'E' && $alumno['parcial2t3'] == 'A') {
                $finalt3 ='D';
            }
            //B
            elseif ($alumno['parcial1t3'] == 'B' && $alumno['parcial2t3'] == 'B') {
                $finalt3 ='B';
            } elseif ($alumno['parcial1t3'] == 'B' && $alumno['parcial2t3'] == 'C') {
                $finalt3 ='C';
            } elseif ($alumno['parcial1t3'] == 'C' && $alumno['parcial2t3'] == 'B') {
                $finalt3 ='C';
            } elseif ($alumno['parcial1t3'] == 'B' && $alumno['parcial2t3'] == 'D') {
                $finalt3 ='C';
            } elseif ($alumno['parcial1t3'] == 'D' && $alumno['parcial2t3'] == 'B') {
                $finalt3 ='C';
            } elseif ($alumno['parcial1t3'] == 'B' && $alumno['parcial2t3'] == 'E') {
                $finalt3 ='D';
            } elseif ($alumno['parcial1t3'] == 'E' && $alumno['parcial2t3'] == 'B') {
                $finalt3 ='D';
            }
            //C
            elseif ($alumno['parcial1t3'] == 'C' && $alumno['parcial2t3'] == 'C') {
                $finalt3 ='C';
            } elseif ($alumno['parcial1t3'] == 'D' && $alumno['parcial2t3'] == 'C') {
                $finalt3 ='D';
            } elseif ($alumno['parcial1t3'] == 'C' && $alumno['parcial2t3'] == 'D') {
                $finalt3 ='D';
            } elseif ($alumno['parcial1t3'] == 'C' && $alumno['parcial2t3'] == 'E') {
                $finalt3 ='D';
            } elseif ($alumno['parcial1t3'] == 'E' && $alumno['parcial2t3'] == 'C') {
                $finalt3 ='D';
            }
            //D
            elseif ($alumno['parcial1t3'] == 'D' && $alumno['parcial2t3'] == 'D') {
                $finalt3 ='D';
            } elseif ($alumno['parcial1t3'] == 'D' && $alumno['parcial2t3'] == 'E') {
                $finalt3 ='E';
            } elseif ($alumno['parcial1t3'] == 'E' && $alumno['parcial2t3'] == 'D') {
                $finalt3 ='E';
            }
            //E
            elseif ($alumno['parcial1t3'] == 'E' && $alumno['parcial2t3'] == 'E') {
                $finalt3 ='E';
            }






            /* Promedio Final */


            //A
            if ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'A') {
                $prom_final ='A';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'B') {
                $prom_final ='A';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'C') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'D') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'E') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'A') {
                $prom_final ='A';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'B') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'C') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'D') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'E') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'A') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'B') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'C') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'D') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'E') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'A') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'C') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'E') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'A') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'A') {
                $prom_final ='A';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'B') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'C') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'D') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'E') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'A') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'B') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'C') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'D') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'E') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'A') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'C') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'E') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'A') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'A') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'A') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'B') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'C') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'D') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'E') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'A') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'C') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'E') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'A') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'C') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'E') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'A') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'A') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'B') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'D') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'A') {
                $prom_final ='B';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'C') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'E') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'A') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'A') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'B') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'D') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'A') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'B') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'A') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'B') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'C') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'D') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'A') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'A' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'A') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'B') {
                $prom_final ='C';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'D') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'B' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'A') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'B') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'C') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'D') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'C' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'A') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'B') {
                $prom_final ='D';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'C') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'D') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'D' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'A') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'B') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'C') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'D') {
                $prom_final ='E';
            } elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == 'E' && $alumno['finalt3'] == 'E') {
                $prom_final ='E';
            }

            
            
            //Vacios

            elseif ($alumno['finalt1'] == '0' && $alumno['finalt2'] == '0') {
                $prom_final ='-';
            }elseif ($alumno['finalt1'] == '0' && $alumno['finalt2'] == 'A') {
                $prom_final ='-';
            }elseif ($alumno['finalt1'] == 'A' && $alumno['finalt2'] == '0') {
                $prom_final ='-';
            }elseif ($alumno['finalt1'] == '0' && $alumno['finalt2'] == 'B') {
                $prom_final ='-';
            }elseif ($alumno['finalt1'] == 'B' && $alumno['finalt2'] == '0') {
                $prom_final ='-';
            }elseif ($alumno['finalt1'] == '0' && $alumno['finalt2'] == 'C') {
                $prom_final ='-';
            }elseif ($alumno['finalt1'] == 'C' && $alumno['finalt2'] == '0') {
                $prom_final ='-';
            }elseif ($alumno['finalt1'] == '0' && $alumno['finalt2'] == 'D') {
                $prom_final ='-';
            }elseif ($alumno['finalt1'] == 'D' && $alumno['finalt2'] == '0') {
                $prom_final ='-';
            }elseif ($alumno['finalt1'] == '0' && $alumno['finalt2'] == 'E') {
                $prom_final ='-';
            }elseif ($alumno['finalt1'] == 'E' && $alumno['finalt2'] == '0') {
                $prom_final ='-';
            }

            



            if (existeComportamiento($alumno_id, $conn) == 0) {
                $sql_insert = "INSERT INTO comportamiento (parcial1_t1, parcial2_t1, final_t1, parcial1_t2, parcial2_t2, final_t2, parcial1_t3, parcial2_t3, final_t3, prom_final, id_alumno) VALUES ('$parcial1t1', '$parcial2t1', '$finalt1', '$parcial1t2', '$parcial2t2', '$finalt2', '$parcial1t3', '$parcial2t3', '$finalt3', '$prom_final', '$alumno_id')";
                $result = $conn->query($sql_insert);
            } elseif (existeComportamiento($alumno_id, $conn) > 0) {

                $sql_update = "UPDATE comportamiento SET parcial1_q1 = '$parcial1t1', parcial2_q1 = '$parcial2t1', final_q1 = '$finalt1', parcial1_q2 = '$parcial1t2', parcial2_q2 = '$parcial2t2', final_q2 = '$finalt2', prom_final = '$prom_final' WHERE id_alumno = '$alumno_id'";
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
