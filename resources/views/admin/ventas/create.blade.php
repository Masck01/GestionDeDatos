@extends('layouts.app')
@section('content')

<div class="container">

	<div class="row justify-content-center">

		<div class="col-md-12">

          	<div class="card card-secondary">

				<div class="card-header">

					<h3 class="card-title"> Nueva Venta </h3>

				</div>

				<div class="card-body">

					<form method="post" action="{{ route('ventas.store')}}" name="formulario">

					{{ csrf_field() }}

					</br>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                        <div class="form-group">

                            <label>Tipo Cliente</label>

                            <select class="form-control select2" style="width: 100%;" id="tipocliente" name="tipocliente">
                              <option value="Consumidor Final"> Consumidor Final</option>
                              <option value="Responsable Inscripto">Responsable Inscripto</option>
                            </select>

                        </div>

                    </div>
                    <div class="input-group">

                        <input type="text" readonly name="pnombreCliente" id="pnombreCliente" class="form-control" placeholder="Seleccione un Cliente">

                        <input type="hidden" readonly name="idCliente" id="idCliente" class="form-control" placeholder="">


                        <span class="input-group-btn">

                        <div class="input-group">

                            <div class="input-group-prepend">

                                <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                            </div>

                            <button type="button" class="btn btn-success" id="btnBuscarCliente"  data-toggle="modal"  data-target="#ModalCliente"><i class="fa fa-search"></i>

                                Buscar

                            </button>

                        </div>



                        </span>

                    </div>
                    @error ('idCliente')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
					<div class="input-group">

							<input type="text"  readonly name="pdescripcion" id="pdescripcion" class="form-control" placeholder="Seleccione un Producto">

							<input type="hidden" readonly name="pid" id="pid" class="form-control" placeholder="">

							<span class="input-group-btn">

								<button type="button" class="btn btn-success" id="btnBuscarPducto" data-toggle="modal" data-target="#ModalProductos"><i class="fa fa-search"></i></button>

							</span>

						</div>

						<br>

						<div class="row">

							<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4 col-xl-4">

								<label>Precio</label>

								<input type="number"  readonly name="pprecio" id="pprecio" class="form-control" placeholder="precio">

							</div>

							<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4 col-xl-4">

								<div class="form-group">

									<label for="cantidad">Cantidad</label>

									<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">

								</div>

							</div>

							<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">

								<div class="form-group">

									<label for="cantidad"></label>

									<button class="btn btn-success" data-toggle="tooltip" type="button"  id="bt_agregar" onclick="evaluar()" title="Agregar Producto" data-original-title="Agregar Producto">  Agregar </i></button>

								</div>

							</div>

        </div>

	</div>


	<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
		<div class="table-responsive">
		<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
			<thead style="background-color:#caf5a9">
			<th>Opciones</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Precio Venta</th>
			<th>Subtotal</th>
        </thead>
        <tfoot>
            <tr>
                <th>Subtotal</th>
                <th></th>
                <th></th>
                <th></th>
                <th><h4 id="subtotal">$ 00.00</h4> <input type="hidden" name="subtotal_venta" id="subtotal_venta">
            </tr>
            <tr>
                <th>IVA</th>
                <th></th>
                <th></th>
                <th></th>
                <th><h4 id="iva">$ 00.00</h4> <input type="hidden" name="iva_venta" id="iva_venta">
            </tr>
            <tr>
                <th>Total</th>
                <th></th>
                <th></th>
                <th></th>
                <th><h4 id="total">$ 00.00</h4> <input type="hidden" name="total_venta" id="total_venta">
            </tr>

       </tfoot>

        <tbody></tbody>
		</table>

		</div>

	<br>
		<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12" id="guardar1">
			<div class="form-group">
				<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				<input type="hidden" name="productosEnPedidos" id="productosEnPedidos" value="[]">
				<button id="guardar" class="btn btn-primary"  type="submit">Guardar</button>
		        <a class="btn btn-danger" href="{{route('ventas.index')}}" role="button">Volver</a>
		    </div>
		</div>
	</div>
</div>

</form>

<!-- Modal Productos-->

<div class="modal fade bd-example-modal-lg" id="ModalProductos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
        	<h5 class="modal-title" id="exampleModalLongTitle">Listado de Productos</h5>
     	 </div>
        <form>
        	Buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />
       	</form>
      <div class="modal-body">
	  <div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap" id="tableproducto">

		<thead>
		<tr role="row">
			<th class="sorting_asc" tabindex="0" aria-controls="tblSucursales" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Seleccione: activate to sort column descending" style="width: 74px;">Seleccione</th>
			<th class="sorting" tabindex="0" aria-controls="tblSucursales" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="display:none;">#</th>
			<th class="sorting" tabindex="0" aria-controls="tblSucursales" rowspan="1" colspan="1" aria-label="Dirección: activate to sort column ascending" style="width: 64px;">Producto</th>
			<th class="sorting" tabindex="0" aria-controls="tblSucursales" rowspan="1" colspan="1" aria-label="Dirección: activate to sort column ascending" style="width: 64px;">Stock</th>
			<th class="sorting" tabindex="0" aria-controls="tblSucursales" rowspan="1" colspan="1" aria-label="Dirección: activate to sort column ascending" style="width: 64px;">Precio Venta</th>
		</tr>
		</thead>

		<tfoot>
		<tr>
			<th rowspan="1" colspan="1">Seleccione</th>
			<th style="display:none;" rowspan="1" colspan="1">#</th>
			<th rowspan="1" colspan="1">Producto</th>
			<th rowspan="1" colspan="1">Stock</th>
			<th rowspan="1" colspan="1">Precio Venta</th>
		</tr>
		</tfoot>

		<tbody>
		@foreach ($productos as $pro)
			<tr>
			<td><button type="button" class="btn btn-success" id="bt_añadir"  data-dismiss="modal"  onclick="SeleccionarProducto()"><i class="fa fa-check"></i> </button></td>
			<td style="display:none;">{{ $pro->id }}</td>
			<td>{{ $pro->nombre }}</td>
			<td>{{ $pro->stock }}</td>
			<td>{{ $pro->precio_venta }}</td>
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

