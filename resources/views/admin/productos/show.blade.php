@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card card-secondary">

                <div class="card-header">

                    <h3 class="card-title">Detalle de Producto</h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">
                            <p><b>Nombre: </b>{{$producto->nombre}}</p>
                            <p><b>Descripcion: </b>{{$producto->descripcion}}</p>
                            <p><b>Marca: </b>{{$producto->marca_id}}</p>
                            <p><b>Precio de Venta: </b> {{ $producto->precio_venta }}</p>
                            <p><b>Precio de Compra: </b> {{ $producto->precio_compra }} </p>
                            <p><b>Stock: </b> {{ $producto->stock }} </p>
                            <p><b>Categoria: </b> {{ $producto->categoria->nombre }} </p>
                            <p><b>Proveedor: </b> {{ $producto->proveedor_id }} </p>
                            <p><b>Almacen: </b> {{ $producto->almacen->nombre }} </p>
                            <p><b>Capacidad: </b> {{ $producto->capacidad_id }} </p>

                            <br>
                        </div>

                        <div class="col-md-3">

                          <p><b>Imagen Destacada</b></p>

                          @if(($producto->imagen != ""))
                            <img src="{{asset('img/productos/'.$producto->imagen)}}" width="350px" height="350px">

                          @else
                            <img src="{{asset('img/logos/imagenNoDisponible.jpg')}}" width="350px" height="350px">

                          @endif

                          <br>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-group">

                <a class="btn btn-primary" href="{{ route('productos.index')}}" role="button">Volver</a>

            </div>

        </div>

      </div>

    </div>

  </div>

@endsection
