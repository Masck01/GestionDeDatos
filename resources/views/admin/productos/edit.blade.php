@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

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

              <h3 class="card-title">Actualizar Producto</h3>

            </div>

            <div class="card-body">

            <form method="post" action="{{ route('productos.update',$producto->id)}}" role="form" enctype="multipart/form-data">

              {{ csrf_field() }}

              {{ method_field('PUT') }}

              <div class="row">

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                      <label for="nombre">Nombre</label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                        </div>

                        <input type="text" class="form-control" id="p_local_1d" name="nombre" value="{{$producto->nombre}}">

                      </div>

                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                      <label for="nombre"> Categoría </label>

                      <div class="input-group">

                        <select class="form-control select2" id="categoria" name="categoria">

                            <option value="{{$producto->categoria->id}}">{{$producto->categoria->nombre}}</option>

                            @foreach($categorias as $categoria)

                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>

                            @endforeach

                        </select>

                      </div>

                    </div>



              </div>


              <div class="row" style="margin-top: 16px;">

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                      <label for="precioLista">Precio Compra</label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill"></i></span>

                        </div>

                        <input type="number" class="form-control" id="precioPesosLista" name="precio_compra" value="{{$producto->precio_compra}}">

                      </div>

                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                    <label for="precioLista">Precio Venta</label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill"></i></span>

                        </div>

                        <input type="number" class="form-control" id="precioPesosLista" name="precio_venta" value="{{$producto->precio_venta}}">

                      </div>

                    </div>

              </div>

              <div class="row" style="margin-top: 16px;">

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                <label for="precioLista">Stock</label>

                <div class="input-group">

                  <div class="input-group-prepend">

                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill"></i></span>

                  </div>

                  <input type="number" class="form-control" id="stock" name="stock" value="{{$producto->stock}}">

                </div>

              </div>

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

              <label for="precioLista">Fecha Vencimiento</label>

                <div class="input-group">

                  <div class="input-group-prepend">

                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill"></i></span>

                  </div>

                  <input type="date" id="start" name="fecha_vencimiento" value="{{$producto->fecha_vencimiento}}" min="2020-10-01" max="2030-12-31">

                </div>

              </div>

              </div>

              <div class="row" style="margin-top: 16px;">


                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                  <label for="nombre"> Marcas </label>

                  <div class="input-group">

                    <select class="form-control select2"  id="marcas" name="marcas_id">

                        <option value="{{$producto->marcas_id}}"></option>

                        @foreach($marcas as $mac)

                        <option value="{{$mac->id}}">{{$mac->nombre}}</option>

                        @endforeach

                    </select>

                  </div>

                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                  <label for="nombre"> Almacen </label>

                  <div class="input-group">

                    <select class="form-control select2"  id="marcas" name="almacen_id">

                        <option value="{{$producto->almacen_id}}">{{$producto->almacen->nombre}}</option>

                        @foreach($almacen as $alma)

                        <option value="{{$alma->id}}">{{$alma->nombre}}</option>

                        @endforeach

                    </select>

                  </div>

                </div>

              </div>

              <div class="row" style="margin-top: 16px;">


                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                                      <label for="nombre"> Proveedor </label>

                                      <div class="input-group">

                                        <select class="form-control select2"  id="marcas" name="proveedor_id">

                                            <option value="{{$producto->proveedor_id}}"></option>

                                            @foreach($proveedor as $prov)

                                            <option value="{{$prov->id}}">{{$prov->razon_social}}</option>

                                            @endforeach

                                        </select>

                                      </div>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                                      <label for="nombre"> Capacidad </label>

                                      <div class="input-group">

                                        <select class="form-control select2"  id="marcas" name="capacidad_id">

                                            <option value="{{$producto->capacidad_id}}"></option>

                                            @foreach($capacidad as $cap)

                                            <option value="{{$cap->id}}">{{$cap->cantidad}}</option>

                                            @endforeach

                                        </select>

                                      </div>

                                    </div>

                                  </div>

              <div class="row" style="margin-top: 16px;">

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                        <label for="img"> Imagen Destacada </label>

                        <div class="custom-file">

                          <input type="file" class="form-control" placeholder="Enter ..." id="img" name="img">

                        </div>

                        <div class="form-group">
                          @if(($producto->imagen != ""))

                          <img src="{{asset('img/productos/'.$producto->imagen)}}" style=" width: 150px; height: 150px;">

                          @else

                          <img src="{{asset('img/productos/imagenNoDisponible.jpg')}}" style=" width: 150px; height: 150px;">

                          @endif

                        </div>

                    </div>

              </div>

              <div class="row" style="margin-top: 16px;">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                      <label for="nombre">Descripción</label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                        </div>

                        <textarea class="form-control" id="descripcion" rows="5"  name="descripcion">{{$producto->descripcion}}</textarea>

                      </div>

                    </div>

              </div>

              <div class="row" style="margin-top: 16px;">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">


                      {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}

                    </div>

              </div>

            </form>


            <!-- /.card-body -->
          </div>


        </div>
    </div>
</div>
@endsection
