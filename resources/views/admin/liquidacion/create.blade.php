@extends('layouts.app')
@section('content')

<div class="container">
    
	<div class="row justify-content-center">
	
		<div class="col-md-12">
	    	
			<div class="card card-secondary">
				
				<div class="card-header">
				
				<h3 class="card-title">Nueva Liquidacion</h3>
				
				</div>

				<div class="card-body">
				<!-- /.card-header -->

					<form method="post" action="{{ route('liquidacion.store')}}" name="formulario">
				
						{{ csrf_field() }}

						<div class="input-group">
							
							<input type="text" readonly name="pnombrePro" id="pnombrePro" class="form-control" placeholder="Seleccione un Empleado">
							
							<input type="hidden" readonly name="usuario_id" id="idProveedor" class="form-control" placeholder="">
							
							<span class="input-group-btn">

							<div class="input-group">

								<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

								</div>

								<button type="button" class="btn btn-success" id="btnBuscarProveedor"  data-toggle="modal"  data-target="#ModalProveedor"><i class="fa fa-search"></i>
									
									Buscar
								
								</button>
								
							</div>
							


							</span>

						</div>

						<br>

						<div class="input-group">
							
							<input type="text"  readonly name="pdescripcion" id="pdescripcion" class="form-control" placeholder="Seleccione un Concepto">
							
							<input type="hidden" readonly name="pid" id="pid" class="form-control" placeholder="">
							
							<span class="input-group-btn">

								<div class="input-group">

										<div class="input-group-prepend">

											<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

										</div>

										<button type="button" class="btn btn-success" id="btnBuscarPducto" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i>
											
											Buscar
										
										</button>

								</div>
							
							</span>

						</div>

						<br>

						<div class="row">
							
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
								
								<label>Monto</label>
								
								<div class="input-group">

									<div class="input-group-prepend">
									
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill"></i></span>

									</div>
									
									<input type="number" step="0.01"  name="pmonto" id="pmonto" class="form-control"  maxlength="7" placeholder="">

								</div>

							</div>

							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
								
								<div class="form-group">
									
									<label for="cantidad">Unidad</label>

									<div class="input-group">

										<div class="input-group-prepend">

											<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

										</div>

										<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">

									</div>
														
								</div>

							</div>

							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
								
								<div class="form-group">
									
									<label for="cantidad">Tipo</label>

									<div class="input-group">

										<div class="input-group-prepend">

											<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

										</div>

										<input  type="text" readonly name="ptipo" id="ptipo" class="form-control">

									</div>
														
								</div>

							</div>

						
						</div>

						<div class="row">

							<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
								
								<div class="form-group">
									
									<button class="btn btn-success" type="button"  id="bt_agregar" onclick="agregar()">Agregar</button>
								
								</div>
							
							</div>
						
						</div>

						<div class="row">
							
							<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
								
								<div class="table-responsive">
									
									<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
										<thead style="background-color:#caf5a9">
										<th>Opciones</th>
										<th>Concepto</th>
										<th>Unidades</th>
										<th>Haberes</th>
										<th>Retenciones</th>
										<th></th>
									</thead>
									<tfoot>
										<th>Totales</th>
										<th></th>
										<th></th>
										<th><h4 id="total">$ 00.00</h4> <input type="hidden" name="total_n" id="total_venta"></th>								
										<th><h4 id="totalR">$ 00.00</h4> <input type="hidden" name="total_retencion" id="total_retenciones"></th>
										<th><h4 id="totalH">$ 00.00</h4> <input type="hidden" name="total_h" id="total_haberes"></th>
									</tfoot>
									<tbody></tbody>
									</table>

									
								</div>
							
							</div>
								<br>
								
							<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12" id="guardar1">
									
									<div class="form-group">
										
										<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
										
										<input type="text" name="productosEnCompra" id="productosEnCompra" value="[]">
										
										<button id="guardar" class="btn btn-primary"  type="submit">Guardar</button>
										
										<a class="btn btn-danger" href="{{route('compras.index')}}" role="button">Volver</a>
									
									</div>

							</div>


						</div>
					
					</form>
				
				</div>
			
			</div>

		</div>	
	
	</div>	

</div>
<!-- Modal Productos-->

