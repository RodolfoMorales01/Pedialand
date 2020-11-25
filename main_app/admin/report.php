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
    
    $sql ="SELECT * FROM personales INNER JOIN usuario ON usuario.idpersonales = personales.idpersonales INNER JOIN roles ON usuario.idroles = roles.idroles";
    $resultado = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="../../assets/img/consultorio.png">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Expediente Medico Pediatrico</title>
        <!-- Custom fonts for this template-->
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="assets/css/sb-admin-2.css" rel="stylesheet">  
        <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">  
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
                            <h1 class="h3 mb-0 text-gray-800">Reporte de usuarios</h1>
                            <div class="md-4">
                                <span id="result"></span>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th style="width: 35px;">ID</th>
                                            <th style="width: 40px;">Nombre</th>
                                            <th style="width: 76px;">Apellido Paterno</th>
                                            <th style="width: 76px;">Apellido Materno</th>
                                            <th style="width: 76px;">Cedula Professional</th>
                                            <th style="width: 40px;">Rol</th>
                                            <th style="width: 90px;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while ($data =mysqli_fetch_array($resultado)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $data['idpersonales'];?></td>
                                                <td><?php echo $data['nombre'];?></td>
                                                <td><?php echo $data['ap_paterno'];?></td>
                                                <td><?php echo $data['ap_materno'];?></td>
                                                <td style="width: 86px;"><?php echo $data['ced_profesional'];?></td>
                                                <td><?php echo $data['rol'];?></td>
                                                <td>
                                                    <a href="javascript:void(0)" onclick="editPerson('<?php echo $data['idpersonales'];?>')" class="btn btn-warning"><i class="far fa-edit"></i> </a>
                                                    <a href="javascript:void(0)" onclick="viewPerson('<?php echo $data['idpersonales'];?>')" class="btn btn-success"><i class="fas fa-eye"></i> </a>
                                                    <a href="javascript:void(0)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="divModal"></div>
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

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>

    <script src="assets/js/main.js"></script>
</html>