@extends('layouts.app')
@section('content')

<div class="container">

	<div class="row justify-content-center">

		<div class="col-md-12">

			<div class="card card-secondary">

				<div class="card-header">

				<h3 class="card-title">Nueva Compra</h3>

				</div>

				<div class="card-body">
				<!-- /.card-header -->

					<form method="post" action="{{ route('compras.store')}}" name="formulario">

						{{ csrf_field() }}
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                            <div class="form-group">

                                <label>Tipo Proveedor</label>

                                <select class="form-control select2" style="width: 100%;" id="tipoproveedor" name="tipoproveedor">
                                  <option value="No Inscripto">No Inscripto</option>
                                  <option value="Responsable Inscripto">Responsable Inscripto</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                              <label>Fecha de Compra</label>
                              <input type="date" class="form-control" placeholder="Enter ..." id="fechacompra" name="fechacompra">
                            </div>
                        </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                            <div class="form-group">

                                <label for="cantidad">Nro Factura</label>

                                <div class="input-group">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>


                                    </div>

                                    <input type="number" name="nrofactura" id="nrofactura" class="form-control" placeholder="XXXX-XXXXXXXX">

                                </div>

                            </div>


                        </div>


						<div class="input-group">

							<input type="text" readonly name="pnombrePro" id="pnombrePro" class="form-control" placeholder="Seleccione un Proveedor">

							<input type="hidden" readonly name="idProveedor" id="idProveedor" class="form-control" placeholder="">

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
                        @error ('idProveedor')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
						<br>

						<div class="input-group">

							<input type="text"  readonly name="pdescripcion" id="pdescripcion" class="form-control" placeholder="Seleccione un Producto">

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

								<label>Costo</label>

								<div class="input-group">

									<div class="input-group-prepend">

										<span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill"></i></span>

									</div>

									<input type="number" name="pcosto" id="pcosto" class="form-control"  maxlength="7" placeholder="">

								</div>

							</div>

							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">

								<div class="form-group">

									<label for="cantidad">Cantidad</label>

									<div class="input-group">

										<div class="input-group-prepend">

											<span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

										</div>

										<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">

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
										<th>Producto</th>
										<th>Cantidad</th>
										<th>Costo</th>
                                        <th>Subtotal</th>

									</thead>
									<tfoot>
										<tr>
                                            <th>Subtotal</th>
										    <th></th>
										    <th></th>
                                            <th></th>
										    <th><h4 id="subtotal">$ 00.00</h4> <input type="hidden" name="subtotal_compra" id="subtotal_compra">
                                        </tr>
                                        <tr>
                                            <th>IVA</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th><h4 id="iva">$ 00.00</h4> <input type="hidden" name="iva_compra" id="iva_compra">
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th><h4 id="total">$ 00.00</h4> <input type="hidden" name="total_compra" id="total_compra">
                                        </tr>
									</tfoot>
									<tbody></tbody>
									</table>

								</div>

							</div>



								<br>
                    </div>
                        <div class="row">
							<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12" id="guardar1">

									<div class="form-group">

										<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>

										<input type="hidden" name="productosEnCompra" id="productosEnCompra" value="[]">

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
        	<h5 class="modal-title" id="exampleModalLongTitle">Listado de Productos</h5>
     	 </div>
          <form >
            <label> Buscar Producto:</label>  <input id="searchTerm" type="text" onkeyup="doSearch()" />
          </form>


      <div class="modal-body">
	  <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="datos">
                    <thead>
                      <tr>
					      <th>#</th>
                          <th>Nombre</th>

						  <th>Opcion</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($productos as $pro)
                  	<tr>
					<td>{{ $pro->id }}</td>
					<td>{{ $pro->nombre }}</td>

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
                    		@foreach ($proveedores as $pro)
                  			<tr>
								<td><button type="button" class="btn btn-success" id="bt_añadir"  data-dismiss="modal"  onclick="SeleccionarProveedor()"><i class="fa fa-check"></i> </button></td>
								<td style="display:none;">{{ $pro->id }}</td>
								<td>{{ $pro->razon_social }}</td>
                			</tr>
                      		@endforeach
                    	</tbody>
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
		var cont=0;
		var subtotal=[];
        var iva=0;
        var sub=0;
        var arrProductos = new Array();
        var state =0;

    	function SeleccionarProducto(){

			$("table tbody tr").click(function() {

				var filaid= $(this).find("td:eq(0)").text();
	     		var filaNombre = $(this).find("td:eq(1)").text();
				$("#pid").val(filaid);
				$("#pdescripcion").val(filaNombre);
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
			cantidad=$("#pcantidad").val();
			costo = $("#pcosto").val();

        	if (idarticulo!="" && cantidad!="" && cantidad>0 && costo!="" && Number.isInteger(parseFloat(cantidad)) )
        	{
				subtotal[cont]= costo * cantidad;
				sub=sub+subtotal[cont];
                iva= sub*0.21;
                total=sub+iva;


				var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td> <td class= "idProducto" style="display:none;"><input type="hidden" name="idProducto[]" value="'+idarticulo+'">'+idarticulo+'</td>  <td  class ="cantidad"><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td> <td  class ="precio"><input type="hidden" name="precio[]" value="'+costo+'">'+ costo +'</td> <td> $ '+subtotal[cont]+'</td></tr>';
				cont++;
                $('#subtotal').html("$ " + sub);
		    	$('#subtotal_compra').val(sub);
                $('#iva').html("$ " + iva);
		    	$('#iva_compra').val(iva);
				$('#total').html("$ " + total);
				$('#total_compra').val(total);
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
	}


	function eliminar(index){
		total=total-subtotal[index];
		$('#total').html("$/. " + total);
		$('#total_venta').val(total);
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
    		cantidad: e.querySelector('.cantidad').innerText,
    		precio: e.querySelector('.precio').innerText
  		};
  		materiales.push(fila);
		$('#productosEnCompra').val("");
  		$('#productosEnCompra').val(JSON.stringify(materiales) );
	});

	}

</script>
@endpush
