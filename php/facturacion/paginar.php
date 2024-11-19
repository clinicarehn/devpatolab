<?php
session_start();
include '../funtions.php';

// CONEXION A DB
$mysqli = connect_mysqli();

$colaborador_id = $_SESSION['colaborador_id'];
$type = $_SESSION['type'];
$paginaActual = $_POST['partida'];
$fechai = $_POST['fechai'];
$fechaf = $_POST['fechaf'];
$dato = $_POST['dato'];
$pacientesIDGrupo = $_POST['pacientesIDGrupo'];
$estado = $_POST['estado'];
$usuario = $_SESSION['colaborador_id'];

$busqueda_paciente = '';
$consulta_datos = '';

if ($pacientesIDGrupo != '') {
	$busqueda_paciente = "AND f.pacientes_id = '$pacientesIDGrupo'";
}

if ($dato == !'') {
	$consulta_datos = "AND (CONCAT(p.nombre,' ',p.apellido) LIKE '%$dato%' OR p.apellido LIKE '$dato%' OR p.identidad LIKE '$dato%' OR f.number LIKE '$dato%' OR m.number LIKE '$dato%')";
}

$query = "SELECT f.facturas_id AS 'facturas_id', f.fecha AS 'fecha', p.identidad AS 'identidad', CONCAT(p.nombre,' ',p.apellido) AS 'paciente', sc.prefijo AS 'prefijo', f.number AS 'numero', s.nombre AS 'servicio', CONCAT(c.nombre,'',c.apellido) AS 'profesional', sc.relleno AS 'relleno', DATE_FORMAT(f.fecha, '%d/%m/%Y') AS 'fecha1', f.pacientes_id AS 'pacientes_id', f.cierre AS 'cierre', (CASE WHEN f.tipo_factura = 1 THEN 'Contado' ELSE 'Crédito' END) AS 'tipo_documento', f.tipo_factura, m.number AS 'muestra', f.estado AS 'estado', CONCAT(p.nombre,' ',p.apellido) AS 'empresa', p1.pacientes_id AS 'codigoPacienteEmpresa', f.muestras_id AS 'muestras_id', c.colaborador_id AS 'colaborador_id'
	FROM facturas AS f
	INNER JOIN pacientes AS p
	ON f.pacientes_id = p.pacientes_id
	INNER JOIN secuencia_facturacion AS sc
	ON f.secuencia_facturacion_id = sc.secuencia_facturacion_id
	INNER JOIN servicios AS s
	ON f.servicio_id = s.servicio_id
	INNER JOIN colaboradores AS c
	ON f.colaborador_id = c.colaborador_id
	INNER JOIN muestras AS m
  	ON f.muestras_id = m.muestras_id
	LEFT JOIN muestras_hospitales AS mh
	ON f.muestras_id = mh.muestras_id	
  	LEFT JOIN pacientes As p1
	ON mh.pacientes_id = p1.pacientes_id
	WHERE f.fecha BETWEEN '$fechai' AND '$fechaf' AND f.estado =" . $estado . "
	$busqueda_paciente
  $consulta_datos
	ORDER BY f.number DESC";

$result = $mysqli->query($query) or die($mysqli->error);

$nroLotes = 25;
$nroProductos = $result->num_rows;
$nroPaginas = ceil($nroProductos / $nroLotes);
$lista = '';
$tabla = '';

if ($paginaActual > 1) {
	$lista = $lista . '<li class="page-item"><a class="page-link" href="javascript:pagination(' . (1) . ');void(0);">Inicio</a></li>';
}

if ($paginaActual > 1) {
	$lista = $lista . '<li class="page-item"><a class="page-link" href="javascript:pagination(' . ($paginaActual - 1) . ');void(0);">Anterior ' . ($paginaActual - 1) . '</a></li>';
}

if ($paginaActual < $nroPaginas) {
	$lista = $lista . '<li class="page-item"><a class="page-link" href="javascript:pagination(' . ($paginaActual + 1) . ');void(0);">Siguiente ' . ($paginaActual + 1) . ' de ' . $nroPaginas . '</a></li>';
}

