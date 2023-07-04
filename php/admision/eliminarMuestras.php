<?php
session_start();
include "../funtions.php";

//CONEXION A DB
$mysqli = connect_mysqli();

$muestras_id = $_POST['muestras_id'];
$pacientes_id = $_POST['pacientes_id'];
$usuario = $_SESSION['colaborador_id'];

//VERIFICAMOS SI EL REGISTRO CUENTA CON INFORMACION ALMACENADA
$consultar_factura = "SELECT facturas_id
		FROM facturas
		WHERE muestras_id = '$muestras_id'";
$result = $mysqli->query($consultar_factura);

//CONSULTAMOS EL NUMERO DE LA MUESTRA
$consultar_muestra= "SELECT number
		FROM muestras
		WHERE muestras_id = '$muestras_id'";
$resultMuestras = $mysqli->query($consultar_muestra);
$consultaMuestras = $resultMuestras->fetch_assoc();
$NumeroMuestra = $consultaMuestras['number'];

//CONSULTAMOS EL NOMBRE DEL USUARIO DEL SISTEMA
$consultar_colaborador = "SELECT CONCAT(nombre, ' ', apellido) AS 'colaborador'
	FROM colaboradores
	WHERE colaborador_id = '$usuario'";
$resultColaborador = $mysqli->query($consultar_colaborador);
$consultaColaborador = $resultColaborador->fetch_assoc();
$NombreColaborador = $consultaColaborador['colaborador'];

if($result->num_rows==0){
	//HISTORIAL DE PACIENTES, CONSULTAR EXPEDIENTE
	$consulta_expediente = "SELECT *
		FROM pacientes
		WHERE pacientes_id = '$pacientes_id'";
	$resultPaciente = $mysqli->query($consulta_expediente);
	$consulta_expediente1 = $resultPaciente->fetch_assoc();

	if($resultPaciente->num_rows>0){
		$expediente = $consulta_expediente1['expediente'];
		$nombre = $consulta_expediente1['nombre'];
		$apellido = $consulta_expediente1['apellido'];
		$sexo = $consulta_expediente1['genero'];
		$telefono1 = $consulta_expediente1['telefono1'];
		$telefono2 = $consulta_expediente1['telefono2'];
		$fecha_nacimiento = $consulta_expediente1['fecha_nacimiento'];
		$correo = $consulta_expediente1['email'];
		$fecha = $consulta_expediente1['fecha'];
		$departamento_id = $consulta_expediente1['departamento_id'];
		$municipio_id = $consulta_expediente1['municipio_id'];
		$localidad = $consulta_expediente1['localidad'];
		$religion_id = $consulta_expediente1['religion_id'];
		$profesion_id = $consulta_expediente1['profesion_id'];
		$identidad = $consulta_expediente1['identidad'];
		$usuario = $_SESSION['colaborador_id'];
		$estado = 1; //1. Activo 2. Inactivo
		$fecha_registro = date("Y-m-d H:i:s");
		$observacion = "Se elimino la muestra numero: $NumeroMuestra, por el usuario: $NombreColaborador";

		$pacientes_id_historial = correlativo('historial_id', 'historial_pacientes');
		$insert = "INSERT INTO historial_pacientes VALUES ('$pacientes_id_historial','$pacientes_id','$expediente','$identidad','$nombre','$apellido','$sexo','$telefono1','$telefono2','$fecha_nacimiento','$correo','$fecha','$departamento_id','$municipio_id','$localidad','$religion_id','$profesion_id','$usuario','$estado','$observacion','$fecha_registro')";
		$mysqli->query($insert);
		//HISTORIAL DE PACIENTES
	}

	$delete = "DELETE FROM muestras WHERE muestras_id = '$muestras_id'";
	$mysqli->query($delete);

	if($delete){
		echo 1;//REGISTRO ELIMINADO CORRECTAMENTE
	}else{
		echo 2;//ERROR AL PROCESAR SU SOLICITUD
	}
}else{
	echo 3;//ESTE REGISTRO CUENTA CON INFORMACIÓN, NO SE PUEDE ELIMINAR
}

$result->free();//LIMPIAR RESULTADO
$mysqli->close();//CERRAR CONEXIÓN
?>
