<!--INICIO MODAL PACIENTES-->
<div class="modal fade" id="modal_busqueda_pacientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda de Pacientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_pacientes">		
				<div class="table-responsive">
					<table id="dataTablePacientes" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Paciente</th>
								<th>Identidad</th>
								<th>Expediente</th>
								<th>Correo</th>						
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL PACIENTES-->

<!--INICIO MODAL COLABORADORES-->

<!--INICIO MODAL PARA EL INGRESO DE PACIENTES-->
<div class="modal fade" id="modal_pacientes">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Clientes</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div>
        <div class="modal-body">		
			<form class="FormularioAjax" id="formulario_pacientes" data-async data-target="#rating-modal" action="" method="POST" data-form="" autocomplete="off" enctype="multipart/form-data">			
				<div class="form-row">
					<div class="col-md-12 mb-3">
					    <input type="hidden" required readonly id="pacientes_id" name="pacientes_id" />	
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row" id="grupo_expediente">
					<div class="col-md-6 mb-3">
					  <label for="expedoente">Expediente</label>
				     <input type="number" name="expediente" class="form-control" id="expediente" placeholder="Expediente o Identidad">
					</div>
					<div class="col-md-6 mb-3">
					  <label for="edad">Edad</label>
					  <input type="text" class="form-control" name="edad_editar" id="edad_editar" maxlength="100" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" readonly="readonly"/>
					</div>				
				</div>				
				<div class="form-row">
					<div class="col-md-4 mb-3">
					  <label for="nombre">Nombre <span class="priority">*<span/></label>
					  <input type="text" required id="name" name="name" placeholder="Nombre" class="form-control"/>
					</div>
					<div class="col-md-4 mb-3">
					  <label for="apellido">Apellido <span class="priority">*<span/></label>
					  <input type="text" required id="lastname" name="lastname" placeholder="Apellido" class="form-control"/>
					</div>
					<div class="col-md-4 mb-3">
					  <label for="fecha">Identidad o RTN <span class="priority">*<span/></label>
					  <input type="number" required id="rtn" name="rtn" class="form-control" placeholder="Identidad o RTN" maxlength="14" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
					</div>										
				</div>	
				<div class="form-row">				
					<div class="col-md-4 mb-3">
					  <label for="telefono">Edad <span class="priority">*<span/></label>
					  <input type="number" id="edad" name="edad" class="form-control" placeholder="Edad" maxlength="3" required oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
					</div>					
					<div class="col-md-4 mb-3">
					  <label for="telefono">Teléfono 1 <span class="priority">*<span/></label>
					  <input type="number" id="telefono1" name="telefono1" class="form-control" placeholder="Primer Teléfono" required maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
					</div>
					<div class="col-md-4 mb-3">
					  <label for="telefono">Teléfono 2</label>
					  <input type="number" id="telefono2" name="telefono2" class="form-control" placeholder="Segundo Teléfono" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
					</div>						
				</div>	
				<div class="form-row" style="display: none;">
					<div class="col-md-4 mb-3">
					  <label for="sexo">Fecha de Nacimiento <span class="priority">*<span/></label>
					  <input type="date" required id="fecha_nac" name="fecha_nac" value="<?php echo date ("Y-m-d");?>" class="form-control"/>
					</div>				
					<div class="col-md-4 mb-3">
					  <label for="sexo">Profesión <span class="priority">*<span/></label>
					  <div class="input-group mb-3">
						  <select id="profesion" name="profesion" class="custom-select" data-toggle="tooltip" data-placement="top" title="Profesión">
								<option value="">Seleccione</option>
						  </select>
						  <div class="input-group-append" id="buscar_profesion_pacientes">				
							<a data-toggle="modal" href="#" class="btn btn-outline-success" id="servicio_boton"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
						  </div>
					   </div>					  
					</div>
					<div class="col-md-4 mb-3">
					  <label for="telefono">Religión <span class="priority">*<span/></label>
					  <div class="input-group mb-3">
						  <select id="religion" name="religion" class="custom-select" data-toggle="tooltip" data-placement="top" title="Religión">
							<option value="">Seleccione</option>
						  </select>
						  <div class="input-group-append" id="buscar_religion_pacientes">				
							<a data-toggle="modal" href="#" class="btn btn-outline-success" id="servicio_boton"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
						  </div>
					   </div>
					</div>					
				</div>					
				<div class="form-row">
					<div class="col-md-4 mb-3">
					  <label for="sexo">Sexo <span class="priority">*<span/></label>
					  <select class="custom-select" id="sexo" name="sexo" required data-toggle="tooltip" data-placement="top" title="Sexo">	
						 <option value="">Seleccione</option>
					  </select>
					</div>				
					<div class="col-md-4 mb-3">
					  <label for="sexo">Departamentos</label>
					  <div class="input-group mb-3">
						  <select id="departamento" name="departamento" class="custom-select" data-toggle="tooltip" data-placement="top" title="Religión">
							<option value="">Seleccione</option>
						  </select>
						  <div class="input-group-append" id="buscar_departamento_pacientes">				
							<a data-toggle="modal" href="#" class="btn btn-outline-success" id="servicio_boton"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
						  </div>
					   </div>					  
					</div>
					<div class="col-md-4 mb-3">
					  <label for="telefono">Municipios</label>
					  <div class="input-group mb-3">
						  <select id="municipio" name="municipio" class="custom-select" data-toggle="tooltip" data-placement="top" title="Religión">
							<option value="">Seleccione</option>
						  </select>
						  <div class="input-group-append" id="buscar_municipio_pacientes">				
							<a data-toggle="modal" href="#" class="btn btn-outline-success" id="servicio_boton"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
						  </div>
					   </div>
					</div>					
				</div>	
				<div class="form-row">			
					<div class="col-md-4 mb-3">
					  <label for="sexo">Tipo <span class="priority">*<span/></label>
					  <div class="input-group mb-3">
						  <select id="paciente_tipo" name="paciente_tipo" class="custom-select" data-toggle="tooltip" data-placement="top" title="Tipo Cliente">
								<option value="">Seleccione</option>
						  </select>
						  <div class="input-group-append" id="buscar_profesion_pacientes">				
							<a data-toggle="modal" href="#" class="btn btn-outline-success" id="servicio_boton"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
						  </div>
					   </div>					  
					</div>				
				</div>					
				<div class="form-row">			  
					<div class="col-md-12 mb-3">
					  <label for="direccion">Dirección</label>
					  <input type="text" 
					 id="direccion" name="direccion" data-toggle="tooltip" data-placement="top" placeholder="Dirección Exacta" class="form-control" maxlength="150" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
					</div>
				</div>	

				<div class="form-row">			  
					<div class="col-md-12 mb-3">
					  <label for="telefono_proveedores">Correo</label>
					  <input type="email" name="correo" id="correo" placeholder="alguien@algo.com" class="form-control" data-toggle="tooltip" data-placement="top" title="Este correo será utilizado para enviar las citas creadas y las reprogramaciones, como las notificaciones de las citas pendientes de los usuarios." maxlength="100"/><label id="validate"></label>
					</div>
				</div>					
			</form>
        </div>		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" form="formulario_pacientes" type="submit" id="reg"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>			
		</div>			
      </div>
    </div>
</div>	
<!--FIN MODAL PARA EL INGRESO DE PACIENTES-->

<!--INFORMACIÓN DE MUESTRAS-->
<div class="modal fade" id="modal_historico_muestras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Histórico de Muestras</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="form-group">
		  <div class="col-sm-12">
			<input type="hidden" readonly id="pacientes_id_muestras" name="pacientes_id_muestras" class="form-control"/>
			<div class="registros overflow-auto" id="detalles-historico-muestras"></div>
		   </div>		   
		</div>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center" id="pagination-historico-muestras"></ul>
		</nav>
      </div>
	  <div class="modal-footer">
		<button class="btn btn-success ml-2" type="submit" id="okay" data-dismiss="modal"><div class="sb-nav-link-icon"></div><i class="fas fa-thumbs-up fa-lg"></i> Okay</button>					
	  </div>	  
    </div>
  </div>
</div>

