<?php

namespace App\Http\Controllers;

use App\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function store(Request $req){
        $sucursal = new Sucursal();
        $sucursal->razon_social = $req->get('razon_social');
        $sucursal->save();
    }
}
