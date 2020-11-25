<?php
    require 'php/function.php';
    $usuario = $_SESSION['user'];
    $roles = $_SESSION['roles'];



    if ($roles == "Admin") {
        header("location: main_app/admin/admin.php");
    } elseif ($roles == "Doctor") {
        header("location: main_app/doctor/doctor.php");
    } elseif ($roles == "Recepccion") {
        header("location: main_app/recepcion/recepcion.php");
    }
    
?>