<!--INICIO MODAL CIERRE DE CAJA-->
<div class="modal fade" id="modalCierreCaja">
	<div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Cierre de Caja</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div>
        <div class="modal-body">		
			<form class="FormularioAjax" id="formularioCierreCaja" data-async data-target="#rating-modal" action="" method="POST" data-form="" autocomplete="off" enctype="multipart/form-data">			
				<div class="form-row">
					<div class="col-md-12 mb-3">
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>	
				<div class="form-row">
					<div class="col-md-12 mb-3">
					  <label>Fecha <span class="priority">*<span/></label>
					  <input type="date" required id="fechaCierreCaja" name="fechaCierreCaja" value="<?php echo date ("Y-m-d");?>" class="form-control" />					  
					</div>									
				</div>					
			</form>
        </div>		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" type="submit" id="generarCierreCaja" form="formularioCierreCaja"><div class="sb-nav-link-icon"></div><i class="fas fa-cash-register fa-lg"></i> Generar</button>		
		</div>			
      </div>
    </div>
</div>
<!--FIN MODAL CIERRE DE CAJA-->

<!--INICIO MODAL PACIENTES-->
<div class="modal fade" id="modal_busqueda_colaboradores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda de Colaboradores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_coloboradores">		
				<div class="table-responsive">
					<table id="dataTableColaboradores" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Colaborador</th>
								<th>Identidad</th>
								<th>Puesto</th>	
								<th>Editar</th>									
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL PACIENTES-->

<!--INICIO MODAL COLABORADORES-->
<div class="modal fade" id="registrar_colaboradores">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Colaboradores</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div><div class="container"></div>
        <div class="modal-body">		
			<form class="FormularioAjax" id="formulario_colaboradores" action="" method="POST" data-form="" autocomplete="off" enctype="multipart/form-data">			
				<div class="form-row">
					<div class="col-md-12 mb-3">
					    <input type="hidden" required readonly id="colaborador_id" name="colaborador_id" />
					    <input type="hidden" id="id-registro" name="id-registro" class="form-control"/>
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row" id="grupo_expediente">
					<div class="col-md-4 mb-3">
					  <label for="expedoente">Nombre <span class="priority">*<span/></label>
				      <input type="text" required name="nombre" id="nombre" maxlength="100" class="form-control"/>
					</div>
					<div class="col-md-4 mb-3">
					  <label for="edad">Apellido <span class="priority">*<span/></label>
					  <input type="text" required name="apellido" id="apellido" maxlength="100" class="form-control"/>
					</div>
					<div class="col-md-4 mb-3">
					  <label for="edad">Identidad <span class="priority">*<span/></label>
					  <input type="text" required name="identidad" id="identidad" maxlength="100" class="form-control" data-toggle="tooltip" data-placement="top" title="Este número de Identidad debe estar exactamente igual al que se registro en Odoo en la ficha del Colaborador"/>
					</div>				
				</div>				
				<div class="form-row">
					<div class="col-md-4 mb-3">
					  <label for="nombre">Empresa <span class="priority">*<span/></label>
					  <select id="empresa" name="empresa" class="form-control" data-toggle="tooltip" data-placement="top" title="Seleccione la Empresa" required>		   
                      </select>
					</div>
					<div class="col-md-4 mb-3">
					  <label for="apellido">Puesto <span class="priority">*<span/></label>
					  <select id="puesto" name="puesto" class="form-control" data-toggle="tooltip" data-placement="top" title="Seleccione el Puesto" required>		   
					  </select>
					</div>
					<div class="col-md-4 mb-3">
					  <label for="fecha">Estatus <span class="priority">*<span/></label>
					  <select id="estatus" name="estatus" class="form-control" data-toggle="tooltip" data-placement="top" title="Estatus" required>		   
                      </select>
					</div>					
				</div>								  
			</form>
        </div>
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" type="submit" id="reg_colaboradores" form="formulario_colaboradores"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>
			<button class="btn btn-warning ml-2" type="submit" id="edi_colaboradores" form="formulario_colaboradores"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Modificar</button>			
		</div>			
      </div>
    </div>
</div>	
<!--FIN MODAL COLABORADORES-->

<!--INICIO MODAL MOVIMIENTO DE PRODUCTOS-->
<div class="modal fade" id="modal_movimientos">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Movimiento de Productos</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div>
        <div class="modal-body">		
			<form class="FormularioAjax" id="formularioMovimientos" data-async data-target="#rating-modal" action="" method="POST" data-form="" autocomplete="off" enctype="multipart/form-data">			
				<div class="form-row">
					<div class="col-md-12 mb-3">
					    <input type="hidden" id="movimientos_id " name="movimientos_id " class="form-control"/>
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
					  <label>Categoría <span class="priority">*<span/></label>
					  <select id="movimiento_categoria" name="movimiento_categoria" class="custom-select" data-toggle="tooltip" data-placement="top" title="Categoría Productos" required>
							<option value="">Seleccione</option>
					  </select>					  
					</div>
					<div class="col-md-6 mb-3">
					  <label>Productos <span class="priority">*<span/></label>
					  <div class="input-group mb-3">
						  <select id="movimiento_producto" name="movimiento_producto" class="custom-select" data-toggle="tooltip" data-placement="top" title="Productos" required>
								<option value="">Seleccione</option>
						  </select>
						  <div class="input-group-append" id="buscar_productos">				
							<a data-toggle="modal" href="#" class="btn btn-outline-success"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
						  </div>
					   </div>					  
					</div>										
				</div>	
				<div class="form-row">
					<div class="col-md-6 mb-3">
					  <label>Tipo de Operación <span class="priority">*<span/></label>
					  <select id="movimiento_operacion" name="movimiento_operacion" class="custom-select" data-toggle="tooltip" data-placement="top" title="Tipo Operación" required>
						 <option value="">Seleccione</option>
					  </select>					  
					</div>
					<div class="col-md-6 mb-3">
					  <label>Cantidad <span class="priority">*<span/></label>
					  <input type="number" required id="movimiento_cantidad" name="movimiento_cantidad" class="form-control" required>				  
					</div>										
				</div>			
			</form>
        </div>		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" type="submit" id="modal_movimientos" form="formularioMovimientos"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>		
		</div>			
      </div>
    </div>
</div>
<!--FIN MODAL MOVIMIENTO DE PRODUCTOS-->

<!--INICIO MODAL PARA INGRESO DE PLANTILLAS-->
<div class="modal fade" id="modal_plantillas">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Registro de Plantillas</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div>
        <div class="modal-body">		
			<form class="FormularioAjax" id="formularioPlantillas" data-async data-target="#rating-modal" action="" method="POST" data-form="" autocomplete="off" enctype="multipart/form-data">			
				<div class="form-row">
					<div class="col-md-12 mb-3">
					   <input type="hidden" id="plantillas_id" name="plantillas_id" class="form-control"/>	
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row" id="grupo_expediente">
					<div class="col-md-5 mb-3">
					  <label>Atipo de tención <span class="priority">*<span/></label>
					  <div class="input-group mb-3">
						  <select id="plantilla_atencion" name="plantilla_atencion" class="custom-select" data-toggle="tooltip" data-placement="top" title="Tipo de Atención" required>
								<option value="">Seleccione</option>
						  </select>
						  <div class="input-group-append" id="buscar_plantilla_atenciones">				
							<a data-toggle="modal" href="#" class="btn btn-outline-success"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
						  </div>
					   </div>						  
					</div>	
					<div class="col-md-7 mb-3">
					  <label>Asunto <span class="priority">*<span/></label>
					  <input type="text" required name="plantilla_asunto" id="plantilla_asunto" maxlength="100" class="form-control" required>
					</div>					
				</div>				
				<div class="form-row">
					<div class="col-md-12 mb-3">
					  <label>Descripción</label>
					  <textarea id="plantilla_descripcion" name="plantilla_descripcion" placeholder="Descripción" class="form-control" maxlength="10000" rows="10" required></textarea>	
				      <p id="charNum_plantilla_descripcion">3200 Caracteres</p>
					</div>				
				</div>				
			</form>
        </div>		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" type="submit" id="reg_plantilla" form="formularioPlantillas"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>
			<button class="btn btn-warning ml-2" type="submit" id="edi_plantilla" form="formularioPlantillas"><div class="sb-nav-link-icon"></div><i class="fas fa-edit fa-lg"></i> Editar</button>
			<button class="btn btn-danger ml-2" type="submit" id="delete_plantilla" form="formularioPlantillas"><div class="sb-nav-link-icon"></div><i class="fa fa-trash"></i> Eliminar</button>			
		</div>			
      </div>
    </div>
</div>
<!--FIN MODAL PARA INGRESO DE PLANTILLAS-->

