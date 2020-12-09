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
							<label>Empleado: {{$usuarios->apellido}} {{$usuarios->nombre}}</label>									
							<input type="hidden" name="empleado_id" value= " {{ $usuarios->id }}">
						</div>

						<div class="input-group">
							<label>Periodo: @php  echo date('m', strtotime('-1 month')) . '/' . date('y')  @endphp</label>										
							<input type="hidden" name="periodo" value= " @php  echo date('m', strtotime('-1 month')) . '/' . date('y')@endphp">
						</div>

						<div class="input-group">
							<label>Fecha y Hora: @php  echo date('d/m/y H:m:s') @endphp</label>										
						</div>

						<div class="input-group">
							<label>Desde: @php  echo '1/'.date('m', strtotime('-1 month')) . '/' . date('y') @endphp Hasta: @php  echo '30/'.date('m', strtotime('-1 month')) . '/' . date('y') @endphp</label>										
							<input type="hidden" name="fechaDesde" value= "@php  echo '1/'.date('m', strtotime('-1 month')) . '/' . date('y') @endphp">
							<input type="hidden" name="fechaHasta" value= " @php  echo '30/'.date('m', strtotime('-1 month')) . '/' . date('y') @endphp">
						</div>
		
						<br>

						<div class="row">
							
							<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
								
								<div class="table-responsive">
									
									<table id="table" class="table table-striped table-bordered table-condensed table-hover">
										<thead style="background-color:#caf5a9">
										<th>#</th>
										<th>Concepto</th>
										<th>Unidades</th>
										<th>Haberes</th>
										<th>Retenciones</th>
										<th>Total</th>
										
										</thead>
										<tbody>
										@foreach ($conceptos as $categoria)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{ $categoria->conceptos->descripcion }}</td>
											@if($categoria->montoVariable == '0')
												@if($categoria->conceptos->descripcion == 'Antiguedad')
												<td> {{$categoria->calcularAntiguedad($usuarios->fechaIngreso)}} [Años]</td>	
												@else
												<td> 1[u]</td>	
												@endif								
											@else
												<td> {{$categoria->montoVariable*100}} %</td>
											@endif
											@if($categoria->conceptos->descripcion == 'Antiguedad')
											<td>{{ $categoria->calcularAntiguedad($usuarios->fechaIngreso) * $categoria->montoFijo }}</td>
											@else
											<td>{{ $categoria->montoFijo }}</td>
											@endif
											<td>{{ $categoria->calcular($categoria->montoVariable,$usuarios->categoria_id) }}</td>
											@if($categoria->conceptos->descripcion == 'Antiguedad')
											<td>$ {{ $categoria->calcularAntiguedad($usuarios->fechaIngreso) * $categoria->montoFijo }}</td>
											@else
											<td>$ {{  $categoria->montoFijo - $categoria->calcular($categoria->montoVariable , $usuarios->categoria_id) }}</td>
											@endif
										</tr>
										@endforeach
										</tbody>
									<tfoot>
										<th>Totales</th>
										<th></th>
										<th></th>
										<th><h4 id="totalR">Bruto: $ {{ $haberest }}</h4> <input type="hidden" name="bruto" id="total_haberes" value= " {{ $haberest }}"></th>
										<th><h4 id="totalH">Retenciones: $ {{ $retenciones }}</h4> <input type="hidden" name="retencion" id="total_retenciones" value= " {{ $retenciones }}"></th>
										<th><h4 id="totalH">Neto: $ {{  $haberest - $retenciones }}</h4> <input type="hidden" name="neto" id="total_retenciones" value= " {{ $haberest - $retenciones }}"></th>
									</tfoot>
									<tbody></tbody>
									</table>

									
								</div>
							
							</div>
								<br>
								
							<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12" id="guardar1">
									
									<div class="form-group">
										
										<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
										
										<input type="hidden" name="productosEnPedidos" id="productosEnPedidos" value="{{$collection->toJson()}}">
										
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

@endsection

@section('script')


  <script type="text/javascript">
  	
	  $(document).ready(main);
	  
	  function suma_total() {

		var cont_fila = ($('#table tbody').find('tr').length);
		var total_general = 0;
		for (var i = 1; i <= cont_fila; i++) {
			var subtotal = $('#Subtotal_' + i).val();
			total_general = parseFloat(total_general) + parseFloat(subtotal);
		}
		$("#detalle_total").text((total_general * 1).toFixed(2));

		}

		$(document).ready(main);

		function main(){

			function info_logros() {
				var mensajes = <? echo info_logros("hola")?>;

				console.log(mensajes);
			}
		};
  </script>
@endsection