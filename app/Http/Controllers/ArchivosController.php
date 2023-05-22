<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class ArchivosController extends Controller
{
    //
    public function carga_archivo(Request $request){

        $archivo = $request->file("file");
        $nombreArchivo = $archivo->getClientOriginalName();

        $nombreImagen = date('H_m_s');

        Storage::disk('public')->put('storage', $archivo);

        return response([$nombreArchivo], 200);
    }

    public function descargar_archivo(){

        //Esta busca la ULR del archivo
        $archivo =  Storage::url('logo.png');

        if (Storage::disk('public')->exists('storage/logo.png')) {

            $myFile = public_path($archivo);
            return response()->download($myFile);
        }
    }

    public function ver_archivo(){

        $arrayImagenes = [
            asset(Storage::url('logo.png')),
            asset(Storage::url('imagen2.jpg')),
        ];

        return response(["imagenes" => $arrayImagenes, /*"image" => $archivoDescarga*/], 200);
    }
}
