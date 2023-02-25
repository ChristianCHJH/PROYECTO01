<?php

namespace App\Http\Controllers;

use App\Models\Requerimiento;
use App\Models\Solicitudservreque;
use Illuminate\Http\Request;

class SolicitudservrequeController extends Controller
{
    public function store(Request $request, Requerimiento $requerimiento){
    
        $request->validate([
            'omologados_id' => 'required',
            'tipo_moneda' => 'required',
            'costo' => 'required',
            'precio' => 'required',
            'contindiferidos_id' => 'required',
            'estado' => 'required'
        ]);
        
        $solicitudservreques = new Solicitudservreque();

        $solicitudservreques -> tipo_moneda       = $request->tipo_moneda;

        switch ($request->tipo_moneda) {
            case "Soles":
                $solicitudservreques -> costoMaterial       = $request->costo;
                $solicitudservreques -> precio              = $request->precio;
              break;
            case "Dolar":
                $solicitudservreques -> costoDolar          = $request->costo;
                $solicitudservreques -> precioDolar         = $request->precio;
              break;
          }

        $solicitudservreques -> omologados_id       = $request->omologados_id;
        $solicitudservreques -> contindiferidos_id  = $request->contindiferidos_id;
        $solicitudservreques -> estado              = $request->estado;
        $solicitudservreques -> requerimientos_id   = $requerimiento->id;
        $solicitudservreques -> AprobacionADM       = "pendiente";
        $solicitudservreques -> AprobacionJOP       = "pendiente";
        $solicitudservreques -> AprobacionGG        = "pendiente";

        $solicitudservreques ->save();
        
        return redirect()->route('requerimiento.ejecucionReq' , $requerimiento->id );
    }

    public function update(Request $request , Solicitudservreque $solicitudservreques){
    
        $request->validate([
            'omologados_id' => 'required',
            'tipo_moneda' => 'required',
            'costo' => 'required',
            'precio' => 'required',
            'contindiferidos_id' => 'required',
            'estado' => 'required'
        ]);
        
        $solicitudservreques -> tipo_moneda       = $request->tipo_moneda;

        switch ($request->tipo_moneda) {
            case "Soles":
                $solicitudservreques -> costoMaterial       = $request->costo;
                $solicitudservreques -> precio              = $request->precio;
              break;
            case "Dolar":
                $solicitudservreques -> costoDolar          = $request->costo;
                $solicitudservreques -> precioDolar         = $request->precio;
              break;
        }

        $solicitudservreques -> omologados_id       = $request->omologados_id;
        $solicitudservreques -> contindiferidos_id  = $request->contindiferidos_id;
        $solicitudservreques -> estado              = $request->estado;
        
        $solicitudservreques -> AprobacionADM       = "pendiente";
        $solicitudservreques -> AprobacionJOP       = "pendiente";
        $solicitudservreques -> AprobacionGG        = "pendiente";

        $solicitudservreques ->save();
        

        return redirect()->route('requerimiento.ejecucionReq' , $solicitudservreques -> requerimientos_id );
    }

    public function aproadmin(Solicitudservreque $solicitudservreques){
    
        if ($solicitudservreques->AprobacionADM == null || $solicitudservreques->AprobacionADM == "pendiente") {
            $solicitudservreques->AprobacionADM = "aprobado";
        }elseif ($solicitudservreques->AprobacionADM == "aprobado") {
            $solicitudservreques->AprobacionADM = "pendiente";
        }
        
        $solicitudservreques ->save();

        return redirect()->route('requerimiento.ejecucionReq' , $solicitudservreques -> requerimientos_id );
    }

    public function aprojop(Solicitudservreque $solicitudservreques){
    
        if ($solicitudservreques->AprobacionJOP == null || $solicitudservreques->AprobacionGG == "pendiente") {
            $solicitudservreques->AprobacionJOP = "aprobado";
        }elseif ($solicitudservreques->AprobacionJOP == "aprobado") {
            $solicitudservreques->AprobacionJOP = "pendiente";
        }
        
        $solicitudservreques ->save();

        return redirect()->route('requerimiento.ejecucionReq' , $solicitudservreques -> requerimientos_id );
    }

    public function aprogg(Solicitudservreque $solicitudservreques){
    
        if ($solicitudservreques->AprobacionGG == null || $solicitudservreques->AprobacionGG == "pendiente") {
            $solicitudservreques->AprobacionGG = "aprobado";
        }elseif ($solicitudservreques->AprobacionGG == "aprobado") {
            $solicitudservreques->AprobacionGG = "pendiente";
        }
        
        $solicitudservreques ->save();

        return redirect()->route('requerimiento.ejecucionReq' , $solicitudservreques -> requerimientos_id );
    }
}