if ($paginaActual > 1) {
	$lista = $lista . '<li class="page-item"><a class="page-link" href="javascript:pagination(' . ($nroPaginas) . ');void(0);">Ultima</a></li>';
}

if ($paginaActual <= 1) {
	$limit = 0;
} else {
	$limit = $nroLotes * ($paginaActual - 1);
}

$registro = "SELECT f.facturas_id AS 'facturas_id', f.fecha AS 'fecha', p.identidad AS 'identidad', CONCAT(p.nombre,' ',p.apellido) AS 'paciente', sc.prefijo AS 'prefijo', f.number AS 'numero', s.nombre AS 'servicio', CONCAT(c.nombre,' ',c.apellido) AS 'profesional', sc.relleno AS 'relleno', DATE_FORMAT(f.fecha, '%d/%m/%Y') AS 'fecha1', f.pacientes_id AS 'pacientes_id', f.cierre AS 'cierre', (CASE WHEN f.tipo_factura = 1 THEN 'Contado' ELSE 'Crédito' END) AS 'tipo_documento', f.tipo_factura, m.number AS 'muestra', f.estado AS 'estado', CONCAT(p.nombre,' ',p.apellido) AS 'empresa', p1.pacientes_id AS 'codigoPacienteEmpresa', f.muestras_id AS 'muestras_id', c.colaborador_id AS 'colaborador_id'
	FROM facturas AS f
	INNER JOIN pacientes AS p
	ON f.pacientes_id = p.pacientes_id
	INNER JOIN secuencia_facturacion AS sc
	ON f.secuencia_facturacion_id = sc.secuencia_facturacion_id
	INNER JOIN servicios AS s
	ON f.servicio_id = s.servicio_id
	INNER JOIN colaboradores AS c
	ON f.colaborador_id = c.colaborador_id
	INNER JOIN muestras AS m
  	ON f.muestras_id = m.muestras_id
	LEFT JOIN muestras_hospitales AS mh
	ON f.muestras_id = mh.muestras_id	
	LEFT JOIN pacientes As p1
	ON mh.pacientes_id = p1.pacientes_id
	WHERE f.fecha BETWEEN '$fechai' AND '$fechaf' AND f.estado =" . $estado . "
	$busqueda_paciente
  $consulta_datos
	ORDER BY f.number DESC
	LIMIT $limit, $nroLotes";
$result = $mysqli->query($registro) or die($mysqli->error);

$estado_ = "";
$texto1 = "";
$texto2 = "";

if($estado == 1){
	$estado_ = "Borrador";
	$texto1 = "Facturar";
	$texto2 = "Eliminar";
}else if($estado == 2){
	$estado_ = "Pagada";
	$texto1 = "Enviar";
	$texto2 = "Imprimir";
}else if($estado == 4){
	$estado_ = "Crédito";
	$texto1 = "Imprimir";
	$texto2 = "Cobrar";
}else{
	$estado_ = "Cancelada";
	$texto1 = "Imprimir";
}

$tabla = $tabla . '<table class="table table-striped table-condensed table-hover">
			<tr>
			<th width="2.66%"><input id="checkAllFactura" class="formcontrol" type="checkbox"></th>
			<th width="2.66%">No.</th>
			<th width="4.66%">Fecha</th>
			<th width="7.66%">Muestra</th>
			<th width="8.66%">Factura</th>
			<th width="8.66%">Empresa</th>
			<th width="6.66%">Identidad</th>
			<th width="6.66%">Profesional</th>
			<th width="6.66%">Importe</th>
			<th width="6.66%">ISV</th>
			<th width="6.66%">Descuento</th>
			<th width="6.66%">Neto</th>
			<th width="3.66%">Estado</th>
			<th width="8.66%">'.$texto1.'</th>
			<th width="8.66%">'.$texto2.'</th>
			</tr>';
