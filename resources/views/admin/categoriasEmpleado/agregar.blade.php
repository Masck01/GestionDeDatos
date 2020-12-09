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
          
          <h3 class="card-title">Añadir Concepto a Categoria</h3>
      
      </div>

      <div class="card-body">
              
        <form method="post" action="{{ route('categoriasEmpleados.storeConcepto',$categoria->id)}}" role="form">
                  
          {{ csrf_field() }}
          
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

                <select class="form-control select2" style="width: 100%;" id="concepto" name="concepto">
                
                    @foreach ($conceptos as $concepto)
                    
                    <option value="{{$concepto->id}}">{{$concepto->descripcion}}</option>

                    @endforeach

                </select>
              </div>

            </div>
  
          </div>

          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
                <div class="form-group">
                  
                  <label>Monto Fijo</label>
                  
                  <input type="text" class="form-control" placeholder="Enter ..." id="montoFijo" name="montoFijo" required>
                  
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
                <div class="form-group">
                  
                  <label>Monto Variable</label>
                  
                  <input type="text" class="form-control" placeholder="Enter ..." id="montoVariable" name="montoVariable" required>
                  
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

        <div class="col-md-12">
    
            <section class="content-header">
              
              <div class="container-fluid">
                
                <div class="row mb-2">
                  
                  <div class="col-sm-6">

                    <h1>Conceptos en la Categoria</h1>

                  </div>

                </div>
              
              </div>
            
            </section>

        </div>
        <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Concepto</th>
                  <th>Tipo</th>
                  <th>Monto Fijo</th>
                  <th>Monto Variable</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categoriasConceptos as $cat)
                  <tr>
                    <td style="text-align:center">{{$loop->iteration}}</td>
                    <td>{{ $cat->conceptos->descripcion }}</td>
                    <td>{{ $cat->conceptos->tipo }}</td>
                    <td>{{ $cat->montoFijo }}</td>
                    <td>{{ $cat->montoVariable }}</td>
                    <td><a href="{{ route('categoriasEmpl.editConcepto',$cat->id) }}" class="btn btn-link" data-toggle="tooltip" title="Editar Categoria" data-original-title="Editar Producto"><i class="fas fa-pencil-alt" style="color:black; font-size: 20px;"></i></a></td>
                   
                  </tr>
                @endforeach
              </tbody>
            </table>

            </div>
            <!-- /.card-body -->
          </div>


        </div>
    </div>
</div>
@endsection

