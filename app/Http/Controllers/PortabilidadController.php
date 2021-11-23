<?php

namespace App\Http\Controllers;

use App\Models\Portabilidad;
use Illuminate\Http\Request;

class PortabilidadController extends Controller
{
    public function agregarPortabilidad(){
        try{
            $portabilidad = new Portabilidad();
            $portabilidad->nombre = $_POST['nombre'];
            $portabilidad->correo = $_POST['correo'];
            $portabilidad->telefono = $_POST['telefono'];
            $portabilidad->nip = $_POST['nip'];
            $portabilidad->icc = $_POST['icc'];
            $portabilidad->save();
            return json_encode(["estatus" => 'registrado']);
        }catch (\Exception $e) {
            return json_encode(["estatus" => 'error']);
        }
    }

    public function consultarTelelfono(){
        $telefono = Portabilidad::where('telefono', $_POST['telefono'])->count();
        if($telefono > 0){
            return json_encode(["estatus" => 'ocupado']);
        }else{
            return json_encode(["estatus" => 'libre']);
        }
    }

    public function consultarEstatus(){
        $cant = Portabilidad::where('telefono', $_POST['telefono'])->count();
        $portabilidad = Portabilidad::where('telefono', $_POST['telefono'])->first();
        if($cant > 0){
            return json_encode(["estatus" => $portabilidad]);
        }else{
            return json_encode(["estatus" => 'No Encontrado']);
        }
    }
}
