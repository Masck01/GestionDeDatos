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
  padding: 10px 10px;
  margin-bottom: 20px;
  border-bottom: 2px solid #AAAAAA;
  border-top: 2px solid #0087C3;
  border-right: #0087C3;
  width: 165%;
}

#logo {
  float: left;
  margin-top: 8px;

}

#logo img {
  height: 70px;
}

#company {
  float: left;
  text-align: left;
  position: relative;
  padding-left: 10px;
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

div#Nro {

font-family: Arial, sans-serif;
font-size: 18px;
font-family: SourceSansPro;
float: right;
position: relative;
}

#test2{
    width: 150%;
}
div#client2{
  float: left;
  position: relative;
}

div#emp{
    float: right;
    position: relative;
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
  border-top:2px solid grey;
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

img#FacturaC {
text-align: center;
padding: 20px;
margin-left: 450px;
margin-top: 0px;
border: 2px solid black;
float: center; width: 50px;
position: relative;
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

      <div class="row">
            <div class="col-md-4" id="logo">
                <img src="img/home.jpg">
            </div>
            <div class="col-md-4" id="company">
                <h2 class="name">FARMACIA AVELLANEDA NORTE</h2>
                <div>Av. Sarmiento 199 | 4000 | Tucumán</div>
                <div>Tel / Fax. 0381. 4219399 </div>
                <div><a href="mailto:dhsay@arnet.com.ar">favellanedanorte@arnet.com.ar</a></div>
              </div>
              <div class="col-md-4">
                <img id="FacturaC" src="https://mtsmalta.com/onlineshop/img/p/1/1/2/1/5/11215-tm_home_default.jpg" alt="">
              </div>
              <div id='Nro' class="col-md-8">
                <div>Factura Nº:: {{ '000'.$pedido->empleado_id."-".'0000000'.$pedido->id}} </div>
                <div>Fecha:{{ $pedido->getFromDateAttribute($pedido->fecha)}}</div>
                <div>Hora:{{ $pedido->getFromHoraAttribute($pedido->hora)}}</div>
              </div>
      </div>
      <hr>





    </header>


    <main>

      <div id="test2" class="row">
        <div id="Client2" class="col-md-8">
            <div>Tipo Cliente:{{ $pedido->tipocliente}}</div>
            </div>

        <div id="emp2">
            <div>Forma de pago: Contado</div>
            <div>Empleado: {{Arr::get($pedido,'empleado.apellido')}} {{Arr::get($pedido,'empleado.nombre')}} </div>
        </div>

      </div>








      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="desc">#</th>
            <th class="desc">PRODUCTO</th>
            <th class="qty">CANTIDAD</th>
            <th class="qty">PRECIO UNITARIO</th>
            <th class="qty">SUBTOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($detalle as $det)
                      <tr>
                        <td class="desc">{{$loop->iteration}}</td>
                        <td class="desc">{{ $det->producto->nombre }}</td>
                        <td class="unit">{{ $det->cantidad }}</td>
                        <td class="qty"> AR$ {{ $det->producto->precio_venta }} </td>
                        <td class="qty"> AR$ {{ $det->cantidad * $det->producto->precio_venta}}</td>
                      </tr>
               @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"></td>
                <td colspan="2">TOTAL BRUTO</td>
                <td style="text-align: center">AR$ {{$pedido->subtotalventa}}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2">IVA</td>
                <td style="text-align: center">AR$ {{$pedido->iva}}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <p>Son Pesos AR$ {{$numaletras->toWords($pedido->total)}}</p>
                <td colspan="2">TOTAL NETO</td>
                <td style="text-align: center">AR$ {{$pedido->total}}</td>
            </tr>
        </tfoot>
      </table>
    </main>
    <footer>
    </footer>
  </body>
</html>
