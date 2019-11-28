<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
</head>
<body>
    <form class="box">
        <?php
        //Incluir conexion a la base de datos
        include '../../config/conexionBD.php';

        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombres = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
        $correo = isset($_POST["email"]) ? trim($_POST["email"]) : null;
        $fechaNacimiento = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null;
        $contrasena = isset($_POST["password"]) ? trim($_POST["password"]) : null;
        $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo', MD5('$contrasena'), '$fechaNacimiento', 'N', null, null, 2)";
        if ($conn->query($sql) == TRUE) {
            echo "<p>Se han creado los datos personales correctamente!!!</p>";
        } else {
            if ($conn->errno == 1062) {
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema</p>";
            } else {
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
        $conn->close();
        echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
        ?>
    </form>
</body>

</html>