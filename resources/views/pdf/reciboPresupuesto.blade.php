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
        <img src="img/logos/logo.png">
      </div>
      <div id="company">
        <h2 class="name">DHS DIGITAL ©</h2>
        <div>Av. C. Pellegrini 1531 | 4000 | Tucumán</div>
        <div>Tel / Fax. 0381. 4361146 · 4364239</div>
        <div><a href="mailto:dhsay@arnet.com.ar">dhsay@arnet.com.ar</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">PRESUPUESTO DE:</div>
          <h2 class="name">{{$presupuesto->cliente->nombre_Fantasia}}</h2>
          <div class="address">{{$presupuesto->cliente->direccion}} {{$presupuesto->cliente->ciudad}} {{$presupuesto->cliente->provincia->nombre}}</div>
          <div class="email"><a href="mailto:{{$presupuesto->cliente->email}}">{{$presupuesto->cliente->email}}</a></div>
        </div>
        <div id="invoice">
          <h1>- Presupuesto -</h1>
          <div class="date">Fecha: {{$presupuesto->getFromDateAttribute($presupuesto->fecha)}}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">PRODUCTO</th>
            <th class="unit">PRECIO UNITARIO</th>
            <th class="qty">CANTIDAD</th>
            <th class="total">SUBTOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($detalle as $det)
                      <tr>
                        <td class="no">{{$loop->iteration}}</td>
                        <td class="desc">{{ $det->producto->nombre }}</td>
                        <td class="unit">{{ $det->cantidad }}</td>
                        @if($presupuesto->tipo == 'Pesos')
                        <td class="qty">AR$ {{ $det->precio }}</td>
                        <td class="total">AR$ {{ $det->cantidad * $det->precio }}</td>
                        @else
                        <td class="qty"> U$D {{ $det->precio }} </td>
                        <td class="total"> U$D {{ $det->cantidad * $det->precio }}</td>
                        @endif
                      </tr>
               @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TOTAL</td>
            @if($presupuesto->tipo == 'Pesos')
                        <td style="text-align: center">AR$ {{$presupuesto->total}}</td>
                        @else
                        <td style="text-align: center"> U$D {{$presupuesto->total}}</td>
                        @endif
          </tr>
        </tfoot>
      </table>
    </main>
    <footer>
    </footer>
  </body>
</html>