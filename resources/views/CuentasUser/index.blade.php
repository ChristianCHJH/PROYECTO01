@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@php
    //SECTION TITULO PRINCIPAL
        $SECT_PRINC = "274c77";
        $SECT_PRINC_TEXT = "ffffff";

    //BOTON AGREGAR CUENTA
        $BUTTON_AGRE = "007200";
        $TEXT_BUTTON_AGRE = "ffffff";

    //SECTION SECUNDARIOS
        $colortext = "274C77";
        $fondo_section = "A9D6E5";

    //BOTON CREAR
        $boton_crear = "01497C";
        $text_boton_crear = "ffffff";

@endphp

<section class="p-3 rounded" style="margin-bottom: 15px;margin-left: 20px;margin-right: 20px;background-color:#{{$SECT_PRINC}}; color: #{{$SECT_PRINC_TEXT}}">
    <h1>    CUENTAS</h1>
</section>

@stop

@section('content')


<div class="mx-auto p-3 w-75" style="width: 200px; margin-bottom: 15px;margin-left: 20px;margin-right: 20px;">

	<section class="shadow p-3 rounded" >

        <div class="table-responsive">
            <table class="table">
                <thead class="table table-striped table-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre de Usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Rol</th>
                        <td scope="col" colspan="2" align="center"><strong> Accion</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user ->id}}</td>
                        <td>{{$user ->name}}</td>
                        <td>{{$user ->email}}</td>

                        <?php   $recorridoX = 0;
                                $nombreRol= "Sin Rol";
                                ?>   

                        @foreach ($roleAssignment as $roleAssignments)
                            
                            <?php if ($roleAssignment[$recorridoX]->model_id  == $user->id) { ?>

                                @foreach ($roles as $rol)
                                    <?php if ($rol->id  == $roleAssignment[$recorridoX]->role_id ) { 
                                        $nombreRol = $rol ->name;
                                     } ?>
                                @endforeach

                            <?php break; }else {
                                {{$recorridoX = $recorridoX + 1;}}
                            }
                            ?>

                        @endforeach

                        <td>{{$nombreRol}}</td>

                        @can('gestion.cuentas.credenciales.editar')
                            <td align="center">
                                <button type="button"  class="btn btn-warning" data-toggle="modal" data-target="#editUsuario{{$user->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                            </td>
                        @endcan

                        <!-- Modal de CREACION DE CATEGORIA HT -->
                            <div class="modal fade" id="editUsuario{{$user->id}}" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">ASIGNAR ROL</h5>
                                        </div>

                                        <div class="modal-body">
                                            <form class="needs-validation" action="{{route('CuenUser.create',$user)}}" method="POST" novalidate>

                                                @csrf

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">NOMBRE DE USUARIO:</label>
                                                    <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{$user ->name}}">
                                                </div>


                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">EMAIL:</label>
                                                    <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{$user ->email}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">ROL:</label>
                                                    <select class="form-control" id="rol" name="rol" required >

                                                        {{$contador = 0}}
                                                        {{$recorrido = 0}}

                                                        

                                                        @foreach ($roleAssignment as $roleAssignments)
                                                            
                                                            
                                                            
                                                            <?php if ($roleAssignment[$recorrido]->model_id  == $user->id) { ?>

                                                                @foreach ($roles as $rol)
                                                                    <?php if ($rol->id  == $roleAssignment[$recorrido]->role_id ) { ?>
                                                                        <option value="{{$rol ->id}}" selected>{{$rol ->name}}</option>
                                                                    <?php } else{ ?>
                                                                        <option value="{{$rol ->id}}">{{$rol ->name}}</option>
                                                                    <?php } ?>
                                                                @endforeach


                                                            <?php   
                                                                    $contador = 1;
                                                                    break; 
                                                            }else {
                                                                {{$recorrido = $recorrido + 1;}}
                                                            }
                                                            ?>
                                                            

                                                        @endforeach

                                                        <?php if ($contador == 0) { ?>

                                                        <option value="" >Seleccionar Rol</option>

                                                        @foreach ($roles as $rol)
                                                            <option value="{{$rol ->id}}">{{$rol ->name}}</option>
                                                        @endforeach

                                                        <?php } ?>

                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- FIN Modal de CREACION DE CATEGORIA HT -->

                        @can('gestion.cuentas.credenciales.eliminar')
                            <td align="center">
                                <form   action="{{route('CuenUser.destroy',$user)}}" method="POST">
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


    </section>
</div>





@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop