<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConfiguracionCategoriaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\LiquidacionController;
use App\Http\Controllers\FamiliarController;
use App\Http\Livewire\Liquidacion\CrearLiquidacion;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\CapacidadController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\CajasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ConceptoController;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return redirect()->route('login');
});

//Auth::routes();

// Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', 'Auth\LoginController@login');
Route::post('login', [LoginController::class, 'login']);
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    // MENU VENTAS //



    //PROVEEDORES

    Route::get('proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');

    Route::get('proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');

    Route::post('proveedores/store', [ProveedorController::class, 'store'])->name('proveedores.store');

    Route::get('proveedores/{proveedores}', [ProveedorController::class, 'show'])->name('proveedores.show');

    Route::get('proveedores/{proveedores}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');

    Route::put('proveedores/{proveedores}', [ProveedorController::class, 'update'])->name('proveedores.update');

    Route::delete('proveedores/{proveedores}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

    Route::get('proveedor/pdf', [ProveedorController::class, 'listadoProveedores'])->name('proveedores.downloadPdf');


    // CLIENTES
    Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');

    Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

    Route::post('clientes/store', [ClienteController::class, 'store'])->name('clientes.store');

    Route::get('clientes/{clientes}', [ClienteController::class, 'show'])->name('clientes.show');

    Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

    Route::put('clientes/{clientes}', [ClienteController::class, 'update'])->name('clientes.update');

    Route::get('cliente/pdf', [ClienteController::class, 'listadoClientes'])->name('clientes.downloadPdf');





    // PDFS

    Route::get('pdf/listadoDepositosPdf', [PdfController::class, 'listadoDepositos'])->name('pdf.ListadoDepositosPdf');

    Route::get('pdf/listadoPdf', [PdfController::class, 'listadoEmpresas'])->name('pdf.ListadoClientePdf');

    Route::get('pdf/impimirPresupuesto/{presupuesto}', [PdfController::class, 'presupuesto'])->name('pdf.impimirPresupuesto');

    Route::get('pdf/impimirMovimientoPedido/{pedido}', [PdfController::class, 'movimientoPedido'])->name('pdf.impimirMovimientoPedido');

    Route::get('pdf/remitox/{pedido}', [PdfController::class, 'imprimirRemito'])->name('pdf.imprimirRemito');

    // PRODUCTOS //

    Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');

    Route::get('productos/create', [ProductoController::class, 'create'])->name('productos.create');

    Route::post('productos/store', [ProductoController::class, 'store'])->name('productos.store');

    Route::get('productos/{productos}', [ProductoController::class, 'show'])->name('productos.show');

    Route::get('productos/{productos}/edit', [ProductoController::class, 'edit'])->name('productos.edit');

    Route::put('productos/{productos}', [ProductoController::class, 'update'])->name('productos.update');

    Route::delete('productos/{productos}', [ProductoController::class, 'destroy'])->name('productos.destroy');

    Route::get('producto/cargar', [ProductoController::class, 'cargar'])->name('productos.cargar');

    Route::post('producto/import', [ProductoController::class, 'importExcel'])->name('productos.importar.excel');

    Route::get('producto/download', [ProductoController::class, 'getDownload'])->name('productos.download');

    Route::get('producto/exportar', [ProductoController::class, 'exportExcel'])->name('productos.exportar.excel');

    Route::get('producto/pdf', [ProductoController::class, 'listadoProductos'])->name('productos.downloadPdf');

    Route::post('producto/galeria/{producto}', [ProductoController::class, 'galeria'])->name('producto.galeria');

    Route::put('productos/galeria/eliminar/{productos}', [ProductoController::class, 'eliminarImagen'])->name('productos.eliminarImagen');


    // USUARIOS //

    // Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index');

    // Route::get('usuarios/create', 'UsuarioController@create')->name('usuarios.create');

    // Route::post('usuarios/store', 'UsuarioController@store')->name('usuarios.store');

    // Route::get('usuarios/{user}/edit', 'UsuarioController@edit')->name('usuarios.edit');

    // Route::put('usuarios/{user}', 'UsuarioController@update')->name('usuarios.update');

    // Route::get('usuarios/{usuario}', 'UsuarioController@show')->name('usuarios.show');

    Route::resource('usuarios', UsuarioController::class);

    // EMPLEADOS //

    Route::get('empleados', [EmpleadoController::class, 'index'])->name('empleados.index');

    Route::get('empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');

    Route::post('empleados/store', [EmpleadoController::class, 'store'])->name('empleados.store');

    Route::get('empleados/edit/{empleado}', [EmpleadoController::class, 'edit'])->name('empleados.edit');

    Route::put('empleados/update/', [EmpleadoController::class, 'update'])->name('empleados.update');

    Route::get('empleados/show/{id}', [EmpleadoController::class, 'show'])->name('empleados.show');


    // VENTAS

    Route::get('ventas', [VentaController::class, 'index'])->name('ventas.index');

    Route::get('ventas/create', [VentaController::class, 'create'])->name('ventas.create');

    Route::post('ventas/store', [VentaController::class, 'store'])->name('ventas.store');

    Route::get('ventas/{ventas}', [VentaController::class, 'show'])->name('ventas.show');

    Route::get('ventas/movimiento/{id}', [VentaController::class, 'movimientoVenta'])->name('ventas.movimiento');

    Route::get('ventas/preparar/{id}/{Venta}', [VentaController::class, 'preparar'])->name('ventas.preparar');

    Route::get('venta/entregar', [VentaController::class, 'ventasaentregar'])->name('ventas.entregar');

    Route::get('venta/finalizar/{id}', [VentaController::class, 'ventasfinalizar'])->name('ventas.finalizar');

    Route::get('venta/pdf', [VentaController::class, 'listadoventas'])->name('ventas.downloadPdf');

    Route::get('venta/Impimir/Factura/{presupuesto}', [VentaController::class, 'recivo'])->name('ventas.imprimir');

    Route::get('venta/pagar/{id}', [VentaController::class, 'pagarVenta'])->name('venta.pague');

    Route::post('venta/pagos/guardar', [VentaController::class, 'guardarPago'])->name('pago.store');

    // Depositos

    // Route::get('depositos', 'DepositoController@index')->name('depositos.index');

    // Route::get('depositos/create', 'DepositoController@create')->name('depositos.create');

    // Route::post('depositos/store', 'DepositoController@store')->name('depositos.store');

    // Route::get('depositos/{depositos}/edit', 'DepositoController@edit')->name('depositos.edit');

    // Route::get('depositos/{id}/listadoPedido', 'DepositoController@listadoPedido')->name('deposito.listadoPedido');

    // Route::put('depositos/{depositos}', 'DepositoController@update')->name('depositos.update');

    // Route::get('depositos/{depositos}', 'DepositoController@show')->name('depositos.show');

    // Route::delete('depositos/{depositos}', 'DepositoController@destroy')->name('depositos.destroy');

    // Route::put('deposito/stock', 'DepositoController@stock')->name('depositos.stock');

    // Route::get('deposito/{depositos}/exportProducto', 'DepositoController@exportProducto')->name('deposito.downloadProductos');

    // Route::post('deposito/import', 'DepositoController@importExcel')->name('depositos.importar.excel');

    // Route::post('deposito/producto', 'DepositoController@agregarProductos')->name('depositos.importarProductos');

    //Compras

    Route::get('compras', 'ComprasController@index')->name('compras.index');

    Route::get('compras/create', 'ComprasController@create')->name('compras.create');

    Route::post('compras/store', 'ComprasController@store')->name('compras.store');

    Route::get('compras/{compra}', 'ComprasController@show')->name('compras.show');

    Route::get('compra/pdf', [ComprasController::class, 'listadocompras'])->name('compras.downloadPdf');

    Route::resource('compras', ComprasController::class);

    //Liquidacion


    // Route::get('liquidacion', 'LiquidacionController@index')->name('liquidacion.index');


    // Route::post('liquidacion/store', 'LiquidacionController@store')->name('liquidacion.store');

    // Route::get('liquidacion/{liquidacion}', 'LiquidacionController@show')->name('liquidacion.show');

    Route::get('liquidacion/Impimir/Factura/{liquidacion}', [LiquidacionController::class, 'recibo'])->name('liquidacion.imprimir');

    Route::get('liquidacion/create/{id_empleado}', CrearLiquidacion::class)->name('liquidacion.create');

    Route::resource('liquidacion', LiquidacionController::class)->except('create');

    // ROLES

    // Route::get('roles', 'RoleController@index')->name('roles.index');

    // Route::get('roles/create', 'RoleController@create')->name('roles.create');

    // Route::post('roles/store', 'RoleController@store')->name('roles.store');

    // Route::get('roles/{rol}', 'RoleController@show')->name('roles.show');

    // Route::get('roles/{rol}/edit', 'RoleController@edit')->name('roles.edit');

    // Route::put('roles/{roles}', 'RoleController@update')->name('roles.update');


    // CATEGORIAS //

    // Route::get('categorias', 'CategoriaController@index')->name('categorias.index');

    // Route::post('categorias/create', 'CategoriaController@create')->name('categorias.create');

    // Route::post('categorias/store', 'CategoriaController@store')->name('categorias.store');

    Route::put('categorias/edit', [CategoriaController::class, 'update'])->name('categorias.update');

    Route::put('categorias/eliminar/{id}', [CategoriaController::class, 'eliminar'])->name('categorias.eliminar');

    Route::put('categorias/activar/{id}', [CategoriaController::class, 'activar'])->name('categorias.activar');

    Route::resource('categorias', CategoriaController::class)->except(['update']);


    // CONFIGURACION CATEGORIAS//


    Route::get('configuracioncategoria', [ConfiguracionCategoriaController::class, 'index'])->name('configuracioncategoria.index');

    Route::post('configuracioncategoria/create', [ConfiguracionCategoriaController::class, 'create'])->name('configuracioncategoria.create');

    Route::post('configuracioncategoria/agregar', [ConfiguracionCategoriaController::class, 'agregar'])->name('configuracioncategoria.agregar');

    Route::get('configuracioncategoria/edit/{id}', [ConfiguracionCategoriaController::class, 'edit'])->name('configuracioncategoria.edit');

    Route::put('configuracioncategoria/update', [ConfiguracionCategoriaController::class, 'update'])->name('configuracioncategoria.update');

    Route::post('configuracioncategoria/store', [ConfiguracionCategoriaController::class, 'store'])->name('configuracioncategoria.store');

    Route::put('configuracioncategoria/eliminar/{id}', [ConfiguracionCategoriaController::class, 'eliminar'])->name('configuracioncategoria.eliminar');

    Route::put('configuracioncategoria/activar/{id}', [ConfiguracionCategoriaController::class, 'activar'])->name('configuracioncategoria.activar');



    // SUB CATEGORIAS //

    Route::get('subcategorias', [SubCategoriaController::class, 'index'])->name('subcategorias.index');

    Route::post('subcategorias/store', [SubCategoriaController::class, 'store'])->name('subcategorias.store');

    Route::put('subcategorias/edit', [SubCategoriaController::class, 'update'])->name('subcategorias.update');

    Route::put('subcategorias/eliminar/{id}', [SubCategoriaController::class, 'eliminar'])->name('subcategorias.eliminar');

    Route::put('subcategorias/activar/{id}', [SubCategoriaController::class, 'activar'])->name('subcategorias.activar');

    // CAPACIDAD //

    Route::get('capacidades', [CapacidadController::class, 'index'])->name('capacidades.index');

    Route::post('capacidades/store', [CapacidadController::class, 'store'])->name('capacidades.store');

    Route::put('capacidades/edit', [CapacidadController::class, 'update'])->name('capacidades.update');

    Route::put('capacidades/eliminar/{id}', [CapacidadController::class, 'eliminar'])->name('capacidades.eliminar');

    Route::put('capacidades/activar/{id}', [CapacidadController::class, 'activar'])->name('capacidades.activar');
    // MARCAS //

    Route::get('marcas', [MarcasController::class, 'index'])->name('marcas.index');

    Route::post('marcas/store', [MarcasController::class, 'store'])->name('marcas.store');

    Route::put('marcas/edit', [MarcasController::class, 'update'])->name('marcas.update');

    Route::put('marcas/eliminar/{id}', [MarcasController::class, 'eliminar'])->name('marcas.eliminar');

    Route::put('marcas/activar/{id}', [MarcasController::class, 'activar'])->name('marcas.activar');

    // CAJAS //

    Route::get('cajas', [CajasController::class, 'index'])->name('cajas.index');

    Route::post('cajas/store', [CajasController::class, 'store'])->name('cajas.store');

    Route::post('cajas/resta', [CajasController::class, 'resta'])->name('cajas.resta');

    Route::post('cajas/ingresar', [CajasController::class, 'sumar'])->name('cajas.sumar');

    Route::put('cajas/abrirCerrar', [CajasController::class, 'abrirCerrar'])->name('cajas.abrirCerrar');

    // FAMILIAR //

    Route::post('grupo/store', [FamiliarController::class, 'store'])->name('familias.store');

    Route::put('grupo/update', [FamiliarController::class, 'update'])->name('familias.update');



    // CONCEPTOS //

    Route::get('conceptos', [ConceptoController::class, 'index'])->name('conceptos.index');

    Route::get('conceptos/create', [ConceptoController::class, 'create'])->name('conceptos.create');

    Route::post('conceptos/store', [ConceptoController::class, 'store'])->name('conceptos.store');

    Route::get('conceptos/edit/{id}', [ConceptoController::class, 'edit'])->name('conceptos.edit');

    Route::put('conceptos/{concepto}', [ConceptoController::class, 'update'])->name('conceptos.update');
});
