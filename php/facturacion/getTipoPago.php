<?php
session_start();   
include "../funtions.php";
	
//CONEXION A DB
$mysqli = connect_mysqli();

//CONSULTA LOS DATOS DE LA ENTIDAD CORPORACION
$consulta = "SELECT tipo_pago_id, nombre FROM tipo_pago";
$result = $mysqli->query($consulta) or die($mysqli->error);			  

if($result->num_rows>0){
	while($consulta2 = $result->fetch_assoc()){
		echo '<option value="'.$consulta2['tipo_pago_id'].'">'.$consulta2['nombre'].'</option>';
	}
}

$result->free();//LIMPIAR RESULTADO
$mysqli->close();//CERRAR CONEXIÓN
?>


               
			   
               