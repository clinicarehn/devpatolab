<?php	
	session_start();   
	include "../funtions.php";

	//CONEXION A DB
	$mysqli = connect_mysqli(); 

	$query = "SELECT c.clientes_id AS 'clientes_id', c.nombre AS 'nombre'
		FROM cobrar_clientes AS cc
		INNER JOIN clientes AS c
		ON cc.clientes_id = c.clientes_id
		GROUP BY c.nombre";
	$result = $mysqli->query($query);	
	
	if($result->num_rows>0){
		while($consulta2 = $result->fetch_assoc()){
			 echo '<option value="'.$consulta2['clientes_id'].'">'.$consulta2['nombre'].'</option>';
		}
	}else{
		echo '<option value="">Seleccione</option>';
	}
?>	