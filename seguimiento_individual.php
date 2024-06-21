<?php include("Cabecera_seguimiento.php"); ?>


<?php include("Functions.php"); ?>


<?php


$id_alumno = $_GET['alumno'];





$consulta = $conn->prepare("SELECT alumnos.nombres, alumnos.id, seguimiento.id as idseguimiento, seguimiento.fun_1, seguimiento.fun_2, seguimiento.resul_plan, seguimiento.nivel_plan, seguimiento.fun_3, seguimiento.fun_4, seguimiento.resul_meta, seguimiento.nivel_meta, seguimiento.global_fun, seguimiento.auto_fun, seguimiento.emoc_1, seguimiento.res_emoc_1, seguimiento.emoc_2, seguimiento.res_emoc_2, seguimiento.nivel_emoc_1, seguimiento.emoc_3, seguimiento.res_emoc_3, seguimiento.emoc_4, seguimiento.res_emoc_4, seguimiento.nivel_emoc_2, seguimiento.global_emoc, seguimiento.auto_emoc, seguimiento.aca_1, seguimiento.res_aca_1, seguimiento.aca_2, seguimiento.res_aca_2, seguimiento.nivel_aca, seguimiento.global_aca, seguimiento.auto_aca, seguimiento.cond_1, seguimiento.res_cond_1, seguimiento.cond_2, seguimiento.res_cond_2, seguimiento.global_cond, seguimiento.auto_cond from alumnos left join seguimiento on alumnos.id = seguimiento.id_alumno where alumnos.id=$id_alumno");
$consulta->execute();
$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);





