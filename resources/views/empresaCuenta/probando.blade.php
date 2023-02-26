@extends('adminlte::page')

@section('title', 'Cuentas')

@section('content_header')

@php
    //SECTION TITULO PRINCIPAL
        $SECT_PRINC = "274c77";
        $SECT_PRINC_TEXT = "ffffff";

    //BOTON AGREGAR CUENTA
        $BUTTON_AGRE = "007200";
        $TEXT_BUTTON_AGRE = "ffffff";
@endphp

<section class="p-3 rounded" style="margin-bottom: 15px;margin-left: 20px;margin-right: 20px;background-color:#{{$SECT_PRINC}}; color: #{{$SECT_PRINC_TEXT}}">
    <h1>CUENTAS</h1>
</section>

@stop

@section('content')


<section class=" p-3 bg-white rounded" style="margin-bottom: 15px;margin-left: 20px;margin-right: 20px;">
    
        
    <!-- Button trigger modal -->
        @can('cuentas.nuevo')
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" 
            style="margin-bottom: 10px; background-color:#{{$BUTTON_AGRE}};color: #{{$TEXT_BUTTON_AGRE}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
        @endcan
    <!-- FIN Button trigger modal -->

    <div class="table-responsive">
        <table class="table">
            <thead class="table table-striped table-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Ruc</th>
                    <th scope="col">Razon Social</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Tipo FAC</th>
                    <th scope="col">Fecha Creacion</th>
                    <th scope="col">Fecha Actualizacion</th>
                    <th scope="col" >Estado</th>
                    
                    @can('button.cuentas.show')
                        <td></td>
                    @endcan

                    @can('cuentas.eliminar')
                        <td></td>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach($cuentas as $cuenta)
                    <tr>
                        <th >{{$cuenta ->id}}</th>
                        <td>{{$cuenta ->ruc}}</td>
                        <td>{{$cuenta ->razonSocial}}</td>

                        @foreach ($catcuentas as $catcuenta)
                        <?php if ($catcuenta->id == $cuenta ->catcuentas_id) { ?>
                            <td>{{$catcuenta ->CatgEmpresa}}</td>
                        <?php } ?>
                        @endforeach
                        <td>{{$cuenta ->tipoFacturacion}}</td>
                        
                        <td>{{$cuenta ->created_at}}</td>
                        <td>{{$cuenta ->updated_at}}</td>

                        

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{$cuentas->links()}}

    




<!-- CREACION DE NUEVA CUENTA -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalCenterTitle" 
            aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">AGREGAR NUEVA CUENTA</h5>
            
            </div>
                <div class="modal-body">
                    <form class=" needs-validation" action="{{route('cuentas.store')}}" method="POST" novalidate>

                        @csrf

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">RUC:</label>
                            <input type="number" class="form-control" id="ruc" name="ruc" required>
                            
                            <div class="invalid-feedback">
                                Es necesario colocar el RUC
                            </div>
                        </div>

                        <!-- VALIDACION PARA INGRESO DE 11 DIGITOS -->
                            <script language="JavaScript">
                                var input=  document.getElementById('ruc');
                                input.addEventListener('input',function(){
                                if (this.value.length > 11) 
                                    this.value = this.value.slice(0,11); 
                                })
                            </script>
                        <!-- FIN VALIDACION PARA INGRESO DE 11 DIGITOS -->

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">RAZON SOCIAL:</label>
                            <input type="text" class="form-control" id="razonSocial" name="razonSocial" required>
                            <div class="invalid-feedback">
                                Es necesario colocar la RAZON SOCIAL
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">CATEGORIA:</label>
                            <select class="form-control" id="catcuentas_id" name="catcuentas_id" required >
                                <option value="" selected>Seleccionar estado</option>
                                @foreach($catcuentas as $catcuenta) 
                                <option value="{{$catcuenta->id}}">{{$catcuenta->CatgEmpresa}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">TIPO DE FACTURACION:</label>
                            <select class="form-control" id="tipoFacturacion" name="tipoFacturacion" required >
                                <option value="" selected>Seleccionar tipo de facturacion</option>
                                <option value="Precio flat fijo">Precio flat fijo</option>
                                <option value="Precio variable">Precio variable</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                        
                    </form>

                </div>
         </div>
        </div>
    </div>
<!-- FIN DE NUEVA CUENTA -->
    
    
</section>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop