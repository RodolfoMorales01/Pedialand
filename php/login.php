<?php
    
    require('conexion.php');
    sleep(2);
    session_start();
    
    if (isset($_POST['correo']) && isset($_POST['password'])) {
        $correo = $_POST['correo'];
        $password = SHA1($_POST['password']);

        $sql = "SELECT * FROM usuario INNER JOIN personales ON usuario.idpersonales = personales.idpersonales INNER JOIN roles ON usuario.idroles = roles.idroles WHERE usuario.correo ='$correo' AND usuario.pwd = '$password'";
        $resultado = mysqli_query($conn,$sql);
        $result = mysqli_num_rows($resultado);

        if($result == "1"){
            $data =mysqli_fetch_array($resultado);
            $_SESSION['user'] = $data['correo'];
            $_SESSION['pwd'] = $data['pwd'];
            $_SESSION['idpersona'] = $data['idpersonales'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['ape_p'] = $data['ap_paterno'];
            $_SESSION['ape_m'] = $data['ap_materno'];
            $_SESSION['fecha'] = $data['fech_nac'];
            $_SESSION['cedula'] = $data['ced_profesional'];
            $_SESSION['roles'] = $data['rol'];
            echo "1";            
        } else{
            echo "error";
        }
    } else {
        echo "error";
    }
    mysqli_close($conn);
    ?>