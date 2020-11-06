<?php

namespace App\Imports;

use App\Producto;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return $producto = new Producto([
            'codigo'=>$row[0], // Columna A
            'nombre'=>$row[1], // Columna b
            'descripcion'=>$row[2], //Columna C
            'costo_p' => $row[3], //Columna D
            'costo_d' => $row[4], //Columna E
            'p_flete_p' => $row[5], //Columna F
            'p_flete_d' => $row[6], //Columna G
            'p_local_1p' => $row[7], //Columna H
            'p_local_1d' => $row[8], //Columna I
            'p_local_2p' => $row[9], //Columna J
            'p_local_2d' => $row[10], //Columna K
            'p_ml_p' => $row[11], //Columna L
            'p_ec_p' => $row[12], //Columna M
            'unidadnegocio_id'=> $row[13] //Columna N
        ]);
    }
}
