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
 <h1>Seleciona la reunion para agregar invitados</h1>


 <h2><a href="crearReunion.php">Regresar</a></h2>
 <table style="width:100%" class="tabla"> 
        <tr> 
            
            <th>Fecha</th>  
            <th>Hora</th> 
            <th>Lugar</th> 
            <th>Coordenadas</th> <!--FALTA-->             
            <th>Motivo</th> 
            <th>Invitar</th>              
        </tr> 
        <?php 
            include '../../../config/conexionBD.php';  
            $sql = "SELECT * FROM reunion"; 
            $result = $conn->query($sql); 
             
            if ($result->num_rows > 0) { 
                 
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>"; 
                    echo "   <td>" . $row["r_fecha"] . "</td>"; 
                    echo "   <td>" . $row['r_hora'] ."</td>"; 
                    echo "   <td>" . $row['r_lugar'] . "</td>"; 
                    echo "   <td>" . $row['r_coordenadas'] . "</td>";
                    echo "   <td>" . $row['r_motivo'] . "</td>"; 
                    //echo "   <td> <a href='agreInvitados2.php?r_codigo=" . $row['r_codigo'] . "'>Invitar</a> </td>";
                    
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