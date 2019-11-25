<?php
    session_start();

    include '../../config/conexionBD.php';

    $usuario= isset($_POST["email"])?trim($_POST["email"]):null;
    $contrasena= isset($_POST["password"])?trim($_POST["password"]):null;

    $sql = "SELECT*FROM usuario WHERE usu_correo='$usuario'and usu_password=MD5('$contrasena')";

    $result = $conn->query($sql);    
    if ($result->num_rows>0) {
        $_SESSION['isLogged']=TRUE;
        header("Location:../../admin/vista/usuario/index.php");
    }else {
        
        header("Location:../vista/login.html");
    }
    $conn->close();
?>