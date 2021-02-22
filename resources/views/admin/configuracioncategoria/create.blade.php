@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Agregar Configuracion</h3>
            </div>
            <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('configuracioncategoria.store')}}" role="form">
                {{ csrf_field() }}

                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                      <label>Monto fijo</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="montofijo" name="montofijo">
                    </div>
                  </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                      <label>Monto variable</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="montovariable" name="montovariable">
                    </div>
                  </div>
                </div>


                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                      <label>Unidad</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="unidad" name="unidad">
                    </div>
                  </div>

                </div>


                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">

                <label>Categoria</label>

                    <select class="form-control select2" style="width: 100%;" id="categoria" name="categoria">

                     @foreach ($categorias as $categoria)

                      <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>

                      @endforeach

                    </select>
                  </div>
                </div>
              </div>


                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                <div class="form-group">
                <label>Conceptos</label>

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
                      <button type="submit" class="btn btn-primary">Agregar</button>
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
