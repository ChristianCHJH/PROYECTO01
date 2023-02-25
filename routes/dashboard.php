<?php

use App\Http\Controllers\AlcanceController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CatcontingenciaController;
use App\Http\Controllers\CatcuentaController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\ContindiferidoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CuentasUserController;
use App\Http\Controllers\DocumentacionController;
use App\Http\Controllers\DocumentssomaController;
use App\Http\Controllers\EjecucioneController;
use App\Http\Controllers\EmpresaCuentaController;
use App\Http\Controllers\HtcategoriaController;
use App\Http\Controllers\HtestructuraController;
use App\Http\Controllers\InterlocutorController;
use App\Http\Controllers\OmologadoController;
use App\Http\Controllers\PamController;
use App\Http\Controllers\PamobservacioneController;
use App\Http\Controllers\PirsonController;
use App\Http\Controllers\ProveedoController;
use App\Http\Controllers\ReqobservacionesController;
use App\Http\Controllers\RequerimientoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\SolicitubieneController;
use App\Http\Controllers\SolicitudservrequeController;
use Illuminate\Support\Facades\Route;


Route::get('/dash', function () {
    //return view('welcome');
    return view('dash.index');
});



Route::controller(CatcuentaController::class)->group(function(){

    Route::get('CatCuenta','index')->middleware('can:categoria.cuenta.view')->name('catcuentas.index');

    Route::post('CatCuenta/', 'store')->name('catcuentas.store');

    Route::put('CatCuenta/up/{catcuenta}', 'update')->name('catcuentas.update');

    Route::delete('CatCuenta/{catcuenta}', 'destroy')->name('catcuentas.destroy');

});

Route::controller(EmpresaCuentaController::class)->group(function(){

    Route::get('cuentaEmpresa', 'index')->middleware('can:cuentas.view')->name('cuentas.index');

    Route::post('cuentaEmpresa', 'store')->name('cuentas.store');

    Route::put('cuentaEmpresa/{cuenta}', 'update')->name('cuentas.update');

    Route::get('cuentaEmpresa/{cuenta}', 'show')->middleware('can:vista.show.cuentas')->name('cuentas.show');

    Route::delete('cuentaEmpresa/{cuenta}', 'destroy')->name('cuentas.destroy');

});

Route::controller(SedeController::class)->group(function(){

    Route::post('cuentaEmpresa/{cuenta}', 'store')->name('sedes.store');

    Route::put('cuentaEmpresa/sede/{sede}', 'update')->name('sedes.update');

    Route::delete('cuentaEmpresa/sede/{sede}', 'destroy')->name('sedes.destroy');

});

Route::controller(InterlocutorController::class)->group(function(){

    Route::post('cuentaEmpresa/interlocutor/{cuenta}', 'store')->name('interlocutors.store');
    
    Route::put('cuentaEmpresa/interlocutor/{interlocutor}', 'update')->name('interlocutors.update');

    Route::delete('cuentaEmpresa/interlocutor/{interlocutor}', 'destroy')->name('interlocutors.destroy');
   

});

Route::controller(DocumentacionController::class)->group(function(){

    Route::get('categoriaDocumentacion', 'index')->middleware('can:categoria.documentacion.view')->name('documentations.index');

    Route::post('categoriaDocumentacion', 'store')->name('documentations.store');

    Route::put('categoriaDocumentacion/up/{documentation}', 'update')->name('documentations.update');

    Route::delete('categoriaDocumentacion/{documentation}', 'destroy')->name('documentations.destroy');

});

Route::controller(CotizacionController::class)->group(function(){

    Route::post('cotizacion/{cuenta}', 'store')->name('cotizacion.store');

    Route::put('cotizacion/up/{quote}', 'update')->name('cotizacion.update');

    Route::get('cotizacion/{quote}', 'destroy')->name('cotizacion.destroy');

   
});

Route::controller(AlcanceController::class)->group(function(){

    Route::get('alcance', 'index')->name('alcances.index');

    Route::post('alcance/', 'store')->name('alcances.store');

    Route::put('alcance/up/{alcance}', 'update')->name('alcances.update');

    Route::delete('alcance/{alcance}', 'destroy')->name('alcances.destroy');

});

