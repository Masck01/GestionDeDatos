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
              <h4>Editar Deposito</h4>
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
                    <label for="lbnombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $deposito->nombre }}">
                    @if ($errors->has('nombre'))
                    <small class="form-text text-danger">
                        {{ $errors->first('nombre') }}
                     </small>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="lbtelefono">Tel&eacute;fono</label>
                    <input type="text" class="form-control" id="telefonos" name="telefonos" value="{{ $deposito->telefonos }}">
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
                    <label for="lbtelefono">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $deposito->ciudad }}">
                    @if ($errors->has('ciudad'))
                    <small class="form-text text-danger">
                        {{ $errors->first('ciudad') }}
                     </small>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="lbtelefono">C.P</label>
                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ $deposito->codigo_postal }}">
                    @if ($errors->has('codigo_postal'))
                    <small class="form-text text-danger">
                        {{ $errors->first('codigo_postal') }}
                     </small>
                    @endif
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Provincia</label>
                      <select class="form-control select2" style="width: 100%;" id="provincia_id" name="provincia_id">
                        <option value="{{ $deposito->provincia->id }}">{{ $deposito->provincia->nombre }}</option>
                        @foreach($provincia as $provin)
                        <option value="{{$provin->id}}">{{$provin->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
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
