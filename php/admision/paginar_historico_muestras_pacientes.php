<?php 
session_start();   
include "../funtions.php";
	
//CONEXION A DB
$mysqli = connect_mysqli();

$colaborador_id = $_SESSION['colaborador_id'];
$paginaActual = $_POST['partida'];
$pacientes_id = $_POST['pacientes_id'];
	
$where = "WHERE mh.pacientes_id = '$pacientes_id'";

$query = "SELECT p.pacientes_id As 'pacientes_id', CONCAT(p.nombre, ' ', p.apellido) As 'paciente', m.fecha AS 'fecha', m.diagnostico_clinico AS 'diagnostico_clinico', m.material_eviando As 'material_eviando', m.datos_clinico As 'datos_clinico',
(CASE WHEN m.estado = '1' THEN 'Atendido' ELSE 'Pendiente' END) AS 'estatus', m.muestras_id  As 'muestras_id', m.mostrar_datos_clinicos As 'mostrar_datos_clinicos', m.number AS 'numero', CONCAT(p1.nombre, ' ', p1.apellido) As 'empresa'
	FROM muestras_hospitales AS mh
	INNER JOIN pacientes AS p
	ON mh.pacientes_id = p.pacientes_id
	INNER JOIN muestras AS m
	ON mh.muestras_id = m.muestras_id
   	INNER JOIN pacientes AS p1
    ON m.pacientes_id = p1.pacientes_id
	".$where."
	ORDER BY m.fecha DESC";	

$result = $mysqli->query($query) or die($mysqli->error);

$nroLotes = 5;
$nroProductos = $result->num_rows;
$nroPaginas = ceil($nroProductos/$nroLotes);
$lista = '';
$tabla = '';

if($paginaActual > 1){
	$lista = $lista.'<li class="page-item"><a class="page-link" href="javascript:historiaMuestrasPacientes('.(1).');void(0);">Inicio</a></li>';
}

if($paginaActual > 1){
	$lista = $lista.'<li class="page-item"><a class="page-link" href="javascript:historiaMuestrasPacientes('.($paginaActual-1).');void(0);">Anterior '.($paginaActual-1).'</a></li>';
}

if($paginaActual < $nroPaginas){
	$lista = $lista.'<li class="page-item"><a class="page-link" href="javascript:historiaMuestrasPacientes('.($paginaActual+1).');void(0);">Siguiente '.($paginaActual+1).' de '.$nroPaginas.'</a></li>';
}

if($paginaActual > 1){
	$lista = $lista.'<li class="page-item"><a class="page-link" href="javascript:historiaMuestrasPacientes('.($nroPaginas).');void(0);">Ultima</a></li>';
}

if($paginaActual <= 1){
	$limit = 0;
}else{
	$limit = $nroLotes*($paginaActual-1);
}

$registro = "SELECT p.pacientes_id As 'pacientes_id', CONCAT(p.nombre, ' ', p.apellido) As 'paciente', m.fecha AS 'fecha', m.diagnostico_clinico AS 'diagnostico_clinico', m.material_eviando As 'material_eviando', m.datos_clinico As 'datos_clinico',
(CASE WHEN m.estado = '1' THEN 'Atendido' ELSE 'Pendiente' END) AS 'estatus', m.muestras_id  As 'muestras_id', m.mostrar_datos_clinicos As 'mostrar_datos_clinicos', m.number AS 'numero', CONCAT(p1.nombre, ' ', p1.apellido) As 'empresa'
	FROM muestras_hospitales AS mh
	INNER JOIN pacientes AS p
	ON mh.pacientes_id = p.pacientes_id
	INNER JOIN muestras AS m
	ON mh.muestras_id = m.muestras_id
   	INNER JOIN pacientes AS p1
    ON m.pacientes_id = p1.pacientes_id
	".$where."
	ORDER BY m.fecha DESC
	LIMIT $limit, $nroLotes";
$result = $mysqli->query($registro) or die($mysqli->error);


$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			<tr>
			<th width="1.3%">No.</th>
			<th width="10.3%">Fecha</th>
			<th width="15.3%">Número</th>			
			<th width="24.3%">Paciente</th>
			<th width="16.3%">Diagnostico Clínico</th>
			<th width="16.3%">Material Enviado</th>
			<th width="16.3%">Datos Clínicos</th>
			</tr>';
$i = 1;				
while($registro2 = $result->fetch_assoc()){ 
	$empresa = $registro2['empresa']." (<b>Paciente:</b> ".$registro2['paciente'].")";
	
	$tabla = $tabla.'<tr>
			<td>'.$i.'</td> 
			<td>'.$registro2['fecha'].'</td>	
			<td>'.$registro2['numero'].'</td>			
			<td>'.$empresa.'</td>	
			<td>'.$registro2['diagnostico_clinico'].'</td>
			<td>'.$registro2['material_eviando'].'</td>
            <td>'.$registro2['datos_clinico'].'</td>		
			</tr>';	
			$i++;				
}

if($nroProductos == 0){
	$tabla = $tabla.'<tr>
	   <td colspan="12" style="color:#C7030D">No se encontraron resultados</td>
	</tr>';		
}else{
   $tabla = $tabla.'<tr>
	  <td colspan="12"><b><p ALIGN="center">Total de Registros Encontrados: '.$nroProductos.'</p></b>
   </tr>';		
}        

$tabla = $tabla.'</table>';

$array = array(0 => $tabla,
			   1 => $lista);

echo json_encode($array);

$result->free();//LIMPIAR RESULTADO
$mysqli->close();//CERRAR CONEXIÓN	
?>