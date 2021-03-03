@extends('layouts.app')
@section('content')
@php
    $s = '';
@endphp
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
            <div class="col-md-10">
              <h4>Editar Sucursal</h4>
            </div>
            <div class="col-md-2">
                  <a href="{{ route('depositos.index') }}" class="btn btn-primary btn-block">Volver</a>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <br/>
                <form method="post" action="{{ route('depositos.update', $deposito->id)}}">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <div class="form-group">
                    <label for="lbnombre">Razon social</label>
                    <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ $deposito->razon_social }}">
                    @if ($errors->has('razon_social'))
                    <small class="form-text text-danger">
                        {{ $errors->first('razon_social') }}
                     </small>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="lbtelefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $deposito->telefono }}">
                    @if ($errors->has('telefono'))
                    <small class="form-text text-danger">
                        {{ $errors->first('telefono') }}
                     </small>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="lbtelefono">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $deposito->direccion }}">
                    @if ($errors->has('direccion'))
                    <small class="form-text text-danger">
                        {{ $errors->first('direccion') }}
                     </small>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="lbtelefono">cuit</label>
                    <input type="text" class="form-control" id="cuit" name="cuit" value="{{ $deposito->cuit }}">
                    @if ($errors->has('cuit'))
                    <small class="form-text text-danger">
                        {{ $errors->first('cuit') }}
                     </small>
                    @endif
                  </div>


                  <div class="form-group">
                    <label for="lbtelefono">estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ $deposito->estado }}">
                    @if ($errors->has('estado'))
                    <small class="form-text text-danger">
                        {{ $errors->first('estado') }}
                     </small>
                    @endif
                  </div>

                  

                  <hr>

                  <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
