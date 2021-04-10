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
            display: block;
        }

        header {
            height: 105px;
            background-color: rgba(63, 195, 51, 0.472);
            border-radius: 15px;
            text-align: center;
        }

        header>h3 {
            color: rgb(156, 129, 88);
        }

        header>p {
            position: absolute;
            margin-top: -20px;
            margin-left: 10px;
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
        .foto2 {
        padding: 10px;
        margin: 10px;
         border: 2px solid black;
        float: right; width: 150px; }
        p#firma {
            height: 200px;
        }

        aside p {
            display: inline-block;
            text-align: center;
            font-size: 11;
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(51, 224, 224);
            border-radius: 15px;
            height: 30px;
            width: 25%;
            padding: 10px;
            margin: 0 13 0;
        }

        aside {
            margin: 0;
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
        <aside>
            <p>
                Nombre y Apellido: <br>
                {{ $empleado->nombre }} {{ $empleado->apellido }}
            </p>
            <p>
                Cuit: <br>
                {{ $empleado->cuit }}
            </p>
            <p>
                Categoria:<br>
                {{ $empleado->categoria->descripcion }}
            </p>

        </aside>
        <aside>
            <p>
                Legajo:<br>
                {{ $empleado->id }}
            </p>
            <p>
                Periodo:<br>
                {{ $liquidacion->periodo_liquidacion }}
            </p>
            <p>
                Caja de Ahorro:<br>
                {{ $empleado->caja_de_ahorro->codigo }}
            </p>

        </aside>
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
        <p id="firma"><img src="https://i.pinimg.com/474x/8a/18/a6/8a18a624a0c7a5e9dfc2e83b45058b5a.jpg" class="foto2" alt=""></p>

        <br>
        <br>
        <hr>
        <header>
            <h3>Farmacia Avellaneda</h3>
            <h3>Av. Sarmiento 199 | 4000 | Tucumán------CUIT: 20-20433571-1</h3>
            <h3>Tel / Fax. 0381. 4219399 </h3>

            <p>Duplicado</p>
        </header>
        <aside>
            <p>
                Nombre y Apellido: <br>
                {{ $empleado->nombre }} {{ $empleado->apellido }}
            </p>
            <p>
                Cuit: <br>
                {{ $empleado->cuit }}
            </p>
            <p>
                Categoria:<br>
                {{ $empleado->categoria->descripcion }}
            </p>

        </aside>
        <aside>
            <p>
                Legajo:<br>
                {{ $empleado->id }}
            </p>
            <p>
                Periodo:<br>
                {{ $liquidacion->periodo_liquidacion }}
            </p>
            <p>
                Caja de Ahorro:<br>
                {{ $empleado->caja_de_ahorro->codigo }}
            </p>

        </aside>
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
        <p id="firma"><img src="https://i.pinimg.com/474x/8a/18/a6/8a18a624a0c7a5e9dfc2e83b45058b5a.jpg" class="foto2" alt=""></p>


</body>

</html>