Route::controller(HtcategoriaController::class)->group(function(){

    Route::get('HTCategoria','index')->middleware('can:categoria.especialidadht.view')->name('htcategorias.index');

    Route::post('HTCategoria/', 'store')->name('htcategorias.store');

    Route::put('HTCategoria/up/{htcategoria}', 'update')->name('htcategorias.update');

    Route::delete('HTCategoria/{htcategoria}', 'destroy')->name('htcategorias.destroy');

});

Route::controller(ProveedoController::class)->group(function(){

    Route::get('proveedor', 'index')->middleware('can:proveedor.view')->name('proveedos.index');

    Route::post('proveedor/', 'store')->name('proveedos.store');

    Route::put('proveedor/up/{proveedo}', 'update')->name('proveedos.update');

    Route::delete('proveedor/{proveedo}', 'destroy')->name('proveedos.destroy');

});

Route::controller(OmologadoController::class)->group(function(){

    Route::get('omologado', 'index')->middleware('can:omologado.view')->name('omologados.index');

    Route::post('omologado/', 'store')->name('omologados.store');

    Route::put('omologado/up/{omologado}', 'update')->name('omologados.update');

    Route::delete('omologado/{omologado}', 'destroy')->name('omologados.destroy');

});

Route::controller(HtestructuraController::class)->group(function(){

    Route::get('HTEstructura/{cuenta}','index')->middleware('can:vista.show.htcuenta')->name('htestructuras.index');

    Route::post('HTEstructura/{cuenta}', 'store')->name('htestructuras.store');

    Route::put('HTEstructura/up/{htestructura}', 'update')->name('htestructuras.update');
    
    Route::delete('HTEstructura/{htestructura}', 'destroy')->name('htestructuras.destroy');

});

Route::controller(CargoController::class)->group(function(){

    Route::get('cargo','index')->middleware('can:categoria.cargos.view')->name('cargo.index');
    
    Route::post('cargo/', 'store')->name('cargo.store');

    Route::put('cargo/up/{cargo}', 'update')->name('cargo.update');

    Route::delete('cargo/{cargo}', 'destroy')->name('cargo.destroy');

});

Route::controller(PirsonController::class)->group(function(){

    Route::get('persona','index')->middleware('can:gestion.cuentas.usuarios.view')->name('persona.index');
    
    Route::post('persona/', 'store')->name('persona.store');

    Route::put('persona/up/{pirson}', 'update')->name('persona.update');

    Route::delete('persona/{pirson}', 'destroy')->name('persona.destroy');


});

Route::controller(CollaboratorController::class)->group(function(){

    
    Route::post('colaborador/{cuenta}', 'store')->name('colaborador.store');

    Route::put('colaborador/up/{collaborator}', 'update')->name('colaborador.update');

    Route::delete('colaborador/{collaborator}', 'destroy')->name('colaborador.destroy');


});

Route::controller(PamController::class)->group(function(){

    Route::get('pam/cron/{cuenta}','index')->name('pam.index');

    Route::get('pam/{htestructura}', 'show')->name('pam.show');

    Route::post('pam/{htestructura}', 'store')->name('pam.store');

    Route::post('pam/create/{cuenta}', 'create')->name('pam.create');

    Route::put('pam/up/{pam}', 'update')->name('pam.update');

    Route::put('pam/edit/{pam}', 'edit')->name('pam.edit');

    Route::delete('pam/del/{pam}', 'delite')->name('pam.delite');
    
    Route::delete('pam/{pam}', 'destroy')->name('pam.destroy');

});

Route::controller(EjecucioneController::class)->group(function(){
    
    Route::get('ejecucion/{pam}','index')->name('ejecucion.index');

    Route::post('ejecucion/{pam}', 'store')->name('ejecucion.store');

    Route::put('ejecucion/up/{ejecucione}', 'update')->name('ejecucion.update');

    Route::get('cargarPAm/{ejecucione}','cargaht')->name('ejecucion.cargaht');


});