<!--INICIO MODAL PARA INGRESO DE USUARIOS-->
<div class="modal fade" id="registrar">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Registro de Usuarios</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div>
        <div class="modal-body">		
			<form class="FormularioAjax" id="formulario" data-async data-target="#rating-modal" action="" method="POST" data-form="" autocomplete="off" enctype="multipart/form-data">			
				<div class="form-row">
					<div class="col-md-12 mb-3">
					   <input type="hidden" id="id-registro" name="id-registro" class="form-control"/>		
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<div class="picture-container">
							<div class="picture">
								<img src="../img/avatar.jpg" class="picture-src" id="wizardPicturePreview" title="">
								<input type="file" id="wizard-picture" class="">
							</div>
							 <h6 class="">Seleccionar Imagen</h6>

						</div>					  					  
					</div>					
					<div class="col-md-5 mb-3">
					  <label>Colaborador <span class="priority">*<span/></label>
					  <div class="input-group mb-3">
						<select id="colaborador" name="colaborador" class="custom-select" data-toggle="tooltip" data-placement="top" title="Consultorio" required></select>
						<div class="input-group-append" id="buscar_colaboradores">				
						  <a data-toggle="modal" href="#" class="btn btn-outline-success"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
					    </div>
					  </div>					  
					</div>
					<div class="col-md-4 mb-3">
					  <label>Estado <span class="priority">*<span/></label>
					  <select id="estatus" name="estatus" class="custom-select" data-toggle="tooltip" data-placement="top" title="Estatus" required>		   
						 <option value="">Seleccione</option>
						 <option value="1">Activo</option>
						 <option value="2">Inactivo</option>						 
					  </select>
					</div>				
				</div>				
				<div class="form-row">
					<div class="col-md-4 mb-3">
					  <label>Nickname <span class="priority">*<span/></label>
					  <input type="text" required name="username" id="username" maxlength="100" class="form-control"/>
					</div>
					<div class="col-md-8 mb-3">
					  <label>Email <span class="priority">*<span/></label>
					  <div class="input-group mb-3">
						  <input type="email" required name="email" id="email" maxlength="100" class="form-control" required />
						  <div class="input-group-append" id="buscar_pacientes_atenciones">				
							<a data-toggle="modal" href="#" class="btn btn-outline-success"><div class="sb-nav-link-icon"></div><i class="fas fa-at fa-lg"></i></a>
						  </div>
					   </div>					  
					</div>					
				</div>	
				<div class="form-row">
					<div class="col-md-6 mb-3">
					  <label>Empresa <span class="priority">*<span/></label>
					  <div class="input-group mb-3">
						<select id="empresa" name="empresa" class="custom-select" data-toggle="tooltip" data-placement="top" title="Empresa" required></select>
						<div class="input-group-append" id="buscar_empresa">				
						  <a data-toggle="modal" href="#" class="btn btn-outline-success"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
					    </div>
					  </div>					  
					</div>				
					<div class="col-md-6 mb-3">
					  <label>Tipo <span class="priority">*<span/></label>
					  <select class="custom-select" id="tipo" name="tipo" required data-toggle="tooltip" data-placement="top" title="Tipo">			  
					  </select>
					</div>					
				</div>				
			</form>
        </div>		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" form="formulario" type="submit" id="reg_usuarios"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>			
		</div>			
      </div>
    </div>
</div>

<div class="modal fade" id="registrar_editar">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Registro de Usuarios</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div>
        <div class="modal-body">		
			<form class="FormularioAjax" id="formulario_editar" data-async data-target="#rating-modal" action="" method="POST" data-form="" autocomplete="off" enctype="multipart/form-data">			
				<div class="form-row">
					<div class="col-md-12 mb-3">
					   <input type="hidden" id="id-registro1" name="id-registro1" class="form-control"/>	
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row" id="grupo_expediente">
					<div class="col-md-8 mb-3">
					  <label>Colaborador</label>
					  <div class="input-group mb-3">
						<select id="colaborador1" name="colaborador1" class="custom-select" data-toggle="tooltip" data-placement="top" title="Consultorio"></select>
						<div class="input-group-append" id="buscar_colaborador_editar">				
						  <a data-toggle="modal" href="#" class="btn btn-outline-success" id="buscar_colaboradores_editar"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
					    </div>
					  </div>					  
					</div>
					<div class="col-md-4 mb-3">
					  <label>Estado <span class="priority">*<span/></label>
					  <select id="estatus1" name="estatus1" class="custom-select" data-toggle="tooltip" data-placement="top" title="Estatus" required>		   
						 <option value="">Seleccione</option>
						 <option value="1">Activo</option>
						 <option value="2">Inactivo</option>						 
					  </select>
					</div>				
				</div>				
				<div class="form-row">
					<div class="col-md-4 mb-3">
					  <label>Email <span class="priority">*<span/></label>
					  <input type="email" required name="email1" id="email1" maxlength="100" class="form-control"/>
					</div>
					<div class="col-md-4 mb-3">
					  <label>Empresa <span class="priority">*<span/></label>
					  <div class="input-group mb-3">
						<select id="empresa1" name="empresa1" class="custom-select" data-toggle="tooltip" data-placement="top" title="Empresa" required></select>
						<div class="input-group-append" id="buscar_empresa_editar">				
						  <a data-toggle="modal" href="#" class="btn btn-outline-success"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
					    </div>
					  </div>					  
					</div>	
					<div class="col-md-4 mb-3">
					  <label>Tipo <span class="priority">*<span/></label>
					  <select class="custom-select" id="tipo1" name="tipo1" required data-toggle="tooltip" data-placement="top" title="Tipo">			  
					  </select>
					</div>						
				</div>			
			</form>
        </div>		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" form="formulario_editar" type="submit" id="editar_usuarios"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>			
		</div>			
      </div>
    </div>
</div>

<!--INICIO MODAL PARA EL INGRESO DE PRECLINICA-->
<div class="modal fade" id="agregar_preclinica">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Confirmación</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div>
        <div class="modal-body">		
			<form class="FormularioAjax" id="formulario_agregar_preclinica" data-async data-target="#rating-modal" action="" method="POST" data-form="" autocomplete="off" enctype="multipart/form-data">			
				<div class="form-row">
					<div class="col-md-12 mb-3">
					   <input type="hidden" required="required" readonly id="id-registro" name="id-registro" readonly="readonly"/>	
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
					  <label>Expediente <span class="priority">*<span/></label>
					  <input type="number" required id="expediente" placeholder="Expediente o Identidad" name="expediente" class="form-control"/>
					</div>
					<div class="col-md-4 mb-3">
					  <label>Fecha <span class="priority">*<span/></label>
					  <input type="date" required readonly id="fecha" name="fecha" value="<?php echo date ("Y-m-d");?>" class="form-control"/>
					</div>	
					<div class="col-md-4 mb-3">
					  <label>Identidad </label>
					  <input type="text" readonly id="identidad" name="identidad" class="form-control"/>
					</div>						
				</div>				
				<div class="form-row">
					<div class="col-md-6 mb-3">
					  <label>Nombre</label>
					  <input type="text" required readonly id="nombre" name="nombre" class="form-control"/>
					</div>	
					<div class="col-md-6 mb-3">
					  <label>Profesional</label>
					  <input type="text" readonly id="profesional_consulta" name="profesional_consulta" class="form-control"/>
					</div>						
				</div>						
				<div class="form-row">
					<div class="col-md-4 mb-3">
					  <label>Presión Arterial (PA)</label>
					  <input type="text"  id="pa" name="pa" class="form-control" placeholder="Presión Arterial"/>
					</div>
					<div class="col-md-4 mb-3">
					  <label>Frecuencia Respiratoria (FR)</label>
					  <input type="number" id="fr" name="fr" class="form-control" placeholder="Frecuencia Respiratoria"/>
					</div>	
					<div class="col-md-4 mb-3">
					  <label>Frecuencia Cardiaca </label>
					  <input type="number" id="fc" name="fc" class="form-control" placeholder="Frecuencia Cardiaca"/>
					</div>						
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
					  <label>Temperatura</label>
					  <input type="number" id="temperatura" name="temperatura" class="form-control" placeholder="Temperatura"/>
					</div>
					<div class="col-md-4 mb-3">
					  <label>Peso</label>
					  <input type="text" id="peso" name="peso" class="form-control" placeholder="Peso"/>
					</div>	
					<div class="col-md-4 mb-3">
					  <label>Talla</label>
					  <input type="text" id="talla" name="talla" class="form-control" placeholder="Talla"/>
					</div>						
				</div>	
				<div class="form-row" id="grupo">
					<div class="col-md-6 mb-3">
						<label>Consultorio</label>
						<div class="input-group mb-3">
						  <select id="servicio" name="servicio" class="custom-select" data-toggle="tooltip" data-placement="top" title="Servicio"></select>
						  <div class="input-group-append" id="buscar_servicios_preclinica">				
							<a data-toggle="modal" href="#" class="btn btn-outline-success"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
						  </div>
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<label>Profesional</label>
						<div class="input-group mb-3">
						  <select id="medico" name="medico" class="custom-select" data-toggle="tooltip" data-placement="top" title="Profesional"></select>
						  <div class="input-group-append" id="buscar_profesionales_preclinica">				
							<a data-toggle="modal" href="#" class="btn btn-outline-success"><div class="sb-nav-link-icon"></div><i class="fas fa-search fa-lg"></i></a>
						  </div>
						</div>
					</div>								
				</div>	
				<div class="form-row">
					<div class="col-md-12 mb-3">
						<label>Observaciones</label>
						<input type="text" id="observaciones" name="observaciones" class="form-control" placeholder="Observaciones"/>
					</div>							
				</div>					
			</form>
        </div>		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" form="formulario_agregar_preclinica" type="submit" id="reg_preclinica"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>	
			<button class="btn btn-primary ml-2" form="formulario_agregar_preclinica" type="submit" id="edit_preclinica"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>				
		</div>			
      </div>
    </div>
