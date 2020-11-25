<?php
   require('conexion.php');
   
  

   
   if (!empty($_POST['email']) && !empty($_POST['passwd']) && !empty($_POST['name']) && !empty($_POST['paterno']) && !empty($_POST['materno']) && !empty($_POST['fecha']) && !empty($_POST['cedula']) && !empty($_POST['roles'])) {
      
      $email = $_POST['email'];
      $passwd = SHA1($_POST['passwd']);
      $name = $_POST['name'];
      $lastname1 = $_POST['paterno'];
      $lastname2 = $_POST['materno'];
      $fecha = $_POST['fecha'];
      $cedula = $_POST['cedula'];
      $roles = $_POST['roles'];
   
      $sql1 = "INSERT INTO personales (nombre, ap_paterno, ap_materno, correo, fech_nac, ced_profesional) VALUES ('$name','$lastname1','$lastname2','$email','$fecha','$cedula')";
      $resultado = mysqli_query($conn,$sql1);
   
      $sql2 = "SELECT * FROM personales where correo='$email'";
      $resultado2 = mysqli_query($conn,$sql2);
      $data = mysqli_fetch_array($resultado2);
      $idpersonal = $data['idpersonales'];
   
      $sql3 = "INSERT INTO usuario (correo, pwd, idpersonales, idroles) VALUES ('$email','$passwd','$idpersonal','$roles')";
      $resultado3 = mysqli_query($conn,$sql3);

      echo "1";
   } else {
      echo "0";
   }

?>
