@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <section class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                          <h1>Pagar Venta</h1>

                        </div>

                    </div>

                </div>

            </section>

            <div class="card card-secondary">

                <div class="card-header">

                    <h3 class="card-title">Detalle Venta</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-12">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Sub Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($detalle as $det)
                                <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$det->producto->nombre }}</td>
                                  <td>{{$det->cantidad }}</td>
                                  <td> AR$ {{$det->producto->precio_venta  }} </td>
                                  <td> AR$ {{$det->producto->precio_venta  * $det->cantidad }}</td>
                                </tr>
                              @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th>Total</th>
                                <th>  AR$ {{$pedido->total}}</th>
                              </tr>
                          </tbody>
                          </table>
                        </div>

                    </div>

                </div>

                    <div class="card-header">

                        <h3 class="card-title">Generar Pago</h3>

                    </div>

                    <div class="card-body">

                      <form method="post" action="{{ route('pago.store')}}" role="form">

                        {{ csrf_field() }}

                        <input type="hidden" class="form-control"  id="venta_id" name="venta_id" value="{{$pedido->id}}">

                        <input type="hidden" class="form-control"  id="total" name="total" value="{{$pedido->total}}">

                        <div class="row">

                          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                              <div class="form-group">

                                <label>Monto</label>

                                <input type="number" step="0.01" class="form-control"  id="monto" name="monto" onkeyup="calcularVuelto()">

                              </div>

                          </div>

                          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                              <div class="form-group">

                                <label>Vuelto</label>

                                <input type="text" readonly="readonly" class="form-control" id="vuelto" name="vuelto">

                              </div>

                          </div>

                        </div>

                        <div class="row">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="form-group">

                              <button type="submit" class="btn btn-primary"> Pagar </i> </button>

                            </div>

                          </div>

                        </div>

                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection

@push ('scripts')
  <script>

    function calcularVuelto()
    {
      var monto= document.getElementById("monto").value;

      var total= document.getElementById("total").value;

      var vuelto = monto - total;

      $("#vuelto").val(vuelto);

    }

  </script>

@endpush