<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
        	<h5 class="modal-title" id="exampleModalLongTitle">Conceptos</h5>		
     	 </div>
      <div class="modal-body">
	  <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="datos">
                    <thead>
                      <tr>
					      <th>#</th>
                          <th>descripcion</th>
                          <th>tipo</th>
						  <th>Monto Fijo</th>
						  <th>Monto Variable</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($conceptos as $pro)
                  	<tr>
					<td>{{ $pro->id }}</td>
					<td>{{ $pro->descripcion }}</td>
                    <td>{{ $pro->tipo }}</td>  
					<td>{{ $pro->montoFijo }}</td>   
					<td>{{ $pro->montoVariable }}</td>           
                    <td><button type="button" class="btn btn-success" id="bt_añadir"  data-dismiss="modal" onclick="SeleccionarProducto()">Añadir</button></td>    
                	</tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- FIN Modal Productos-->	

<!-- Modal Proveedores-->

<div class="modal fade bd-example-modal-lg" id="ModalProveedor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	
	<div class="modal-dialog modal-lg">
    	
		<div class="modal-content">
			
			<div class="modal-header">
        		<h4 class="modal-title">Listado de Proveedores</h4>
					
				<form> <input class="btn btn-default" id="searchTerm" type="text" onkeyup="doSearch()" /> 
				<button type="button" class="btn btn-success" id="btnBuscarProveedorModal"><i class="fa fa-search"></i></button>
				</form>
     	 	</div>
        	
      		<div class="modal-body">
	  			
				<div class="table-responsive">
                			
				  	<table class="table table-hover text-nowrap" id="tablecliente">

					  	<thead>
                        	<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="tblSucursales" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Seleccione: activate to sort column descending" style="width: 74px;">Seleccione</th>
								<th style="display:none;" class="sorting" tabindex="0" aria-controls="tblSucursales" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="width: 8px;">#</th>
								<th class="sorting" tabindex="0" aria-controls="tblSucursales" rowspan="1" colspan="1" aria-label="Razón Social: activate to sort column ascending" style="width: 42px;">Razón Social</th>
							</tr>
						</thead>
             
                    	<tfoot>
                        	<tr>
								<th rowspan="1" colspan="1">Seleccione</th>
								<th style="display:none;" rowspan="1" colspan="1">#</th>
								<th rowspan="1" colspan="1">Razón Social</th>
							</tr>
                    	</tfoot>

                   		<tbody>
                    		@foreach ($usuarios as $pro)
                  			<tr>
								<td><button type="button" class="btn btn-success" id="bt_añadir"  data-dismiss="modal"  onclick="SeleccionarProveedor()"><i class="fa fa-check"></i> </button></td>    
								<td style="display:none;">{{ $pro->id }}</td>
								<td>{{ $pro->apellido }} {{ $pro->nombre }}</td>                
                			</tr>
                      		@endforeach
                    	</tbody>
						{{$usuarios->render()}}
                  	</table> 
					         
                </div>
				<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>Cerrar</button></div>

      		</div>
		</div>
	</div>
      
</div>


<!-- FIN Modal Proveedores-->	

@endsection