Route::controller(PamobservacioneController::class)->group(function(){

    Route::post('ObservacionPam/{pam}', 'store')->name('pamObservacion.store');

    Route::delete('ObservacionPam/{pamobservacione}', 'destroy')->name('pamObservacion.destroy');
    

});

Route::controller(RequerimientoController::class)->group(function(){

    Route::get('requerimiento','index')->middleware('can:crear.service.desk.ticket.view')->name('requerimiento.index');

    Route::post('requerimiento', 'store')->name('requerimiento.store');

    Route::get('requerimiento/lista', 'show')->middleware('can:requerimiento.ticket.view')->name('requerimiento.show');

    Route::get('ejecucionReq/{requerimiento}','ejecucionReq')->middleware('can:requerimiento.ticket.ejecucion.view')->name('requerimiento.ejecucionReq');

    Route::delete('requerimiento/{requerimiento}', 'destroy')->name('requerimiento.destroy');

    Route::put('ejecucionReq/up/{requerimiento}', 'update')->name('requerimiento.update');


});

Route::controller(CatcontingenciaController::class)->group(function(){

    Route::get('CatContingencia','index')->middleware('can:categoria.contingencia.view')->name('catContinge.index');

    Route::post('CatContingencia/', 'store')->name('catContinge.store');

    Route::put('CatContingencia/up/{catcontingencia}', 'update')->name('catContinge.update');

    Route::delete('CatContingencia/{catcontingencia}', 'destroy')->name('catContinge.destroy');

});

Route::controller(ContindiferidoController::class)->group(function(){

    
    Route::post('contingenciaDiferido/{cuenta}', 'store')->name('contingencia.store');

    Route::put('contingenciaDiferido/up/{contindiferido}', 'update')->name('contingencia.update');

    Route::delete('contingenciaDiferido/{contindiferido}', 'destroy')->name('contingencia.destroy');

});

Route::controller(ReqobservacionesController::class)->group(function(){

    Route::post('Reqobservaciones/{requerimiento}', 'store')->name('Reqobservaciones.store');

    Route::delete('Reqobservaciones/dle/{reqobservacione}', 'destroy')->name('Reqobservaciones.destroy');
    

});

Route::controller(SolicitudservrequeController::class)->group(function(){

    Route::post('SolicitudServicio/{requerimiento}', 'store')->name('SolicServ.store');

    Route::put('SolicitudServicio/up/{solicitudservreques}', 'update')->name('SolicServ.update');

    Route::get('SolicitudServicio/admin/{solicitudservreques}', 'aproadmin')->name('SolicServ.aproadmin');

    Route::get('SolicitudServicio/jop/{solicitudservreques}', 'aprojop')->name('SolicServ.aprojop');

    Route::get('SolicitudServicio/gere/{solicitudservreques}', 'aprogg')->name('SolicServ.aprogg');

});

Route::controller(SolicitubieneController::class)->group(function(){

    Route::post('SolicitudBienes/{requerimiento}', 'store')->name('SolicBienes.store');

    Route::put('SolicitudBienes/up/{solicitubienes}', 'update')->name('SolicBienes.update');

    Route::get('SolicitudBienes/admin/{solicitubienes}', 'aproadmin')->name('SolicBienes.aproadmin');

    Route::get('SolicitudBienes/jop/{solicitubienes}', 'aprojop')->name('SolicBienes.aprojop');

    Route::get('SolicitudBienes/gere/{solicitubienes}', 'aprogg')->name('SolicBienes.aprogg');

});

Route::controller(DocumentssomaController::class)->group(function(){

    Route::get('DocumentoSsoma','index')->middleware('can:documentacion.ssoma.view')->name('DocSsoma.index');
    
    Route::post('DocumentoSsoma/', 'store')->name('DocSsoma.store');

    Route::get('DocumentoSsoma/delete/{documentssomas}', 'destroy')->name('DocSsoma.destroy');


});

Route::controller(CuentasUserController::class)->group(function(){

    Route::get('CuentasUsuarios','index')->name('CuenUser.index');

    Route::post('CuentasUsuarios/{users}', 'create')->name('CuenUser.create');
    
    Route::delete('CuentasUsuarios/{users}', 'destroy')->name('CuenUser.destroy');

});