</div>
<!--FIN MODAL PARA EL INGRESO DE PRECLINICA-->

<!--INICIO MODAL DEPARTAMENTOS-->
<div class="modal fade" id="modal_busqueda_departamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda Departamentos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_departamentos">		
				<div class="table-responsive">
					<table id="dataTableDepartamentos" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Departamento</th>					
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL DEPARTAMENTOS-->

<!--INICIO MODAL ATENCIONES-->
<div class="modal fade" id="modal_busqueda_atenciones_plantillas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda Atenciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_atenciones_plantillas">		
				<div class="table-responsive">
					<table id="dataTableAtencionesPlantillas" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Atención</th>							
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL ATENCIONES-->

<!--INICIO MODAL TIPO DE MUESTRA-->
<div class="modal fade" id="modal_busqueda_tipo_mmuestra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda Tipo Muestra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_tipo_mmuestra">		
				<div class="table-responsive">
					<table id="dataTableTipoMuestra" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Tipo Muestra</th>							
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL TIPO DE MUESTRA-->

<!--INICIO MODAL DEPARTAMENTOS-->
<div class="modal fade" id="modal_busqueda_municipios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda Municipios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_municipios">		
				<div class="table-responsive">
					<table id="dataTableMunicipios" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Departamento</th>
								<th>Municipio</th>								
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL DEPARTAMENTOS-->

<!--INICIO MODAL SERVICIOS-->
<div class="modal fade" id="modal_busqueda_servicios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda de Consultorios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_servicios">		
				<div class="table-responsive">
					<table id="dataTableServicios" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Consultorio</th>					
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL SERVICIOS-->

<!--INICIO MODAL PROFESION-->
<div class="modal fade" id="modal_busqueda_profesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda de Profesiones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_profesion">		
				<div class="table-responsive">
					<table id="dataTableProfesiones" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Profesión</th>					
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL PROFESION-->

<!--INICIO MODAL RELIGION-->
<div class="modal fade" id="modal_busqueda_religion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda de Religiones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_religion">		
				<div class="table-responsive">
					<table id="dataTableReligion" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Religión</th>					
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL RELIGION-->

<!--INICIO MODAL TABLAS DB-->
<div class="modal fade" id="modal_tablas_db" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda de Tablas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_tablas_db">		
				<div class="table-responsive">
					<table id="dataTableTablas" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleccionar</th>
								<th>Tabla</th>					
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL TABLAS DB-->

<!--INICIO MODAL PACIENTES-->
<div class="modal fade" id="modal_busqueda_hospitales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda de Hospitales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_hospitales">		
				<div class="table-responsive">
					<table id="dataTableHospitales" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Hospital/Clínica</th>
								<th>Editar/Clínica</th>
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL PACIENTES-->

<!--INICIO MODAL CLINICA Y HOSPITALES-->
<div class="modal fade" id="modalHospitales">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hospitales</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div>
        <div class="modal-body">	
			<form class="FormularioAjax" id="formularioHospitales" data-async data-target="#rating-modal" action="" method="POST" data-form="" autocomplete="off" enctype="multipart/form-data">			
				<div class="form-row">
					<div class="col-md-12 mb-3">
					    <input type="hidden" id="hospitales_id" name="hospitales_id" class="form-control">
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row">
					<div class="col-md-12 mb-3">
					  <label>Hospital / Clínica <span class="priority">*<span/></label>
					  <input type="text" name="hospitales" id="hospitales" class="form-control" id="contranaterior" placeholder="Hospital o Clínica" required="required">					
				</div>			
			</form>
        </div>		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" form="formularioHospitales" type="submit" id="reg_hospitales"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>
			<button class="btn btn-warning ml-2" form="formularioHospitales" type="submit" id="edi_hospitales"><div class="sb-nav-link-icon"></div><i class="fas fa-edit fa-lg"></i> Modificar</button>
			<button class="btn btn-danger ml-2" form="formularioHospitales" type="submit" id="delete_hospitales"><div class="sb-nav-link-icon"></div><i class="fas fa-trash fa-lg"></i> Eliminar</button>			
		</div>			
      </div>
    </div>
</div>	
<!--FIN MODAL CLINICA Y HOSPITALES-->

<!--INICIO MODAL PACIENTES-->
<div class="modal fade" id="modal_busqueda_empresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda de Empresas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_empresa">		
				<div class="table-responsive">
					<table id="dataTableEmpresa" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Empresa</th>
								<th>RTN</th>
								<th>Dirección</th>					
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL PACIENTES-->

<!--INICIO MODAL PRODUCTOS-->
<div class="modal fade" id="modal_busqueda_productos_facturas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Búsqueda de Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario_busqueda_productos_facturas">
			<input type="hidden" id="row" name="row" class="form-control"/>
			<input type="hidden" id="col" name="col" class="form-control"/>			
				<div class="table-responsive">
					<table id="dataTableProductosFacturas" class="table table-striped table-condensed table-hover" style="width:100%">
						<thead align="center">
							<tr>
								<th>Seleecionar</th>
								<th>Producto</th>
								<th>Descripción</th>
								<th>Concentración</th>	
								<th>Medida</th>						
								<th>Cantidad</th>
								<th>Precio Venta1</th>
								<th>Precio Venta2</th>
								<th>Precio Venta3</th>	
								<th>Precio Venta4</th>									
							</tr>
						</thead>
					</table>  
				</div>			
			  </div>															  
			</form>
      </div>
    </div>
  </div>
</div>
<!--FIN MODAL PRODUCTOS-->

<!--INICIO MODAL PARA EL INGRESO DE ADENDUMS-->
<div class="modal fade" id="modal_adendum">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Agregar Adendum</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div><div class="container"></div>
        <div class="modal-body">		
			<form class="form-horizontal FormularioAjax" id="formularioAdendum" action="" method="POST" data-form="" enctype="multipart/form-data">				
				<div class="form-row">
					<div class="col-md-12 mb-3">
					    <input type="hidden" required="required" id="muestras_id" name="muestras_id"/>
					    <input type="hidden" required="required" id="atencion_id" name="atencion_id"/>
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
					  <label>Número</label>
					  <input type="text" required="required" readonly id="numero_bioxia_adendum" name="numero_bioxia_adendum" class="form-control"/>
					</div>
					<div class="col-md-6 mb-3">
					  <label>Paciente</label>
					  <input type="text" required="required" readonly id="paciente_bioxia_adendum" name="paciente_bioxia_adendum" class="form-control"/>
					</div>					
				</div>	
				<div class="form-row">
					<div class="col-md-12 mb-3">
					  <label>Descripción</label>
					  <textarea id="descripcion_adendum" name="descripcion_adendum" placeholder="Descripción" class="form-control" maxlength="10000" rows="10" required></textarea>	
				      <p id="charNum_adendum">10000 Caracteres</p>
					</div>						
				</div>													 				 
			</form>
        </div> 		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" type="submit" id="reg_adendum" form="formularioAdendum"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>				
		</div>			
      </div>
    </div>
</div>
<!--FIN MODAL PARA EL INGRESO DE ADENDUMS-->

