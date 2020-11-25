<?php
    require '../../php/function.php';
    if (!isset($_SESSION['user'])) {
        header('location: ../../');
    }

    if (isset( $_SESSION['user'])) {
        if ($_SESSION['roles'] == "Admin") {
            header('location: ../../admin.php');
        }
    }
    $usuario= $_SESSION['user'];
    $nombre = $_SESSION['nombre'];
    $paterno = $_SESSION['ape_p'];
    $materno = $_SESSION['ape_m'];
    $fecha = $_SESSION['fecha'];
    $cedula = $_SESSION['cedula'];
    $roles = $_SESSION['roles'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Hola <?php echo $nombre." ".$paterno." ".$materno;?></h1>
        <h1><?php echo $roles; ?></h1>
        <a href="sesion.php">Logout</a>
    </body>
</html>