<?php
    $persona = $_GET['persona'];

    require('conexion.php');

    $sql ="SELECT * FROM personales INNER JOIN usuario ON usuario.idpersonales = personales.idpersonales INNER JOIN roles ON usuario.idroles = roles.idroles WHERE personales.idpersonales='$persona'";
    $resultado = mysqli_query($conn,$sql);

    $data =mysqli_fetch_array($resultado);

    $rol = $data['rol'];
    $nombre = $data['nombre'];
    $ap_paterno = $data['ap_paterno'];
    $ap_materno = $data['ap_materno'];
    $correo = $data['correo'];
    $fecha_nac = $data['fech_nac'];
    $cedula = $data['ced_profesional'];


    $sql2 ="SELECT * FROM roles";
    $resultado2 = mysqli_query($conn,$sql2);
?>  