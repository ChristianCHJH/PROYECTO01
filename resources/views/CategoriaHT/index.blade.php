@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<section class="shadow p-3 bg-white rounded" style="margin-bottom: 15px;margin-left: 20px;margin-right: 20px;">
    <h1>ESPECIALIDADES</h1>
</section>
@stop

@section('content')


<section class="shadow p-3 bg-white rounded" style="margin-bottom: 15px;margin-left: 20px;margin-right: 20px;">

    @can('categoria.especialidadht.nuevo')
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCategoriaHT" 
            style="margin-bottom: 10px;">
                NUEVO
        </button>
    @endcan

    <table class="table">
        <thead class="table table-striped table-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Descripcion</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at	</th>

                @can('categoria.especialidadht.editar')
                    <td></td>
                @endcan
                @can('categoria.especialidadht.eliminar')
                    <td></td>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($htcategorias as $htcategoria)
            
                <tr>
                    <th >{{$htcategoria->id}}</th>
                    <td>{{$htcategoria->especialidad}}</td>
                    <td>{{$htcategoria->descCatHT}}</td>
                    <td>{{$htcategoria->created_at}}</td>
                    <td>{{$htcategoria->updated_at}}</td>

                    @can('categoria.especialidadht.editar')
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateCategoriaHT{{$htcategoria->id}}" 
                                style="margin-bottom: 10px;" >
                                    Editar
                            </button>
                        </td>
                    @endcan


                    <!-- Modal de CREACION DE CATEGORIA HT -->
                        <div class="modal fade" id="updateCategoriaHT{{$htcategoria->id}}" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">AGREGAR NUEVA CATEGORIA</h5>
                                    </div>

                                    <div class="modal-body">
                                        <form class="needs-validation" action="{{route('htcategorias.update',$htcategoria)}}" method="POST" novalidate>

                                            @csrf
                                            @method('put')

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">ESPECIALIDAD:</label>
                                                <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{$htcategoria->especialidad}}" required>
                                                <div class="invalid-feedback">
                                                    Es necesario colocar la ESPECIALIDAD
                                                </div>
                                            </div>

                                            

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">DESCRIPCION:</label>
                                                <textarea class="form-control" id="descCatHT" name="descCatHT" style="height: 94px;" required>{{$htcategoria->descCatHT}}</textarea>
                                                <div class="invalid-feedback">
                                                    Es necesario colocar una DESCRIPCION
                                                </div>
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

                    @can('categoria.especialidadht.eliminar')
                        <td align="center">
                            <form   action="{{route('htcategorias.destroy',$htcategoria)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="btn btn-danger" >Eliminar</button></a>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach

    </table>

    {{$htcategorias->links()}}
</section>




<!-- Modal de CREACION DE CATEGORIA HT -->
    <div class="modal fade" id="createCategoriaHT" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">AGREGAR NUEVA CATEGORIA</h5>
                </div>

                <div class="modal-body">
                    <form class="needs-validation" action="{{route('htcategorias.store')}}" method="POST" novalidate>

                        @csrf

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ESPECIALIDAD:</label>
                            <input type="text" class="form-control" id="especialidad" name="especialidad" required>
                            <div class="invalid-feedback">
                                Es necesario colocar la ESPECIALIDAD
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">DESCRIPCION:</label>
                            <textarea class="form-control" id="descCatHT" name="descCatHT" style="height: 94px;" required></textarea>
                            <div class="invalid-feedback">
                                Es necesario colocar una DESCRIPCION
                            </div>
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
<!-- FIN Modal de CREACION DE CATEGORIA HT -->


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop