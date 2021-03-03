@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Cajas</h1>
                </div>

              </div>
            </div>
          </section>

          @if ( count($errors) > 0 )

            <div class="alert alert-danger">

              <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>

            </div>

          @endif

          <div class="card card-secondary">

            <div class="card-header">
              <h3 class="card-title">Detalle Caja</h3>
            </div>

            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <br>
                  <p><b> Nombre </b>{{$cajas->nombre}}</p>
                  <p><b> Saldo AR$ </b> {{$cajas->saldo}}</p>
                  <p><b> Estado </b>{{$cajas->estado}}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12" id="guardar1">
                  <div class="form-group">
                      <form class="" action="{{ route('cajas.abrirCerrar')}}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}
                          @if($cajas->estado == 'cerrada')
                          <button type="submit" onclick="return confirm('Abrir Caja?')"  class="btn btn-primary" data-toggle="tooltip" title="Abrir Categoria" data-original-title="Editar Cliente">Abrir</i></button>
                          @else
                          <button type="submit" onclick="return confirm('Cerrar Caja?')"  class="btn btn-danger" data-toggle="tooltip" title="Abrir Categoria" data-original-title="Editar Cliente">Cerrar</i></button>
                          @endif
                      </form>
                  </div>
		            </div>
              </div>

            </div>
          </div>

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Flujo de Dinero</h3>
            </div>
            <table class="table table-hover text-nowrap" id="tablecliente">
              <thead>
                <tr>
                @if($cajas->estado == 'abierta')
                  <th style="text-align:center;">

                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalIngreso" title="Agregar Ingreso" data-original-title="Ver Detalle Cliente">
                    <i class="fas fa-plus"></i></a>
                    </button>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalCliente" title="Retiro de Dinero" data-original-title="Ver Detalle Cliente">
                    <i class="fas fa-hand-holding-usd" style="color:red"></i></a>
                    </button>
                  </th>
                  @else
                    <th style="text-align:center;">#</th>
                @endif
                      <th style="text-align:center;">Fecha</th>
                      <th style="text-align:center;">Descripcion</th>
                      <th style="text-align:center;">Ingreso</th>
                      <th style="text-align:center;">Egreso</th>
                      <th style="text-align:center;">Saldo AR$</th>
                </tr>
              </thead>
              <tbody>
              @foreach($movimientos as $movimiento)
              <tr>
                    <td style ="text-align:center;">{{$loop->iteration}}</td>
                    <td style ="text-align:center;">{{$movimiento->getFromDateAttribute($movimiento->fecha)}} </td>
                    <td style ="text-align:center;">{{$movimiento->descripcion}} </td>
                    @if($movimiento->moneda == 'Pesos')
                      <td style="text-align:center;">AR$ {{$movimiento->entrada}} </td>
                    @else
                     <td style="text-align:center;">U$D {{$movimiento->entrada}} </td>
                    @endif
                    @if($movimiento->moneda == 'Pesos')
                      <td style="text-align:center;">AR$ {{$movimiento->salida}} </td>
                    @else
                     <td style="text-align:center;">U$D {{$movimiento->salida}} </td>
                    @endif
                    <td style="text-align:center;"> AR$ {{$movimiento->saldoparcialpesos}}</td>
              </tr>
              @endforeach
              </tbody>
            </table>
            {{$movimientos->render()}}
          </div>
                </div>
              </div>
            </div>
          </div>


        </div>
    </div>
</div>

<!-- Modal Crear Cajas-->

<div class="modal fade bd-example-modal-lg" id="ModalCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">
        	      <h5 class="modal-title" id="titulo">Retiro de Dinero</h5>
     	      </div>

            <div class="modal-body">

              <div class="card-body">

                  <form method="post" action="{{ route('cajas.resta')}}" role="form">

                    {{ csrf_field() }}

                    <div class="row">

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                          <div class="form-group">

                              <label>Detalle</label>

                                  <div class="input-group">

                                    <div class="input-group-prepend">

                                      <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                                    </div>

                                    <input type="text" class="form-control input-lg" placeholder="Enter ..." id="descripcion" name="descripcion">

                                  </div>

                          </div>

                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                          <div class="form-group">

                              <label>Monto</label>

                              <div class="input-group">

                                <div class="input-group-prepend">

                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill"></i></span>

                                </div>

                                <input type="number" step="0.01" class="form-control input-lg" placeholder="Enter ..." id="monto" name="monto">

                              </div>

                          </div>

                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                          <label for="nombre"> Moneda </label>

                          <div class="input-group">

                            <div class="input-group-prepend">

                              <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                            </div>

                            <select class="form-control select2"  id="moneda" name="moneda">

                                      <option value="Pesos">Pesos</option>

                                      <option value="Dolares">Dolares</option>

                                  </select>

                          </div>

                      </div>

                    </div>

                    <br>

                    <div class="row">

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        <div class="form-group">

                          <button type="submit" class="btn btn-primary">Ingresar</button>

                        </div>

                      </div>

                    </div>


                  </form>

              </div>

            </div>

            <div class="modal-footer">

              <button type="button" class="btn btn-link" data-dismiss="modal"><i class="fas fa-times" style="color:red; font-size: 30px;"></i></button>

            </div>

        </div>

    </div>

</div>


<!-- FIN Modal Agregar Contacto-->

<!-- Modal Agregar Dinero-->

<div class="modal fade bd-example-modal-lg" id="ModalIngreso" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">
        	      <h5 class="modal-title" id="titulo">Ingreso de Dinero</h5>
     	      </div>

            <div class="modal-body">

              <div class="card-body">

                  <form method="post" action="{{ route('cajas.sumar')}}" role="form">

                    {{ csrf_field() }}

                    <div class="row">

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                          <div class="form-group">

                              <label>Detalle</label>

                                  <div class="input-group">

                                    <div class="input-group-prepend">

                                      <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                                    </div>

                                    <input type="text" class="form-control input-lg" placeholder="Enter ..." id="descripcion" name="descripcion">

                                  </div>

                          </div>

                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                          <div class="form-group">

                              <label>Monto</label>

                              <div class="input-group">

                                <div class="input-group-prepend">

                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill"></i></span>

                                </div>

                                <input type="number" step="0.01" class="form-control input-lg" placeholder="Enter ..." id="monto" name="monto">

                              </div>

                          </div>

                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                          <label for="nombre"> Moneda </label>

                          <div class="input-group">

                            <div class="input-group-prepend">

                              <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                            </div>

                            <select class="form-control select2"  id="moneda" name="moneda">

                                      <option value="Pesos">Pesos</option>

                                      <option value="Dolares">Dolares</option>

                                  </select>

                          </div>

                      </div>

                    </div>

                    <br>

                    <div class="row">

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        <div class="form-group">

                          <button type="submit" class="btn btn-primary">Ingresar</button>

                        </div>

                      </div>

                    </div>


                  </form>

              </div>

            </div>

            <div class="modal-footer">

              <button type="button" class="btn btn-link" data-dismiss="modal"><i class="fas fa-times" style="color:red; font-size: 30px;"></i></button>

            </div>

        </div>

    </div>

</div>


<!-- FIN Modal Agregar Dinero-->

@endsection
