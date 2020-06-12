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
                if($_GET["accion"] == "asignar"){
                    $controlador->cargarAsignar();
                }
                elseif($_GET["accion"] == "consultar"){
                    $controlador->verPagina('Vista/html/consultar.php');
                }
                elseif($_GET["accion"] == "cancelar"){
                    $controlador->verPagina('Vista/html/cancelar.php');
                }
                elseif($_GET["accion"] == "guardarCita"){
                    $controlador->agregarCita($_POST["asignarDocumento"],
                    $_POST["medico"],
                    $_POST["fecha"],
                    $_POST["hora"],
                    $_POST["consultorio"]);
                }
                elseif($_GET["accion"] == "consultarCita"){
                    $controlador->consultarCitas($_GET["consultarDocumento"]);
                }
                elseif($_GET["accion"] == 'cancelarCita'){
                    $controlador->cancelarCitas($_GET["cancelarDocumento"]);
                }
                elseif($_GET["accion"] == 'consultarPaciente'){
                    //echo __FILE__ . "  " . __LINE__ . "<br/>"; exit();
                    $controlador->consultarPaciente($_GET["documento"]);
                }
                elseif($_GET["accion"] == 'ingresarPaciente'){
                    
                    $controlador->agregarPaciente(
                            $_GET["PacDocumento"],
                            $_GET["PacNombres"],
                            $_GET["PacApellidos"],
                            $_GET["PacNacimiento"],
                            $_GET["PacSexo"]
                            );
                }
                elseif($_GET["accion"] === "consultarHora"){
                    $controlador->consultarHorasDisponibles($_GET["medico"],$_GET["fecha"]);
                }
                elseif($_GET["accion"] === "verCita"){
                    $controlador->verCita($_GET["numero"]);
                }
                elseif($_GET["accion"] === "confirmarCancelar"){
                    $controlador->confirmarCancelarCita($_GET["numero"]);
                }
            } 
                   
            else{
                $controlador->verPagina('Vista/html/inicio.php');
            }
        ?>
    </body>
</html>
