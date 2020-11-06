<?php
use App\RoleUser;

Route::get('/', function () {
  return redirect()->route('login');
}); 

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){

  // MENU VENTAS //

  // CLIENTES

    Route::get('clientes', 'ClienteController@index')->name('clientes.index');

    Route::get('clientes/create', 'ClienteController@create')->name('clientes.create');

    Route::post('clientes/store', 'ClienteController@store')->name('clientes.store');

    Route::get('clientes/{cliente}', 'ClienteController@show')->name('clientes.show');

    Route::get('clientes/{cliente}/edit', 'ClienteController@edit')->name('clientes.edit');

    Route::put('clientes/{clientes}', 'ClienteController@update')->name('clientes.update');

    Route::get('cliente/exportar', 'ClienteController@exportCliente')->name('cliente.downloadExcel');

    Route::get('cliente/pdf', 'PdfController@listadoClientes')->name('cliente.downloadPdf');

  // PROVEEDORES

     Route::get('proveedores', 'ProveedorController@index')->name('proveedores.index');

     Route::get('proveedores/create', 'ProveedorController@create')->name('proveedores.create');

     Route::post('proveedores/store', 'ProveedorController@store')->name('proveedores.store');

     Route::get('proveedores/{proveedores}', 'ProveedorController@show')->name('proveedores.show');

     Route::get('proveedores/{proveedores}/edit', 'ProveedorController@edit')->name('proveedores.edit');

     Route::put('proveedores/{proveedores}', 'ProveedorController@update')->name('proveedores.update');

     Route::delete('proveedores/{proveedores}', 'ProveedorController@destroy')->name('proveedores.destroy');

     Route::get('proveedor/pdf', 'ProveedorController@listadoProveedores')->name('proveedores.downloadPdf');

   // PDFS

   Route::get('pdf/listadoDepositosPdf', 'PdfController@listadoDepositos')->name('pdf.ListadoDepositosPdf');

   Route::get('pdf/listadoPdf', 'PdfController@listadoEmpresas')->name('pdf.ListadoClientePdf');

   Route::get('pdf/impimirPresupuesto/{presupuesto}', 'PdfController@presupuesto')->name('pdf.impimirPresupuesto');

   Route::get('pdf/impimirMovimientoPedido/{pedido}', 'PdfController@movimientoPedido')->name('pdf.impimirMovimientoPedido');

   Route::get('pdf/remitox/{pedido}', 'PdfController@imprimirRemito')->name('pdf.imprimirRemito');

  // PRODUCTOS //
  
  Route::get('productos', 'ProductosController@index')->name('productos.index');

  Route::get('productos/create', 'ProductosController@create')->name('productos.create');

  Route::post('productos/store', 'ProductosController@store')->name('productos.store');

  Route::get('productos/{productos}', 'ProductosController@show')->name('productos.show');

  Route::get('productos/{productos}/edit', 'ProductosController@edit')->name('productos.edit');

  Route::put('productos/{productos}', 'ProductosController@update')->name('productos.update');

  Route::delete('productos/{productos}', 'ProductosController@destroy')->name('productos.destroy');

  Route::get('producto/cargar', 'ProductosController@cargar')->name('productos.cargar');

  Route::post('producto/import', 'ProductosController@importExcel')->name('productos.importar.excel');

  Route::get('producto/download', 'ProductosController@getDownload')->name('productos.download');

  Route::get('producto/exportar', 'ProductosController@exportExcel')->name('productos.exportar.excel');

  Route::get('producto/pdf', 'ProductosController@listadoProductos')->name('productos.downloadPdf');

  Route::post('producto/galeria/{producto}', 'ProductosController@galeria')->name('producto.galeria');

  Route::put('productos/galeria/eliminar/{productos}', 'ProductosController@eliminarImagen')->name('productos.eliminarImagen');


  // EMPLEADOS //

  Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index');

  Route::get('usuarios/create', 'UsuarioController@create')->name('usuarios.create');

  Route::post('usuarios/store', 'UsuarioController@store')->name('usuarios.store');

  Route::get('usuarios/{user}/edit', 'UsuarioController@edit')->name('usuarios.edit');

  Route::put('usuarios/{user}', 'UsuarioController@update')->name('usuarios.update');

  Route::get('usuarios/{usuario}', 'UsuarioController@show')->name('usuarios.show');

  // VENTAS

     Route::get('ventas', 'VentaController@index')->name('ventas.index');

     Route::get('ventas/create', 'VentaController@create')->name('ventas.create');

     Route::post('ventas/store', 'VentaController@store')->name('ventas.store');

     Route::get('ventas/{ventas}', 'VentaController@show')->name('ventas.show');

     Route::get('ventas/movimiento/{id}', 'VentaController@movimientoVenta')->name('ventas.movimiento');

     Route::get('ventas/preparar/{id}/{Venta}', 'VentaController@preparar')->name('ventas.preparar');

     Route::get('venta/entregar', 'VentaController@ventasaEntregar')->name('ventas.entregar');

     Route::get('venta/finalizar/{id}', 'VentaController@ventasfinalizar')->name('ventas.finalizar');

     Route::get('venta/pdf', 'VentaController@listadoventas')->name('ventas.downloadPdf');

     Route::get('venta/Impimir/Factura/{presupuesto}', 'VentaController@recivo')->name('ventas.imprimir');
    
     Route::get('venta/pagar/{id}', 'VentaController@pagarVenta')->name('venta.pague');

     Route::post('venta/pagos/guardar', 'VentaController@guardarPago')->name('pago.store');
     
     // Depositos

     Route::get('depositos', 'DepositoController@index')->name('depositos.index');

     Route::get('depositos/create', 'DepositoController@create')->name('depositos.create');

     Route::post('depositos/store', 'DepositoController@store')->name('depositos.store');

     Route::get('depositos/{depositos}/edit', 'DepositoController@edit')->name('depositos.edit');

     Route::get('depositos/{id}/listadoPedido', 'DepositoController@listadoPedido')->name('deposito.listadoPedido');

     Route::put('depositos/{depositos}', 'DepositoController@update')->name('depositos.update');

     Route::get('depositos/{depositos}', 'DepositoController@show')->name('depositos.show');

     Route::delete('depositos/{depositos}', 'DepositoController@destroy')->name('depositos.destroy');

     Route::put('deposito/stock', 'DepositoController@stock')->name('depositos.stock');

     Route::get('deposito/{depositos}/exportProducto', 'DepositoController@exportProducto')->name('deposito.downloadProductos');

     Route::post('deposito/import', 'DepositoController@importExcel')->name('depositos.importar.excel');

     Route::post('deposito/producto', 'DepositoController@agregarProductos')->name('depositos.importarProductos');

    //Compras

      Route::get('compras', 'ComprasController@index')->name('compras.index');

      Route::get('compras/create', 'ComprasController@create')->name('compras.create');

      Route::post('compras/store', 'ComprasController@store')->name('compras.store');

      Route::get('compras/{compra}', 'ComprasController@show')->name('compras.show');

          //Liquidacion

          Route::get('liquidacion', 'LiquidacionController@index')->name('liquidacion.index');

          Route::get('liquidacion/create', 'LiquidacionController@create')->name('liquidacion.create');
    
          Route::post('liquidacion/store', 'LiquidacionController@store')->name('liquidacion.store');
    
          Route::get('liquidacion/{liquidacion}', 'LiquidacionController@show')->name('liquidacion.show');
          
          Route::get('liquidacion/Impimir/Factura/{liquidacion}', 'LiquidacionController@recivo')->name('liquidacion.imprimir');
    
  // ROLES

  Route::get('roles', 'RoleController@index')->name('roles.index');

  Route::get('roles/create', 'RoleController@create')->name('roles.create');

  Route::post('roles/store', 'RoleController@store')->name('roles.store');

  Route::get('roles/{rol}', 'RoleController@show')->name('roles.show');

  Route::get('roles/{rol}/edit', 'RoleController@edit')->name('roles.edit');

  Route::put('roles/{roles}', 'RoleController@update')->name('roles.update');


  // CATEGORIAS //

  Route::get('categorias', 'CategoriaController@index')->name('categorias.index');

  Route::post('categorias/store', 'CategoriaController@store')->name('categorias.store');

  Route::put('categorias/edit', 'CategoriaController@update')->name('categorias.update');

  Route::put('categorias/eliminar/{id}', 'CategoriaController@eliminar')->name('categorias.eliminar');

  Route::put('categorias/activar/{id}', 'CategoriaController@activar')->name('categorias.activar');

    // SUB CATEGORIAS //

  Route::get('subcategorias', 'SubCategoriaController@index')->name('subcategorias.index');

  Route::post('subcategorias/store', 'SubCategoriaController@store')->name('subcategorias.store');

  Route::put('subcategorias/edit', 'SubCategoriaController@update')->name('subcategorias.update');

  Route::put('subcategorias/eliminar/{id}', 'SubCategoriaController@eliminar')->name('subcategorias.eliminar');

  Route::put('subcategorias/activar/{id}', 'SubCategoriaController@activar')->name('subcategorias.activar');

  // CAPACIDAD //

  Route::get('capacidades', 'CapacidadController@index')->name('capacidades.index');

  Route::post('capacidades/store', 'CapacidadController@store')->name('capacidades.store');

  Route::put('capacidades/edit', 'CapacidadController@update')->name('capacidades.update');

  Route::put('capacidades/eliminar/{id}', 'CapacidadController@eliminar')->name('capacidades.eliminar');

  Route::put('capacidades/activar/{id}', 'CapacidadController@activar')->name('capacidades.activar');
  // MARCAS //

    Route::get('marcas', 'MarcasController@index')->name('marcas.index');

    Route::post('marcas/store', 'MarcasController@store')->name('marcas.store');
  
    Route::put('marcas/edit', 'MarcasController@update')->name('marcas.update');
  
    Route::put('marcas/eliminar/{id}', 'MarcasController@eliminar')->name('marcas.eliminar');
  
    Route::put('marcas/activar/{id}', 'MarcasController@activar')->name('marcas.activar');
  
  // CAJAS //

  Route::get('cajas', 'CajasController@index')->name('cajas.index');

  Route::post('cajas/store', 'CajasController@store')->name('cajas.store');

  Route::post('cajas/resta', 'CajasController@resta')->name('cajas.resta');

  Route::post('cajas/ingresar', 'CajasController@sumar')->name('cajas.sumar');

  Route::put('cajas/abrirCerrar', 'CajasController@abrirCerrar')->name('cajas.abrirCerrar');

  // CONTACTOS //

  Route::post('grupo/store', 'FamiliarController@store')->name('familias.store');

  Route::put('grupo/update', 'FamiliarController@update')->name('familias.update');

});
