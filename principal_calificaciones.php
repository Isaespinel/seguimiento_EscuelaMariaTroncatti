
<?php 
require 'functions.php';
include("Cabecera.php");
?>

        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->

            <div id="content" class="ml-5 mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <h1 class="ml-4">Inicio</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-4">
                    
                    <div class="row mt-4">
                    <div class="col-md-6">
                            <a href="listadoalumnos.view.php" style="text-decoration: none; color:black;">
                            <div class="card" style="height: 150px;">
                                <div class="row">
                                    <div class="col-md-4" style="display: grid; place-items:center; height: 150px;">
                                    <i><ion-icon name="school" style="color: #F5C313; font-size: 80px;"></ion-icon></i>
                                    </div>
                                    <div class="col-md-8" >
                                        <h1 class="mt-5">Alumnos</h1>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="cursos.view.php" style="text-decoration: none; color:black;">
                            <div class="card" style="height: 150px;">
                                <div class="row">
                                    <div class="col-md-4" style="display: grid; place-items:center; height: 150px;">
                                    <i><ion-icon name="easel" style="color: #F5C313; font-size: 80px;"></ion-icon></i>
                                    </div>
                                    <div class="col-md-8" >
                                        <h1 class="mt-5">Cursos</h1>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        
                    </div>
                    <div class="row mt-4">

                    <div class="col-md-6">
                            <a href="materias.view.php" style="text-decoration: none; color:black;">
                            <div class="card" style="height: 150px;">
                                <div class="row">
                                    <div class="col-md-4" style="display: grid; place-items:center; height: 150px;">
                                    <i><ion-icon name="library" style="color: #F5C313; font-size: 80px;"></ion-icon></i>
                                    </div>
                                    <div class="col-md-8" >
                                        <h1 class="mt-5">Materias</h1>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                       
                        

                        <div class="col-md-6">
                            <a href="notas.view.php" style="text-decoration: none; color:black;">
                            <div class="card" style="height: 150px;">
                                <div class="row">
                                    <div class="col-md-4" style="display: grid; place-items:center; height: 150px;">
                                    <i><ion-icon name="pencil" style="color: #F5C313; font-size: 80px;"></ion-icon></i>
                                    </div>
                                    <div class="col-md-8" >
                                        <h1 class="mt-5">Calificaciones</h1>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                    </div>
                    <div class="row mt-4">
                        
                        <div class="col-md-6">
                            <a href="comportamiento.view.php" style="text-decoration: none; color:black;">
                            <div class="card" style="height: 150px;">
                                <div class="row">
                                    <div class="col-md-4" style="display: grid; place-items:center; height: 150px;">
                                    <i><ion-icon name="checkmark-done" style="color: #F5C313; font-size: 80px;"></ion-icon></i>
                                    </div>
                                    <div class="col-md-8" >
                                        <h1 class="mt-5">Comportamiento</h1>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <?php 
          if(getRol() == 'Administrador'){  
        ?>
                        <div class="col-md-6">
                            <a href="usuarios.view.php" style="text-decoration: none; color:black;">
                            <div class="card" style="height: 150px;">
                                <div class="row">
                                    <div class="col-md-4" style="display: grid; place-items:center; height: 150px;">
                                    <i><ion-icon name="person-circle" style="color: #F5C313; font-size: 80px;"></ion-icon></i>
                                    </div>
                                    <div class="col-md-8" >
                                        <h1 class="mt-5">Perfil</h1>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <?php }?>


                    </div>
                   
                </div>
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


        <?php include("Footer.php");?>
