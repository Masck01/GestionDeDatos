@extends('layouts.app')
@section('content')
@php
    $s = '';
@endphp

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-12">

      <section class="content-header">

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1>Clientes</h1>

            </div>

          </div>

        </div>

      </section>

    <div class="card card-secondary">

      <div class="card-header">

          <h3 class="card-title">Editar Cliente</h3>

      </div>

      <div class="card-body">

        <form method="post" action="{{ route('clientes.update',$cliente->id)}}" role="form">

          {{ csrf_field() }}

          {{ method_field('PUT') }}

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                <div class="form-group">

                  <label>Razon Social</label>

                  <input type="text" class="form-control" placeholder="Enter ..." id="razon_social" name="nombre" value="{{$cliente->razon_social}}">

                </div>

            </div>



          </div>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                <div class="form-group">

                  <label>CUIT </label>

                  <input type="text" class="form-control" placeholder="Enter ..." id="cuit" name="cuit" value="{{$cliente->Cuit}}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                <div class="form-group">

                  <label>Telefono</label>

                  <input type="text" class="form-control" placeholder="Enter ..." id="telefono" name="telefono" value="{{$cliente->telefono}}">

                </div>

            </div>

          </div>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                <div class="form-group">

                  <label>Direccion</label>

                  <input type="text" class="form-control" placeholder="Enter ..." id="direccion" name="direccion" value="{{$cliente->direccion}}">

                </div>

            </div>

          </div>




          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

              <div class="form-group">

                <button type="submit" class="btn btn-success"> Actualizar <i class="fas fa-pencil-alt" style="color:#E8EE10"></i> </button>

                <a class="btn btn-danger" href="{{ route('clientes.index')}}" role="button">Cancelar <i class="fas fa-arrow-alt-circle-left" style="color:#E8EE10"></i></a>

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
