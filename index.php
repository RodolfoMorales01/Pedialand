<?php
    require 'php/function.php';
    if (isset($_GET['logout'])) {
        session_destroy();
    }
    if (isset( $_SESSION['user'])) {
        if ($_SESSION['roles'] == "Admin") {
            header('location: admin.php');
        } elseif ($_SESSION['roles'] == "Doctor") {
            header('location: admin.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <link rel="shortcut icon" href="assets/img/consultorio.png">
        <link rel="stylesheet" href="assets/css/bootstrap.css?n=1">
        <link rel="stylesheet" href="assets/css/signin.css?n=1">
        <title>Expediente Medico Pediatrico</title>
    </head>
    <body>
        <div class="error">
            <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
        </div>
        <div class="container cuadro">
            <center>
                <form class="form-signin" id="formlogin" method="POST">
                    <img class="mb-4" src="assets/img/consultorio.png" alt="" width="200" height="200">
                    <h1 class="h3 mb-3 font-weight-normal">Inicio de Sesi&oacute;n</h1>
                    <label for="inputEmail" class="sr-only">Correo electr&oacute;nico</label>
                    <input type="email" id="email" class="form-control" placeholder="Correo electr&oacute;nico" required autofocus>
                    <label  class="sr-only">Contrase&ntilde;a</label>
                    <input type="password" id="password" class="form-control" placeholder="Contrase&ntilde;a" required>
                    <input class="btn btn-primary btn-block botonlg" type="submit" id="login" value="Iniciar Sesi&oacute;n">
                    <a class="form-text" href="#">¿Olvidaste tu contrase&ntilde;a</a>
                    <p class="mt-5 mb-3 text-muted">&copy;  Derechos Reservados 2017-2020</p>
                </form>
            </center>
        </div>
        
    </body>
    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/main.js"></script>
</html>
