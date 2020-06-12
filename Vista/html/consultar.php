<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión Odontológica</title>
        <link rel="stylesheet" href="Vista/css/estilos.css">
        <script type="text/javascript" src="Vista/jquery/jquery-3.5.1.js"></script>
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
                <h2>Consultar cita</h2>
                <form action="index.php?accion=consultarCita" method="post" id="frmconsultar">
   
                    <table>
                        <tr>
                            <td>Documento del paciente</td>
                            <td><input type="text" name="consultarDocumento" id="consultarDocumento"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="button" name="consultarConsultar" value="Consultar" id="consultarConsultar" onclick="consultarCita()">                                
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><div id="paciente2"></div></td>
                        </tr>
                        
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
