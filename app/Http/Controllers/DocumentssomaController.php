<?php

namespace App\Http\Controllers;

use App\Models\Documentssoma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DocumentssomaController extends Controller
{
    public function index(){

        $documentssomas = Documentssoma::paginate(10);

        return view('DocumentosSSOMA.index', compact('documentssomas'));
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'pdf' => 'required'
        ]);
        
        $documentssomas = new Documentssoma();

        $documentssomas -> nombre = $request->nombre;
        $documentssomas -> descripcion = $request->descripcion;

        /*--
        if ($request->hasFile('pdf')) {
            $archivo=$request->file('pdf');
            $archivo->move(public_path().'/ArchivosSSOMA/',$archivo->getClientOriginalName());
            $documentssomas -> pdf=$archivo->getClientOriginalName();
        }
        --*/

        $docpdf = $request->file('pdf')->store('public/ArchivosSSOMA');
        $url = Storage::url($docpdf);

        $documentssomas -> pdf   = $url;

        $documentssomas ->save();

        return redirect()->route('DocSsoma.index');
    }

    public function update(Request $request, Documentssoma $documentssomas){

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'pdf' => 'required'
        ]);
        
        
        $documentssomas -> nombre = $request->nombre;
        $documentssomas -> descripcion = $request->descripcion;

        /*--
        if ($request->hasFile('pdf')) {
            $archivo=$request->file('pdf');
            $archivo->move(public_path().'/ArchivosSSOMA/',$archivo->getClientOriginalName());
            $documentssomas -> pdf=$archivo->getClientOriginalName();
        }
        --*/

        $docpdf = $request->file('pdf')->store('public/ArchivosSSOMA');
        $url = Storage::url($docpdf);

        $documentssomas -> pdf   = $url;

        $documentssomas ->save();

        return redirect()->route('DocSsoma.index');
    }

    public function destroy(Documentssoma $documentssomas){

        $urlimg = str_replace('storage','public',$documentssomas -> pdf); 

        Storage::delete($urlimg);

        $documentssomas->delete();

        return redirect()->route('DocSsoma.index');
    }
}
