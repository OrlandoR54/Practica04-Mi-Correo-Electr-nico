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
    <title>Modificar Contraseña</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="fun_Pass.js" type="text/javascript"></script>
</head>

<body>
<h1>Modificar Contraseña</h1>

<?php
    $codigo = $_GET["codigo"];
?>
    
    <form  method="POST" action="../../controladores/user/cambiarContra.php">

        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

        <label class="contrasena" for="contrasenaActual">Contrasena Actual (*)</label>
        <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese contrerior">
        <br>

        <label class="contrasena" for="contrasenaNueva">Contrasena Nueva (*)</label>
        <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese nueva contrasena">
        <br>

        <input type="submit" id="modificar" name="modificar" value="Modificar" class="boton">
        <input type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='micuenta.php?codigo=<?php echo $codigo ?>'" class="boton">
    </form>
</body>

</html>