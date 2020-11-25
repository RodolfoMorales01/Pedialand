<?php
    require '../../php/function.php';
    if (!isset($_SESSION['user'])) {
        header('location: ../../');
    }
    if (isset( $_SESSION['user'])) {
        if ($_SESSION['roles'] == "Doctor") {
            header('location: ../../admin.php');
        }
    }
    $usuario= $_SESSION['user'];
    $nombre = $_SESSION['nombre'];
    $paterno = $_SESSION['ape_p'];
    $materno = $_SESSION['ape_m'];

    require('../../php/conexion.php');
    
    $sql ="SELECT * FROM roles";
    $resultado = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <link rel="shortcut icon" href="../../assets/img/consultorio.png">
        <meta name="author" content="">
        <title>Expediente Medico Pediatrico</title>
        <!-- Custom fonts for this template-->
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="assets/css/sb-admin-2.css" rel="stylesheet">    
    </head>
        
    <body id="page-top">
        <div id="wrapper"><!-- Page Wrapper -->               
            <?php
                include("layout/menu.php");
            ?>
            
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php
                        include("layout/nav.php");
                    ?>
                    
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Nuevo Usuario</h1>
                            <div class="md-4">
                                <span id="result"></span>
                            </div>
                        </div>
                        

                        <div class="card shadow mb-4">                                
                            <div class="card-body">                                    
                                <form method="POST" id="formregister">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Correo Electr&oacute;nico</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Contase&ntilde;a</label>
                                            <input type="password" class="form-control" id="passwd">
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Nombre(s)</label>
                                            <input type="text" class="form-control" id="nombre">
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>Apellido Paterno</label>
                                            <input type="text" class="form-control" id="ap_paterno">
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>Apellido Materno</label>
                                            <input type="text" class="form-control" id="ap_materno">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" name="fecha" class="form-control" id="nacimiento">
                                        </div>                                      
                                        <div class="form-group col-md-4">
                                            <label>Cedula Profesional</label>
                                            <input type="text" class="form-control" id="cedula">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Roles</label>
                                            <select id="roles" class="form-control">
                                                <option selected>Selecciona ...</option>
                                                    <?php
                                                        while ($data =mysqli_fetch_array($resultado)) {
                                                    ?>
                                                <option value="<?php echo $data['idroles'];?>"><?php echo $data['rol'];?></option>
                                                    <?php
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <center>
                                    <input class="btn btn-primary register" type="submit" id="login" value="Agregar usuario"> &nbsp;
                                    
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <?php
            include("modals/modal_sesion.php");
        ?>
    </body>
        
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <script src="assets/js/main.js"></script>
</html>