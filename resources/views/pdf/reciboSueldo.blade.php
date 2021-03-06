<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Comprobante</title>
  </head>
  <style>

@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 16cm;  
  height: 29.7cm; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;

}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 165%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #57B223;
  text-align: center;
}

table .desc {
  text-align: center;
}

table .unit {
  background: #DDDDDD;
  text-align: center;
}

table .qty {
  text-align: center;
}

table .total {
  background: #57B223;
  color: #FFFFFF;
   text-align: center;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 165%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}
  </style>

  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/home.jpg">
      </div>
      <div id="company">
        <h2 class="name">FARMACIA AVELLANEDA NORTE</h2>
        <div>Av. Sarmiento 199 | 4000 | Tucumán</div>
        <div>Tel / Fax. 0381. 4219399 </div>
        <div><a href="mailto:dhsay@arnet.com.ar">favellanedanorte@arnet.com.ar</a></div>
      </div>
      </div>
    </header>
    <main>
    <div id="details" class="clearfix">
        <div id="client">
          <h2 class="name">Empleado:{{$liquidacion->usuario->apellido}} {{$liquidacion->usuario->nombre}}</h2>
          <div class="address">Direccion: {{$liquidacion->usuario->domicilio}}</div>
        </div>
        <div id="invoice">
          <h1>- Boleta de  Sueldo -</h1>
          <div class="date">Fecha: {{$liquidacion->getFromDateAttribute($liquidacion->fecha)}}</div>
          <div class="date">Periodo: {{$liquidacion->periodo}}</div>
          <div class="date">Desde: {{$liquidacion->fechaDesde}} Hasta:  {{$liquidacion->fechaHasta}}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="desc">#</th>
            <th class="desc">Concepto</th>
                  <th class="desc">Unidades</th>
                  <th class="qty">Haberes</th>
                  <th class="qty">Retenciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($detalle as $det)
                  <tr>
                    <td  class="desc">{{$loop->iteration}}</td>
                    <td  class="desc">{{$det->concepto->descripcion }}</td>
                    <td  class="unit">{{$det->unidad }}</td>
                    @if(($det->concepto->tipo == 'Haberes')) 
                      @if(($det->haberes == 0))
                       <td class="qty"> AR$ {{$det->concepto->montofijo * 23000}} </td>
                       <td class="qty"> AR$ 0  </td>       
                       @else
                      <td class="qty"> AR$ {{$det->haberes }} </td>
                      <td class="qty"> AR$ 0  </td>
                       @endif
                    @else
                    <td class="qty"> AR$ 0  </td>
                    @endif 
                    @if(($det->concepto->tipo == 'Retenciones'))
                        <td class="qty"> AR$ {{$det->concepto->montoVariable  * 23000}} </td> 
                    @endif   
                  </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td style="text-align: center"> Salario Bruto AR$ {{$liquidacion->salarioBruto}}</td>
            <td style="text-align: center"> Retenciones AR$ {{$liquidacion->salarioBruto - $liquidacion->salarioNeto}}</td>
            <td style="text-align: center"> Salario Neto AR$ {{$liquidacion->salarioNeto}}</td>
          </tr>
        </tfoot>
      </table>
    </main>
    <footer>
    </footer>
  </body>
</html>