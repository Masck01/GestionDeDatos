<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Banco
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Banco newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banco newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banco query()
 * @method static \Illuminate\Database\Eloquent\Builder|Banco whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banco whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banco whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banco whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banco whereUpdatedAt($value)
 */
	class Banco extends \Eloquent {}
}

namespace App{
/**
 * App\Caja
 *
 * @property int $id
 * @property string $nombre
 * @property string $saldo
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Caja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Caja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Caja query()
 * @method static \Illuminate\Database\Eloquent\Builder|Caja whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caja whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caja whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caja whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caja whereSaldo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caja whereUpdatedAt($value)
 */
	class Caja extends \Eloquent {}
}

namespace App{
/**
 * App\CajaDeAhorro
 *
 * @property int $id
 * @property int $codigo
 * @property int $banco_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CajaDeAhorro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CajaDeAhorro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CajaDeAhorro query()
 * @method static \Illuminate\Database\Eloquent\Builder|CajaDeAhorro whereBancoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CajaDeAhorro whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CajaDeAhorro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CajaDeAhorro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CajaDeAhorro whereUpdatedAt($value)
 */
	class CajaDeAhorro extends \Eloquent {}
}

namespace App{
/**
 * App\Capacidad
 *
 * @property int $id
 * @property int $cantidad
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Producto[] $productos
 * @property-read int|null $productos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Capacidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Capacidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Capacidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Capacidad whereCantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Capacidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Capacidad whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Capacidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Capacidad whereUpdatedAt($value)
 */
	class Capacidad extends \Eloquent {}
}

namespace App{
/**
 * App\Categoria
 *
 * @property int $id
 * @property string $descripcion
 * @property string $salario_basico
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Producto[] $productos
 * @property-read int|null $productos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereSalarioBasico($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereUpdatedAt($value)
 */
	class Categoria extends \Eloquent {}
}

namespace App{
/**
 * App\Cliente
 *
 * @property-read \App\Provincia $provincia
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente query()
 */
	class Cliente extends \Eloquent {}
}

namespace App{
/**
 * App\Compra
 *
 * @property int $id
 * @property string $fecha
 * @property string $hora
 * @property float $total
 * @property int $proveedor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Deposito $deposito
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Detalle_Compra[] $detalle_compra
 * @property-read int|null $detalle_compra_count
 * @property-read mixed $from_date
 * @property-read \App\Proveedor $proveedor
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Compra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Compra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Compra query()
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereProveedorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereUpdatedAt($value)
 */
	class Compra extends \Eloquent {}
}

namespace App{
/**
 * App\Concepto
 *
 * @property int $id
 * @property string $descripcion
 * @property string $tipo
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Concepto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Concepto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Concepto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Concepto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Concepto whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Concepto whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Concepto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Concepto whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Concepto whereUpdatedAt($value)
 */
	class Concepto extends \Eloquent {}
}

namespace App{
/**
 * App\ConfiguracionCategoria
 *
 * @property int $id
 * @property string|null $montofijo
 * @property string|null $montovariable
 * @property int $unidad
 * @property int $concepto_id
 * @property int $categoria_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Concepto $conceptos
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria whereConceptoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria whereMontofijo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria whereMontovariable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria whereUnidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConfiguracionCategoria whereUpdatedAt($value)
 */
	class ConfiguracionCategoria extends \Eloquent {}
}

namespace App{
/**
 * App\Deposito
 *
 * @property int $id
 * @property string $nombre
 * @property string $telefono
 * @property string $direccion
 * @property string $ciudad
 * @property string $codigo_postal
 * @property string $estado
 * @property int $sucursal_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Producto[] $productos
 * @property-read int|null $productos_count
 * @property-read \App\Provincia $provincia
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito whereCiudad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito whereCodigoPostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito whereSucursalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposito whereUpdatedAt($value)
 */
	class Deposito extends \Eloquent {}
}