<!--INICIO MODAL PARA EL INGRESO DE PRODUCTOS-->
<div class="modal fade" id="modal_productos">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Productos</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div><div class="container"></div>
        <div class="modal-body">		
			<form class="form-horizontal FormularioAjax" id="formulario_productos" action="" method="POST" data-form="" enctype="multipart/form-data">				
				<div class="form-row">
					<div class="col-md-12 mb-3">
					    <input type="hidden" required="required" id="productos_id" name="productos_id"/>
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
					  <label>Producto <span class="priority">*<span/></label>
					  <input type="text" required class="form-control" name="nombre" id="nombre" placeholder="Producto o Servicio" maxlength="150" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
					</div>
					<div class="col-md-3 mb-3">
					  <label>Categoría <span class="priority">*<span/></label>
					  <select id="categoria" name="categoria" class="custom-select" data-toggle="tooltip" data-placement="top" title="Categoría" required>   				   
					  </select> 
					</div>	
					<div class="col-md-3 mb-3">
					  <label>Concentración <span class="priority">*<span/></label>
				      <input type="number" required class="form-control" name="concentracion" id="concentracion" placeholder="Concentracion" maxlength="3" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
					</div>					
				</div>				
				<div class="form-row">				
					<div class="col-md-3 mb-3">
					  <label>Medida <span class="priority">*<span/></label>
					  <select id="medida" name="medida" class="custom-select" data-toggle="tooltip" data-placement="top" title="Medida" required>   				   
					  </select>
					</div>
					<div class="col-md-3 mb-3">
						<label>Almacén <span class="priority">*<span/></label>
						<select id="almacen" name="almacen" class="custom-select" data-toggle="tooltip" data-placement="top" title="Almacén" required>   				   
						</select> 
					</div>				
					<div class="col-md-3 mb-3">
					  <label>Cantidad <span class="priority">*<span/></label>
					  <input type="number" required id="cantidad" name="cantidad" placeholder="Cantidad" class="form-control"/>
					</div>
					<div class="col-md-3 mb-3">
					  <label>Precio de Compra <span class="priority">*<span/></label>
					  <input type="number" required id="precio_compra" name="precio_compra" step="0.01" placeholder="Precio Compra" class="form-control"/>
					</div>					
				</div>	
				<div class="form-row">
					<div class="col-md-3 mb-3">
					  <label>Precio de Venta 1<span class="priority">*<span/></label>
					  <input type="number" required id="precio_venta" name="precio_venta" step="0.01" placeholder="Precio Venta 1" class="form-control"/>
					</div>	
					<div class="col-md-3 mb-3">
					  <label>Precio de Venta 2</label>
					  <input type="number" id="precio_venta2" name="precio_venta2" step="0.01" placeholder="Precio Venta 2" class="form-control"/>
					</div>	
					<div class="col-md-3 mb-3">
					  <label>Precio de Venta 3</label>
					  <input type="number" id="precio_venta3" name="precio_venta3" step="0.01" placeholder="Precio Venta 3" class="form-control"/>
					</div>	
					<div class="col-md-3 mb-3">
					  <label>Precio de Venta 4</label>
					  <input type="number" id="precio_venta4" name="precio_venta4" step="0.01" placeholder="Precio Venta 4" class="form-control"/>
					</div>						
				</div>
				<div class="form-row">	
					<div class="col-md-3 mb-3">
					  <label>Cantidad Mínima</label>
					  <input type="number" id="cantidad_minima" name="cantidad_minima" placeholder="Cantidad Mínima" class="form-control"/>
					</div>					
					<div class="col-md-3 mb-3">
					  <label>Cantidad Máxima</label>
					  <input type="number" id="cantidad_maxima" name="cantidad_maxima" placeholder="Cantidad Máxima" class="form-control"/>
					</div>						
				</div>				
				<div class="form-row">			  
					<div class="col-md-12 mb-3">
					  <label>Descripción</label>
					  <textarea id="descripcion" name="descripcion" placeholder="Descripción" class="form-control" maxlength="150" rows="2"></textarea>	
				      <p id="charNum_descripcion">150 Caracteres</p>
					</div>
				</div>	
				
				<div class="form-group custom-control custom-checkbox custom-control-inline">	
				  <div class="col-md-5">			
						<label class="switch">
							<input type="checkbox" id="producto_activo" name="producto_activo" value="1" checked>
							<div class="slider round"></div>
						</label>
						<span class="question mb-2" id="label_producto_activo"></span>				
				  </div>				  	
				  <div class="col-md-8">		
						 <label class="form-check-label mr-1" for="defaultCheck1">¿ISV Venta?</label>
						<label class="switch">
							<input type="checkbox" id="producto_isv_factura" name="producto_isv_factura" value="1">
							<div class="slider round"></div>
						</label>
						<span class="question mb-2" id="label_producto_isv_factura"></span>				
				  </div>			  
				</div>								 				 
			</form>
        </div> 		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" type="submit" id="reg_producto" form="formulario_productos"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>
			<button class="btn btn-warning ml-2" type="submit" id="edi_producto" form="formulario_productos"><div class="sb-nav-link-icon"></div><i class="fas fa-edit fa-lg"></i> Editar</button>
			<button class="btn btn-danger ml-2" type="submit" id="delete_producto" form="formulario_productos"><div class="sb-nav-link-icon"></div><i class="fa fa-trash"></i> Eliminar</button>				
		</div>			
      </div>
    </div>
</div>
<!--FIN MODAL PARA EL INGRESO DE PRODUCTOS-->

<!--INICIO MODAL PARA EL INGRESO DE ALMACENES-->
<div class="modal fade" id="modal_almacen">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Almacén</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div><div class="container"></div>
        <div class="modal-body">		
			<form class="form-horizontal FormularioAjax" id="formulario_almacen" action="" method="POST" data-form="" enctype="multipart/form-data">				
				<div class="form-row">
					<div class="col-md-12 mb-3">
					    <input type="hidden" required="required" readonly id="almacen_id" name="almacen_id"/>
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
					  <label>Almacén <span class="priority">*<span/></label>
					  <input type="text" required class="form-control" name="almacen" id="almacen" placeholder="Almacén" maxlength="30" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
					</div>
					<div class="col-md-6 mb-3">
					  <label>Ubicación <span class="priority">*<span/></label>
					  <select id="ubicacion" name="ubicacion" class="form-control" data-toggle="tooltip" data-placement="top" title="Ubicacion" required>   				   
					  </select>
					</div>					
				</div>																	  				
			</form>
        </div>	
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" type="submit" id="reg_almacen" form="formulario_almacen"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>
			<button class="btn btn-warning ml-2" type="submit" id="edi_almacen" form="formulario_almacen"><div class="sb-nav-link-icon"></div><i class="fas fa-edit fa-lg"></i> Editar</button>
			<button class="btn btn-danger ml-2" type="submit" id="delete_almacen" form="formulario_almacen"><div class="sb-nav-link-icon"></div><i class="fa fa-trash"></i> Eliminar</button>				
		</div>			
      </div>
    </div>
</div>
<!--FIN MODAL PARA EL INGRESO DE ALMACENES-->

<!--INICIO MODAL PARA EL INGRESO DE UBICACION-->
<div class="modal fade" id="modal_ubicacion">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubicación</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div><div class="container"></div>
        <div class="modal-body">		
			<form class="form-horizontal FormularioAjax" id="formulario_ubicacion" action="" method="POST" data-form="" enctype="multipart/form-data">				
				<div class="form-row">
					<div class="col-md-12 mb-3">
					    <input type="hidden" required="required" readonly id="ubicacion_id" name="ubicacion_id"/>
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
					  <label>Ubicación <span class="priority">*<span/></label>
					  <input type="text" required class="form-control" name="ubicacion" id="ubicacion" placeholder="Ubicación	" maxlength="30" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
					</div>
					<div class="col-md-6 mb-3">
					  <label>Empresa <span class="priority">*<span/></label>
					  <select id="empresa" name="empresa" class="custom-select" data-toggle="tooltip" data-placement="top" title="Empresa" required>   				   
					 </select>
					</div>					
				</div>				
			</form>
        </div>		
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" type="submit" id="reg_ubicacion" form="formulario_ubicacion"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>
			<button class="btn btn-warning ml-2" type="submit" id="edi_ubicacion" form="formulario_ubicacion"><div class="sb-nav-link-icon"></div><i class="fas fa-edit fa-lg"></i> Editar</button>
			<button class="btn btn-danger ml-2" type="submit" id="delete_ubicacion" form="formulario_ubicacion"><div class="sb-nav-link-icon"></div><i class="fa fa-trash"></i> Eliminar</button>				
		</div>			
      </div>
    </div>
</div>
<!--FIN MODAL PARA EL INGRESO DE UBICACION-->

