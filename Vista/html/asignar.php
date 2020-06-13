<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión odontológica</title>
        <link rel="stylesheet" href="Vista/css/estilos.css">
        <script type="text/javascript" src="Vista/jquery/jquery-3.5.1.js"></script>
        <script src="Vista/jquery/jquery-ui-1.12.1/jquery-ui.js"  type="text/javascript"></script>
        <script src="Vista/jquery/jquery-ui-1.12.1/jquery-ui.min.js"  type="text/javascript"></script>
        <link href="Vista/jquery/jquery-ui-1.12.1/jquery-ui.min.css"  rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="Vista/js/script.js"></script>
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
                <h2>Asignar cita</h2>
                <form id="frmasignar" action="index.php?accion=guardarCita" method="post">
                    <table>
                        <tr>
                            <td>Documento del paciente</td>
                            <td><input type="text" name="asignarDocumento" id="asignarDocumento"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="button" value="Consultar" name="asignarConsultar" id="asignarConsultar" onclick="consultarPaciente()">
                            </td>
                        </tr>
                        <tr><td colspan="2"><div id="paciente"></div></td></tr>
                        <tr>
                            <td>Médico</td>
                            <td>
                                <select id="medico" name="medico" onchange="cargarHoras()">
                                    <option value="-1" selected="selected">--Seleccione el médico</option>
                                    <?php while($fila = $result->fetch_object()){ ?>
                                    <option value=<?php echo $fila->MedIdentificacion; ?>>
                                        <?php echo $fila->MedIdentificacion . " " . $fila->MedNombres . " " . $fila->MedApellidos;?>
                                    </option>
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                         <tr>
                            <td>Consultorio</td>
                            <td>
                                <select id="consultorio" name="consultorio" onchange="cargarHoras()">
                                    <option value="-1" selected="selected">--Seleccione el consultorio</option>
                                    <?php while($fila = $result2->fetch_object()){ ?>
                                    <option value=<?php echo $fila->ConNumero; ?>>
                                        <?php echo $fila->ConNumero . " - ". $fila->ConNombre; ?>
                                    </option>
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Fecha</td>
                            <td><input type="date" id="fecha" name="fecha" onchange="cargarHoras()"></td>
                        </tr>
                        <tr>
                            <td>Hora</td>
                            <td>
                                <select id="hora" name="hora" onmousedown="seleccionarHora()">
                                    <option value="-1" selected="selected">---Seleccione la hora---</option>
                                </select>
                            </td>
                        </tr>
                       
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="asignarEnviar" value="Enviar" id="asignarEnviar">
                            </td>
                        </tr>
                    </table>
                </form>
                
            </div>
        </div>
        <div id="frmPaciente" title="Agregar Nuevo Paciente">
            <form id="agregarPaciente">
                <table>
                    <tr>
                        <td>Documento</td>
                        <td><input type="text" name="PacDocumento" id="PacDocumento"></td>
                    </tr>
                    <tr>
                        <td>Nombres</td>
                        <td><input type="text" name="PacNombres" id="PacNombres"></td>
                    </tr>
                    <tr>
                        <td>Apellidos</td>
                        <td><input type="text" name="PacApellidos" id="PacApellidos"></td>
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento</td>
                        <td><input type="text" name="PacNacimiento" id="PacNacimiento" placeholder="   aaaa/mm/dd"></td>
                    </tr>
                    <tr>
                        <td>Sexo</td>                        
                        <td>
                            <select id="PacSexo" name="PacSexo"> 
                                <option value="-1" selected="selected">--Seleccione el sexo--</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
