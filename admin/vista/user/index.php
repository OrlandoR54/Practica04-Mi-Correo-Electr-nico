<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Usuario</title>
    <link rel="stylesheet" href=""> 
</head> 
<body> 
    
<?php 
$codigo=$_GET["usu_codigo"];
$nombre=$_GET["usu_nombres"];
//echo"<p>".$codigo."</p>";
 echo "<h1>Usuario: ".$nombre."</h1>";
 //envio a cada pagina su respectivo id de usuario para realizar los cambios pertinentes
 echo "<h2><a href='crearReunion.php?usu_codigo=".$codigo."&usu_nombres=".$nombre."'>Crear Reuniones</a></h2>";
 echo "<h2><a href='buscarReuniones.php?usu_codigo=".$codigo."&usu_nombres=".$nombre."'>Buscar Reuniones</a></h2>";
 echo "<h2><a href='modificar_user2.php?usu_codigo=".$codigo."&usu_nombres=".$nombre."'>Modificar datos</a></h2>";
 echo "<h2><a href='cambiar_contra_usuario.php?usu_codigo=".$codigo."&usu_nombres=".$nombre."'>Cambiar contraseña</a></h2>";
 echo "<h2><a href='../../controladores/cerrarSesion.php'>Cerrar Sesion</a></h2>";
 
 ?>
 
 <table style="width:100%" class="tabla"> 
        <tr> 
            
            <th>Fecha</th>  
            <th>Hora</th> 
            <th>Lugar</th> 
            <th>Coordenadas</th>
            <th>Motivo</th>        
                         
        </tr> 
        <?php 
            include '../../../config/conexionBD.php';  
            //En la pagina del usuario logeado se visualizara sus respectivas reunines agendadas
            $sql = "SELECT * FROM reunion WHERE reu_eliminada='N' AND reu_remitente='$codigo' ORDER BY reu_codigo DESC"; 
            $result = $conn->query($sql); 
             
            if ($result->num_rows > 0) { 
                 
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>"; 
                    echo "   <td>" . $row["reu_fecha"] . "</td>"; 
                    echo "   <td>" . $row['reu_hora'] ."</td>"; 
                    echo "   <td>" . $row['reu_lugar'] . "</td>"; 
                    echo "   <td>" . $row['reu_coordenadas'] . "</td>"; 
                    echo "   <td>" . $row['reu_motivo'] . "</td>"; 
                    echo "</tr>"; 
                } 
            } else { 
                echo "<tr>"; 
                echo "   <td colspan='7'> No existen reuniones registradas en el sistema </td>"; 
                echo "</tr>"; 
 
            } 
            $conn->close();          
        ?> 
    </table>     

</body> 
</html> 