<!--INICIO MODAL PARA EL INGRESO DE MEDIDAS-->
<div class="modal fade" id="modal_medidas">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Medidas</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
        </div><div class="container"></div>
        <div class="modal-body">		
			<form class="form-horizontal FormularioAjax" id="formulario_medidas" action="" method="POST" data-form="" enctype="multipart/form-data">				
				<div class="form-row">
					<div class="col-md-12 mb-3">
					    <input type="hidden" required="required" readonly id="medida_id" name="medida_id"/>
						<div class="input-group mb-3">
							<input type="text" required readonly id="pro" name="pro" class="form-control"/>
							<div class="input-group-append">				
								<span class="input-group-text"><div class="sb-nav-link-icon"></div><i class="fa fa-plus-square"></i></span>
							</div>
						</div>	 
					</div>							
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
					  <label>Medida <span class="priority">*<span/></label>
					  <input type="text" required id="medidas" name="medidas" placeholder="Medida" readonly class="form-control"  maxlength="3" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
					</div>
					<div class="col-md-8 mb-3">
					  <label for="apellido_proveedores">Descripción <span class="priority">*<span/></label>
					  <input type="text" required id="descripcion_medidas" name="descripcion_medidas" placeholder="Descripción" readonly class="form-control"  maxlength="30" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
					</div>					
				</div>																	  				
			</form>
        </div>	
		<div class="modal-footer">
			<button class="btn btn-primary ml-2" type="submit" id="reg_medidas" form="formulario_medidas"><div class="sb-nav-link-icon"></div><i class="far fa-save fa-lg"></i> Registrar</button>
			<button class="btn btn-warning ml-2" type="submit" id="edi_medidas" form="formulario_medidas"><div class="sb-nav-link-icon"></div><i class="fas fa-edit fa-lg"></i> Editar</button>
			<button class="btn btn-danger ml-2" type="submit" id="delete_medidas" form="formulario_medidas"><div class="sb-nav-link-icon"></div><i class="fa fa-trash"></i> Eliminar</button>				
		</div>			
      </div>
    </div>
</div>
<!--FIN MODAL PARA EL INGRESO DE MEDIDAS-->

<!--INICIO MODAL PAGOS FACTURACION---->
<div class="modal fade" id="modal_pagos">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">	
			<div class="row justify-content-center">
				<div class="col-lg-12 col-12">
					<div class="card card0">
						<div class="d-flex" id="wrapper">
							<!-- Sidebar -->
							<div class="bg-light border-right" id="sidebar-wrapper">
								<div class="sidebar-heading pt-5 pb-4"><strong>Método de pago</strong></div>
								<div class="list-group list-group-flush"> 

									<a data-toggle="tab" href="#menu1" id="tab1" class="tabs list-group-item bg-light active1">
										<div class="list-div my-2">
											<div class="fas fa-money-bill-alt fa-lg"></div> &nbsp;&nbsp; Efectivo
										</div>
									</a> 
									<a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item">
										<div class="list-div my-2">
											<div class="far fa-credit-card fa-lg"></div> &nbsp;&nbsp; Tarjeta
										</div>
									</a> 
									<a data-toggle="tab" href="#menu5" id="tab5" class="tabs list-group-item">
										<div class="list-div my-2">
											<div class="fa fa-pause fa-lg"></div> &nbsp;&nbsp; Mixto
										</div>
									</a> 																			
									<a data-toggle="tab" href="#menu3" id="tab3" class="tabs list-group-item bg-light">
										<div class="list-div my-2">
											<div class="fas fa-exchange-alt fa-lg"></div> &nbsp;&nbsp; Transferencia
										</div>
									</a> 
									<a data-toggle="tab" href="#menu4" id="tab4" class="tabs list-group-item bg-light">
										<div class="list-div my-2">
											<div class="fas fa-money-check fa-lg"></div> &nbsp;&nbsp; Cheque
										</div>
									</a>									
								</div>
							</div> <!-- Page Content -->
							<div id="page-content-wrapper">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="row pt-3" id="border-btm">
									<div class="col-2">
										<i id="menu-toggle1" class="fas fa-angle-double-left fa-2x menu-toggle1"></i>
										<i id="menu-toggle2" class="fas fa-angle-double-right fa-2x menu-toggle2"></i>
									</div>
									<div class="col-10">
										<div class="row justify-content-right">
											<div class="col-12">
												<p class="mb-0 mr-4 mt-4 text-right" id="customer-name-bill"></p>
												<input type="hidden" name="customer_bill_pay" id="customer_bill_pay" placeholder="0.00">
											</div>
										</div>
										<div class="row justify-content-right">
											<div class="col-12">
												<p class="mb-0 mr-4 text-right color-text-white"><b>Pagar</b> <span class="top-highlight" id="bill-pay"></span> </p>
											</div>
										</div>
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="text-center" id="test"></div>
								</div>
								<div class="tab-content">
									<div id="menu1" class="tab-pane in active">
										<div class="row justify-content-center">
											<div class="col-11">
												<div class="form-card">
													<h3 class="mt-0 mb-4 text-center">Ingrese detalles del Pago</h3>
													<form class="FormularioAjax" id="formEfectivoBill" action="<?php echo SERVERURL;?>php/facturacion/addPagoEfectivo.php" method="POST" data-form="save" autocomplete="off" enctype="multipart/form-data">
														<div class="row">
															<div class="col-11">
																<div class="input-group"> 	
																	<label for="monto_efectivo">Efectivo</label>
																	<input type="hidden" name="factura_id_efectivo" id="factura_id_efectivo"> 
																	<input type="hidden" name="monto_efectivo" id="monto_efectivo" placeholder="0.00"> 
																	<input type="number" name="efectivo_bill" id="efectivo_bill" class="inputfield" placeholder="0.00" step="0.01">																						
																</div>
															</div>
															<div class="col-11">
																<div class="input-group">
																	<label for="cambio_efectivo">Cambio</label>
																	<input type="number" readonly name="cambio_efectivo" id="cambio_efectivo" class="inputfield" step="0.01" placeholder="0.00">																
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12"> 
																<input type="submit" value="Efectuar Pago" id="pago_efectivo" class="pay btn btn-info placeicon" form="formEfectivoBill">
															</div>
														</div>
														<div class="RespuestaAjax"></div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<div id="menu2" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<div class="form-card">
													<h3 class="mt-0 mb-4 text-center">Ingrese detalles de la Tarjeta</h3>
													<form class="FormularioAjax" id="formTarjetaBill" method="POST" data-form="save" action="<?php echo SERVERURL;?>php/facturacion/addPagoTarjeta.php" autocomplete="off" enctype="multipart/form-data">
														<div class="row">
															<div class="col-12">
																<div class="input-group"> 
																<label>Número de Tarjeta</label> 
																<input type="hidden" name="factura_id_tarjeta" id="factura_id_tarjeta">
																<input type="text" id="cr_bill" name="cr_bill" class="inputfield"  placeholder="XXXX">
																<input type="hidden" name="monto_efectivo" id="monto_efectivo" placeholder="0.00">
																																
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-6">
																<div class="input-group"> 
																	<label> Fecha de Expiración</label>
																	<input type="text" name="exp" id="exp" class="mask inputfield" placeholder="MM/YY">
																</div>
															</div>
															<div class="col-6">
																<div class="input-group"> 
																	<label>Número Aprobación</label>
																	<input type="text" name="cvcpwd" id="cvcpwd" class="placeicon inputfield"> 																	 
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12"> 
																<input type="submit" value="Efectuar Pago" id="pago_tarjeta" class="pay btn btn-info placeicon" form="formTarjetaBill">
															</div>
														</div>
														<div class="RespuestaAjax"></div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<div id="menu5" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<div class="form-card">
													<h6 class="mt-0 mb-4 text-center">Ingrese Pago Mixto</h6>
													<form class="FormularioAjax" id="formMixtoBill" action="<?php echo SERVERURL;?>php/facturacion/addPagoMixto.php" method="POST" data-form="save" autocomplete="off" enctype="multipart/form-data">
														<div class="row">
															<div class="col-12 col-md-6">
																<div class="input-group"> 	
																	<label for="monto_efectivo">Efectivo</label>
																	<input type="hidden" name="factura_id_mixto" id="factura_id_mixto"> 
																	<input type="hidden" name="monto_efectivo" id="monto_efectivo_mixto" placeholder="0.00"> 
																	<input type="number" name="efectivo_bill" id="efectivo_bill_mixto" class="inputfield" placeholder="0.00" step="0.01">																						
																	<input type="hidden" readonly name="cambio_efectivo" id="cambio_efectivo_mixto" class="inputfield" step="0.01" placeholder="0.00">																
																</div>
															</div>
															
															<div class="col-12 col-md-6">
																<div class="input-group">
																	<label for="monto_tarjeta">Tarjeta</label>
																	<input type="number" readonly name="monto_tarjeta" id="monto_tarjeta" class="inputfield" step="0.01" placeholder="0.00">																
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-12">
																<div class="input-group"> 
																<label>Número de Tarjeta</label> 
																<input type="text" id="cr_bill_mixto" name="cr_bill" class="inputfield"  placeholder="XXXX">
																																																
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-6">
																<div class="input-group"> 
																	<label> Fecha de Expiración</label>
																	<input type="text" name="exp" id="exp_mixto" class="mask inputfield" placeholder="MM/YY">
																</div>
															</div>
															<div class="col-6">
																<div class="input-group"> 
																	<label>Número Aprobación</label>
																	<input type="text" name="cvcpwd" id="cvcpwd_mixto" class="placeicon inputfield"> 																	 
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12"> 
																<input type="submit" value="Efectuar Pago" id="pago_efectivo_mixto" class="pay btn btn-info placeicon" form="formMixtoBill">
															</div>
														</div>
														<div class="RespuestaAjax"></div>
													</form>
												</div>
											</div>
										</div>
									</div>									
									<div id="menu3" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<div class="form-card">
													<h3 class="mt-0 mb-4 text-center">Ingrese detalles de la Transferencia</h3>
													<form class="FormularioAjax" id="formTransferenciaBill" method="POST" data-form="save" action="<?php echo SERVERURL;?>php/facturacion/addPagoTransferencia.php" autocomplete="off" enctype="multipart/form-data">
														<div class="row">
															<div class="col-12">
															    <label>Banco</label> 
																<div class="input-group"> 																	
																	<input type="hidden" name="factura_id_transferencia" id="factura_id_transferencia">
																	<select required name="bk_nm" id="bk_nm" class="custom-select inputfield" data-toggle="tooltip" data-placement="top" title="Banco">
																		<option value="">Seleccione un Banco</option>
																	</select> 																	
																	<input type="hidden" name="monto_efectivo" id="monto_efectivo" placeholder="0.00">								
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-12">
																<div class="input-group"> 	
																	<label>Número de Autorización</label> 
																	<input type="text" name="ben_nm" id="ben_nm" class="inputfield" placeholder="Número de Autorización">							
																</div>
															</div>
															<div class="col-12" style="display: none;">
																<div class="input-group"> 																	
																	<input type="text" name="scode" placeholder="ABCDAB1S" class="placeicon" minlength="8" maxlength="11"> 
																	<label>SWIFT CODE</label> 
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12"> 
																<input type="submit" value="Efectuar Pago" id="pago_transferencia" class="pay btn btn-info placeicon" form="formTransferenciaBill"> 
															</div>
														</div>
														<div class="RespuestaAjax"></div>
													</form>
												</div>
											</div>
										</div>
									</div>		
									
									<div id="menu4" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<div class="form-card">
													<h3 class="mt-0 mb-4 text-center">Ingrese detalles del Cheque</h3>
													<form class="FormularioAjax" id="formChequeBill" method="POST" data-form="save" action="<?php echo SERVERURL;?>php/facturacion/addPagoCheque.php" autocomplete="off" enctype="multipart/form-data">
														<div class="row">
															<div class="col-12">
															    <label>Banco</label> 
																<div class="input-group"> 																	
																	<input type="hidden" name="factura_id_cheque" id="factura_id_cheque">
																	<select required name="bk_nm_chk" id="bk_nm_chk" class="custom-select inputfield" data-toggle="tooltip" data-placement="top" title="Banco">
																		<option value="">Seleccione un Banco</option>
																	</select> 																	
																	<input type="hidden" name="monto_efectivo" id="monto_efectivo" placeholder="0.00">								
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-12">
																<div class="input-group"> 	
																	<label>Número de Cheque</label> 
																	<input type="text" name="check_num" id="check_num" class="inputfield" placeholder="Número de Cheque">							
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12"> 
																<input type="submit" value="Efectuar Pago" id="pago_cheque" class="pay btn btn-info placeicon" form="formChequeBill"> 
															</div>
														</div>
														<div class="RespuestaAjax"></div>
													</form>
												</div>
											</div>
										</div>
									</div>
																		
									<div id="menu4" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<h3 class="mt-0 mb-4 text-center">Scan the QR code to pay</h3>
												<div class="row justify-content-center">
													<div id="qr"> <img src="" width="200px" height="200px"> </div>
												</div>
											</div>
										</div>
									</div>
									<div id="menu4" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<h3 class="mt-0 mb-4 text-center">Otra forma de pago</h3>
												<div class="row justify-content-center">
													<div id="qr"> <img src="" width="200px" height="200px"> </div>
												</div>
											</div>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
      </div>
    </div>
