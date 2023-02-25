<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Quote;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CotizacionController extends Controller
{
    public function store(Request $request , Cuenta $cuenta){

        $request->validate([
            'nombreCotCon' => 'required',
            'documentation_id' => 'required',
            'anioCotCon' => 'required',
            'pdfDoc' => 'required'
        ]);
        
        $quote = new Quote();

        $quote -> nombreCotCon = $request->nombreCotCon;
        
        /*--

        if ($request->hasFile('pdfDoc')) {
            $archivo=$request->file('pdfDoc');
            $archivo->move(public_path().'/Archivos/',$archivo->getClientOriginalName());
            $quote -> pdfDoc=$archivo->getClientOriginalName();
        }
        --*/

        $doc = $request->file('pdfDoc')->store('public/Archivos');
        $url = Storage::url($doc);

        $quote -> pdfDoc = $url;
        $quote -> cuenta_id = $cuenta->id;
        $quote -> documentation_id = $request->documentation_id;
        $quote -> anioCotCon = $request->anioCotCon;
        

        $quote ->save();

        return redirect() -> route('cuentas.show', $cuenta->id);
    }


    public function update(Request $request ,Quote $quote ){
        
        
        $quote -> nombreCotCon = $request->nombreCotCon;

        /*--
        if ($request->hasFile('pdfDoc')) {
            $archivo=$request->file('pdfDoc');
            $archivo->move(public_path().'/Archivos/',$archivo->getClientOriginalName());
            $quote -> pdfDoc=$archivo->getClientOriginalName();
        }
        --*/

        $doc = $request->file('pdfDoc')->store('public/Archivos');
        $url = Storage::url($doc);

        $quote -> pdfDoc = $url;

        $quote -> documentation_id = $request->documentation_id;
        $quote -> anioCotCon = $request->anioCotCon;

        $quote ->save();

        return redirect() -> route('cuentas.show', $quote->cuenta_id);
        

    }

    public function destroy(Quote $quote){

        

        $urlimg = str_replace('storage','public',$quote->pdfDoc); 
        Storage::delete($urlimg);


        $quote->delete();
    

        return redirect() -> route('cuentas.show', $quote->cuenta_id);

        
    }
}
