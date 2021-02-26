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

              <h3 class="card-title">Agregar Producto</h3>

            </div>

            <div class="card-body">

              {!! Form::open(['url' => 'productos/store', 'files'=> true]) !!}

              <div class="row">

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                      <label for="nombre">Nombre</label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                        </div>

                      {!! Form::text('nombre',null,['class'=>'form-control']) !!}

                      </div>

                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                      <label for="nombre"> Categoría </label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                        </div>

                      {!! Form::select('categoria',$categorias,0,['class'=>'form-control']) !!}

                      </div>

                    </div>

              </div>

              <div class="row" style="margin-top: 16px;">

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                      <label for="nombre"> Marca </label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                        </div>

                        {!! Form::select('marca',$marcas,0,['class'=>'form-control']) !!}

                      </div>

                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                        <label for="img"> Imagen Destacada </label>

                        <div class="custom-file">

                          <input type="file" class="form-control" placeholder="Enter ..." id="img" name="img">

                        </div>

                    </div>

                </div>


              <div class="row" style="margin-top: 16px;">

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                      <label for="precioLista">Precio de Compra</label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill"></i></span>

                        </div>

                      {!! Form::number('precio_compra',0.00,['class'=>'form-control']) !!}

                      </div>

                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                    <label for="precioLista">Precio Venta</label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill"></i></span>

                        </div>

                      {!! Form::number('precio_venta',0.00,['class'=>'form-control','min'=>'0.00','step' => 'any']) !!}

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

                    {!! Form::number('stock',0.00,['class'=>'form-control']) !!}

                    </div>

                  </div>

                  <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24 col-xl-24"  style="margin-top: 10px; margin-left: 10px;">

                    <label for="precioLista">Fecha Vencimiento</label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="far fa-clock"></i></span>

                        </div>

                        <input type="date" id="start" name="fecha_vencimiento" value="2020-10-21" min="2020-10-01" max="2030-12-31">

                      </div>

                </div>

              </div>

              <div class="row" style="margin-top: 16px;">

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                    <label for="nombre"> Almacen </label>

                    <div class="input-group">

                      <div class="input-group-prepend">

                        <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                      </div>

                    {!! Form::select('almacen_id',$almacen,0,['class'=>'form-control']) !!}

                    </div>

                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                    <label for="nombre"> Proveedor </label>

                    <div class="input-group">

                      <div class="input-group-prepend">

                        <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                      </div>

                    {!! Form::select('proveedor_id',$proveedor,0,['class'=>'form-control']) !!}

                    </div>

                </div>

              </div>

              <div class="row" style="margin-top: 16px;">

                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">

                      <label for="nombre"> Capacidad </label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                        </div>

                      {!! Form::select('capacidad_id',$capacidad,0,['class'=>'form-control']) !!}

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

                      {!! Form::textarea('descripcion',null,['class'=>'form-control','id' => 'editor' ]) !!}

                      </div>

                    </div>

              </div>

              <div class="row" style="margin-top: 16px;">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">


                      {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}

                    </div>

              </div>

              {!! Form::close() !!}

            </div>
            <!-- /.card-body -->
          </div>


        </div>
    </div>
</div>
@endsection