<!--Modal Clientes-->
<div class="modal fade bd-example-modal-lg" id="ModalCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-header">
        		<h4 class="modal-title">Listado de Clientes</h4>

				<form> <input class="btn btn-default" id="searchTerm" type="text" onkeyup="doSearch()" />
				<button type="button" class="btn btn-success" id="btnBuscarClienteModal"><i class="fa fa-search"></i></button>
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
                    		@foreach ($clientes as $cli)
                  			<tr>
								<td><button type="button" class="btn btn-success" id="bt_añadir"  data-dismiss="modal"  onclick="SeleccionarCliente()"><i class="fa fa-check"></i> </button></td>
								<td style="display:none;">{{ $cli->id }}</td>
								<td>{{ $cli->razon_social }}</td>
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

<!--Fin Modal Clientes-->

@endsection

@push ('scripts')

  <script>

    	var total=0;
		cont=0;
		total=0;
		subtotal=[];
        sub=0;
        let stock;
        iva=0;
		var arrProductos = new Array();
        var state =0;

		document.getElementById('select_sh').style.display = "none";

    	function SeleccionarProducto(){

			$("table tbody tr").click(function() {
				var filaid= $(this).find("td:eq(1)").text();
	     		var filaNombre = $(this).find("td:eq(2)").text();
				var filaStock = $(this).find("td:eq(3)").text();
				var filaPrecio = $(this).find("td:eq(4)").text();

				$("#pid").val(filaid);
				$("#pdescripcion").val(filaNombre);
				stock = filaStock;
				$("#pprecio").val(filaPrecio);

			});
		}

		/*function SeleccionarCliente(){
			$("#tablecliente tr").click(function() {
			$(this).addClass('selected').siblings().removeClass('selected');
		 	 var filaid= $(this).find("td:eq(0)").text();
	     	 var filaNombre = $(this).find("td:eq(1)").text();
  			 var filaDni = $(this).find("td:eq(2)").text();
			$("#idCliente").val(filaid);
			$("#pnombreCli").val(filaNombre);
			$("#pdniCli").val(filaDni);
			});*/



		function evaluar(){

		 	var indice = 1;

		 	if(indice<=0)
			{
				state =0;
				alert("Debe seleccionar un cliente")
				$("#guardar").hide();
			}
			else
			{
				state = 0;
				agregar();
			}
		}

		function agregar(){

			idarticulo=$("#pid").val();
			articulo=$("#pdescripcion").val();

			cantidad=$("#pcantidad").val();
            tipocliente=$("#tipocliente").val();
			precio = document.getElementById('pprecio').value;
        	if (idarticulo!="" && cantidad!="" && cantidad>0 && precio!="" && Number.isInteger(parseFloat(cantidad) ))
        	{
                if(parseInt(stock)>cantidad)
                {

				subtotal[cont]=(cantidad*precio);
				sub=sub+subtotal[cont];
                if (tipocliente!="Responsable Inscripto"){
                    iva= 0;
                }else {
                    iva= sub*0.21;
                }

                total=sub+iva;



				var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td> <td class= "idProducto" style="display:none;"><input type="hidden" name="idProducto[]" value="'+idarticulo+'">'+idarticulo+'</td>  <td  class ="cantidad"><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td> <td  class ="precio"><input type="hidden" name="precio[]" value="'+precio+'">'+ precio +'</td> <td> $ '+subtotal[cont]+'</td></tr>';
				cont++;

                $('#subtotal').html("$/ " + sub);
		    	$('#subtotal_venta').val(sub);
                $('#iva').html("$/ " + iva);
		    	$('#iva_venta').val(iva);
		    	$('#total').html("$/ " + total);
		    	$('#total_venta').val(total);

                $('#detalles').append(fila);
		  		limpiar();
				$("#guardar").show();
				cargar();
                }
                else{
                alert("Error no hay suficiente stock disponible");

                }

			}
			else
			{
				alert("Error al ingresar el detalle del presupuesto, revise los datos del producto");
			}
		}

	function limpiar(){
		$("#pid").val("");
		$("#pdescripcion").val("");
		$("#pcantidad").val("");
		$("#pdeposito").val("");
		$("#pprecio").val([]);
	}


	function eliminar(index){
		total=total-subtotal[index];
		$('#total').html("$/. "+total);
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
		$('#productosEnPedidos').val("");
  		$('#productosEnPedidos').val(JSON.stringify(materiales) );
	});

	}
    function SeleccionarCliente(){

$("#tablecliente tr").click(function() {
    $(this).addClass('selected').siblings().removeClass('selected');
      var filaid= $(this).find("td:eq(1)").text();
      var filaNombre = $(this).find("td:eq(2)").text();
    $("#pnombreCliente").val();
    $("#idCliente").val(filaid);
    $("#pnombreCliente").val(filaNombre);
});

}


</script>
@endpush
