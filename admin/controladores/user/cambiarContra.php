<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: ../../../public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registro Reunion_usuario</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    $u_codigo = $_GET["u_codigo"];//NO SE USARON ESTAS VARIABLES
    $u_nombre= $_GET["u_nombre"];//NO SE USARON ESTAS VARIABLES
    echo"<p>puto code ".$u_codigo."</p>";
    echo"<p>puto nombre ".$u_nombre."</p>";
    include '../../../config/conexionDB.php';
    $contrasena = isset($_POST["new_contra"]) ? trim($_POST["new_contra"]) : null;
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE usuario " .
        //"SET usu_cedula = '$cedula', " .
        "SET usu_password = MD5('$contrasena') ," .
        "usu_fecha_modificacion = '$fecha' " .
        "WHERE usu_codigo = $u_codigo";
    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";
        header("Location: ../../../public/vista/login.html");//una vez actualizados los datos se redirecciona a login 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<a href='../../vista/user/index.php'>Regresar</a>";
    $conn->close();
    ?>

</body>

</html>