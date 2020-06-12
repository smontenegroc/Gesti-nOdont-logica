<?php 
//    require_once 'Vista/html/plantilla.php';
require_once 'Controlador/Controlador.php';            
require_once 'Modelo/GestorCita.php';            
require_once 'Modelo/Cita.php';            
require_once 'Modelo/Paciente.php';            
require_once 'Modelo/Conexion.php';
$controlador = new Controlador();
?>
<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión odontólogica</title>
    </head>
    <body>
        
        <?php
            if(isset($_GET["accion"])){
                switch ($_GET["accion"]){
                    case "asignar":
                        $controlador->cargarAsignar();
                    break;
                    case "consultar":
                        $controlador->verPagina('Vista/html/consultar.php');
                    break;
                    case "cancelar":
                        $controlador->verPagina('Vista/html/cancelar.php');
                    break;
                    case "gauardarCita":
                        $controlador->agregarCita($_POST["asignarDocumento"],
                        $_POST["medico"],
                        $_POST["fecha"],
                        $_POST["hora"],        
                        $_POST["consultorio"]);      
                    break;
                    case "consultarCita":
                        $controlador->consultarCitas($_GET["consultarDocumento"]);
                    break;
                    case "cancelarCita":
                        $controlador->cancelarCitas($_GET["cancelarDocumento"]);
                    break;
                    case "consultarPaciente":
                        $controlador->consultarPaciente($_GET["documento"]);
                    break;
                    case "ingresarPaciente":
                        $controlador->agregarPaciente(
                        $_GET["PacDocumento"],
                        $_GET["PacNombres"],      
                        $_GET["PacApellidos"],        
                        $_GET["PacNacimiento"],        
                        $_GET["PacSexo"]        
                        );
                    break;
                    case "consultarHora":
                        $controlador->consultarHorasDisponibles($_GET["medico"],$_GET["fecha"]);
                    break;
                    case "verCita":
                        $controlador->verCita($_GET["numero"]);
                    break;
                    case "confirmarCancelar":
                        $controlador->confirmarCancelarCita($_GET["numero"]);
                    break;
                }
            } 
                   
            else{
                $controlador->verPagina('Vista/html/inicio.php');
            }
        ?>
    </body>
</html>
