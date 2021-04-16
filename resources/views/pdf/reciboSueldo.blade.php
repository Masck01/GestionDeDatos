<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        body {
            margin: -30 0 0 0;
        }

        div {
            position: relative;
        }

        header {
            position: relative;
            height: 105px;
            background-color: rgba(63, 195, 51, 0.472);
            border-radius: 15px;
            text-align: center;
        }

        header>h3 {
            color: rgb(156, 129, 88);
        }

        header p {
            position: absolute;
            top: 5px;
            left: 5px;
            color: #FFFFFF;
        }

        table {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 10;
            width: 100%;
        }

        th {
            background-color: rgba(29, 185, 29, 0.452)
        }



        tr:nth-child(even) {
            background-color: rgba(30, 245, 155, 0.404)
        }

        .imgcontainer {
            margin-top: -10px;
            height: 100px;
            width: 100%;
            outline: black 1px solid;
        }

        .imgcontainer__p{
            display: inline-block;
            position: absolute;
            width: 50%;
            padding-left: 10px;
        }

        .imgcontainer__img {
            position: absolute;
            height: 95px;
            width: 50%;
            right: 0;
            padding: 2px;
        }
        .asidecontainer {
            margin-top: -10px;
            width: 100%;
            height: 90px;
        }

        .asidecontainer p {
            display: inline-block;
            position: absolute;
            text-align: center;
            font-size: 11;
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(51, 224, 224);
            border-radius: 15px;
            height: 35px;
            width: 20%;
            margin: auto;
        }


        .asidecontainer__pnomyap{
            top: 0;
            left: 0;
        }
        .asidecontainer__pcuit{
            top: 0;
            left: 270px;
        }
        .asidecontainer__pdescripcion{
            top: 0;
            right: 0;
        }
        .asidecontainer__pid{
            top: 55px;
        }
        .asidecontainer__pliq{
            top: 55px;
            right: 0;
        }
        .asidecontainer__pcodigo{
            top: 55px;
            left: 270px;
        }
    </style>
</head>

<body>

    <div>
        <header>
            <h3>Farmacia Avellaneda</h3>
            <h3>Av. Sarmiento 199 | 4000 | Tucumán------CUIT: 20-20433571-1</h3>
            <h3>Tel / Fax. 0381. 4219399 </h3>
        </header>
        <div class="asidecontainer">
            <p class="asidecontainer__pnomyap">
                Nombre y Apellido:
                {{ $empleado->nombre }} {{ $empleado->apellido }}
            </p>
            <p class="asidecontainer__pcuit">
                Cuit:
                {{ $empleado->cuit }}
            </p>
            <p class="asidecontainer__pdescripcion">
                Categoria:
                {{ $empleado->categoria->descripcion }}
            </p>

            <p class="asidecontainer__pid">
                Legajo:
                {{ $empleado->id }}
            </p>
            <p class="asidecontainer__pliq">
                Periodo:
                {{ $liquidacion->periodo_liquidacion }}
            </p>
            <p class="asidecontainer__pcodigo">
                Caja de Ahorro:
                {{ $empleado->caja_de_ahorro->codigo }}
            </p>

        </div>
        <table>
            <thead>
                <tr>

                    <th>#</th>
                    <th>Concepto</th>
                    <th>Unidades</th>
                    <th>Haberes</th>
                    <th>Retenciones</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($linea_liquidacion as $l)
                <tr>
                    {{-- # --}}
                    <td>{{ $loop->iteration }}</td>
                    {{-- Concepto --}}
                    <td>{{ $conceptos->find($l->concepto_id)->descripcion }}</td>
                    {{-- Unidades --}}
                    <td>{{ $l->unidad }}</td>
                    {{-- Haberes --}}
                    @if ($l->concepto()->first()->tipo == 'Haber')
                    <td>{{ $l->montofijo ?? $l->montovariable }}</td>
                    <td></td>
                    @endif
                    @if ($l->concepto()->first()->tipo == 'Retencion')
                    <td></td>
                    <td>{{ $l->montovariable }}</td>
                    @endif
                    {{-- Total Parcial --}}
                    <td></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>Totales</th>
                <th></th>
                <th></th>
                <th>{{ $liquidacion->salario_bruto }}</th>
                <th>{{ $liquidacion->retenciones }}</th>
                <th>{{ $liquidacion->salario_neto }}</th>
            </tfoot>
        </table>
        <div class="imgcontainer">
            <p class="imgcontainer__p">SON PESOS: {{$numaletra->toWords($liquidacion->salario_neto)}}</p>
            <img class="imgcontainer__img" src="{{url('/img/firma.jpg')}}">
        </div>
        <header>
            <h3>Farmacia Avellaneda</h3>
            <h3>Av. Sarmiento 199 | 4000 | Tucumán------CUIT: 20-20433571-1</h3>
            <h3>Tel / Fax. 0381. 4219399 </h3>
            <p>Duplicado</p>
        </header><div class="asidecontainer">
            <p class="asidecontainer__pnomyap">
                Nombre y Apellido:
                {{ $empleado->nombre }} {{ $empleado->apellido }}
            </p>
            <p class="asidecontainer__pcuit">
                Cuit:
                {{ $empleado->cuit }}
            </p>
            <p class="asidecontainer__pdescripcion">
                Categoria:
                {{ $empleado->categoria->descripcion }}
            </p>

            <p class="asidecontainer__pid">
                Legajo:
                {{ $empleado->id }}
            </p>
            <p class="asidecontainer__pliq">
                Periodo:
                {{ $liquidacion->periodo_liquidacion }}
            </p>
            <p class="asidecontainer__pcodigo">
                Caja de Ahorro:
                {{ $empleado->caja_de_ahorro->codigo }}
            </p>

        </div>
        <table>
            <thead>
                <tr>

                    <th>#</th>
                    <th>Concepto</th>
                    <th>Unidades</th>
                    <th>Haberes</th>
                    <th>Retenciones</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($linea_liquidacion as $l)
                <tr>
                    {{-- # --}}
                    <td>{{ $loop->iteration }}</td>
                    {{-- Concepto --}}
                    <td>{{ $conceptos->find($l->concepto_id)->descripcion }}</td>
                    {{-- Unidades --}}
                    <td>{{ $l->unidad }}</td>
                    {{-- Haberes --}}
                    @if ($l->concepto()->first()->tipo == 'Haber')
                    <td>{{ $l->montofijo ?? $l->montovariable }}</td>
                    <td></td>
                    @endif
                    @if ($l->concepto()->first()->tipo == 'Retencion')
                    <td></td>
                    <td>{{ $l->montovariable }}</td>
                    @endif
                    {{-- Total Parcial --}}
                    <td></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>Totales</th>

                <th></th>
                <th></th>
                <th>{{ $liquidacion->salario_neto + $liquidacion->retenciones }}</th>
                <th>{{ $liquidacion->retenciones }}</th>
                <th>{{ $liquidacion->salario_neto }}</th>

            </tfoot>
        </table>
        <div class="imgcontainer">
            <p class="imgcontainer__p">SON PESOS: {{$numaletra->toWords($liquidacion->salario_neto)}}</p>
            <img class="imgcontainer__img" src="{{url('/img/firma.jpg')}}">
        </div>


</body>

</html>