?>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->

    <div id="content" class="ml-5 mt-3">

        <form method="post" class="form" action="procesarseguimiento.php">
        <?php foreach ($datos as $dato) : ?>
           <div class="container p-0" style="margin-left: 15%;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                                <h1 class="ml-4">Seguimiento <?php print $dato['nombres']; ?></h1>
                                <input type="hidden" name="id_alumno" value="<?php print $dato['id']; ?>">
                                <input type="hidden" name="id_seguimiento" value="<?php print $dato['idseguimiento']; ?>">
                            
                        </div>
                    </div>
                </div>
            </div>

            <?php
                        if (isset($_GET['err']))
                            echo '<span class="error">Error al almacenar el registro</span>';
                        if (isset($_GET['info']))
                            echo '<span class="success">Registro almacenado correctamente!</span>';
                        ?>


            <div class="container my-5 p-4 bg-light-purple rounded" style="margin-left: 15%;">
                <h2 class="text-center mb-4 text-white fw-bold">Gestión funcional</h2>

                <div class="section mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4" style="display: grid; place-items:center;">
                                <h3 class="text-white">Planeación</h3>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark">Planeación del aprendizaje</label>
                                    <select id="planeacion" name="planeacion" class="form-control">
                                        <option <?php if (isset($dato['fun_1'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['fun_1']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['fun_1']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['fun_1']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Seguimiento, avance y evaluación</label>
                                    <select id="seguimiento" name="seguimiento" class="form-control">
                                    <option <?php if (isset($dato['fun_2'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['fun_2']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['fun_2']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['fun_2']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" style="display: grid; place-items:center;">
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-white">Resultado: </h3>
                                    <h4 class="text-dark"><?php if (($dato['resul_plan']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['resul_plan']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['resul_plan']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['resul_plan']) == '' || ($dato['resul_plan']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-center text-white">Nivel de Autonomía:</h3>
                                    <h4 class="text-dark"><?php if (($dato['nivel_plan']) == 'Asesorado') {
                                                    echo 'Asesorado';
                                                }elseif(($dato['nivel_plan']) == 'Dirigido'){
                                                    echo 'Dirigido';
                                                }elseif(($dato['nivel_plan']) == 'Autonomo'){
                                                    echo 'Autonomo';
                                                }elseif(($dato['nivel_plan']) == '' || ($dato['nivel_plan']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>

                            </div>
                           
                        </div>

                        <hr>


                        <div class="row">
                            <div class="col-md-4" style="display: grid; place-items:center;">
                                <h3 class="text-white">Metas</h3>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark">Proyección de metas</label>
                                    <select id="proyeccion_metas" name="proyeccion_metas" class="form-control">
                                    <option <?php if (isset($dato['fun_3'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['fun_3']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['fun_3']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['fun_3']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Seguimiento, avance y evaluación</label>
                                    <select id="seguimiento_metas" name="seguimiento_metas" class="form-control">
                                    <option <?php if (isset($dato['fun_4'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['fun_4']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['fun_4']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['fun_4']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" style="display: grid; place-items:center;">
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-white">Resultado:</h3>
                                    <h4 class="text-dark"><?php if (($dato['resul_meta']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['resul_meta']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['resul_meta']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['resul_meta']) == '' || ($dato['resul_meta']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-center text-white">Nivel de Autonomía:</h3>
                                    <h4 class="text-dark"><?php if (($dato['nivel_meta']) == 'Asesorado') {
                                                    echo 'Asesorado';
                                                }elseif(($dato['nivel_meta']) == 'Dirigido'){
                                                    echo 'Dirigido';
                                                }elseif(($dato['nivel_meta']) == 'Autonomo'){
                                                    echo 'Autonomo';
                                                }elseif(($dato['nivel_meta']) == '' || ($dato['nivel_meta']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>

                            </div>
                            
                        </div>



                    </div>



                </div>



                <div class="global-result d-flex justify-content-between align-items-center">
                    <div>
                        <h2 style="color: #86469C;">Resultado Global:</h2>

                        <h3 class="text-dark"><?php if (($dato['global_fun']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['global_fun']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['global_fun']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['global_fun']) == '' || ($dato['resul_meta']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h3>
                    </div>
                    <div>
                        <h2 style="color: #86469C;">Nivel de autonomía:</h2>
                        <h3 class="text-dark"><?php if (($dato['auto_fun']) == 'Asesorado') {
                                                    echo 'Asesorado';
                                                }elseif(($dato['auto_fun']) == 'Dirigido'){
                                                    echo 'Dirigido';
                                                }elseif(($dato['auto_fun']) == 'Autonomo'){
                                                    echo 'Autonomo';
                                                }elseif(($dato['auto_fun']) == '' || ($dato['auto_fun']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h3>
                    </div>
                </div>
            </div>


            <div class="container my-5 p-4 bg-light-lime rounded" style="margin-left: 15%;">
                <h2 class="text-center mb-4 text-white fw-bold">Gestión Emocional</h2>

                <div class="section mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <h3 class="text-white text-center">Conciencia Emocional</h3>

                                <h3 class="text-white">Gestión Emocional</h3>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-dark">Reconoce emociones propias y de los otros</label>
                                    <select id="reconoce_emociones" name="reconoce_emociones" class="form-control">
                                    <option <?php if (isset($dato['emoc_1'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['emoc_1']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['emoc_1']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['emoc_1']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label class="text-dark">Tolerancia al malestar</label>
                                    <select id="tolerancia" name="tolerancia" class="form-control">
                                    <option <?php if (isset($dato['emoc_2'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['emoc_2']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['emoc_2']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['emoc_2']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-white">Resultado: </h3>
                                    <h4 class="text-dark"><?php if (($dato['res_emoc_1']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['res_emoc_1']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['res_emoc_1']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['res_emoc_1']) == '' || ($dato['res_emoc_1']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-center text-white">Resultado:</h3>
                                    <h4 class="text-dark"><?php if (($dato['res_emoc_2']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['res_emoc_2']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['res_emoc_2']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['res_emoc_2']) == '' || ($dato['res_emoc_2']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>

                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white text-center">Nivel de Autonomia: </h3>
                                    <h4 class="text-center text-dark"><?php if (($dato['nivel_emoc_1']) == 'Asesorado') {
                                                    echo 'Asesorado';
                                                }elseif(($dato['nivel_emoc_1']) == 'Dirigido'){
                                                    echo 'Dirigido';
                                                }elseif(($dato['nivel_emoc_1']) == 'Autonomo'){
                                                    echo 'Autonomo';
                                                }elseif(($dato['nivel_emoc_1']) == '' || ($dato['nivel_emoc_1']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>
                            </div>
                        </div>

                        <hr>


                        <div class="row">
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <h3 class="text-white text-center">Relaciones Interpersonales</h3>

                                <h3 class="text-white text-center">Resolución de conflictos</h3>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-dark">Capacidad para relacionarse adecuadamente con otras personas</label>
                                    <select id="capacidad" name="capacidad" class="form-control">
                                        <option <?php if (isset($dato['emoc_3'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['emoc_3']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['emoc_3']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['emoc_3']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label class="text-dark">Busca soluciones utilizando recursos de su entorno</label>
                                    <select id="soluciones" name="soluciones" class="form-control">
                                    <option <?php if (isset($dato['emoc_4'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['emoc_4']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['emoc_4']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['emoc_4']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-white">Resultado: </h3>
                                    <h4 class="text-dark"><?php if (($dato['res_emoc_3']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['res_emoc_3']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['res_emoc_3']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['res_emoc_3']) == '' || ($dato['res_emoc_3']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-center text-white">Resultado:</h3>
                                    <h4 class="text-dark"><?php if (($dato['res_emoc_4']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['res_emoc_4']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['res_emoc_4']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['res_emoc_4']) == '' || ($dato['res_emoc_4']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>

                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white text-center">Nivel de Autonomia: </h3>
                                    <h4 class="text-center text-dark"><?php if (($dato['nivel_emoc_2']) == 'Asesorado') {
                                                    echo 'Asesorado';
                                                }elseif(($dato['nivel_emoc_2']) == 'Dirigido'){
                                                    echo 'Dirigido';
                                                }elseif(($dato['nivel_emoc_2']) == 'Autonomo'){
                                                    echo 'Autonomo';
                                                }elseif(($dato['nivel_emoc_2']) == '' || ($dato['nivel_emoc_2']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="global-result d-flex justify-content-between align-items-center">
                    
                    <div>
                        <h2 style="color: #86469C;">Resultado Global:</h2>

                        <h3 class="text-dark"><?php if (($dato['global_emoc']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['global_emoc']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['global_emoc']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['global_emoc']) == '' || ($dato['global_emoc']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h3>
                    </div>
                    <div>
                        <h2 style="color: #86469C;">Nivel de autonomía:</h2>
                        <h3 class="text-dark"><?php if (($dato['auto_emoc']) == 'Asesorado') {
                                                    echo 'Asesorado';
                                                }elseif(($dato['auto_emoc']) == 'Dirigido'){
                                                    echo 'Dirigido';
                                                }elseif(($dato['auto_emoc']) == 'Autonomo'){
                                                    echo 'Autonomo';
                                                }elseif(($dato['auto_emoc']) == '' || ($dato['auto_emoc']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h3>
                    </div>
                </div>
            </div>



            <div class="container my-5 p-4 bg-light-yellow rounded" style="margin-left: 15%;">
                <h2 class="text-center mb-4 text-white fw-bold">Gestión Académica</h2>

                <div class="section mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <h3 class="text-white">Aprender a aprender</h3>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label >Realizo una autoevaluación constante de mis fortalezas y necesidades en mi proceso académico para poder enfocarme más en los aspectos que necesito mejorar y potenciar las habilidades que tengo.</label>
                                    <select id="autoevaluacion" name="autoevaluacion" class="form-control">
                                    <option <?php if (isset($dato['aca_1'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['aca_1']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['aca_1']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['aca_1']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Diariamente en mi proceso académico pongo todo mi esfuerzo por realizar trabajos bien hechos y de alta calidad comprendiendo mis fortalezas y aspectos de mejora.</label>
                                    <select id="diario" name="diario" class="form-control">
                                    <option <?php if (isset($dato['aca_2'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['aca_2']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['aca_2']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['aca_2']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-white">Resultado: </h3>
                                    <h4 class="text-center text-dark"><?php if (($dato['res_aca_1']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['res_aca_1']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['res_aca_1']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['res_aca_1']) == '' || ($dato['res_aca_1']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-center text-white">Resultado:</h3>
                                    <h4 class="text-center text-dark"><?php if (($dato['res_aca_2']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['res_aca_2']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['res_aca_2']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['res_aca_2']) == '' || ($dato['res_aca_2']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>

                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white text-center">Nivel de Autonomia: </h3>
                                    <h4 class="text-center text-dark"><?php if (($dato['nivel_aca']) == 'Asesorado') {
                                                    echo 'Asesorado';
                                                }elseif(($dato['nivel_aca']) == 'Dirigido'){
                                                    echo 'Dirigido';
                                                }elseif(($dato['nivel_aca']) == 'Autonomo'){
                                                    echo 'Autonomo';
                                                }elseif(($dato['nivel_aca']) == '' || ($dato['nivel_aca']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="global-result d-flex justify-content-between align-items-center">
                    
                    <div>
                        <h2 class="text-white">Resultado Global:</h2>
                        <h3 class="text-dark"><?php if (($dato['global_aca']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['global_aca']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['global_aca']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['global_aca']) == '' || ($dato['global_aca']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h3>
                    </div>
                    <div>
                        <h2 class="text-white">Nivel de autonomía:</h2>
                        <h3 class="text-dark"><?php if (($dato['auto_aca']) == 'Asesorado') {
                                                    echo 'Asesorado';
                                                }elseif(($dato['auto_aca']) == 'Dirigido'){
                                                    echo 'Dirigido';
                                                }elseif(($dato['auto_aca']) == 'Autonomo'){
                                                    echo 'Autonomo';
                                                }elseif(($dato['auto_aca']) == '' || ($dato['auto_aca']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h3>
                    </div>
                </div>
            </div>


            <div class="container mt-5 mb-3 p-4 bg-light-blue rounded" style="margin-left: 15%;">
                <h2 class="text-center mb-4 text-white fw-bold">Gestión Conductual</h2>

                <div class="section mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4" style="display: grid; place-items:center;">
                                <h3 class="text-white">Responsabilidad</h3>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark">Conocimiento de los valores de convivencia, buen trato y respeto a sí mismo y a los demás </label>
                                    <select id="conocimiento_valores" name="conocimiento_valores" class="form-control">
                                      <option <?php if (isset($dato['cond_1'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['cond_1']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['cond_1']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['cond_1']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white text-center">Resultado: </h3>
                                    <h4 class="text-center text-dark"><?php if (($dato['res_cond_1']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['res_cond_1']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['res_cond_1']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['res_cond_1']) == '' || ($dato['res_cond_1']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-4" style="display: grid; place-items:center;">
                                <h3 class="text-white">Convivencia</h3>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark">Capacidad para tomar decisiones, asumiendo las consecuencias de sus actos, identificar límites y reparación</label>
                                    <select id="tomar_decision" name="tomar_decision" class="form-control">
                                    <option <?php if (isset($dato['cond_2'])) {
                                                    echo 'selected';
                                                } ?>  value="0">-</option>
                                        <option <?php if (($dato['cond_2']) == '1') {
                                                    echo 'selected';
                                                } ?>  value="1">1</option>
                                        <option <?php if (($dato['cond_2']) == '2') {
                                                    echo 'selected';
                                                } ?> value="2">2</option>
                                        <option <?php if (($dato['cond_2']) == '3') {
                                                    echo 'selected';
                                                } ?> value="3">3</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white text-center">Resultado: </h3>
                                    <h4 class="text-center text-dark"><?php if (($dato['res_cond_2']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['res_cond_2']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['res_cond_2']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['res_cond_2']) == '' || ($dato['res_cond_2']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h4>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="global-result d-flex justify-content-between align-items-center">
                    
                    <div>
                        <h2 class="text-white">Resultado Global:</h2>
                        <h3 class="text-dark"><?php if (($dato['global_cond']) == '1') {
                                                    echo '1';
                                                }elseif(($dato['global_cond']) == '2'){
                                                    echo '2';
                                                }elseif(($dato['global_cond']) == '3'){
                                                    echo '3';
                                                }elseif(($dato['global_cond']) == '' || ($dato['global_cond']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h3>
                    </div>
                    <div>
                        <h2 class="text-white">Nivel de autonomía:</h2>
                        <h3 class="text-dark"><?php if (($dato['auto_cond']) == 'Asesorado') {
                                                    echo 'Asesorado';
                                                }elseif(($dato['auto_cond']) == 'Dirigido'){
                                                    echo 'Dirigido';
                                                }elseif(($dato['auto_cond']) == 'Autonomo'){
                                                    echo 'Autonomo';
                                                }elseif(($dato['auto_cond']) == '' || ($dato['auto_cond']) == 0){
                                                    echo '-';
                                                }
                                                 ?></h3>
                    </div>
                </div>
            </div>


            <div class="container mb-3 p-0 text-right" style="margin-left: 15%;">
             <button type="submit" class="btn btn-success" style="width: 250px; height:50px;">Guardar</button>
            </div>

         <?php endforeach ?>
        </form>


    </div>







    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Instituto Superior Tecnologico Japón</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->


<?php include("Footer_seguimiento.php"); ?>