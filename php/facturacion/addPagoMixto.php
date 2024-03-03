<?php
session_start();   
include "../funtions.php";
	
//CONEXION A DB
$mysqli = connect_mysqli(); 

$facturas_id = $_POST['factura_id_mixto'];
$fecha = date("Y-m-d");
$fecha_registro = date("Y-m-d H:i:s");
$importe = $_POST['monto_efectivo'];
$cambio = $_POST['cambio_efectivo'];
$empresa_id = $_SESSION['empresa_id'];	
$usuario = $_SESSION['colaborador_id'];			
$tipo_pago_id = 6;//EFECTIVO Y TARJETA (MIXTO)		
$banco_id = 0;//SIN BANCO
$tipo_pago = 1;//1. CONTADO 2. CRÉDITO
$estado = 2;//FACTURA PAGADA
$estado_pago = 1;//ACTIVO
$fecha_registro = date("Y-m-d H:i:s");
$tipoLabel = "Pagos";

$referencia_pago1 = cleanStringConverterCase($_POST['cr_bill']);//TARJETA DE CREDITO
$referencia_pago2 = cleanStringConverterCase($_POST['exp']);//FECHA DE EXPIRACION
$referencia_pago3 = cleanStringConverterCase($_POST['cvcpwd']);//NUMERO DE APROBACIÓN

$activo = 1;//SECUENCIA DE FACTURACION
$efectivo = $_POST['efectivo_bill'];
$tarjeta = 	$_POST['monto_tarjeta'];

//CONSULTAR DATOS DE LA FACTURA
$query_factura = "SELECT  tipo_factura
	FROM facturas
	WHERE facturas_id = '$facturas_id'";
$result_factura = $mysqli->query($query_factura) or die($mysqli->error);
$consultaFactura = $result_factura->fetch_assoc();

$tipo_factura = "";

if($result_factura->num_rows>0){
	$tipo_factura = $consultaFactura['tipo_factura'];
}

if($tipo_factura == 2){
	$tipoLabel = "PagosCredito";
}

//VERIFICAMOS QUE NO SE HA INGRESADO EL PAGO, SI NO SE HA REALIZADO EL INGRESO, PROCEDEMOS A ALMACENAR EL PAGO
$query_factura = "SELECT pagos_id
	FROM pagos
	WHERE facturas_id = '$facturas_id'";
$result_factura = $mysqli->query($query_factura) or die($mysqli->error);	

//SI NO SE HA INGRESADO ALMACENAOS EL PAGO
if($result_factura->num_rows==0){
	$pagos_id  = correlativo('pagos_id', 'pagos');
	$insert = "INSERT INTO pagos 
		VALUES ('$pagos_id','$facturas_id','$tipo_pago','$fecha','$importe','$efectivo','$cambio','$tarjeta','$usuario','$estado_pago','$empresa_id','$fecha_registro')";
	$query = $mysqli->query($insert);	

	if($query){
		//ACTUALIZAMOS LOS DETALLES DEL PAGO
		$pagos_detalles_id  = correlativo('pagos_detalles_id', 'pagos_detalles');
		$insert = "INSERT INTO pagos_detalles 
			VALUES ('$pagos_detalles_id','$pagos_id','$tipo_pago_id','$banco_id','$importe','$referencia_pago1','$referencia_pago2','$referencia_pago3')";
		$query = $mysqli->query($insert);
	
		//ACTUALIZAMOS EL ESTADO DE LA FACTURA
		$update_factura = "UPDATE facturas
			SET
				estado = '$estado'
			WHERE facturas_id = '$facturas_id'";
		$mysqli->query($update_factura) or die($mysqli->error);	

		//CONSULTAMOS EL NUMERO DE LA MUESTRA
		$query_muestra = "SELECT muestras_id
			FROM facturas
			WHERE facturas_id = '$facturas_id'";
		$result_muestras = $mysqli->query($query_muestra) or die($mysqli->error);

		if($result_muestras->num_rows>0){
			$consulta2Muestras = $result_muestras->fetch_assoc();
			$muestras_id = $consulta2Muestras['muestras_id'];

			//ACTUALIZAMOS EL ESTADO DE LA MUESTRA
			$update_muestra = "UPDATE muestras
				SET
					estado = '1'
				WHERE muestras_id = '$muestras_id'";
			$mysqli->query($update_muestra) or die($mysqli->error);
		}

		//CONSULTAMOS EL SALDO ANTERIOR cobrar_clientes
		$query_saldo_cxc = "SELECT saldo FROM cobrar_clientes WHERE facturas_id = '$facturas_id'";
		$result_saldo_cxc = $mysqli->query($query_saldo_cxc) or die($mysqli->error);
		
		if($result_saldo_cxc->num_rows>0){
			$consulta2Saldo = $result_saldo_cxc->fetch_assoc();
			$saldo_cxc = (float)$consulta2Saldo['saldo'];
			$nuevo_saldo = (float)$saldo_cxc - (float)$importe;
			$estado_cxc = 1;
			
			$tolerancia = 0.0001; // Puedes ajustar esta tolerancia según sea necesario
			if (abs($nuevo_saldo) < $tolerancia) {
				$estado_cxc = 2;
			}
			
			//ACTUALIZAR CUENTA POR cobrar_clientes
			$update_ccx = "UPDATE cobrar_clientes 
				SET 
					saldo = '$nuevo_saldo',
					estado = '$estado_cxc'
				WHERE 
					facturas_id = '$facturas_id'";
			$mysqli->query($update_ccx) or die($mysqli->error);					
		}
		
		$datos = array(
			0 => "Guardar", 
			1 => "Pago Realizado Correctamente", 
			2 => "info",
			3 => "btn-primary",
			4 => "formEfectivoBill",
			5 => "Registro",
			6 => $tipoLabel ,//FUNCION DE LA TABLA QUE LLAMAREMOS PARA QUE ACTUALICE (DATATABLE BOOSTRAP)
			7 => "modal_pagos", //Modals Para Cierre Automatico
			8 => $facturas_id, //Modals Para Cierre Automatico
			9 => "Guardar",
		);		
	}else{
		$datos = array(
			0 => "Error", 
			1 => "No se puedo almacenar este registro, los datos son incorrectos por favor corregir", 
			2 => "error",
			3 => "btn-danger",
			4 => "",
			5 => "",			
		);
	}	
}else{
	$datos = array(
		0 => "Error", 
		1 => "Lo sentimos, no se puede almacenar el pago por favor valide si existe un pago para esta factura", 
		2 => "error",
		3 => "btn-danger",
		4 => "",
		5 => "",			
	);
}

echo json_encode($datos);
?>