@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Actualizar Configuracion</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <form method="post" action="{{ route('configuracioncategoria.update')}}" role="form">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <input type="hidden" class="form-control" placeholder="Enter ..." id="idUpdate" name="id" value={{$configuracioncategorias->id}}>
                         <label>Monto fijo</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="montofijoUpdate" name="montofijo" value={{$configuracioncategorias->montofijo}}>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Monto variable</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="montovariableUpdate" name="montovariable" value={{$configuracioncategorias->montovariable}}>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Unidad</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="unidadUpdate" name="unidad" value={{$configuracioncategorias->unidad}}>
                    </div>
                  </div>


                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">

                    <label>Categoria</label>

                    <select class="form-control select2" style="width: 100%;" id="categoria" name="categoria">
                    <!-- <option value="$empleado->categorias->id">$empleado->categorias->descripcion</option> -->
                      @foreach ($categorias as $categoria)

                      <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>

                      @endforeach

                    </select>
                  </div>
                </div>
              </div>

                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                    <div class="form-group">
                    <label>Concepto</label>

                    <select class="form-control select2" style="width: 100%;" id="concepto" name="concepto">

                     @foreach ($conceptos as $concepto)

                      <option value="{{$concepto->id}}">{{$concepto->descripcion}}</option>

                      @endforeach

                    </select>
                  </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                  </div>
                </div>

              </form>
            </div>
            <!-- /.card-body -->
          </div>

        </div>
    </div>
</div>
@endsection
