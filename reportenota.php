<?php
ob_start();

require 'functions.php';

$id_grado = $_GET['id'];

$permisos = ['Administrador', 'Profesor'];
permisos($permisos);

// Consulta de alumnos
$alumnos = $conn->prepare("SELECT alumnos.id, alumnos.nombres, alumnos.apellidos, grados.nombre as nombregrad, grados.periodo as periodo_cur FROM alumnos INNER JOIN grados ON alumnos.id_grado=grados.id WHERE alumnos.estado=1 AND alumnos.id_grado=:id_grado ORDER BY id DESC");
$alumnos->execute(['id_grado' => $id_grado]);
$alumnos = $alumnos->fetchAll();

// Consulta de materias
$materias = $conn->prepare("SELECT * FROM materias WHERE estado=1 AND id_grado = :id_grado");
$materias->execute(['id_grado' => $id_grado]);
$materias = $materias->fetchAll();

require_once('tcpdf/tcpdf.php');

// Creación del PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sistema de calificaciones');
$pdf->SetTitle('Reporte de calificaciones');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->setFontSubsetting(true);
$pdf->SetFont('helvetica', '', 8, '', true);
$pdf->SetPageOrientation('L');

if (!empty($alumnos) && !empty($materias)) {
    foreach ($alumnos as $alumno) {
        $pdf->AddPage();
        $pdf->setTextShadow(['enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => [196, 196, 196], 'opacity' => 1, 'blend_mode' => 'Normal']);
        $imageFile = './Img/main-logo.png';
        $pdf->Image($imageFile, 15, 8, 22, 22);

        $id_alum = $alumno['id'];
        $nombre_al = $alumno['nombres'];
        $apellido_al = $alumno['apellidos'];
        $curso_al = $alumno['nombregrad'];
        $periodo_curso = $alumno['periodo_cur'];

        // Consulta de comportamiento
        $comportamiento = $conn->prepare("SELECT * FROM comportamiento WHERE id_alumno = :id_alumno");
        $comportamiento->execute(['id_alumno' => $id_alum]);
        $comportamiento = $comportamiento->fetch();


        // Consulta de seguimiento
        $seguimiento = $conn->prepare("SELECT * FROM seguimiento WHERE id_alumno = :id_alumno");
        $seguimiento->execute(['id_alumno' => $id_alum]);
        $seguimiento = $seguimiento->fetch();

        
        $html = '<div style="text-align:center; background-color: rgb(112, 173, 70); color: white;">
            
            <h4>REPORTE ACADEMICO</h4>
            <h4>AÑO LECTIVO ' . $periodo_curso . '</h4>
            
            </div>

            
            <h3>Nombre: ' . $nombre_al . ' ' . $apellido_al . ' - ' . $curso_al . '</h3>
            <div class="table">
            <table border="0" cellpadding="5" cellspacing="0">
            <thead>
            <tr style="background-color: rgb(152, 255, 104);">
                <th border="1" style="text-align:center; height: 50px;">Asignatura</th>
                
                
                <th border="1" style="text-align:center;">Primer <br>Trimestre</th>

                <th border="1" style="text-align:center;">Nivel de logro</th>

                <th border="1" style="text-align:center;">Segundo <br>Trimestre</th>

                <th border="1" style="text-align:center;">Nivel de logro</th>

                <th border="1" style="text-align:center;">Tercer <br>Trimestre</th>

                <th border="1" style="text-align:center;">Nivel de logro</th>
                
                <th border="1" style="text-align:center;">Nota <br>Final</th>
            </tr>
            </thead>
            <tbody>';

        $total_final_q1 = 0;
        $total_final_q2 = 0;
        $promedio_final_total = 0;
        $numero_materias = count($materias);

        foreach ($materias as $materia) {
            $idmateria = $materia['id'];
            $nota = $conn->prepare("SELECT * FROM notas WHERE id_alumno = :id_alumno AND id_materia = :id_materia");
            $nota->execute(['id_alumno' => $id_alum, 'id_materia' => $idmateria]);
            $nota = $nota->fetch();

            if($nota['final_t1'] >= 7 ){
                $logradot1 = 'Superado';
            } elseif($nota['final_t1'] <= 7){
                $logradot1 = 'No superado';
            }


            if($nota['final_t2'] >= 7 ){
                $logradot2 = 'Superado';
            } elseif($nota['final_t2'] <= 7){
                $logradot2 = 'No superado';
            }

            if($nota['final_t3'] >= 7 ){
                $logradot3 = 'Superado';
            } elseif($nota['final_t3'] <= 7){
                $logradot3 = 'No superado';
            }
            
            $promedio_final_total += $nota['promedio_total'];

            $html .= '<tr>
                <th border="1"> ' . $materia['nombre'] . '</th>
                
                <th border="1" style="text-align:center;">' . $nota['final_t1'] . '</th>

                <th border="1" style="text-align:center;">' . $logradot1 . '</th>

                <th border="1" style="text-align:center;">' . $nota['final_t2'] . '</th>

                <th border="1" style="text-align:center;">' . $logradot2 . '</th>


                <th border="1" style="text-align:center;">' . $nota['final_t3'] . '</th>

                <th border="1" style="text-align:center;">' . $logradot3 . '</th>

                
                

               
                
                <th border="1" style="text-align:center;">' . $nota['promedio_total'] . '</th>
            </tr>';
        }

        

        $html .= '
           <tr>
            <th colspan="9" style="border:none;"></th>
            
            </tr>
            
            <tr style="background-color: rgb(152, 255, 104);">
            <th border="1">Comportamiento</th>
            <th border="1" style="text-align:center;">' . $comportamiento['final_t1'] . '</th>
            <th border="1" style="text-align:center;">C</th>
            <th border="1" style="text-align:center;">' . $comportamiento['final_t2'] . '</th>
            <th border="1" style="text-align:center;">A</th>
            <th border="1" style="text-align:center;">' . $comportamiento['final_t3'] . '</th>
            <th border="1" style="text-align:center;">A</th>
            <th border="1" style="text-align:center;">' . $comportamiento['prom_final'] . '</th>
            </tr>
            <tr>
            <th style="border: 0.5px dotted black;" colspan="2">Valoracion del comportamiento</th>
            <th style="border: 0.5px dotted black;" colspan="8"></th>
            </tr>
            <tr>
            <th style="border: 0.5px dotted black;" colspan="2">A: Muy Satisfactorio</th>
            <th style="border: 0.5px dotted black;" colspan="8"></th>
            </tr>
            <tr>
            <th style="border: 0.5px dotted black;" colspan="2">B: Satisfactorio</th>
            <th style="border: 0.5px dotted black;" colspan="8"></th>
            </tr>
            <tr>
            <th style="border: 0.5px dotted black;" colspan="2">C: Poco Satisfactorio</th>
            <th style="border: 0.5px dotted black;" colspan="8"></th>
            </tr>
            <tr>
            <th style="border: 0.5px dotted black;" colspan="2">D: Mejorable</th>
            <th style="border: 0.5px dotted black;" colspan="8"></th>
            </tr>
            <tr>
            <th style="border: 0.5px dotted black;" colspan="2">E: Insatisfactorio</th>
            <th style="border: 0.5px dotted black;" colspan="8"></th>
            </tr>
            <tr>
            <th colspan="9" style="border:none;"></th>
            
            </tr>
            <tr>
            <th border="1" colspan="2" style="border:none; background-color: rgb(152, 255, 104);">Acompañamiento Pedagógico</th>
            <th style="text-align:center; border: 0.5px dotted black;">' . $seguimiento['final_autonomia'] . '</th>
            </tr>';

        $html .= '</tbody>
            </table>
            
            
            <div>
            <h2>Observaciones .............................................................</h2>
            </div>
            <br><br>
            <div>
            <table>
                <tr>
                <th colspan="4" style="text-align:center;"><h3>Isabel Espinel <br>DIRECTORA ACADEMICA</h3></th>
                <th colspan="4" style="text-align:center;"><h3>Ma. Fernanda Hurtado Vicente <br>TUTOR</h3></th>
                </tr>
            </table>
            </div>
            </div><br>';

        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    }
} else {
    echo "No se encontraron los valores";
}

ob_end_clean();
$pdf->Output('Reporte-' . $curso_al . '.pdf', 'I');
?>