namespace App{
/**
 * App\DepositoProducto
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Producto[] $producto
 * @property-read int|null $producto_count
 * @method static \Illuminate\Database\Eloquent\Builder|DepositoProducto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositoProducto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositoProducto query()
 */
	class DepositoProducto extends \Eloquent {}
}

namespace App{
/**
 * App\Detalle_Compra
 *
 * @property int $id
 * @property float $subtotal
 * @property int $cantidad
 * @property int $producto_id
 * @property int $compra_id
 * @property int $proveedor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Deposito $deposito
 * @property-read \App\Producto $producto
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra query()
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra whereCantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra whereCompraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra whereProductoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra whereProveedorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Compra whereUpdatedAt($value)
 */
	class Detalle_Compra extends \Eloquent {}
}

namespace App{
/**
 * App\Detalle_Liquidacion
 *
 * @property-read \App\Concepto $concepto
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Liquidacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Liquidacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detalle_Liquidacion query()
 */
	class Detalle_Liquidacion extends \Eloquent {}
}

namespace App{
/**
 * App\Empleado
 *
 * @property int $id
 * @property string $apellido
 * @property string $nombre
 * @property int $cuit
 * @property string|null $email
 * @property string|null $telefono_celular
 * @property string|null $telefono_fijo
 * @property string|null $domicilio
 * @property string $estado
 * @property string $fecha_ingreso
 * @property int $sucursal_id
 * @property int $categoria_id
 * @property int $cajadeahorro_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado query()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereCajadeahorroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereDomicilio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereFechaIngreso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereSucursalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereTelefonoCelular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereTelefonoFijo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereUpdatedAt($value)
 */
	class Empleado extends \Eloquent {}
}

namespace App{
/**
 * App\Familiar
 *
 * @property int $id
 * @property int $dni
 * @property string $apellido
 * @property string $nombre
 * @property string $fecha_nacimiento
 * @property string $parentesco
 * @property int $empleado_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar whereEmpleadoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar whereFechaNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar whereParentesco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Familiar whereUpdatedAt($value)
 */
	class Familiar extends \Eloquent {}
}

namespace App{
/**
 * App\LineaLiquidacion
 *
 * @property int $id
 * @property int $cantidad
 * @property string $montofijo
 * @property string $montovariable
 * @property int $concepto_id
 * @property int $liquidacion_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Liquidacion[] $liquidacion
 * @property-read int|null $liquidacion_count
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion whereCantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion whereConceptoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion whereLiquidacionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion whereMontofijo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion whereMontovariable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaLiquidacion whereUpdatedAt($value)
 */
	class LineaLiquidacion extends \Eloquent {}
}

namespace App{
/**
 * App\Linea_Venta
 *
 * @property-read \App\Producto $producto
 * @method static \Illuminate\Database\Eloquent\Builder|Linea_Venta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Linea_Venta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Linea_Venta query()
 */
	class Linea_Venta extends \Eloquent {}
}

namespace App{
/**
 * App\Liquidacion
 *
 * @property int $id
 * @property string $fecha_desde
 * @property string $fecha_hasta
 * @property string $salario_neto
 * @property string $salario_bruto
 * @property string $periodo_liquidacion
 * @property string $retenciones
 * @property string $estado
 * @property int $empleado_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Empleado[] $empleado
 * @property-read int|null $empleado_count
 * @property-read mixed $from_date
 * @property-read \App\LineaLiquidacion $linea_liquidacion
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion whereEmpleadoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion whereFechaDesde($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion whereFechaHasta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion wherePeriodoLiquidacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion whereRetenciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion whereSalarioBruto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion whereSalarioNeto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Liquidacion whereUpdatedAt($value)
 */
	class Liquidacion extends \Eloquent {}
}

namespace App{
/**
 * App\Marca
 *
 * @property int $id
 * @property int $codigo
 * @property string $nombre
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Producto[] $productos
 * @property-read int|null $productos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Marca newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marca newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marca query()
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereUpdatedAt($value)
 */
	class Marca extends \Eloquent {}
}

