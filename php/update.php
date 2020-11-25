<?php
    require('conexion.php');
    session_start();

    if (!empty($_POST['email']) && !empty($_POST['passwd']) && !empty($_POST['name']) && !empty($_POST['paterno']) && !empty($_POST['materno']) && !empty($_POST['fecha']) && !empty($_POST['cedula']) && !empty($_POST['roles'])) {
       
        $id = $_POST['persona'];
        $email = $_POST['email'];
        $passwd = SHA1($_POST['passwd']);
        $name = $_POST['name'];
        $lastname1 = $_POST['paterno'];
        $lastname2 = $_POST['materno'];
        $fecha = $_POST['fecha'];
        $cedula = $_POST['cedula'];
        $roles = $_POST['roles'];

        $sql1 = "UPDATE personales SET nombre = '$name', ap_paterno= '$lastname1', ap_materno= '$lastname2', correo= '$email', fech_nac= '$fecha', ced_profesional= '$cedula' WHERE idpersonales = '$id'";
        $resultado = mysqli_query($conn,$sql1);

        $sql2 = "UPDATE usuario SET correo = '$email', pwd = '$passwd', idroles = '$roles' WHERE idpersonales='$id'";
        $resultad1 = mysqli_query($conn,$sql2);

        echo "1";
    } else {
        echo "0";
    }
?>