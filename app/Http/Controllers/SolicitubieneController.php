<?php

namespace App\Http\Controllers;

use App\Models\Requerimiento;
use App\Models\Solicitubiene;
use Illuminate\Http\Request;

class SolicitubieneController extends Controller
{
    public function store(Request $request, Requerimiento $requerimiento){
    
        $request->validate([
            'collaborators_id' => 'required',
            'tipo_moneda' => 'required',
            'costoMaterial' => 'required',
            'precio' => 'required',
            'estado' => 'required',
            'contindiferidos_id' => 'required'
        ]);
        
        $solicitubienes = new Solicitubiene();

        $solicitubienes -> collaborators_id    = $request->collaborators_id;

        $solicitubienes -> tipo_moneda       = $request->tipo_moneda;

        switch ($request->tipo_moneda) {
            case "Soles":
                $solicitubienes -> costoMaterial       = $request->costoMaterial;
                $solicitubienes -> precio              = $request->precio;
              break;
            case "Dolar":
                $solicitubienes -> costoDolar          = $request->costoMaterial;
                $solicitubienes -> precioDolar         = $request->precio;
              break;
          }
        
        $solicitubienes -> contindiferidos_id  = $request->contindiferidos_id;
        $solicitubienes -> estado              = $request->estado;
        $solicitubienes -> requerimientos_id   = $requerimiento->id;

        $solicitubienes -> AprobacionADM       = "pendiente";
        
        if ($request->costoMaterial > 200) {
            $solicitubienes -> AprobacionJOP       = "pendiente";
        }else {
            $solicitubienes -> AprobacionJOP       = null;
        }

        if ($request->costoMaterial > 1000) {
            $solicitubienes -> AprobacionGG        = "pendiente";
        }else {
            $solicitubienes -> AprobacionJOP       = null;
        }

        $solicitubienes ->save();
        
        return redirect()->route('requerimiento.ejecucionReq' , $requerimiento->id );
    }

    public function update(Request $request , Solicitubiene $solicitubienes){
    
        $request->validate([
            'collaborators_id' => 'required',
            'tipo_moneda' => 'required',
            'costoMaterial' => 'required',
            'precio' => 'required',
            'estado' => 'required',
            'contindiferidos_id' => 'required'
        ]);

        $solicitubienes -> tipo_moneda       = $request->tipo_moneda;

        switch ($request->tipo_moneda) {
            case "Soles":
                $solicitubienes -> costoMaterial       = $request->costoMaterial;
                $solicitubienes -> precio              = $request->precio;
                $solicitubienes -> costoDolar          = 0;
                $solicitubienes -> precioDolar         = 0;
              break;
            case "Dolar":
                $solicitubienes -> costoDolar          = $request->costoMaterial;
                $solicitubienes -> precioDolar         = $request->precio;
                $solicitubienes -> costoMaterial       = 0;
                $solicitubienes -> precio              = 0;
                break;
          }
        

        $solicitubienes -> collaborators_id    = $request->collaborators_id;
        $solicitubienes -> contindiferidos_id  = $request->contindiferidos_id;
        $solicitubienes -> estado              = $request->estado;

        $solicitubienes -> AprobacionADM       = "pendiente";
        
        if ($request->costoMaterial > 200) {
            $solicitubienes -> AprobacionJOP       = "pendiente";
        }else {
            $solicitubienes -> AprobacionJOP       = null;
        }

        if ($request->costoMaterial > 1000) {
            $solicitubienes -> AprobacionGG        = "pendiente";
        }else {
            $solicitubienes -> AprobacionGG       = null;
        }

        $solicitubienes ->save();
        

        return redirect()->route('requerimiento.ejecucionReq' , $solicitubienes -> requerimientos_id );
    }

    public function aproadmin(Solicitubiene $solicitubienes){
    
        if ($solicitubienes->AprobacionADM == null || $solicitubienes->AprobacionADM == "pendiente") {
            $solicitubienes->AprobacionADM = "aprobado";
        }elseif ($solicitubienes->AprobacionADM == "aprobado") {
            $solicitubienes->AprobacionADM = "pendiente";
        }
        
        $solicitubienes ->save();

        return redirect()->route('requerimiento.ejecucionReq' , $solicitubienes -> requerimientos_id );
    }

    public function aprojop(Solicitubiene $solicitubienes){
    
        if ($solicitubienes->AprobacionJOP == null || $solicitubienes->AprobacionGG == "pendiente") {
            $solicitubienes->AprobacionJOP = "aprobado";
        }elseif ($solicitubienes->AprobacionJOP == "aprobado") {
            $solicitubienes->AprobacionJOP = "pendiente";
        }
        
        $solicitubienes ->save();

        return redirect()->route('requerimiento.ejecucionReq' , $solicitubienes -> requerimientos_id );
    }

    public function aprogg(Solicitubiene $solicitubienes){
    
        if ($solicitubienes->AprobacionGG == null || $solicitubienes->AprobacionGG == "pendiente") {
            $solicitubienes->AprobacionGG = "aprobado";
        }elseif ($solicitubienes->AprobacionGG == "aprobado") {
            $solicitubienes->AprobacionGG = "pendiente";
        }
        
        $solicitubienes ->save();

        return redirect()->route('requerimiento.ejecucionReq' , $solicitubienes -> requerimientos_id );
    }


    public function facturar(){}
}