namespace App{
/**
 * App\MovimientoDeposito
 *
 * @property-read \App\Deposito $depositoDestino
 * @property-read \App\Deposito $depositoOrigen
 * @property-read mixed $from_date
 * @property-read \App\Producto $producto
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientoDeposito newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientoDeposito newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientoDeposito query()
 */
	class MovimientoDeposito extends \Eloquent {}
}

namespace App{
/**
 * App\MovimientodeCaja
 *
 * @property int $id
 * @property string $descripcion
 * @property string $fecha
 * @property string $entrada
 * @property string $salida
 * @property string $moneda
 * @property int $venta_id
 * @property int $caja_id
 * @property int $compra_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $from_date
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja query()
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereCajaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereCompraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereEntrada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereMoneda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereSalida($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovimientodeCaja whereVentaId($value)
 */
	class MovimientodeCaja extends \Eloquent {}
}

namespace App{
/**
 * App\Pago
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Pago newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pago newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pago query()
 */
	class Pago extends \Eloquent {}
}

namespace App{
/**
 * App\Producto
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string|null $imagen
 * @property string $fecha_vencimiento
 * @property string $precio_compra
 * @property string $precio_venta
 * @property string $estado
 * @property int $stock
 * @property int $almacen_id
 * @property int $categoria_id
 * @property int $marca_id
 * @property int $proveedor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Capacidad|null $capacidad
 * @property-read \App\SubCategoria|null $categoria
 * @property-read \App\Deposito|null $deposito
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Deposito[] $depositos
 * @property-read int|null $depositos_count
 * @property-read \App\Marca|null $marcas
 * @property-read \App\Proveedor|null $proveedor
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereAlmacenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereFechaVencimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereMarcaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecioCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecioVenta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereProveedorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereUpdatedAt($value)
 */
	class Producto extends \Eloquent {}
}

namespace App{
/**
 * App\Proveedor
 *
 * @property int $id
 * @property string $razon_social
 * @property int $cuit
 * @property int $telefono
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Provincia $provincia
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereRazonSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereUpdatedAt($value)
 */
	class Proveedor extends \Eloquent {}
}

namespace App{
/**
 * App\Provincia
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Cliente[] $clientes
 * @property-read int|null $clientes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Deposito[] $depositos
 * @property-read int|null $depositos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Proveedor[] $proveedores
 * @property-read int|null $proveedores_count
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia query()
 */
	class Provincia extends \Eloquent {}
}

namespace App{
/**
 * App\RoleUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser query()
 */
	class RoleUser extends \Eloquent {}
}

namespace App{
/**
 * App\SubCategoria
 *
 * @property int $id
 * @property string $nombre
 * @property int $categoria_id
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Categoria|null $categoria
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategoria whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategoria whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategoria whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategoria whereUpdatedAt($value)
 */
	class SubCategoria extends \Eloquent {}
}

namespace App{
/**
 * App\Sucursal
 *
 * @property int $id
 * @property string $razon_social
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $cuit
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal whereRazonSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sucursal whereUpdatedAt($value)
 */
	class Sucursal extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \App\Categoria $categorias
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User buscarUser($id)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Usuario
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $username
 * @property string $password
 * @property string $tipousuario
 * @property int $empleado_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmpleadoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereTipousuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUsername($value)
 */
	class Usuario extends \Eloquent {}
}

namespace App{
/**
 * App\Venta
 *
 * @property int $id
 * @property string $fecha
 * @property string $hora
 * @property float $total
 * @property string $estado
 * @property int $empleado_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Linea_Venta[] $detalle_pedido
 * @property-read int|null $detalle_pedido_count
 * @property-read mixed $from_date
 * @property-read mixed $from_hora
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Venta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereEmpleadoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereUpdatedAt($value)
 */
	class Venta extends \Eloquent {}
}

