<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use App\Models\Pam;
use App\Models\Pamobservacione;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PamobservacioneController extends Controller
{
    public function store(Request $request, Pam $pam){
        
        $request->validate([
            'titulo'    => 'required',
            'descripcion'    => 'required'

        ]);

        $pamobservacione = new Pamobservacione();

        /* 
        if ($request->hasFile('imagen')) {
            $archivoImg=$request->file('imagen');
            $archivoImg->move(public_path().'/ImagenesObser/',$archivoImg->getClientOriginalName());
            $pamobservacione -> imagen=$archivoImg->getClientOriginalName();
        }
        */

        $imagen = $request->file('imagen')->store('public/ImagenesObser');
        $url = Storage::url($imagen);

        $pamobservacione -> imagen      =   $url;
        $pamobservacione -> titulo      = $request->titulo;
        $pamobservacione -> descripcion     = $request->descripcion;
        $pamobservacione -> namepersona        = auth()->user()->name;
        $pamobservacione -> pams_id         = $pam->id;

        $pamobservacione ->save();

        return redirect() -> route('ejecucion.index', $pam);
    }

    public function destroy(Pamobservacione $pamobservacione){

        $urlimg = str_replace('storage','public',$pamobservacione -> imagen); 

        Storage::delete($urlimg);

        $pamobservacione->delete();

        return redirect()->route('ejecucion.index', $pamobservacione->pams_id);
    }
}
