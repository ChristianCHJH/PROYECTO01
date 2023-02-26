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

                        <!-- CONDICIONAL PARA MOSTRAR ESTADO -->
                            <?php if ($cuenta ->estado=='0') { ?>
                                <td >Inactivo</td>
                            <?php } elseif ($cuenta ->estado=='1') { ?>
                                <td>Activo</td>
                            <?php } else { ?>
                                <td>Pendiente</td>
                            <?php }?>
                        <!-- FIN CONDICIONAL  -->

                        <!-- CONDICIONAL PARA MOSTRAR BOTON ESTADO 
                            <?php  // if ($cuenta ->estado=='0' || $cuenta ->estado== null) { ?>
                                <td>
                                    <a href="#"><button type="button" class="btn btn-success" class="btn btn-success">Activar</button></a>
                                </td>
                            <?php //} else { ?>
                                <td>
                                    <a href="#"><button type="button" class="btn btn-warning" class="btn btn-success">Desactivar</button></a>
                                </td>
                            <?php// }?>
                        FIN CONDICIONAL PARA MOSTRAR BOTON ESTADO -->

                        @can('button.cuentas.show')
                            <td align="center">
                                <a href="{{route('cuentas.show', $cuenta ->id)}}">
                                    <button type="button"  class="btn btn-info" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        @endcan

                        @can('cuentas.eliminar')
                        <td align="center">
                            <form   action="{{route('cuentas.destroy', $cuenta ->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="btn btn-danger " style="text-align: right" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        @endcan

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{$cuentas->links()}}

    





    
    
</section>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop