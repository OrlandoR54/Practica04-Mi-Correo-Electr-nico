<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
</head>
<body>
    <?php
        include '../../config/conexionBD.php';

        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]):null;
        $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]),'UTF-8'):null;
        $apellido = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8'): null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8'): null;
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
        $correo = isset($_POST["email"]) ? trim($_POST["email"]):null;
        $fechaNacimiento = isset($_POST["fecha"]) ? trim($_POST["fecha"]):null;
        $contrasena = isset($_POST["password"]) ? trim($_POST["password"]):null;

        $sql = "INSERT INTO usuario VALUES (0, '$cedula','$nombre','$apellido','$direccion','$telefono','$correo', MD5('$contrasena'),'$fechaNacimiento','N',null,null,'U')";

        if ($conn->query($sql)===TRUE) {
            echo "<p>Se ha creado los datos personales correctamente</p>";
            header( "Location: ../vista/login.html");
        }else {
            if ($conn->errno == 1062) {
                echo "<p class='error'>La persona con la cedula $cedula ya esta en el sistema</p>";
                

            }else {
                echo "<p class='error'>Error.".mysqli_error($conn)."</p>";
                echo "<a href='../vista/registrarse.html'>Volver a Registro</a>";
            }
        }
        //Cerrar la base de datos
        $conn->close();
        echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
    ?>
</body>
</html>