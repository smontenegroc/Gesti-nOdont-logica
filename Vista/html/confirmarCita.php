<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión Odontológica</title>
        <link rel="stylesheet" href="Vista/css/estilos.css">
    </head>
    <body>
        <div id="contenedor">
            <div id="encabezado">
                <h1>Gestión odontológica</h1>
            </div> 
            <ul id="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?accion=asignar">asignar</a></li>
                <li><a href="index.php?accion=consultar">consultar</a></li>
                <li><a href="index.php?accion=cancelar">cancelar</a></li>
            </ul>
            <div id="contenido">
                <?php 
                //echo __FILE__ . "  " . __LINE__ . "<br/>"; exit();  
                $fila = $result->fetch_object(); 
                           
                ?>                    
                
                <h2>Información cita</h2>
                <table>
                    <tr>
                        <th colspan="2">Datos del paciente</th>
                    </tr>
                    <tr>
                        <td>Documento</td>
                        <td><?php echo $fila->PacIdentificacion;?></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $fila->PacNombres . " " . $fila->PacApellidos;?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Datos del médico</th>
                    </tr>
                    <tr>
                        <td>Documento</td>
                        <td><?php echo $fila->MedIdentificacion;?></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo $fila->MedNombres . " " . $fila->MedApellidos;?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Datos de la cita</th>
                    </tr>
                    <tr>
                        <td>Número</td>
                        <td><?php echo $fila->CitNumero;?></td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td><?php echo $fila->CitFecha;?></td>
                    </tr>
                    <tr>
                        <td>Hora</td>
                        <td><?php echo $fila->CitHora;?></td>
                    </tr>
                    <tr>
                        <td>Consultorio</td>
                        <td><?php echo $fila->CitConsultorio;?></td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td><?php echo $fila->CitEstado;?></td>
                    </tr>
                    <!--<tr>
                        <td>Observaciones</td>
                        <td><?php //echo $fila->CitObservaciones;?></td>
                    </tr>-->
                </table>
                
            </div>
        </div>
    </body>
</html>
