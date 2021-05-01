<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>

@import url('fonts/BrixSansRegular.css');
@import url('fonts/BrixSansBlack.css');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
p, label, span, table{
	font-family: Arial;
	font-size: 12pt;
}
.h2{
	font-family: 'BrixSansBlack';
	font-size: 16pt;
}
.h3{
	font-family: 'Arial';
	font-size: 15pt;
	display: block;
	background: #0a4661;
	color: #FFF;
	text-align: center;
	padding: 3px;
	margin-bottom: 5px;
}
.imgRedonda {
    width:150px;
    height:150px;
    border-radius:75px;
	margin-left: 30px;
}
#page_pdf{
	width: 95%;
	margin: 15px auto 10px auto;
}

#factura_head, #factura_cliente, #factura_detalle{
	width: 100%;
	margin-bottom: 10px;
}
.logo_factura{
	width:10px;
	height:50px;
}
.info_empresa{
	width: 40%;
	text-align: center;
}
.info_factura{
	width: 25%;
}
.info_cliente{
	width: 100%;
}
.datos_cliente{
	width: 100%;
}
.datos_cliente tr td{
	width: 50%;
}
.datos_cliente{
	padding: 10px 10px 0 10px;
}
.datos_cliente label{
	width: 80px;
	display: inline-block;
}
.datos_cliente p{
	display: inline-block;
}

.textright{
	text-align: right;
	font-size: 15px;
}
.textleft{
	text-align: left;
	font-size: 15px;
}
.textcenter{
	text-align: center;
	font-size: 15px;
}
.round{
	border-radius: 10px;
	border: 1px solid #0a4661;
	overflow: hidden;
	padding-bottom: 15px;
}
.round p{
	padding: 0 15px;
}

#factura_detalle{
	border-collapse: collapse;
}
#factura_detalle thead th{
	background: #058167;
	color: #FFF;
	padding: 10px;
}
#detalle_productos tr:nth-child(even) {
    background: #ededed;

}
#detalle_totales span{
	font-family: 'BrixSansBlack';
}
.nota{
	font-size: 8pt;
}
.label_gracias{
	font-family: arial;
	font-weight: bold;
	font-style: italic;
	text-align: center;
	margin-top: 20px;
}
.anulada{
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translateX(-50%) translateY(-50%);
}

</style>

<body>

<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="info_factura">
				<div>
					<img src="img/home.jpg" class='imgRedonda' >
				</div>
			</td>
			<td class="info_empresa">
				<div>

				<span class="h2">FARMACIA AVELLANEDA NORTE</span><h5>Av Sarmiento 199| 4000 | Tucumán</h5>
				</br>
				<p<span class="h2">LIBRO COMPRA</span></p>
				</br>
					@if($from != 0 && $to != 0)
					<p><span>Fecha desde {{$from}} hasta {{$to}}</span></p>
					@else
					<p><span class="h2">Historico</span></p>
					@endif
				</div>
			</td>

			<td class="info_factura">

			</td>
		</tr>
	</table>

		<table id="factura_detalle">

			<thead>
				<tr>
                    <th></th>
					<th width="100px">Fecha</th>
                    <th class="textcenter">Nro Factura</th>
					<th class="textcenter"width="100x">Tipo Proveedor</th>
					<th class="textcenter">Proveedor</th>
					<th class="textcenter" > CUIT </th>
					<th class="textcenter"> Total bruto </th>
					<th class="textcenter"  >IVA</th>
					<th class="textcenter" >Total Neto</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">
				@foreach ($compras as $compra)
				<tr>

                    <td style="text-align:center;">{{$loop->iteration}}</td>
                    <td>{{ $compra->getFromDateAttribute($compra->fechacompra) }}</td>
                    <td>{{$compra->nrofactura}}</td>
                    <td>{{ $compra->tipoproveedor}}</td>
                    <td>{{ Arr::get($compra,'proveedor.razon_social')}}</td>
                    <td>{{ Arr::get($compra,'proveedor.cuit')}}</td>
                    <td>AR$ {{ $compra->subtotalcompra }}  </td>
                    <td>AR$ {{ $compra->ivacompra }}  </td>
                    <td> AR$ {{ $compra->total }} </td>
				</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
            <thead>
                <tr>

                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>

                    <th>TOTALES</th>
                    <th class="textcenter" > ARS {{$compra->sum('subtotalcompra')}}</th>
                    <th class="textcenter" > ARS {{$compra->sum('ivacompra')}}</th>
                    <th class="textcenter" >ARS {{$compra->sum('total')}}</th>

		</table>


</div>

</body>

</html>