@push ('scripts')
  
  <script>
    
   		total = 0;
		totalRE = 0;
		totalNeto = 0;
		retencion = 0;
		var cont=0;
		var subtotal=[];
		var subtotalR=[];
		var arrProductos = new Array();
        var state =0;
		
    	function SeleccionarProducto(){
			
			$("table tbody tr").click(function() {
		 		
				var filaid= $(this).find("td:eq(0)").text();
	     		var filaNombre = $(this).find("td:eq(1)").text();
				var filaTipo = $(this).find("td:eq(2)").text();
				var filamonto = $(this).find("td:eq(3)").text();
				var filavariable = $(this).find("td:eq(4)").text();
				$("#pid").val(filaid);
				$("#pdescripcion").val(filaNombre);
				if(filaTipo == 'Haberes'){
					$("#pmonto").val(filamonto);
					
					if(filaNombre == 'SAC'){
						costo = 12500;
						$("#pmonto").val(costo);
					}
				}
				else{	
					
					var valor = 23000;

					if(filaNombre == 'Jubilacion'){
						costo = 23000 * (0.10);
						$("#pmonto").val(costo);
					}

					if(filaNombre == 'Obra Social'){
						costo = 23000 * (0.03);
						$("#pmonto").val(costo);
					}

					if(filaNombre == 'Cuota sindical'){
						costo = 23000 * (0.03);
						$("#pmonto").val(costo);
					}

				
					if(filaNombre == 'Asignaciones'){
						costo = 23000 * (0.05);
						$("#pmonto").val(costo);
					}
					
				}
				$("#ptipo").val(filaTipo);
			});
		}

		function SeleccionarProveedor(){

			$("#tablecliente tr").click(function() {
				$(this).addClass('selected').siblings().removeClass('selected');
		 		 var filaid= $(this).find("td:eq(1)").text();
	     		 var filaNombre = $(this).find("td:eq(2)").text();
				$("#pnombrePro").val();
				$("#idProveedor").val(filaid);
				$("#pnombrePro").val(filaNombre);
			});

		}
			
		function agregar(){

			idarticulo=$("#pid").val();
			articulo=$("#pdescripcion").val();
			valor=$("#pmonto").val();
			cantidad=$("#pcantidad").val();
			costo = $("#pcosto").val();
			tipo = $("#ptipo").val();
			if(tipo == 'Haberes'){
				monto= valor * cantidad ;
				retencion = 0;
			}
			else{
				monto= 0;
				retencion = valor * cantidad ;
			}
			
			

        	if (idarticulo!="" && cantidad!="" && cantidad>0 && costo!="")
        	{
				subtotal[cont]= monto * 1;
				
				if(tipo == 'Haberes'){
					total=total+subtotal[cont];
				}
				else{

					subtotalR[cont]= retencion * 1;
					totalRE = totalRE + subtotalR[cont];
				}
				totalNeto = total - totalRE;

				var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td> <td class= "idProducto" style="display:none;"><input type="text" name="idProducto[]" value="'+idarticulo+'">'+idarticulo+'</td>  <td  class ="cantidad"><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td> <td  class ="monto"><input type="hidden" name="monto[]" value="'+monto+'">'+monto+'</td> <td  class ="precio"><input type="hidden" name="valor[]" value="'+retencion+'">'+ retencion +'</td> <td  class ="precio"><input type="hidden" name="rete[]" value="'+retencion+'">'+ retencion +'</td> <td> </td> </tr>';
					
				cont++;
				
				$('#totalH').html("$ " + totalNeto);
				$('#total_haberes').val(totalNeto);
				
				$('#total').html("$ " + total);
				$('#total_venta').val(total);

				$('#totalR').html("$ " + totalRE);
				$('#total_retenciones').val(totalRE);
								
		  		$('#detalles').append(fila);
		  		limpiar();
				$("#guardar").show();
				cargar();
			}
			else
			{
				alert("Error al Ingresar el Detalle De la Compra, Revise los datos");
			}
		}
	
	function limpiar(){
		$("#pid").val("");
		$("#pdescripcion").val("");
		$("#pcantidad").val("");
		$("#pcosto").val("");
		$("#pmonto").val("");
		$("#ptipo").val("");
	}


	function eliminar(index){
		total=total-subtotal[index];
		totalRE = totalRE - subtotalR[index];
		totalNeto = total - totalRE;
		$('#total').html("$/. " + total);
		$('#total_venta').val(total);
		
		$('#totalH').html("$ " + totalNeto);
		$('#total_haberes').val(totalNeto);
				
		$('#totalR').html("$ " + totalRE);
		$('#total_retenciones').val(totalRE);

		$('#fila'+index).remove();
		cargar();
	}

		function doSearch(){
            const tableReg = document.getElementById('datos');
            const searchText = document.getElementById('searchTerm').value.toLowerCase();
            let total = 0;
 
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }
 
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }
 
            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") {
                lastTR.classList.add("hide");
            }
		}
	function cargar(){
		let materiales = [];
		document.querySelectorAll('#detalles tbody tr').forEach(function(e){
  		let fila = {
    		idProducto: e.querySelector('.idProducto').innerText,
    		unidad: e.querySelector('.cantidad').innerText,
    		haberes: e.querySelector('.monto').innerText
  		};
  		materiales.push(fila);
		$('#productosEnCompra').val("");
  		$('#productosEnCompra').val(JSON.stringify(materiales) );
	});

	}

</script>
@endpush