$i = 1;
$cierre_ = '';
$fila = 0;
while ($registro2 = $result->fetch_assoc()) {
	$facturas_id = $registro2['facturas_id'];
	// CONSULTAR DATOS DETALLE DE Factura
	$query_detalle = "SELECT precio, descuento, cantidad, isv_valor
		FROM facturas_detalle
		WHERE facturas_id = '$facturas_id'";
	$result_detalles = $mysqli->query($query_detalle) or die($mysqli->error);

	$cantidad = 0;
	$descuento = 0;
	$precio = 0;
	$total_precio = 0;
	$total = 0;
	$isv_neto = 0;
	$neto_antes_isv = 0;
	$total_neto_general = 0;
	$cantidad_ = 0;

	while($registrodetalles = $result_detalles->fetch_assoc()){
		$precio += $registrodetalles["precio"];
		$cantidad += $registrodetalles["cantidad"];
		$descuento += $registrodetalles["descuento"];
		$total_precio = $registrodetalles["precio"] * $registrodetalles["cantidad"];
		$neto_antes_isv += $total_precio;
		$isv_neto += $registrodetalles["isv_valor"];
		$cantidad_ = $registrodetalles["cantidad"];
	}

	$total = ($neto_antes_isv + $isv_neto) - $descuento;

	if ($registro2['numero'] != '' && $registro2['numero'] != 0) {
		$numero = $registro2['prefijo'] . '' . rellenarDigitos($registro2['numero'], $registro2['relleno']);
	} else {
		$numero = 'Aún no se ha generado';
	}

	$cierre = $registro2['cierre'];

	if ($cierre == 1) {
		$cierre_ = '<a style="text-decoration:none; pointer-events: none; cursor: default;" data-toggle="tooltip" data-placement="right" href="#" class="fas fa-check-double fa-lg" title="La factura ha sido cerrada"></a>';
	} else {
		$cierre_ = '<a style="text-decoration:none; pointer-events: none; cursor: default;" data-toggle="tooltip" data-placement="right" href="#" class="fas fa-check fa-lg" title="No se ha cerrado la factura"></a>';
	}

	$estado = $registro2['estado'];
	$factura = '';
	$factura1 = '';
	$eliminar = '';
	$pay = '';
	$send_mail = '';
	$pay_credit = '';
	$factura2 = '';

	if ($estado == 1) {
		$eliminar = '<a class="btn btn btn-secondary ml-2" href="javascript:deleteBill(' . $registro2['facturas_id'] . ');void(0);"><div class="sb-nav-link-icon"></div><i class="fas fa-trash fa-lg"></i> Eliminar</a>';
	}

	if ($estado == 3) {
		$factura = '<a class="btn btn btn-secondary ml-2" href="javascript:printBill(' . $registro2['facturas_id'] . ');void(0);"><div class="sb-nav-link-icon"></div><i class="fas fa-print fa-lg"></i> Imprimir</a>';
	}

	if ($estado == 2) {
		$factura1 = '<a class="btn btn btn-secondary ml-2" href="javascript:printBill(' . $registro2['facturas_id'] . ');void(0);"><div class="sb-nav-link-icon"></div><i class="fas fa-print fa-lg"></i> Imprimir</a>';
	}

	if ($estado == 2) {
		$send_mail = '<a class="btn btn btn-secondary ml-2" href="javascript:mailBill(' . $registro2['facturas_id'] . ');void(0);"><div class="sb-nav-link-icon"></div><i class="far fa-paper-plane fa-lg" title="Enviar Factura por Correo"></i> Enviar</a>';
	}

	if ($estado == 4) {
		$pay_credit = '<a class="btn btn btn-secondary ml-2" href="javascript:pago(' . $registro2['facturas_id'] . ');void(0);"><div class="sb-nav-link-icon"></div><i class="fab fa-amazon-pay fa-lg" title="Pagar Factura"></i> Cobrar</a>';
		$factura2 = '<a class="btn btn btn-secondary ml-2" href="javascript:printBill(' . $registro2['facturas_id'] . ');void(0);"><div class="sb-nav-link-icon"></div><i class="fas fa-print fa-lg"></i> Imprimir</a>';
	}

	if ($estado == 1) {
		$pay = '<a class="btn btn btn-secondary ml-2" href="javascript:pay(' . $registro2['facturas_id'] . ');void(0);"><div class="sb-nav-link-icon"></div><i class="fas fa-file-invoice fa-lg"></i> Facturar</a>';
	}

	$paciente = $registro2['paciente'];
	$empresa = "";
	if($paciente != ""){
		$empresa = $registro2['empresa']." (<b>Paciente</b>: ".$paciente.")";
	}else{
		$empresa = $registro2['empresa'];
	}

	$paciente_empresa = $registro2['codigoPacienteEmpresa'];
	$muestras_id = $registro2['muestras_id'];
	$profesional = $registro2['profesional'];
	$colaborador_id = $registro2['colaborador_id'];

	$tabla = $tabla.'<tr>
			<td><input class="itemRowFactura" type="checkbox" name="itemFactura" id="itemFactura_'.$fila.'" value="'.$facturas_id.'"></td>
			<td>'.$i.'</td>
			<td>'.$registro2['fecha'].'</td>
			<td>'.$registro2['muestra'].'</td>
			<td>'.$numero.'</td>
			<td>'.$empresa.'</td>
			<td>'.$registro2['identidad'].'</td>
			<td>'.$registro2['profesional'].'</td>
            <td>'.number_format($precio,2).'</td>
            <td>'.number_format($isv_neto,2).'</td>
			<td>'.number_format($descuento,2).'</td>
			<td>
				<div name="quantyGrupoQuantityValor" id="quantyGrupoQuantityValor_'.$facturas_id.'" data-value='.$cantidad_.'></div>
				<div name="profesionalIDGrupo" id="profesionalIDGrupo_'.$facturas_id.'" data-value='.$colaborador_id.'></div>
				<div name="muestraGrupo" id="muestraGrupo_'.$facturas_id.'" data-value='.$muestras_id.'></div>
				<div name="codigoFacturaGrupo" id="codigoFacturaGrupo_'.$facturas_id.'" data-value='.$facturas_id.'></div>
				<div name="pacientesIDFacturaGrupo" id="pacientesIDFacturaGrupo_'.$facturas_id.'" data-value='.$paciente_empresa.'></div>
				<div name="importeFacturaGrupo" id="importeFacturaGrupo_'.$facturas_id.'" data-value='.$total.'></div>'.number_format($total,2).'
				<div name="ISVFacturaGrupo" id="precioFacturaGrupo_'.$facturas_id.'" data-value='.$precio.'></div>
				<div name="ISVFacturaGrupo" id="ISVFacturaGrupo_'.$facturas_id.'" data-value='.$isv_neto.'></div>
				<div name="DescuentoFacturaGrupo" id="DescuentoFacturaGrupo_'.$facturas_id.'" data-value='.$descuento.'></div>
				<div name="DescuentoFacturaGrupo" id="netoAntesISVFacturaGrupo_'.$facturas_id.'" data-value='.$neto_antes_isv.'></div>
				</td>
			<td>'.$estado_.'</td>
			<td>
			  '.$pay.'
				'.$send_mail.'
				'.$factura.'
				'.$factura2.'
			</td>
			<td>
				'.$pay_credit.'
				'.$eliminar.'
				'.$factura1.'
			</td>

			</tr>';
			$i++;
			$fila++;
}

if ($nroProductos == 0) {
	$tabla = $tabla . "<tr>
\t   <td colspan=\"15\" style=\"color:#C7030D\">No se encontraron resultados, seleccione un profesional para verificar si hay registros almacenados</td>
	</tr>";
} else {
	$tabla = $tabla . "<tr>
\t  <td colspan=\"15\"><b><p ALIGN=\"center\">Total de Registros Encontrados " . $nroProductos . '</p></b>
   </tr>';
}

$tabla = $tabla . '</table>';

$array = array(0 => $tabla,
	1 => $lista);

echo json_encode($array);

$result->free();  // LIMPIAR RESULTADO
$mysqli->close();  // CERRAR CONEXIÓN
?>
