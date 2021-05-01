@extends('layouts.app')
@section('content')
<div class="container">

  <div class="row justify-content-center">

      <div class="col-md-12">

        <section class="content-header">

          <div class="container-fluid">

            <div class="row mb-2">

              <div class="col-sm-6">

                <h1 class="card-title">Libro IVA Ventas</h1>

              </div>

            </div>

          </div>

        </section>

        @if(Session::has('error'))
                  <p class="alert alert-danger">{{ Session::get('error') }}</p>
          @endif

        <div class="row">

          <div class="col-12">

            <div class="card">

              <div class="card-header">

                <h3 class="card-title">Listado de Ventas</h3>

                  <div class="card-tools">

                    <form class="form-inline" action="{{ route('ventas.libroVentas') }}" role="form">

                        <div class="input-group input-group-sm" style="width: 700px;">

                          <label class="form-control float-right" >Fecha desde </label>

                          <input type="date" name="searchDate" class="form-control float-right" placeholder="Buscar" id="searchTerm"  onkeyup="doSearch()">

                          <label class="form-control float-right" >Fecha Hasta </label>

                          <input type="date" name="searchDateHasta" class="form-control float-right" placeholder="Buscar" id="searchTerm"  onkeyup="doSearch()">

                          <div class="input-group-append">

                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>

                          </div>

                        </div>

                    </form>

                  </div>

              </div>

              <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap" id="datos">

                  <thead>

                    <tr>
                      <th></th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Factura Nº</th>
                      <th>Tipo Cliente</th>
                      <th>Cliente</th>
                      <th>Domicilio</th>
                      <th>CUIT</th>
                      <th>Total Bruto</th>
                      <th>IVA</th>
                      <th>Total Neto</th>
                      <th>Estado</th>

                    </tr>

                  </thead>

                  <tbody>
                      @foreach ($ventas as $venta)

                    <tr>
                        <td style="text-align:center;">{{$loop->iteration}}</td>
                        <td>{{ $venta->getFromDateAttribute($venta->fecha) }}</td>
                        <td>{{ $venta->getFromHoraAttribute($venta->hora) }}</td>
                        <td>{{'000'.$venta->empleado_id."-".'0000000'.$venta->id}}</td>
                        <td>{{ $venta->tipocliente}}</td>
                        <td>{{ Arr::get($venta,'cliente.razon_social')}}</td>
                        <td>{{ Arr::get($venta,'cliente.direccion')}}</td>
                        <td>{{ Arr::get($venta,'cliente.Cuit')}}</td>
                        <td>AR$ {{ $venta->subtotalventa }} </td>
                        <td>AR$ {{ $venta->iva }}  </td>
                        <td> AR$ {{ $venta->total }} </td>
                        <td>{{ $venta->estado}}</td>

                    </tr>

                      @endforeach
                  </tbody>

                  <tfoot>

                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>


                    </tr>

                  </tfoot>

                </table>

                {{$ventas->render()}}

              </div>

              <div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">

								<div class="form-group">

                  <th><a href="{{ route('ventas.libroVentasPdf',['from'=>$from,'to'=>$to]) }}" class="btn btn-success" data-toggle="tooltip" title="Reporte PDF" data-original-title="Reporte PDF">Imprimir PDF</a></th>

                </div>

							</div>
            </div>

          </div>

          </div>

        </div>

    </div>

</div>
@endsection
