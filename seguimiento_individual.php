<?php include("Cabecera_seguimiento.php"); ?>


<?php include("Functions.php"); ?>

<?php


$id_alumno = $_GET['alumno'];





$consulta = $conn->prepare("SELECT * from alumnos where id=$id_alumno");
$consulta->execute();
$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);





?>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->



    <div id="content" class="ml-5 mt-3">

        <form method="post" class="form" action="procesarseguimiento.php">
            <div class="container p-0" style="margin-left: 15%;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php foreach ($datos as $dato) : ?>
                                <h1 class="ml-4">Seguimiento <?php print $dato['nombres']; ?></h1>
                                <input type="hidden" name="id_alumno" value="<?php print $dato['id']; ?>">
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container my-5 p-4 bg-light-purple rounded" style="margin-left: 15%;">
                <h2 class="text-center mb-4 text-white fw-bold">Gestión funcional</h2>

                <div class="section mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <h3 class="text-white">Planeación</h3>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-dark">Planeación del aprendizaje</label>
                                    <select id="planeacion" name="planeacion" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Seguimiento, avance y evaluación</label>
                                    <select id="seguimiento" name="seguimiento" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-white">Resultado: </h3>
                                    <h4 class="text-dark">3</h4>
                                </div>
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-center text-white">Nivel de Autonomía:</h3>
                                    <h4 class="text-dark">Asesorado</h4>
                                </div>

                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white">Categoria: </h3>
                                    <h4 class="text-center text-dark">3</h4>
                                </div>
                            </div>
                        </div>

                        <hr>


                        <div class="row">
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <h3 class="text-white">Metas</h3>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-dark">Proyección de metas</label>
                                    <select id="proyeccion_metas" name="proyeccion_metas" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Seguimiento, avance y evaluación</label>
                                    <select id="seguimiento_metas" name="seguimiento_metas" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-white">Resultado:</h3>
                                    <h4 class="text-dark">2</h4>
                                </div>
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-center text-white">Nivel de Autonomía:</h3>
                                    <h4 class="text-dark">Asesorado</h4>
                                </div>

                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white">Categoria: </h3>
                                    <h4 class="text-center text-dark">2</h4>
                                </div>
                            </div>
                        </div>



                    </div>



                </div>



                <div class="global-result d-flex justify-content-between align-items-center">
                    <div>
                        <h2 style="color: #86469C;">Resultado Global:</h2>

                        <h3 class="text-dark">3</h3>
                    </div>
                    <div>
                        <h2 style="color: #86469C;">Nivel de autonomía:</h2>
                        <h3 class="text-dark">Autonomo</h3>
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
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label class="text-dark">Tolerancia al malestar</label>
                                    <select id="tolerancia" name="tolerancia" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-white">Resultado: </h3>
                                    <h4 class="text-dark">3</h4>
                                </div>
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-center text-white">Resultado:</h3>
                                    <h4 class="text-dark">2</h4>
                                </div>

                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white text-center">Nivel de Autonomia: </h3>
                                    <h4 class="text-center text-dark">Asesorado</h4>
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
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label class="text-dark">Busca soluciones utilizando recursos de su entorno</label>
                                    <select id="soluciones" name="soluciones" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-white">Resultado: </h3>
                                    <h4 class="text-dark">3</h4>
                                </div>
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-center text-white">Resultado:</h3>
                                    <h4 class="text-dark">2</h4>
                                </div>

                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white text-center">Nivel de Autonomia: </h3>
                                    <h4 class="text-center text-dark">Dirigido</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="global-result d-flex justify-content-between align-items-center">
                    <div>
                        <h2 style="color: #86469C;">Categoria:</h2>

                        <h3 class="text-dark">3</h3>
                    </div>
                    <div>
                        <h2 style="color: #86469C;">Resultado Global:</h2>

                        <h3 class="text-dark">3</h3>
                    </div>
                    <div>
                        <h2 style="color: #86469C;">Nivel de autonomía:</h2>
                        <h3 class="text-dark">Autonomo</h3>
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
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Diariamente en mi proceso académico pongo todo mi esfuerzo por realizar trabajos bien hechos y de alta calidad comprendiendo mis fortalezas y aspectos de mejora.</label>
                                    <select id="diario" name="diario" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-white">Resultado: </h3>
                                    <h4 class="text-center text-dark">3</h4>
                                </div>
                                <div style="display: grid; place-items:center;">
                                    <h3 class="text-center text-white">Resultado:</h3>
                                    <h4 class="text-center text-dark">2</h4>
                                </div>

                            </div>
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white text-center">Nivel de Autonomia: </h3>
                                    <h4 class="text-center text-dark">Dirigido</h4>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="global-result d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-white">Categoria:</h2>
                        <h3 class="text-dark">3</h3>
                    </div>
                    <div>
                        <h2 class="text-white">Resultado Global:</h2>
                        <h3 class="text-dark">3</h3>
                    </div>
                    <div>
                        <h2 class="text-white">Nivel de autonomía:</h2>
                        <h3 class="text-dark">Autonomo</h3>
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
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white text-center">Resultado: </h3>
                                    <h4 class="text-center text-dark">3</h4>
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
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-3" style="display: grid; place-items:center;">
                                <div>

                                    <h3 class="text-white text-center">Resultado: </h3>
                                    <h4 class="text-center text-dark">1</h4>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="global-result d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-white">Categoria:</h2>
                        <h3 class="text-dark">2</h3>
                    </div>
                    <div>
                        <h2 class="text-white">Resultado Global:</h2>
                        <h3 class="text-dark">3</h3>
                    </div>
                    <div>
                        <h2 class="text-white">Nivel de autonomía:</h2>
                        <h3 class="text-dark">Autonomo</h3>
                    </div>
                </div>
            </div>


            <div class="container mb-3 p-0 text-right" style="margin-left: 15%;">
             <button type="submit" class="btn btn-success" style="width: 250px; height:50px;">Guardar</button>
            </div>


        </form>
    </div>







    <!-- End of Main Content -->

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