</div>
<!--FIN MODAL PAGOS FACTURACION--

<!--INICIO MODAL PAGOS FACTURACION---->
<div class="modal fade" id="modal_grupo_pagos">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">	
			<div class="row justify-content-center">
				<div class="col-lg-12 col-12">
					<div class="card card0">
						<div class="d-flex" id="wrapper">
							<!-- Sidebar -->
							<div class="bg-light border-right" id="sidebar-wrapper">
								<div class="sidebar-heading pt-5 pb-4"><strong>Método de pago</strong></div>
								<div class="list-group list-group-flush"> 

									<a data-toggle="tab" href="#menuGrupal1" id="tabGrupal1" class="tabs list-group-item bg-light active1">
										<div class="list-div my-2">
											<div class="fas fa-money-bill-alt fa-lg"></div> &nbsp;&nbsp; Efectivo
										</div>
									</a> 
									<a data-toggle="tab" href="#menuGrupal2" id="tabGrupal2" class="tabs list-group-item">
										<div class="list-div my-2">
											<div class="far fa-credit-card fa-lg"></div> &nbsp;&nbsp; Tarjeta
										</div>
									</a> 	
									<a data-toggle="tab" href="#menuGrupal5" id="tabGrupal5" class="tabs list-group-item">
										<div class="list-div my-2">
											<div class="fa fa-pause fa-lg"></div> &nbsp;&nbsp; Mixto
										</div>
									</a> 																	
									<a data-toggle="tab" href="#menuGrupal3" id="tabGrupal3" class="tabs list-group-item bg-light">
										<div class="list-div my-2">
											<div class="fas fa-exchange-alt fa-lg"></div> &nbsp;&nbsp; Transferencia
										</div>
									</a> 
									<a data-toggle="tab" href="#menuGrupal4" id="tabGrupal4" class="tabs list-group-item bg-light">
										<div class="list-div my-2">
											<div class="fas fa-money-check fa-lg"></div> &nbsp;&nbsp; Cheque
										</div>
									</a>									
								</div>
							</div> <!-- Page Content -->
							<div id="page-content-wrapper">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="row pt-3" id="border-btm">
									<div class="col-2">
										<i id="menu-toggleGrupal1" class="fas fa-angle-double-left fa-2x menu-toggleGrupal1"></i>
										<i id="menu-toggleGrupal2" class="fas fa-angle-double-right fa-2x menu-toggleGrupal2"></i>
									</div>
									<div class="col-10">
										<div class="row justify-content-right">
											<div class="col-12">
												<p class="mb-0 mr-4 mt-4 text-right" id="customer-name-bill-grupal"></p>
												<input type="hidden" name="customer_bill_pay" id="customer_bill_pay_grupal" placeholder="0.00">
											</div>
										</div>
										<div class="row justify-content-right">
											<div class="col-12">
												<p class="mb-0 mr-4 text-right color-text-white"><b>Pagar</b> <span class="top-highlight" id="bill-pay-grupal"></span> </p>
											</div>
										</div>
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="text-center" id="test"></div>
								</div>
								<div class="tab-content">
									<div id="menuGrupal1" class="tab-pane in active">
										<div class="row justify-content-center">
											<div class="col-11">
												<div class="form-card">
													<h3 class="mt-0 mb-4 text-center">Ingrese detalles del Pago</h3>
													<form class="FormularioAjax" id="formEfectivoBillGrupal" action="<?php echo SERVERURL;?>php/facturacion/addGrupoPagoEfectivo.php" method="POST" data-form="save" autocomplete="off" enctype="multipart/form-data">
														<div class="row">
															<div class="col-11">
																<div class="input-group"> 	
																	<label for="monto_efectivo">Efectivo</label>
																	<input type="hidden" name="factura_id_efectivo" id="factura_id_efectivo"> 
																	<input type="hidden" name="monto_efectivo" id="monto_efectivo" placeholder="0.00"> 
																	<input type="number" name="efectivo_bill" id="efectivo_bill" class="inputfield" placeholder="0.00" step="0.01">																						
																</div>
															</div>
															<div class="col-11">
																<div class="input-group">
																	<label for="cambio_efectivo">Cambio</label>
																	<input type="number" readonly name="cambio_efectivo" id="cambio_efectivo" class="inputfield" step="0.01" placeholder="0.00">																
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12"> 
																<input type="submit" value="Efectuar Pago" id="pago_efectivo_grupal" class="pay btn btn-info placeicon" form="formEfectivoBillGrupal">
															</div>
														</div>
														<div class="RespuestaAjax"></div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<div id="menuGrupal2" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<div class="form-card">
													<h3 class="mt-0 mb-4 text-center">Ingrese detalles de la Tarjeta</h3>
													<form class="FormularioAjax" id="formTarjetaBillGrupal" method="POST" data-form="save" action="<?php echo SERVERURL;?>php/facturacion/addGrupoPagoTarjeta.php" autocomplete="off" enctype="multipart/form-data">
														<div class="row">
															<div class="col-12">
																<div class="input-group"> 
																<label>Número de Tarjeta</label> 
																<input type="hidden" name="factura_id_tarjeta" id="factura_id_tarjeta">
																<input type="text" id="cr_bill" name="cr_bill" class="inputfield"  placeholder="XXXX">
																<input type="hidden" name="monto_efectivo" id="monto_efectivo" placeholder="0.00">
																																
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-6">
																<div class="input-group"> 
																	<label> Fecha de Expiración</label>
																	<input type="text" name="exp" id="exp" class="mask inputfield" placeholder="MM/YY">
																</div>
															</div>
															<div class="col-6">
																<div class="input-group"> 
																	<label>Número Aprobación</label>
																	<input type="text" name="cvcpwd" id="cvcpwd" class="placeicon inputfield"> 																	 
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12"> 
																<input type="submit" value="Efectuar Pago" id="pago_tarjeta_grupal" class="pay btn btn-info placeicon" form="formTarjetaBillGrupal">
															</div>
														</div>
														<div class="RespuestaAjax"></div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<div id="menuGrupal5" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<div class="form-card">
													<h6 class="mt-0 mb-4 text-center">Ingrese Pago Mixto</h6>
													<form class="FormularioAjax" id="formMixtoBillGrupal" action="<?php echo SERVERURL;?>php/facturacion/addGrupoPagoMixto.php" method="POST" data-form="save" autocomplete="off" enctype="multipart/form-data">
														<div class="row">
															<div class="col-12 col-md-6">
																<div class="input-group"> 	
																	<label for="monto_efectivo">Efectivo</label>
																	<input type="hidden" name="factura_id_mixto" id="factura_id_mixto"> 
																	<input type="hidden" name="monto_efectivo" id="monto_efectivo_mixto" placeholder="0.00"> 
																	<input type="number" name="efectivo_bill" id="efectivo_bill_mixto" class="inputfield" placeholder="0.00" step="0.01">																						
																	<input type="hidden" readonly name="cambio_efectivo" id="cambio_efectivo_mixto" class="inputfield" step="0.01" placeholder="0.00">																
																</div>
															</div>
															
															<div class="col-12 col-md-6">
																<div class="input-group">
																	<label for="monto_tarjeta">Tarjeta</label>
																	<input type="number" readonly name="monto_tarjeta" id="monto_tarjeta" class="inputfield" step="0.01" placeholder="0.00">																
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-12">
																<div class="input-group"> 
																<label>Número de Tarjeta</label> 
																<input type="text" id="cr_bill_mixto" name="cr_bill" class="inputfield"  placeholder="XXXX">
																																																
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-6">
																<div class="input-group"> 
																	<label> Fecha de Expiración</label>
																	<input type="text" name="exp" id="exp_mixto" class="mask inputfield" placeholder="MM/YY">
																</div>
															</div>
															<div class="col-6">
																<div class="input-group"> 
																	<label>Número Aprobación</label>
																	<input type="text" name="cvcpwd" id="cvcpwd_mixto" class="placeicon inputfield"> 																	 
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12"> 
																<input type="submit" value="Efectuar Pago" id="pago_efectivo_mixto_grupal" class="pay btn btn-info placeicon" form="formMixtoBillGrupal">
															</div>
														</div>
														<div class="RespuestaAjax"></div>
													</form>
												</div>
											</div>
										</div>
									</div>									
									<div id="menuGrupal3" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<div class="form-card">
													<h3 class="mt-0 mb-4 text-center">Ingrese detalles de la Transferencia</h3>
													<form class="FormularioAjax" id="formTransferenciaBillGrupal" method="POST" data-form="save" action="<?php echo SERVERURL;?>php/facturacion/addGrupoPagoTransferencia.php" autocomplete="off" enctype="multipart/form-data">
														<div class="row">
															<div class="col-12">
															    <label>Banco</label> 
																<div class="input-group"> 																	
																	<input type="hidden" name="factura_id_transferencia" id="factura_id_transferencia">
																	<select required name="bk_nm" id="bk_nm" class="custom-select inputfield" data-toggle="tooltip" data-placement="top" title="Banco">
																		<option value="">Seleccione un Banco</option>
																	</select> 																	
																	<input type="hidden" name="monto_efectivo" id="monto_efectivo" placeholder="0.00">								
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-12">
																<div class="input-group"> 	
																	<label>Número de Autorización</label> 
																	<input type="text" name="ben_nm" id="ben_nm" class="inputfield" placeholder="Número de Autorización">							
																</div>
															</div>
															<div class="col-12" style="display: none;">
																<div class="input-group"> 																	
																	<input type="text" name="scode" placeholder="ABCDAB1S" class="placeicon" minlength="8" maxlength="11"> 
																	<label>SWIFT CODE</label> 
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12"> 
																<input type="submit" value="Efectuar Pago" id="pago_transferencia_grupal" class="pay btn btn-info placeicon" form="formTransferenciaBillGrupal"> 
															</div>
														</div>
														<div class="RespuestaAjax"></div>
													</form>
												</div>
											</div>
										</div>
									</div>											
									<div id="menuGrupal4" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<div class="form-card">
													<h3 class="mt-0 mb-4 text-center">Ingrese detalles del Cheque</h3>
													<form class="FormularioAjax" id="formChequeBillGrupal" method="POST" data-form="save" action="<?php echo SERVERURL;?>php/facturacion/addGrupoPagoCheque.php" autocomplete="off" enctype="multipart/form-data">
														<div class="row">
															<div class="col-12">
															    <label>Banco</label> 
																<div class="input-group"> 																	
																	<input type="hidden" name="factura_id_cheque" id="factura_id_cheque">
																	<select required name="bk_nm_chk" id="bk_nm_chk" class="custom-select inputfield" data-toggle="tooltip" data-placement="top" title="Banco">
																		<option value="">Seleccione un Banco</option>
																	</select> 																	
																	<input type="hidden" name="monto_efectivo" id="monto_efectivo" placeholder="0.00">								
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-12">
																<div class="input-group"> 	
																	<label>Número de Cheque</label> 
																	<input type="text" name="check_num" id="check_num" class="inputfield" placeholder="Número de Cheque">							
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12"> 
																<input type="submit" value="Efectuar Pago" id="pago_cheque_grupal" class="pay btn btn-info placeicon" form="formChequeBillGrupal"> 
															</div>
														</div>
														<div class="RespuestaAjax"></div>
													</form>
												</div>
											</div>
										</div>
									</div>
																		
									<div id="menu4" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<h3 class="mt-0 mb-4 text-center">Scan the QR code to pay</h3>
												<div class="row justify-content-center">
													<div id="qr"> <img src="" width="200px" height="200px"> </div>
												</div>
											</div>
										</div>
									</div>
									<div id="menu4" class="tab-pane">
										<div class="row justify-content-center">
											<div class="col-11">
												<h3 class="mt-0 mb-4 text-center">Otra forma de pago</h3>
												<div class="row justify-content-center">
													<div id="qr"> <img src="" width="200px" height="200px"> </div>
												</div>
											</div>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
      </div>
    </div>
</div>
<!--FIN MODAL PAGOS FACTURACION--