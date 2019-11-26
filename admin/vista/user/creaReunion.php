<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: ../../../public/vista/login.html");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Crear Reunion</title>
    <link rel="stylesheet" href="../../../css/formulario.css">
</head>
<?php 
$u_codigo=$_GET["usu_codigo"];
$u_nombre=$_GET["usu_nombres"];
//echo "<p>".$u_codigo."</p>";// Comprobar variables  
//echo "<p>".$u_nombre."</p>";//  
?>

<section class="formulas">
    <h2>Crear Reunion</h2>

    <form id="formulario01" method="POST" action="../../controladores/user/crearNewReunion.php">


    
    <input type="hidden" id="u_codigo" name="u_codigo" value="<?php echo $_GET["u_codigo"];?>" />
    <input type="hidden" id="u_nombre" name="u_nombre" value="<?php echo $_GET["u_nombre"];?>" />

        <div><label for="fecha">Fecha:</label>
            <input type="text" id="fecha" name="fecha" placeholder="yyyy/mm/dd" />
            <span id="mensajeNombre" class="error"></span>
        </div>


        <div> <label for="hora">Hora:</label>
            <input type="text" id="hora" name="hora" />
            <span id="mensajeApellido" class="error"></span>
        </div>

        <div>
            <label for="lugar">Lugar:</label>
            <input type="text" id="lugar" name="lugar" /></div>


        <div>
            <label for="coordenadas">Coordenadas:</label>
            <input type="text" id="coordenadas" name="coordenadas" />
            <span id="mensajeFechaNac" class="error"></span>
        </div>

        <div>
            <label for="motivo">Motivo:</label>
            <!-- <input type="text" id="motivo" name="motivo" />-->

            <select name="motivo" id="motivo">
                <option value="Actualización de estado">Actualización de estado</option>
                <option value="Compartir Información">Compartir Información</option>
                <option value="Toma de Decisiones">Toma de Decisiones</option>
                <option value="Resolución de Problemas">Resolución de Problemas</option>
                <option value="Innovación"> Innovación</option>
                <option value="Creación de Equipos">Creación de Equipos</option>
                
            </select>
        </div>

        <div>
            <label for="observacion">Observacion:</label>
            <input type="text" id="observacion" name="observacion" />
            <span id="mensajePass" class="error"></span>
        </div>
        <div>
            <input type="submit" value="Registrar Reunion" id="Registrar"></input>
            <!--
            <input type="submit" value="Validar" onclick="validar()"></input>-->
        </div>

    </form>
    

</section>

</html>