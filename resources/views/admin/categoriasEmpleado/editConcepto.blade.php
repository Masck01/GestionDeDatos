@extends('layouts.app')
@section('content')

<div class="container">
  
  <div class="row justify-content-center">
    
    <div class="col-md-12">
    
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">

              <h1>Categoria de Empleado</h1>

            </div>

          </div>
        
        </div>
      
      </section>

    <div class="card card-secondary">
      
      <div class="card-header">
          
          <h3 class="card-title">Actualizar Concepto a Categoria</h3>
      
      </div>

      <div class="card-body">
              
        <form method="post" action="{{ route('categoriasEmpleados.updateConcepto',$conceptos->id)}}" role="form">
                  
          {{ csrf_field() }}

          {{ method_field('PUT') }}
          
          
          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
                <div class="form-group">
                  
                  <label>Categoria</label>
                  
                  <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre" value="{{$categoria->nombre}}">
                  
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
              <div class="form-group">
                
                <label>Concepto</label>

                <input type="text" class="form-control" placeholder="Enter ..." id="montoFijo" name="descripcion" value="{{$conceptos->conceptos->descripcion}}">

              </div>

            </div>
  
          </div>

          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
                <div class="form-group">
                  
                  <label>Monto Fijo</label>
                  
                  <input type="text" class="form-control" placeholder="Enter ..." id="montoFijo" name="montoFijo" value="{{$conceptos->montoFijo}}">
                  
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
                <div class="form-group">
                  
                  <label>Monto Variable</label>
                  
                  <input type="text" class="form-control" placeholder="Enter ..." id="montoVariable" name="montoVariable"  value="{{$conceptos->montoVariable}}">
                  <input type="hidden" class="form-control" placeholder="Enter ..." id="montoVariable" name="concepto_id"  value="{{$conceptos->conceptos->id}}">
                  <input type="hidden" class="form-control" placeholder="Enter ..." id="montoVariable" name="categoria_id"  value="{{$categoria->id}}">
                </div>
  
          </div>

          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              
              <div class="form-group">
                
                <button type="submit" class="btn btn-primary"> Agregar  </button>
              
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

