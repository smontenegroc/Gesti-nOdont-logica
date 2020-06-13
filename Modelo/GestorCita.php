<?php
class GestorCita {
    public function agregarCita(Cita $cita){
        $conexion = new Conexion();
        $conexion->abrir();
        $fecha = $cita->obtenerFecha();
        $hora = $cita->obtenerHora();
        $paciente = $cita->obtenerPaciente();
        $medico = $cita->obtenerMedico();
        $consultorio = $cita->obtenerConsultorio();
        $estado = $cita->obtenerEstado();
//        $observaciones = $cita->obtenerObservaciones();
        $sql = "insert into citas values (null,'$fecha','$hora','$paciente','$medico','$consultorio','$estado')";
        $conexion->consulta($sql);
        $citaId = $conexion->obtenerCitaId();
        $conexion->cerrar();
        return $citaId;
    }
    
    
    public function consultarCitaPorId($id) {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT pacientes.* , medicos.*, consultorios.*, citas.*"
                . "FROM pacientes as pacientes, medicos as medicos, consultorios as consultorios ,citas "
                . "WHERE citas.CitPaciente = pacientes.PacIdentificacion "
                . "AND citas.CitMedico = medicos.MedIdentificacion "
                . "AND citas.CitNumero = $id";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }
    
    public function consultarCitasPorDocumento($doc){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM citas " 
                ."WHERE CitPaciente = '$doc' "
                ."AND CitEstado = 'Solicitada'";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;    
    }
    public function consultaPaciente($doc){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "select * from pacientes where PacIdentificacion = '$doc'";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }
    public function agregarPaciente(Paciente $paciente){
        $conexion = new Conexion();
        $conexion->abrir();
        $identificaion = $paciente->obtenerIdentificacion();
        $nombres = $paciente->obtenerNombres();
        $apellidos = $paciente->obtenerApellidos();
        $fechaNacimiento = $paciente->obtenerFechaNacimiento();
        $sexo = $paciente->obtenerSexo();

        $sql = "insert into pacientes values ('$identificaion','$nombres','$apellidos','$fechaNacimiento','$sexo')";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }
    public function consultarMedicos(){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "select * from medicos";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }
    
    public function consultarHorasDisponibles($medico,$fecha){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT hora FROM horas WHERE hora NOT IN "
                ."(SELECT CitHora FROM citas WHERE CitMedico = '$medico' AND CitFecha = '$fecha'"
                ." AND CitEstado = 'Solicitada')";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;        
    }
    
    public function consultarConsultorios() {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM consultorios";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }
    
    public function cancelarCita($cita) {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE citas SET CitEstado = 'Cancelada' "
                ."WHERE CitNumero = $cita ";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }
}




